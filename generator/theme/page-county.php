<?php
/**
 * Template Name: County Service Page
 * Handles /county/{county-slug} URLs
 * Lists all cities served in that county with links to individual city pages
 */
require_once get_stylesheet_directory() . '/template-parts/city-data.php';

/* ---- Resolve county from URL query var ---- */
$county_slug = get_query_var('dss_county_slug', '');
if (!$county_slug) $county_slug = basename(get_permalink());

$all_counties = dss_get_counties_cities();

/* Find the matching county */
$county_data = isset($all_counties[$county_slug]) ? $all_counties[$county_slug] : null;

if (!$county_slug || !$county_data) {
    get_header();
    echo '<div class="dss-wrap" style="padding:80px 0 60px;">';
    echo '<h1>County Not Found</h1>';
    echo '<p>We could not find information for this county. <a href="' . esc_url(home_url('/service-areas')) . '">View all service areas</a>.</p>';
    echo '</div>';
    get_footer();
    exit;
}

$county_name  = $county_data['name'];
$county_cities = $county_data['cities'];

/* Build nearby counties list (all except current) */
$other_counties = array_filter($all_counties, function($k) use ($county_slug) {
    return $k !== $county_slug;
}, ARRAY_FILTER_USE_KEY);

get_header(); ?>

<!-- COUNTY HERO -->
<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
        <span>/</span>
        <a href="<?php echo esc_url(home_url('/service-areas')); ?>">Service Areas</a>
        <span>/</span>
        <?php echo esc_html($county_name); ?>
      </div>
      <h1>Septic Services in <?php echo esc_html($county_name); ?>, Georgia</h1>
      <p>Davis Southern Septic provides professional, state-certified septic pumping, installation, grease trap cleaning, inspections, and repairs throughout <?php echo esc_html($county_name); ?>. Select your city below for service details specific to your area.</p>
      <div class="page-hero-actions">
        <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request a Service</a>
      </div>
    </div>
  </div>
</div>

<!-- CITIES IN THIS COUNTY -->
<section class="dss-section">
  <div class="dss-wrap">

    <div style="display: grid; grid-template-columns: 1fr 320px; gap: 56px; align-items: start;">

      <!-- Main content -->
      <div>
        <span class="tag">Cities We Serve</span>
        <h2 class="section-title" style="margin-bottom: 8px;">
          Every City in <span><?php echo esc_html($county_name); ?></span>
        </h2>
        <p style="color: var(--text); margin-bottom: 36px; font-size: .97rem; line-height: 1.7;">
          Click your city below to see our full range of septic services available in your specific area — including pumping schedules, installation options, grease trap service, and real estate inspections.
        </p>

        <!-- City cards grid -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 48px;">
          <?php foreach ($county_cities as $city):
            $city_slug = dss_city_slug($city); ?>
          <a href="<?php echo esc_url(home_url('/city/' . $city_slug)); ?>"
             class="county-city-card reveal"
             style="text-decoration: none;">
            <div class="county-city-card-inner">
              <div class="county-city-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                  <circle cx="12" cy="10" r="3"/>
                </svg>
              </div>
              <div class="county-city-name"><?php echo esc_html($city); ?></div>
              <div class="county-city-arrow">&#8594;</div>
            </div>
          </a>
          <?php endforeach; ?>
        </div>

        <!-- Services available info -->
        <div style="background: var(--light); border-radius: 18px; padding: 36px; margin-bottom: 32px;">
          <h3 style="font-family: var(--serif); font-size: 1.25rem; color: var(--dark); margin-bottom: 20px;">
            Services Available Throughout <?php echo esc_html($county_name); ?>
          </h3>
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">

            <a href="<?php echo esc_url(home_url('/pumping-inspections')); ?>" class="county-svc-row">
              <div class="county-svc-icon" style="background: var(--brand-light);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
              </div>
              <div>
                <div class="county-svc-name">Pumping &amp; Inspections</div>
                <div class="county-svc-desc">Routine pump-outs &amp; full system inspections</div>
              </div>
            </a>

            <a href="<?php echo esc_url(home_url('/installs-maintenance')); ?>" class="county-svc-row">
              <div class="county-svc-icon" style="background: var(--brand-light);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
              </div>
              <div>
                <div class="county-svc-name">Installs &amp; Maintenance</div>
                <div class="county-svc-desc">New systems, replacements &amp; maintenance</div>
              </div>
            </a>

            <a href="<?php echo esc_url(home_url('/real-estate-inspections')); ?>" class="county-svc-row">
              <div class="county-svc-icon" style="background: var(--brand-light);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              </div>
              <div>
                <div class="county-svc-name">Real Estate Inspections</div>
                <div class="county-svc-desc">Certified reports for buyers &amp; sellers</div>
              </div>
            </a>

            <a href="<?php echo esc_url(home_url('/grease-trap-cleaning')); ?>" class="county-svc-row">
              <div class="county-svc-icon" style="background: var(--brand-light);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
              </div>
              <div>
                <div class="county-svc-name">Grease Trap Cleaning</div>
                <div class="county-svc-desc">Commercial kitchens &amp; restaurants</div>
              </div>
            </a>

          </div>
        </div>

        <!-- Emergency callout -->
        <div class="info-box">
          <p><strong>24/7 Emergency Service in <?php echo esc_html($county_name); ?>:</strong> Sewage backup, foul odors, or standing water? Call us anytime at <a href="tel:4708394441" style="color: var(--brand-dark); font-weight: 700;">470.839.4441</a> — we dispatch around the clock.</p>
        </div>

      </div>

      <!-- Sidebar -->
      <div style="position: sticky; top: 88px; display: flex; flex-direction: column; gap: 20px;">

        <!-- Other counties -->
        <div class="sidebar-box">
          <h4>Other Counties We Serve</h4>
          <?php foreach ($other_counties as $okey => $ocounty): ?>
          <a href="<?php echo esc_url(home_url('/county/' . $okey)); ?>" class="sidebar-service-link">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
            <?php echo esc_html($ocounty['name']); ?>
          </a>
          <?php endforeach; ?>
          <a href="<?php echo esc_url(home_url('/service-areas')); ?>" class="sidebar-service-link" style="color: var(--brand-dark); font-weight: 600; margin-top: 6px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
            View Full Service Directory
          </a>
        </div>

        <!-- Services sidebar -->
        <?php get_template_part('template-parts/sidebar-services'); ?>

      </div>
    </div>

  </div>
</section>

<!-- CTA BAND -->
<div class="cta-band">
  <div class="dss-wrap cta-band-inner">
    <h2>Ready for Septic Service in <?php echo esc_html($county_name); ?>?</h2>
    <p>Our certified team serves every city in <?php echo esc_html($county_name); ?>. Call or request a service online today.</p>
    <div class="cta-band-btns">
      <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request a Service</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
