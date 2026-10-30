<?php
/**
 * Template Name: Privacy Policy
 * Also loaded via rewrite rule for /privacy-policy/
 */
/* Business name shown in the policy. If your Twilio registration uses the LLC name,
   change this to: 'Davis Southern Septic (ABED Strategies LLC)' */
$dss_legal_name = 'Davis Southern Septic';
get_header(); ?>

<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>Privacy Policy</div>
      <h1>Privacy Policy</h1>
      <p>How we collect, use, and protect your information.</p>
    </div>
  </div>
</div>

<section class="dss-section">
  <div class="dss-wrap">
    <div style="max-width:820px; margin:0 auto; font-size:.98rem; line-height:1.8; color:var(--text);">
      <p style="color:#6b7a8d; font-size:.88rem;">Effective date: October 30, 2026</p>

      <p><?php echo esc_html($dss_legal_name); ?> (&ldquo;we,&rdquo; &ldquo;us,&rdquo; or &ldquo;our&rdquo;) provides septic pumping, inspection, repair, installation, and grease trap services across Metro Atlanta, Georgia. This Privacy Policy explains what information we collect through davissouthernseptic.com, by phone, and by text message, and how we use it.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Information We Collect</h2>
      <p>When you request service, ask for a quote, or contact us, we may collect your name, phone number, email address, service address, photos you upload, and a description of your septic or grease trap needs. We may also collect basic technical data such as your browser type, device, and pages visited.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">How We Use Your Information</h2>
      <p>We use your information to respond to your request, prepare quotes, schedule and complete service, send appointment and service updates, process payment, and improve our website and services.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">SMS / Text Messaging</h2>
      <p>Davis Southern Septic collects your mobile number when you request service, a quote, or contact us, and uses it only to send texts about your request, quotes, appointments and service updates. We do not sell or share your SMS opt-in data or personal information with third parties for marketing purposes. Text messaging originator opt-in data and consent will not be shared with any third parties. You can opt out anytime by replying STOP.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Sharing Your Information</h2>
      <p>We do not sell your personal information. We share it only with service providers and subcontractors who need it to perform the work you requested (for example, the crew assigned to your job), with vendors who help us run our website, messaging, and business systems, and when required by law. Those parties may use your information only to provide services to us.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Cookies and Analytics</h2>
      <p>Our website may use cookies and tools such as Google Analytics and Google Search Console to understand how visitors use the site. You can control cookies through your browser settings.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Data Security and Retention</h2>
      <p>We use reasonable safeguards to protect your information. No method of transmission or storage is completely secure. We keep your information for as long as needed to provide service, keep business records, and meet legal obligations.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Your Choices</h2>
      <p>You can opt out of text messages at any time by replying STOP. You can ask us to access, correct, or delete your information by contacting us using the details below.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Changes to This Policy</h2>
      <p>We may update this policy from time to time. The effective date above shows when it was last changed.</p>

      <h2 style="margin-top:36px; font-size:1.35rem;">Contact Us</h2>
      <p><?php echo esc_html($dss_legal_name); ?><br />
      Phone: <a href="tel:4708394441">470.839.4441</a><br />
      Email: <a href="mailto:contact@davissouthernseptic.com">contact@davissouthernseptic.com</a></p>
      <p>See also our <a href="<?php echo esc_url(home_url('/terms')); ?>">Terms and Conditions</a>.</p>
    </div>
  </div>
</section>

<?php get_footer(); ?>
