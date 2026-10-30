<?php
/**
 * Template Name: Service Areas
 * Also loaded directly via rewrite rule for /service-areas/
 * Works whether or not a WordPress page exists with this template.
 */
require_once get_stylesheet_directory() . '/template-parts/city-data.php';
get_header();
$counties = dss_get_counties_cities();
?>

<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>
        Cities &amp; Counties We Serve
      </div>
      <h1>Cities &amp; Counties We Serve</h1>
      <p>Davis Southern Septic serves homeowners, businesses, and real estate professionals across <?php echo count($counties); ?> Georgia counties. Select your county or city below for service details specific to your area.</p>
      <div class="page-hero-actions">
        <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request a Service</a>
      </div>
    </div>
  </div>
</div>

<!-- QUICK COUNTY JUMP NAV -->
<div style="background:var(--brand); padding:14px 0; position:sticky; top:0; z-index:100; box-shadow:0 2px 12px rgba(15,27,45,.15);">
  <div class="dss-wrap">
    <div style="display:flex; align-items:center; gap:8px; flex-wrap:wrap; justify-content:center;">
      <span style="color:rgba(255,255,255,.7); font-size:.78rem; font-weight:600; text-transform:uppercase; letter-spacing:.08em; margin-right:4px;">Jump to:</span>
      <?php foreach ($counties as $key => $county): ?>
      <a href="#county-<?php echo esc_attr($key); ?>"
         style="background:rgba(255,255,255,.15); color:white; border-radius:50px; padding:5px 14px; font-size:.8rem; font-weight:600; transition:background .2s;"
         onmouseover="this.style.background='rgba(255,255,255,.3)'" onmouseout="this.style.background='rgba(255,255,255,.15)'">
        <?php echo esc_html(str_replace(' County','',$county['name'])); ?>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- MAP + INTRO -->
<section class="dss-section">
  <div class="dss-wrap">
    <div class="areas-grid">
      <div class="reveal">
        <span class="tag">Our Coverage</span>
        <h2 class="section-title">Every City, <span>Same Great Service</span></h2>
        <p style="margin:14px 0 20px;">No matter which city you are in across our 9-county coverage area, you get the same prompt, professional, state-certified septic service. No travel surcharges within our standard coverage area.</p>
        <ul class="check-list" style="margin-bottom:28px;">
          <li>Same-day and next-day appointments often available</li>
          <li>24/7 emergency response everywhere we serve</li>
          <li>No extra fees within coverage counties</li>
          <li>Local team — we know these roads and communities</li>
        </ul>
        <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
      </div>
      <div class="map-box reveal delay-1">
        <iframe title="Davis Southern Septic Service Area"
          src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d207563.12!2d-84.4!3d33.55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1700000000000"
          allowfullscreen loading="lazy"></iframe>
        <div class="map-badge">&#128205; 9 Counties | 130+ Cities</div>
      </div>
    </div>
  </div>
</section>

<!-- ALL COUNTIES & CITIES -->
<section class="dss-section dss-section--light">
  <div class="dss-wrap">
    <div class="text-center reveal" style="margin-bottom:48px;">
      <span class="tag">Complete Directory</span>
      <h2 class="section-title">Find Your <span>City or County</span></h2>
      <p class="section-sub">Click a county name to see our full service page for that county, or click any city to go directly to that city's septic service page.</p>
    </div>

    <?php foreach ($counties as $key => $county): ?>
    <div class="cities-section reveal" id="county-<?php echo esc_attr($key); ?>" style="margin-bottom:40px;">

      <!-- County heading — links to county page -->
      <div style="display:flex; align-items:center; gap:14px; margin-bottom:18px; padding-bottom:14px; border-bottom:2px solid var(--brand-light); flex-wrap:wrap;">
        <a href="<?php echo esc_url(home_url('/county/' . $key)); ?>"
           style="display:flex; align-items:center; gap:8px; text-decoration:none; flex:1; min-width:200px;">
          <div style="width:36px; height:36px; background:var(--brand); border-radius:10px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <div style="font-family:var(--serif); font-size:1.25rem; color:var(--dark); font-weight:700; line-height:1.1;"><?php echo esc_html($county['name']); ?></div>
            <div style="font-size:.75rem; color:var(--brand-dark); font-weight:600;"><?php echo count($county['cities']); ?> cities served &rarr;</div>
          </div>
        </a>
        <a href="<?php echo esc_url(home_url('/county/' . $key)); ?>" class="btn btn-outline-brand btn-sm" style="flex-shrink:0;">
          View County Page
        </a>
      </div>

      <!-- City tags — each links to city page -->
      <div class="cities-tag-cloud">
        <?php foreach ($county['cities'] as $city):
          $slug = dss_city_slug($city); ?>
        <a href="<?php echo esc_url(home_url('/city/' . $slug)); ?>">
          <?php echo esc_html($city); ?>
        </a>
        <?php endforeach; ?>
      </div>

    </div>
    <?php endforeach; ?>

    <!-- Not in list CTA -->
    <div style="margin-top:8px; padding:22px 28px; background:var(--brand-light); border-radius:14px; display:flex; align-items:center; gap:20px; flex-wrap:wrap;">
      <div style="flex:1; min-width:200px;">
        <strong style="color:var(--brand-dark); font-size:1rem;">Don&rsquo;t see your city?</strong>
        <span style="color:var(--text); font-size:.93rem;"> We may still serve your area. Call or text us and we&rsquo;ll let you know right away.</span>
      </div>
      <a href="tel:4708394441" class="btn btn-primary btn-sm">Contact Us</a>
    </div>

  </div>
</section>

<!-- SERVICES GRID -->
<section class="dss-section">
  <div class="dss-wrap">
    <div class="text-center reveal" style="margin-bottom:40px;">
      <span class="tag">Available Everywhere We Serve</span>
      <h2 class="section-title">All Services in <span>Every City</span></h2>
    </div>
    <div class="svc-grid reveal">
      <div class="svc-card">
        <div class="svc-card-top"><div class="svc-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div><div class="svc-card-name">Installs &amp; Maintenance</div></div>
        <div class="svc-card-body"><p class="svc-card-desc">New system installation and ongoing maintenance across all 9 counties.</p><a href="<?php echo esc_url(home_url('/installs-maintenance')); ?>" class="svc-link">Learn More &#8594;</a></div>
      </div>
      <div class="svc-card">
        <div class="svc-card-top"><div class="svc-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div><div class="svc-card-name">Grease Trap Cleaning</div></div>
        <div class="svc-card-body"><p class="svc-card-desc">Commercial grease trap service for all businesses in our service area.</p><a href="<?php echo esc_url(home_url('/grease-trap-cleaning')); ?>" class="svc-link">Learn More &#8594;</a></div>
      </div>
      <div class="svc-card">
        <div class="svc-card-top"><div class="svc-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div><div class="svc-card-name">Real Estate Inspections</div></div>
        <div class="svc-card-body"><p class="svc-card-desc">Fast pre-sale and pre-purchase inspections with same-week availability.</p><a href="<?php echo esc_url(home_url('/real-estate-inspections')); ?>" class="svc-link">Learn More &#8594;</a></div>
      </div>
    </div>
  </div>
</section>

<div class="cta-band">
  <div class="dss-wrap cta-band-inner">
    <h2>Not Sure If We Cover Your City?</h2>
    <p>Give us a call — if you are in the greater Atlanta area, there is a good chance we can help.</p>
    <div class="cta-band-btns">
      <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Ask About Your Area</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
