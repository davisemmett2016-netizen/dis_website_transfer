<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php require_once get_stylesheet_directory() . '/template-parts/city-data.php'; ?>

<!-- TOP BAR -->
<div id="dss-topbar">
  <div class="dss-wrap">
    <div class="inner">
      <div class="tb-left">
        <div class="tb-item">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          24/7 Emergency Service Available
        </div>
        <div class="tb-item">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          Metro Atlanta, GA &amp; Surrounding Cities
        </div>
      </div>
      <div class="tb-right">
        <a href="tel:4708394441">&#9742; 470.839.4441 &mdash; Call or Text Anytime</a>
      </div>
    </div>
  </div>
</div>

<!-- NAVIGATION -->
<div id="dss-nav-wrap">
  <div class="dss-wrap">
    <nav class="dss-nav" role="navigation" aria-label="Main Navigation">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="dss-logo" aria-label="Davis Southern Septic">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logo.png" alt="Davis Southern Septic" class="dss-logo-img" />
      </a>

      <ul class="dss-nav-links">
        <li class="<?php echo is_front_page() ? 'active' : ''; ?>"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>

        <!-- Services -->
        <li class="has-drop">
          <a href="#" class="drop-trigger" aria-haspopup="true" aria-expanded="false">Services <span class="caret">&#9662;</span></a>
          <ul class="drop-menu" role="menu">
            <li><a href="<?php echo esc_url(home_url('/installs-maintenance')); ?>"><span class="drop-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></span>Installs &amp; Maintenance</a></li>
            <li><a href="<?php echo esc_url(home_url('/grease-trap-cleaning')); ?>"><span class="drop-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></span>Grease Trap Cleaning</a></li>
            <li><a href="<?php echo esc_url(home_url('/real-estate-inspections')); ?>"><span class="drop-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></span>Real Estate Inspections</a></li>
            <li><a href="<?php echo esc_url(home_url('/pumping-inspections')); ?>"><span class="drop-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6CAFF4" stroke-width="2"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></span>Pumping &amp; Inspections</a></li>
          </ul>
        </li>

        <!-- Cities We Serve — with scrollable slider panel -->
        <li class="has-drop has-mega" id="cities-nav-item">
          <a href="<?php echo esc_url(home_url('/service-areas')); ?>" class="drop-trigger" id="cities-trigger" aria-haspopup="true" aria-expanded="false">
            Cities We Serve <span class="caret">&#9662;</span>
          </a>

          <!-- Mega panel with scroll controls -->
          <div class="drop-menu mega-menu" role="menu" id="cities-mega-panel">

            <!-- Scroll arrow LEFT -->
            <button class="mega-scroll-btn mega-scroll-left" id="mega-scroll-left" aria-label="Scroll counties left">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
            </button>

            <!-- Scrollable county columns -->
            <div class="mega-scroll-track" id="mega-track">
              <div class="mega-inner" id="mega-inner">
                <?php foreach (dss_get_counties_cities() as $key => $county): ?>
                <div class="mega-col">
                  <div class="mega-county-title"><?php echo esc_html($county['name']); ?></div>
                  <?php foreach ($county['cities'] as $city): $slug = dss_city_slug($city); ?>
                  <a href="<?php echo esc_url(home_url('/city/' . $slug)); ?>" class="mega-city-link">
                    <?php echo esc_html($city); ?>
                  </a>
                  <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Scroll arrow RIGHT -->
            <button class="mega-scroll-btn mega-scroll-right" id="mega-scroll-right" aria-label="Scroll counties right">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
            </button>

            <!-- Scrollbar track (visible) -->
            <div class="mega-scrollbar-wrap">
              <div class="mega-scrollbar-label">&#8592; Scroll to see all <?php echo count(dss_get_counties_cities()); ?> counties &#8594;</div>
              <div class="mega-scrollbar-track" id="mega-scrollbar-track">
                <div class="mega-scrollbar-thumb" id="mega-scrollbar-thumb"></div>
              </div>
            </div>

            <div class="mega-footer">
              <a href="<?php echo esc_url(home_url('/service-areas')); ?>">View Full Service Area Directory &rarr;</a>
            </div>
          </div>
        </li>

        <li class="<?php echo is_page('about') ? 'active' : ''; ?>"><a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a></li>
        <li class="<?php echo is_page('contact') ? 'active' : ''; ?>"><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
      </ul>

      <div class="dss-nav-cta">
        <a href="tel:4708394441" class="btn btn-primary btn-sm">Contact Us</a>
      </div>

      <button class="burger" aria-label="Toggle mobile menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </nav>
  </div>

  <!-- Mobile Menu -->
  <div class="dss-mob-nav" aria-hidden="true">
    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
    <span class="mob-section">Services</span>
    <a href="<?php echo esc_url(home_url('/installs-maintenance')); ?>">Installs &amp; Maintenance</a>
    <a href="<?php echo esc_url(home_url('/grease-trap-cleaning')); ?>">Grease Trap Cleaning</a>
    <a href="<?php echo esc_url(home_url('/real-estate-inspections')); ?>">Real Estate Inspections</a>
    <a href="<?php echo esc_url(home_url('/pumping-inspections')); ?>">Pumping &amp; Inspections</a>
    <span class="mob-section">Cities We Serve</span>
    <a href="<?php echo esc_url(home_url('/service-areas')); ?>" class="mob-all-cities-link">&#128205; View Full City &amp; County Directory</a>
    <?php foreach (dss_get_counties_cities() as $ckey => $county): ?>
    <div class="mob-county-group">
      <button class="mob-county-toggle" aria-expanded="false" data-target="mob-county-<?php echo esc_attr($ckey); ?>">
        <span><?php echo esc_html($county['name']); ?></span>
        <svg class="mob-county-caret" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
      </button>
      <div class="mob-county-cities" id="mob-county-<?php echo esc_attr($ckey); ?>" style="display:none;">
        <a href="<?php echo esc_url(home_url('/county/' . $ckey)); ?>" class="mob-county-page-link">
          &#8594; All <?php echo esc_html($county['name']); ?> Cities
        </a>
        <?php foreach ($county['cities'] as $city):
          $slug = dss_city_slug($city); ?>
        <a href="<?php echo esc_url(home_url('/city/' . $slug)); ?>" class="mob-city-item">
          <?php echo esc_html($city); ?>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endforeach; ?>
    <span class="mob-section">Company</span>
    <a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a>
    <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a>
    <a href="tel:4708394441" class="mob-cta">&#9742; Call 470.839.4441</a>
  </div>
</div>
<!-- END HEADER -->
