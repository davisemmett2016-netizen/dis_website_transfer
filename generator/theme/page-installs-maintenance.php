<?php
/**
 * Template Name: Installs & Maintenance
 */
get_header(); ?>

<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>Services<span>/</span>Installs &amp; Maintenance</div>
      <h1>Septic Installs &amp; Maintenance</h1>
      <p>State-certified septic system installation, septic maintenance, and septic repair services across Metro Atlanta and Georgia designed to protect your property, prevent costly septic failures, and keep your system operating efficiently for years to come.</p>
      <div class="page-hero-actions">
        <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request a Service</a>
      </div>
    </div>
  </div>
</div>

<section class="dss-section">
  <div class="dss-wrap">
    <div class="service-page-body">
      <div class="service-page-content">

        <!-- Real photo -->
        <div class="img-frame" style="margin-bottom:36px; aspect-ratio:16/9;">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/installs.jpg" alt="Septic system drain field installation in Metro Atlanta" style="width:100%;height:100%;object-fit:cover;" />
        </div>

        <h2>New Septic System Installation in Metro Atlanta</h2>
        <p>Whether you&rsquo;re building a new home, replacing a failing system, or expanding your property, Davis Southern Septic handles the complete installation process from permitting through final inspection. We design each system around your specific property, soil conditions, and household size to ensure long-term performance.</p>
        <p>Our team pulls all required permits with your county health department and coordinates every phase of the project so you never have to worry about compliance or scheduling.</p>

        <div class="info-box"><p><strong>Did you know?</strong> A properly installed septic system can last 25&ndash;40 years with routine maintenance. Poor installation is the #1 cause of premature system failure.</p></div>

        <h2>What&rsquo;s Included in Our Installation Service</h2>
        <ul class="check-list" style="margin:12px 0 28px;">
          <li>On-site property evaluation and soil percolation testing</li>
          <li>Custom septic system design based on household size and lot layout</li>
          <li>Full permit application and approval management</li>
          <li>Excavation, tank placement, and drain field installation</li>
          <li>Final inspection and county sign-off coordination</li>
          <li>Thorough site cleanup and topsoil restoration</li>
          <li>Written warranty on all labor and materials</li>
        </ul>

        <h2>Septic Maintenance Programs</h2>
        <p>Most homeowners don&rsquo;t think about their septic system until something goes wrong. Our routine maintenance plans put your system on a schedule so small issues get caught early and you&rsquo;re never caught off guard by a costly emergency.</p>
        <ul class="check-list" style="margin:12px 0 28px;">
          <li>Recommended pumping every 3&ndash;5 years based on household size</li>
          <li>Full tank inspection with every service visit</li>
          <li>Baffle, inlet, and outlet pipe assessment</li>
          <li>Drain field condition evaluation</li>
          <li>Written service report after every visit</li>
          <li>Reminder notifications when service is due</li>
        </ul>

        <h2>Why Routine Maintenance Matters</h2>
        <p>Neglected septic systems are the leading cause of sewage backups, drain field failure, and groundwater contamination. Regular pumping removes accumulated solids that would otherwise overflow into the drain field, causing irreversible damage that costs thousands to repair or replace.</p>
        <p>Our technicians don&rsquo;t just pump and go, we inspect the entire accessible system and flag anything that needs attention before it becomes a serious problem.</p>

        <div class="cta-band" style="border-radius:18px; margin-top:40px;">
          <div class="cta-band-inner">
            <h2>Schedule Your Installation or Maintenance Visit</h2>
            <p>Call or request a service online. We serve Fayette, Henry, Clayton, Coweta, Fulton, Douglas, Gwinnett, Forsyth, Cherokee Counties and More.</p>
            <div class="cta-band-btns">
              <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
              <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request a Service</a>
            </div>
          </div>
        </div>

      </div>
      <?php get_template_part('template-parts/sidebar-services'); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
