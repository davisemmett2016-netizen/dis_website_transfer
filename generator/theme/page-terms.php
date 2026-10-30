<?php
/**
 * Template Name: Terms and Conditions
 * Also loaded via rewrite rule for /terms/
 */
/* If your Twilio registration uses the LLC name,
   change this to: 'Davis Southern Septic (ABED Strategies LLC)' */
$dss_legal_name = 'Davis Southern Septic';
get_header(); ?>

<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>Terms and Conditions</div>
      <h1>Terms and Conditions</h1>
      <p>The terms for using our website and our services.</p>
    </div>
  </div>
</div>

<section class="dss-section">
  <div class="dss-wrap">
    <div style="max-width:820px; margin:0 auto; font-size:.98rem; line-height:1.8; color:var(--text);">
      <p style="color:#6b7a8d; font-size:.88rem;">Effective date: October 30, 2026</p>

      <p>These Terms and Conditions apply to your use of davissouthernseptic.com and to services provided by <?php echo esc_html($dss_legal_name); ?>. By using our website or requesting service, you agree to these terms.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Services and Quotes</h2>
      <p>We provide septic pumping, inspections, repairs, installations, and grease trap cleaning. Prices shown on our website are starting points for standard jobs. Final pricing depends on tank size, access, system condition, and location, and is confirmed with you before work begins. Some work may be performed by our qualified subcontractors.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Scheduling and Access</h2>
      <p>You agree to provide safe access to the property and to the tank, lids, and equipment to be serviced. Additional charges may apply if access is blocked or a return trip is needed.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Payment</h2>
      <p>Payment is due as agreed in your quote or invoice.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">SMS Terms</h2>
      <p><strong>Program:</strong> Davis Southern Septic service and appointment texts.<br />
      Messages include quote follow-ups, appointment confirmations and service updates. Message frequency varies. Message and data rates may apply.<br />
      Reply STOP to cancel at any time. Reply HELP for help, or call 470-839-4441.<br />
      Carriers are not liable for delayed or undelivered messages.<br />
      Consent to receive texts is not a condition of purchase.<br />
      See our Privacy Policy at <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">https://davissouthernseptic.com/privacy-policy</a>.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Limitation of Liability</h2>
      <p>To the fullest extent allowed by law, our liability for any claim related to our website or services is limited to the amount you paid for the service at issue. We are not responsible for pre-existing system defects or conditions we could not reasonably detect.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Governing Law</h2>
      <p>These terms are governed by the laws of the State of Georgia.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Changes</h2>
      <p>We may update these terms from time to time. The effective date above shows when they were last changed.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Contact Us</h2>
      <p><?php echo esc_html($dss_legal_name); ?><br />
      Phone: <a href="tel:4708394441">470.839.4441</a><br />
      Email: <a href="mailto:contact@davissouthernseptic.com">contact@davissouthernseptic.com</a></p>
    </div>
  </div>
</section>

<?php get_footer(); ?>
