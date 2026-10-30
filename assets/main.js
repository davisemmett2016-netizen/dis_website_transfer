/**
 * Davis Southern Septic — main.js v13
 * Key fix: Mobile menu locks body scroll so menu is independently scrollable.
 */
document.addEventListener('DOMContentLoaded', function () {

  /* ================================================================
     STICKY NAV
  ================================================================ */
  var nav = document.getElementById('dss-nav-wrap');
  if (nav) {
    window.addEventListener('scroll', function () {
      nav.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });
  }

  /* ================================================================
     DROPDOWN — hover intent
  ================================================================ */
  document.querySelectorAll('.has-drop').forEach(function (item) {
    var timer = null;
    function open() {
      clearTimeout(timer);
      document.querySelectorAll('.has-drop').forEach(function (o) {
        if (o !== item) o.classList.remove('drop-open');
      });
      item.classList.add('drop-open');
      var t = item.querySelector('.drop-trigger');
      if (t) t.setAttribute('aria-expanded', 'true');
    }
    function close() {
      timer = setTimeout(function () {
        item.classList.remove('drop-open');
        var t = item.querySelector('.drop-trigger');
        if (t) t.setAttribute('aria-expanded', 'false');
      }, 150);
    }
    item.addEventListener('mouseenter', open);
    item.addEventListener('mouseleave', close);
    var trigger = item.querySelector('.drop-trigger');
    if (trigger) {
      trigger.addEventListener('click', function (e) {
        e.preventDefault();
        item.classList.contains('drop-open') ? (item.classList.remove('drop-open'), trigger.setAttribute('aria-expanded','false')) : open();
      });
    }
    var menu = item.querySelector('.drop-menu');
    if (menu) {
      menu.addEventListener('mouseenter', function () { clearTimeout(timer); });
      menu.addEventListener('mouseleave', close);
    }
  });

  document.addEventListener('click', function (e) {
    if (!e.target.closest('.has-drop')) {
      document.querySelectorAll('.has-drop').forEach(function (i) {
        i.classList.remove('drop-open');
        var t = i.querySelector('.drop-trigger');
        if (t) t.setAttribute('aria-expanded', 'false');
      });
    }
  });

  /* ================================================================
     HAMBURGER — with body scroll lock
     When mobile menu opens:
       - Body scroll is LOCKED (can't scroll the page behind)
       - Menu itself is independently scrollable
     When menu closes: body scroll is RESTORED
  ================================================================ */
  var burger    = document.querySelector('.burger');
  var mobNav    = document.querySelector('.dss-mob-nav');
  var scrollY   = 0; /* remember scroll position when locking */

  function lockBodyScroll() {
    scrollY = window.scrollY;
    document.body.style.overflow   = 'hidden';
    document.body.style.position   = 'fixed';
    document.body.style.top        = '-' + scrollY + 'px';
    document.body.style.width      = '100%';
  }

  function unlockBodyScroll() {
    document.body.style.overflow   = '';
    document.body.style.position   = '';
    document.body.style.top        = '';
    document.body.style.width      = '';
    window.scrollTo(0, scrollY);
  }

  function openMenu() {
    mobNav.classList.add('open');
    burger.classList.add('open');
    burger.setAttribute('aria-expanded', 'true');
    mobNav.setAttribute('aria-hidden', 'false');
    lockBodyScroll();
  }

  function closeMenu() {
    mobNav.classList.remove('open');
    burger.classList.remove('open');
    burger.setAttribute('aria-expanded', 'false');
    mobNav.setAttribute('aria-hidden', 'true');
    unlockBodyScroll();
  }

  if (burger && mobNav) {
    burger.addEventListener('click', function () {
      mobNav.classList.contains('open') ? closeMenu() : openMenu();
    });

    /* Close when tapping a direct link (not county toggle buttons) */
    mobNav.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        /* Small delay so navigation can start before scroll unlocks */
        setTimeout(closeMenu, 50);
      });
    });

    /* Close on backdrop tap — if user taps outside nav area */
    document.addEventListener('click', function (e) {
      if (mobNav.classList.contains('open') && !mobNav.contains(e.target) && !burger.contains(e.target)) {
        closeMenu();
      }
    });

    /* Close on ESC key */
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && mobNav.classList.contains('open')) closeMenu();
    });
  }

  /* ================================================================
     MOBILE COUNTY ACCORDION
  ================================================================ */
  document.querySelectorAll('.mob-county-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var targetId = btn.getAttribute('data-target');
      var panel    = document.getElementById(targetId);
      if (!panel) return;
      var isOpen   = btn.getAttribute('aria-expanded') === 'true';

      /* Close others */
      document.querySelectorAll('.mob-county-toggle[aria-expanded="true"]').forEach(function (ob) {
        if (ob !== btn) {
          ob.setAttribute('aria-expanded', 'false');
          var op = document.getElementById(ob.getAttribute('data-target'));
          if (op) op.style.display = 'none';
        }
      });

      if (isOpen) {
        btn.setAttribute('aria-expanded', 'false');
        panel.style.display = 'none';
      } else {
        btn.setAttribute('aria-expanded', 'true');
        panel.style.display = 'block';
      }
    });
  });

  /* ================================================================
     SMOOTH SCROLL
  ================================================================ */
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        window.scrollTo({ top: target.offsetTop - (nav ? nav.offsetHeight + 12 : 80), behavior: 'smooth' });
      }
    });
  });

  /* ================================================================
     SCROLL REVEAL
  ================================================================ */
  /* Hard fallback: make everything visible after 1.5s regardless */
  setTimeout(function () {
    document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('in'); });
  }, 1500);

  try {
    /* Only hide elements for animation once we know JS is running */
    document.body.classList.add('reveal-ready');

    var ro = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('in'); ro.unobserve(e.target); }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(function (el) { ro.observe(el); });
  } catch(e) {
    /* If IntersectionObserver fails, the timeout above has us covered */
    document.body.classList.remove('reveal-ready');
    document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('in'); });
  }

  /* ================================================================
     TOAST
  ================================================================ */
  function toast(title, msg, type) {
    var old = document.getElementById('dss-toast');
    if (old) old.remove();
    var el = document.createElement('div');
    el.id = 'dss-toast';
    el.setAttribute('role', 'alert');
    el.className = 'dss-toast dss-toast--' + (type || 'success');
    var icon = type === 'success'
      ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>'
      : '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>';
    el.innerHTML =
      '<div class="dss-toast-icon">' + icon + '</div>' +
      '<div class="dss-toast-body"><div class="dss-toast-title">' + title + '</div><div class="dss-toast-msg">' + msg + '</div></div>' +
      '<button class="dss-toast-close" aria-label="Close">&times;</button>';
    document.body.appendChild(el);
    requestAnimationFrame(function () { requestAnimationFrame(function () { el.classList.add('dss-toast--visible'); }); });
    el.querySelector('.dss-toast-close').addEventListener('click', function () { bye(el); });
    setTimeout(function () { bye(el); }, 9000);
  }
  function bye(el) {
    el.classList.remove('dss-toast--visible');
    setTimeout(function () { if (el.parentNode) el.parentNode.removeChild(el); }, 400);
  }

  /* ================================================================
     WORDPRESS AJAX FORM SUBMIT
  ================================================================ */
  function wpSubmit(form, step, extra, onOk, onErr) {
    var btn  = form.querySelector('button[type="submit"]');
    var orig = btn ? btn.innerHTML : '';
    if (btn) { btn.innerHTML = 'Sending&hellip;'; btn.disabled = true; }

    var data = new FormData(form);
    data.append('action',    'dss_submit_form');
    data.append('dss_nonce', (window.DSS && window.DSS.nonce) ? window.DSS.nonce : '');
    data.append('dss_step',  step || '1');
    if (extra) Object.keys(extra).forEach(function (k) { data.append(k, extra[k]); });

    var url = (window.DSS && window.DSS.ajax_url) ? window.DSS.ajax_url : '/wp-admin/admin-ajax.php';

    fetch(url, { method: 'POST', body: data })
      .then(function (r) { if (!r.ok) throw new Error('HTTP ' + r.status); return r.json(); })
      .then(function (j) { j.success ? onOk(j.data) : (function(){ throw new Error((j.data && j.data.message) || 'Failed'); })(); })
      .catch(function (e) { onErr(e.message || 'Error'); })
      .finally(function () { if (btn) { btn.innerHTML = orig; btn.disabled = false; } });
  }

  /* ================================================================
     TWO-STEP FORM
  ================================================================ */
  document.querySelectorAll('.dss-two-step').forEach(function (wrapper) {
    var step1      = wrapper.querySelector('.dss-step-1');
    var step2      = wrapper.querySelector('.dss-step-2');
    var step1Form  = step1 && step1.querySelector('form');
    var step2Form  = step2 && step2.querySelector('form');
    var progress   = wrapper.querySelector('.dss-step-progress');
    var ctx        = {};

    function dots(n) {
      if (!progress) return;
      progress.querySelectorAll('.dss-dot').forEach(function (d, i) {
        d.classList.toggle('active', i < n);
        d.classList.toggle('done',   i < n - 1);
      });
    }

    function goStep2() {
      step1.classList.add('dss-step-exit');
      setTimeout(function () {
        step1.style.display = 'none';
        step2.style.display = 'block';
        step2.classList.add('dss-step-enter');
        setTimeout(function () { step2.classList.remove('dss-step-enter'); }, 400);
        dots(2);
        ['customer_name','customer_phone','customer_service'].forEach(function (n) {
          var el = step2Form && step2Form.querySelector('[name="' + n + '"]');
          if (el) el.value = ctx[n.replace('customer_','')] || '';
        });
      }, 280);
    }

    function done(container) {
      container.classList.add('dss-step-exit');
      setTimeout(function () {
        container.innerHTML =
          '<div class="dss-form-done">' +
            '<div class="dss-done-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2.2"><polyline points="20 6 9 17 4 12"/></svg></div>' +
            '<h4>All Set!</h4>' +
            '<p>We have your info and will be in touch shortly.<br/>Urgent? Call <a href="tel:4708394441">470.839.4441</a>.</p>' +
          '</div>';
        container.classList.remove('dss-step-exit');
      }, 280);
    }

    if (step1Form) {
      step1Form.addEventListener('submit', function (e) {
        e.preventDefault();
        ctx.name    = (((step1Form.querySelector('[name="first_name"]')||{}).value||'') + ' ' + ((step1Form.querySelector('[name="last_name"]')||{}).value||'')).trim();
        ctx.phone   = (step1Form.querySelector('[name="phone"]')||{}).value||'';
        ctx.service = (step1Form.querySelector('[name="service"]')||{}).value||'';

        wpSubmit(step1Form, '1', null,
          function (data) {
            goStep2();
            toast('Request Received!', 'Thank you' + (ctx.name ? ', ' + String(ctx.name.split(' ')[0]).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }) : '') + '! We got your request and will be in touch soon.', 'success');
          },
          function (msg) {
            toast('Submission Failed', msg + ' Please call 470.839.4441.', 'error');
          }
        );
      });
    }

    if (step2Form) {
      var skipBtn = step2Form.querySelector('.dss-skip-btn');
      if (skipBtn) skipBtn.addEventListener('click', function () { done(step2); });

      step2Form.addEventListener('submit', function (e) {
        e.preventDefault();
        wpSubmit(step2Form, '2', { customer_name: ctx.name, customer_phone: ctx.phone, customer_service: ctx.service },
          function () { done(step2); toast('Details Submitted!', 'All set — we\'ll follow up soon.', 'success'); },
          function (msg) { toast('Submission Failed', msg + ' Please call 470.839.4441.', 'error'); }
        );
      });
    }

    dots(1);
  });

  /* ================================================================
     URL ?submitted=1 fallback toast
  ================================================================ */
  if (window.location.search.indexOf('submitted=1') !== -1) {
    toast('Request Submitted!', 'A team member will be in touch shortly. Call 470.839.4441 for urgent help.', 'success');
    history.replaceState({}, document.title, window.location.pathname);
  }

  /* ================================================================
     SCROLLABLE MEGA-MENU
  ================================================================ */
  (function () {
    var track   = document.getElementById('mega-track');
    var inner   = document.getElementById('mega-inner');
    var btnL    = document.getElementById('mega-scroll-left');
    var btnR    = document.getElementById('mega-scroll-right');
    var sbTrack = document.getElementById('mega-scrollbar-track');
    var sbThumb = document.getElementById('mega-scrollbar-thumb');
    if (!track || !inner || !btnL || !btnR || !sbTrack || !sbThumb) return;

    var cur = 0, drag = false, dx = 0, ds = 0;
    var STEP = 320;

    function maxX() { return Math.max(0, inner.scrollWidth - track.clientWidth + 112); }
    function go(x) {
      cur = Math.max(0, Math.min(maxX(), x));
      inner.style.transform = 'translateX(-' + cur + 'px)';
      btnL.classList.toggle('hidden', cur <= 0);
      btnR.classList.toggle('hidden', cur >= maxX());
      var mx = maxX();
      var tw = Math.max(40, sbTrack.clientWidth * (track.clientWidth / (inner.scrollWidth || 1)));
      sbThumb.style.width = tw + 'px';
      sbThumb.style.left  = (mx > 0 ? (cur / mx) * (sbTrack.clientWidth - tw) : 0) + 'px';
    }

    btnL.addEventListener('click', function (e) { e.stopPropagation(); go(cur - STEP); });
    btnR.addEventListener('click', function (e) { e.stopPropagation(); go(cur + STEP); });

    sbThumb.addEventListener('mousedown', function (e) {
      drag = true; dx = e.clientX; ds = cur;
      document.body.style.userSelect = 'none'; e.preventDefault();
    });
    document.addEventListener('mousemove', function (e) {
      if (!drag) return;
      var tw = parseFloat(sbThumb.style.width) || 40;
      go(ds + ((e.clientX - dx) / (sbTrack.clientWidth - tw)) * maxX());
    });
    document.addEventListener('mouseup', function () {
      if (drag) { drag = false; document.body.style.userSelect = ''; }
    });
    sbTrack.addEventListener('click', function (e) {
      if (e.target === sbThumb) return;
      var r = sbTrack.getBoundingClientRect();
      var tw = parseFloat(sbThumb.style.width) || 40;
      go(((e.clientX - r.left - tw / 2) / (sbTrack.clientWidth - tw)) * maxX());
    });

    var tx = 0;
    inner.addEventListener('touchstart', function (e) { tx = e.touches[0].clientX; }, { passive: true });
    inner.addEventListener('touchmove', function (e) {
      go(cur + (tx - e.touches[0].clientX)); tx = e.touches[0].clientX;
    }, { passive: true });

    window.addEventListener('resize', function () { go(cur); });
    setTimeout(function () { go(0); }, 150);
  })();

});
