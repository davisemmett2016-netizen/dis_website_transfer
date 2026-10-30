/**
 * Cloudflare Pages Function: POST /api/submit
 *
 * Receives the quote-form submissions from davissouthernseptic.com
 * (same fields the old WordPress handler used) and
 *   1. emails them to your inbox via Resend (https://resend.com), and/or
 *   2. forwards them as JSON to your own platform (LEAD_WEBHOOK_URL).
 *
 * Environment variables (Pages > Settings > Environment variables):
 *   RESEND_API_KEY      Resend API key (secret)            - for email
 *   MAIL_FROM           e.g. Davis Southern Septic <leads@davissouthernseptic.com>
 *   MAIL_TO             defaults to contact@davissouthernseptic.com
 *   LEAD_WEBHOOK_URL    optional: your platform endpoint that accepts JSON
 *   LEAD_WEBHOOK_TOKEN  optional: sent as "Authorization: Bearer <token>"
 *
 * It answers in the same JSON shape the site's JavaScript already expects:
 *   { success: true,  data: { message, name } }
 *   { success: false, data: { message } }
 */

const PHONE = '470.839.4441';

const json = (obj, status = 200) =>
  new Response(JSON.stringify(obj), { status, headers: { 'content-type': 'application/json' } });

const esc = (s) =>
  String(s).replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));

const nl2br = (s) => esc(s).replace(/\n/g, '<br/>');

async function sendEmail(env, { to, subject, html, replyTo }) {
  const res = await fetch('https://api.resend.com/emails', {
    method: 'POST',
    headers: { Authorization: `Bearer ${env.RESEND_API_KEY}`, 'content-type': 'application/json' },
    body: JSON.stringify({
      from: env.MAIL_FROM || 'Davis Southern Septic <onboarding@resend.dev>',
      to: [to],
      subject,
      html,
      ...(replyTo ? { reply_to: replyTo } : {}),
    }),
  });
  return res.ok;
}

export async function onRequestPost({ request, env, waitUntil }) {
  // Only accept posts from our own site
  const origin = request.headers.get('origin');
  if (origin) {
    try {
      if (new URL(origin).host !== new URL(request.url).host) {
        return json({ success: false, data: { message: 'Not allowed.' } }, 403);
      }
    } catch (e) {
      return json({ success: false, data: { message: 'Not allowed.' } }, 403);
    }
  }

  let form;
  try {
    form = await request.formData();
  } catch (e) {
    return json({ success: false, data: { message: 'Bad request.' } }, 400);
  }
  const get = (k) => String(form.get(k) || '').trim().slice(0, 3000);

  // Hidden honeypot field (bots fill it in, people never see it)
  if (get('company_website')) return json({ success: true, data: { message: 'Request received!' } });

  const f = {
    first: get('first_name'), last: get('last_name'), phone: get('phone'), email: get('email'),
    service: get('service'), address: get('address'), zip: get('zip'), message: get('message'),
    step: get('dss_step') || '1',
    cName: get('customer_name'), cPhone: get('customer_phone'), cService: get('customer_service'),
  };

  if (f.step === '1' && f.phone.replace(/\D/g, '').length < 7) {
    return json({ success: false, data: { message: `Please enter a valid phone number, or call ${PHONE}.` } }, 400);
  }

  const row = (k, v, last) =>
    `<tr><td style="padding:8px;${last ? '' : 'border-bottom:1px solid #eee;'}font-weight:bold;width:140px;">${k}</td>` +
    `<td style="padding:8px;${last ? '' : 'border-bottom:1px solid #eee;'}">${v}</td></tr>`;

  let subject, body;
  if (f.step === '2') {
    subject = 'Additional Details (Step 2) - Davis Southern Septic';
    body = '<h2>Step 2: Additional Details</h2>' +
      `<p><strong>From Step 1:</strong> ${esc(f.cName)} | ${esc(f.cPhone)} | ${esc(f.cService)}</p><hr/>`;
    if (f.email) body += `<p><strong>Email:</strong> ${esc(f.email)}</p>`;
    if (f.address) body += `<p><strong>Address:</strong> ${esc(f.address)}</p>`;
    if (f.zip) body += `<p><strong>ZIP:</strong> ${esc(f.zip)}</p>`;
    if (f.message) body += `<p><strong>Notes:</strong><br/>${nl2br(f.message)}</p>`;
  } else {
    const name = `${f.first} ${f.last}`.trim();
    subject = `New Service Request - ${f.first || 'Website Visitor'} - Davis Southern Septic`;
    body = '<h2>New Service Request</h2><table style="border-collapse:collapse;width:100%;">' +
      row('Name', esc(name)) +
      row('Phone', `<a href="tel:${esc(f.phone.replace(/\D/g, ''))}">${esc(f.phone)}</a>`) +
      (f.email ? row('Email', esc(f.email)) : '') +
      (f.service ? row('Service', esc(f.service)) : '') +
      (f.address ? row('Address', esc(f.address)) : '') +
      (f.message ? row('Notes', nl2br(f.message), true) : '') +
      '</table>';
  }
  body += '<hr/><p style="color:#888;font-size:12px;">Submitted from davissouthernseptic.com</p>';

  const canEmail = Boolean(env.RESEND_API_KEY);
  const canForward = Boolean(env.LEAD_WEBHOOK_URL);
  if (!canEmail && !canForward) {
    return json({ success: false, data: { message: `We could not send that right now. Please call ${PHONE}.` } }, 500);
  }

  let delivered = false;

  if (canEmail) {
    const ok = await sendEmail(env, {
      to: env.MAIL_TO || 'contact@davissouthernseptic.com',
      subject, html: body,
      replyTo: f.email ? `${`${f.first} ${f.last}`.trim()} <${f.email}>` : undefined,
    });
    delivered = delivered || ok;

    // Confirmation to the customer (step 1, only if they gave an email)
    if (ok && f.email && f.step === '1') {
      const cb = `<h2>Thank You${f.first ? ', ' + esc(f.first) : ''}!</h2>` +
        '<p>We received your request and will reach out shortly.</p>' +
        (f.service ? `<p><strong>Service:</strong> ${esc(f.service)}</p>` : '') +
        `<p>For urgent help: <strong><a href="tel:4708394441">${PHONE}</a></strong></p>` +
        `<hr/><p style="color:#888;font-size:12px;">Davis Southern Septic | ${PHONE}</p>`;
      const p = sendEmail(env, { to: f.email, subject: 'We received your request - Davis Southern Septic', html: cb });
      if (waitUntil) waitUntil(p);
    }
  }

  if (canForward) {
    try {
      const res = await fetch(env.LEAD_WEBHOOK_URL, {
        method: 'POST',
        headers: {
          'content-type': 'application/json',
          ...(env.LEAD_WEBHOOK_TOKEN ? { Authorization: `Bearer ${env.LEAD_WEBHOOK_TOKEN}` } : {}),
        },
        body: JSON.stringify({
          source: 'website', step: f.step, submitted_at: new Date().toISOString(),
          first_name: f.first, last_name: f.last, phone: f.phone, email: f.email,
          service: f.service, address: f.address, zip: f.zip, message: f.message,
          step1_name: f.cName, step1_phone: f.cPhone, step1_service: f.cService,
        }),
      });
      delivered = delivered || res.ok;
    } catch (e) { /* keep going: email may have worked */ }
  }

  if (!delivered) {
    return json({ success: false, data: { message: `Delivery failed. Please call ${PHONE}.` } }, 502);
  }
  return json({ success: true, data: { message: 'Request received!', name: f.first } });
}

// Anything other than POST
export const onRequest = () => json({ success: false, data: { message: 'Method not allowed.' } }, 405);
