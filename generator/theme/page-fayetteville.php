<?php
/**
 * Template Name: Fayetteville City Page
 *
 * Triple-redundant approach to fix the /city/fayetteville 404:
 *
 * Route A — WordPress page: create a page with slug "fayetteville"
 *           and assign this template. WordPress serves it natively
 *           at /fayetteville/ with no rewrite rules needed.
 *
 * Route B — Rewrite rule in functions.php maps /city/fayetteville/
 *           to this template directly.
 *
 * Route C — parse_request hook in functions.php sets dss_city_slug
 *           to 'fayetteville' which triggers page-city.php normally.
 *
 * This file handles Routes A and B by hardcoding the slug.
 */
require_once get_stylesheet_directory() . '/template-parts/city-data.php';

/* Force the slug — no query var needed */
$city_slug    = 'fayetteville';
$all_counties = dss_get_counties_cities();
$found_city   = 'Fayetteville';
$found_county = 'Fayette County';
$county_key   = 'fayette';
$county_cities = $all_counties['fayette']['cities'];

$nearby = array_filter($county_cities, function($c) { return $c !== 'Fayetteville'; });
$nearby = array_slice(array_values($nearby), 0, 6);
$local  = dss_get_city_content('fayetteville');

get_header(); ?>

<!-- ── CITY HERO ── -->
<div class="city-page-hero">
  <div class="dss-wrap">
    <div class="city-hero-inner">
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>
        <a href="<?php echo esc_url(home_url('/service-areas')); ?>">Service Areas</a><span>/</span>
        <a href="<?php echo esc_url(home_url('/county/fayette')); ?>">Fayette County</a><span>/</span>
        Fayetteville
      </div>
      <h1>Fayetteville, Georgia</h1>
      <p>State-certified septic pumping, installation, grease trap cleaning, and real estate inspections serving Fayetteville and all of Fayette County.</p>
      <div class="city-hero-btns">
        <a href="tel:4708394441" class="btn btn-primary">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.8 19.8 0 01-8.63-3.07A19.5 19.5 0 013.07 13.5a19.8 19.8 0 01-3.07-8.67A2 2 0 012 2.84h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L6.09 10.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 17.92z"/></svg>
          Call Us Now
        </a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request a Service</a>
      </div>
      <div class="city-trust-row">
        <span class="city-trust-item">&#10003; Licensed &amp; Insured</span>
        <span class="city-trust-item">&#10003; State Certified</span>
        <span class="city-trust-item">&#10003; 24/7 Emergency</span>
      </div>
    </div>
  </div>
</div>

<!-- ── MAIN CONTENT ── -->
<section class="dss-section">
  <div class="dss-wrap">
    <div class="city-page-layout">

      <!-- ══ LEFT / MAIN CONTENT ══ -->
      <div class="city-page-main">

        <?php if ($local): ?>
        <div class="city-note-card">
          <div class="city-note-header">
            <div class="city-note-icon">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <span class="city-note-label">A Note From Our Team</span>
          </div>
          <h2 class="city-note-title"><?php echo esc_html($local['headline']); ?></h2>
          <p class="city-note-body"><?php echo esc_html($local['story']); ?></p>
          <?php if (!empty($local['landmark'])): ?>
          <div class="city-note-landmark">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <?php echo esc_html($local['landmark']); ?>
          </div>
          <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="city-generic-intro">
          <h2>Proud to Serve Fayetteville</h2>
          <p>Davis Southern Septic has been serving Fayetteville and Fayette County for over a decade. We are a local, family-owned company that treats every property like our own — showing up on time, being honest about what we find, and leaving your yard clean every time.</p>
        </div>
        <?php endif; ?>

        <div class="city-section-label">
          <span class="tag">Services in Fayetteville</span>
          <h2 class="section-title" style="margin-top:8px;">What We Offer in <span>Fayetteville</span></h2>
        </div>

        <div class="city-svc-grid">

          <a href="<?php echo esc_url(home_url('/pumping-inspections')); ?>" class="city-svc-card">
            <div class="city-svc-card-icon city-svc-card-icon--blue">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            </div>
            <div class="city-svc-card-body">
              <div class="city-svc-card-title">Septic Pumping &amp; Inspections</div>
              <p class="city-svc-card-desc">Routine pump-outs and full system inspections. We pump the tank, check all components, evaluate the drain field, and give you a written report.</p>
              <span class="city-svc-card-link">Learn More &#8594;</span>
            </div>
          </a>

          <a href="<?php echo esc_url(home_url('/installs-maintenance')); ?>" class="city-svc-card">
            <div class="city-svc-card-icon city-svc-card-icon--green">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            </div>
            <div class="city-svc-card-body">
              <div class="city-svc-card-title">Installs &amp; Maintenance</div>
              <p class="city-svc-card-desc">State-certified new septic system installation for new construction and replacements. We handle permitting, design, installation, and county sign-off.</p>
              <span class="city-svc-card-link">Learn More &#8594;</span>
            </div>
          </a>

          <a href="<?php echo esc_url(home_url('/real-estate-inspections')); ?>" class="city-svc-card">
            <div class="city-svc-card-icon city-svc-card-icon--purple">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            </div>
            <div class="city-svc-card-body">
              <div class="city-svc-card-title">Real Estate Inspections</div>
              <p class="city-svc-card-desc">Certified septic inspections for buyers, sellers, and realtors. Written reports, photo documentation, and same-week availability to keep closings on track.</p>
              <span class="city-svc-card-link">Learn More &#8594;</span>
            </div>
          </a>

          <a href="<?php echo esc_url(home_url('/grease-trap-cleaning')); ?>" class="city-svc-card">
            <div class="city-svc-card-icon city-svc-card-icon--orange">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
            </div>
            <div class="city-svc-card-body">
              <div class="city-svc-card-title">Grease Trap Cleaning</div>
              <p class="city-svc-card-desc">Professional grease trap pumping and cleaning for restaurants, churches, schools, and commercial kitchens. Compliance docs included.</p>
              <span class="city-svc-card-link">Learn More &#8594;</span>
            </div>
          </a>

        </div>

        <div class="city-emergency-box">
          <div class="city-emergency-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          </div>
          <div class="city-emergency-text">
            <strong>24/7 Emergency Service in Fayetteville</strong>
            <p>Sewage backup, foul odors, or standing water? Call us anytime — day or night.</p>
          </div>
          <a href="tel:4708394441" class="btn btn-primary btn-sm city-emergency-btn">Call Now</a>
        </div>

        <div class="city-why-section">
          <h3 class="city-why-title">Why Fayetteville Residents Choose Us</h3>
          <ul class="check-list city-check-list">
            <li>Local, family-owned — based right here in Fayette County</li>
            <li>State-certified, licensed, and fully insured technicians</li>
            <li>Honest pricing — no surprise fees, ever</li>
            <li>Same-day and next-day appointments frequently available</li>
            <li>Full-service: pumping, installation, repairs, inspections, grease traps</li>
            <li>24/7 emergency response throughout Fayette County</li>
          </ul>
        </div>

        <?php if (!empty($nearby)): ?>
        <div class="city-nearby-section">
          <h3 class="city-nearby-title">Also Serving Nearby Cities in Fayette County</h3>
          <div class="city-nearby-tags">
            <?php foreach ($nearby as $nc): ?>
            <a href="<?php echo esc_url(home_url('/city/' . dss_city_slug($nc))); ?>" class="city-nearby-tag">
              <?php echo esc_html($nc); ?>
            </a>
            <?php endforeach; ?>
            <a href="<?php echo esc_url(home_url('/county/fayette')); ?>" class="city-nearby-tag city-nearby-tag--more">
              All Fayette Cities &rarr;
            </a>
          </div>
        </div>
        <?php endif; ?>

      </div><!-- /.city-page-main -->

      <!-- ══ RIGHT / SIDEBAR ══ -->
      <aside class="city-page-sidebar">

        <div class="city-sidebar-cta">
          <div class="city-sidebar-cta-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.8 19.8 0 01-8.63-3.07A19.5 19.5 0 013.07 13.5a19.8 19.8 0 01-3.07-8.67A2 2 0 012 2.84h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L6.09 10.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 17.92z"/></svg>
          </div>
          <h4>Ready to Schedule?</h4>
          <p>We serve Fayetteville and all of Fayette County.</p>
          <a href="tel:4708394441" class="btn btn-primary btn-full" style="margin-bottom:10px;">Contact Us</a>
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white btn-full">Request a Service</a>
        </div>

        <div class="sidebar-box">
          <h4>Our Services</h4>
          <a href="<?php echo esc_url(home_url('/pumping-inspections')); ?>" class="sidebar-service-link"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Pumping &amp; Inspections</a>
          <a href="<?php echo esc_url(home_url('/installs-maintenance')); ?>" class="sidebar-service-link"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Installs &amp; Maintenance</a>
          <a href="<?php echo esc_url(home_url('/real-estate-inspections')); ?>" class="sidebar-service-link"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Real Estate Inspections</a>
          <a href="<?php echo esc_url(home_url('/grease-trap-cleaning')); ?>" class="sidebar-service-link"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Grease Trap Cleaning</a>
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="sidebar-service-link" style="color:#e05c5c;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>24/7 Emergency Service</a>
        </div>

        <div class="sidebar-box">
          <h4>Business Hours</h4>
          <div style="font-size:.88rem; line-height:2; color:var(--text);">
            <div><strong style="color:var(--dark);">Mon &ndash; Fri:</strong> 8:00 AM &ndash; 5:00 PM</div>
            <div><strong style="color:var(--dark);">Saturday:</strong> By Appointment</div>
            <div><strong style="color:var(--dark);">Sunday:</strong> By Appointment</div>
            <div style="margin-top:8px; color:var(--brand-dark); font-weight:600; font-size:.82rem;">&#9679; Emergency Service Always Available</div>
          </div>
        </div>

        <div class="sidebar-box">
          <h4>County Service Areas</h4>
          <?php foreach ($all_counties as $okey => $ocounty): ?>
          <a href="<?php echo esc_url(home_url('/county/' . $okey)); ?>"
             class="sidebar-service-link <?php echo $okey === 'fayette' ? 'sidebar-service-link--active' : ''; ?>">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
            <?php echo esc_html($ocounty['name']); ?>
          </a>
          <?php endforeach; ?>
        </div>

      </aside>

    </div><!-- /.city-page-layout -->
  </div>
</section>

<!-- ── BOTTOM CTA ── -->
<div class="cta-band">
  <div class="dss-wrap cta-band-inner">
    <h2>Need Septic Service in Fayetteville?</h2>
    <p>Call or request a service — we respond fast and serve all of Fayette County.</p>
    <div class="cta-band-btns">
      <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request a Service</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
