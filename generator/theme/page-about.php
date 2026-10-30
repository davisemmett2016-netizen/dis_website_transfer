<?php
/**
 * Template Name: About Us
 */
get_header(); ?>

<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>About Us</div>
      <h1>About Davis Southern Septic</h1>
      <p>A family-owned Metro Atlanta septic company built on hard work, honest advice, and a commitment to doing the job right the first time.</p>
      <div class="page-hero-actions">
        <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request a Service</a>
      </div>
    </div>
  </div>
</div>

<!-- OUR STORY -->
<section class="dss-section">
  <div class="dss-wrap">
    <div class="two-col">
      <div class="two-col-img reveal">
        <div class="img-frame">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/team-photo.png" alt="Davis Southern Septic Team" style="width:100%;height:100%;object-fit:cover;" />
        </div>
      </div>
      <div class="two-col-text reveal delay-1">
        <span class="tag">Our Story</span>
        <h2 class="section-title">Built on Southern Work Ethic &amp; <span>Genuine Care</span></h2>
        <p class="section-sub">Davis Southern Septic was founded with one goal: to be the kind of company we&rsquo;d want showing up at our own home. That means treating every property with respect, giving straight answers instead of upsells, and leaving the job site cleaner than we found it.</p>
        <p style="margin-top:16px; font-size:.97rem; line-height:1.75;">We&rsquo;ve grown our service area across Metro Atlanta but every job still gets the same personal attention we&rsquo;d give a neighbor. Because for us, that&rsquo;s exactly what our customers are.</p>
        <ul class="check-list" style="margin:24px 0;">
          <li>Serving Metro Atlanta and surrounding Cities</li>
          <li>State-certified and fully licensed technicians</li>
          <li>Residential, commercial, and real estate services</li>
          <li>Available 24/7 for emergency calls</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<div style="background:var(--light); padding:48px 0;">
  <div class="dss-wrap">
    <div class="stat-strip reveal">
      <div class="stat-strip-item"><span class="num">9+</span><span class="lbl">Counties Served</span></div>
      <div class="stat-strip-item"><span class="num">24/7</span><span class="lbl">Emergency Service</span></div>
      <div class="stat-strip-item"><span class="num">100%</span><span class="lbl">Licensed &amp; Insured</span></div>
      <div class="stat-strip-item"><span class="num">&#10003;</span><span class="lbl">State Certified</span></div>
    </div>
  </div>
</div>

<!-- VALUES -->
<section class="dss-section">
  <div class="dss-wrap">
    <div class="text-center reveal" style="margin-bottom:40px;">
      <span class="tag">What We Stand For</span>
      <h2 class="section-title">Our Core <span>Values</span></h2>
    </div>
    <div class="about-values reveal">
      <div class="value-card">
        <div class="value-icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <h3>Honesty First</h3>
        <p>We tell you exactly what we find and what you need. If you don&rsquo;t need a repair, we&rsquo;ll say so. Our reputation is built on trust, not transaction size.</p>
      </div>
      <div class="value-card">
        <div class="value-icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg></div>
        <h3>Quality Workmanship</h3>
        <p>We take pride in doing the job right the first time. Proper technique, quality materials, and thorough cleanup are non-negotiables on every job site.</p>
      </div>
      <div class="value-card">
        <div class="value-icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <h3>Reliability You Can Count On</h3>
        <p>We show up when we say we will. We answer calls. We follow through. Being dependable is the most basic thing a service company can do &mdash; and we take it seriously.</p>
      </div>
    </div>
  </div>
</section>

<?php
/*
 * ============================================================
 * TEAM SECTION — COMMENTED OUT (photos not yet available)
 * Uncomment this entire block when team photos are ready.
 * ============================================================
 *
<section class="dss-section dss-section--light">
  <div class="dss-wrap">
    <div class="text-center reveal" style="margin-bottom:40px;">
      <span class="tag">Our Team</span>
      <h2 class="section-title">The People Behind <span>Every Job</span></h2>
    </div>
    <div class="team-grid reveal">
      <div class="team-card">
        <div class="team-photo">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/team-member-1.jpg" alt="Owner - Lead Technician" />
        </div>
        <div class="team-info">
          <h3>Owner / Lead Technician</h3>
          <div class="role">Founder</div>
        </div>
      </div>
      <div class="team-card">
        <div class="team-photo">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/team-member-2.jpg" alt="Field Technician" />
        </div>
        <div class="team-info">
          <h3>Field Technician</h3>
          <div class="role">Installation Specialist</div>
        </div>
      </div>
      <div class="team-card">
        <div class="team-photo">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/team-member-3.jpg" alt="Field Technician" />
        </div>
        <div class="team-info">
          <h3>Field Technician</h3>
          <div class="role">Inspections &amp; Maintenance</div>
        </div>
      </div>
    </div>
  </div>
</section>
 *
 * END TEAM SECTION
 * ============================================================
 */
?>

<!-- CTA -->
<div class="cta-band">
  <div class="dss-wrap cta-band-inner">
    <h2>Ready to Work with a Team You Can Trust?</h2>
    <p>Give us a call or request a service. We&rsquo;re proud to serve the communities of Metro Atlanta every day.</p>
    <div class="cta-band-btns">
      <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request a Service</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
