<?php
/**
 * Template Name: Real Estate Inspections
 */
get_header(); ?>

<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>Services<span>/</span>Real Estate Inspections</div>
      <h1>Septic Real Estate Inspections</h1>
      <p>State-certified septic inspections for homebuyers, sellers, real estate professionals, and property owners across Metro Atlanta and Georgia. Fast turnaround times, detailed written reports, and same-week availability.</p>
      <div class="page-hero-actions">
        <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request an Inspection</a>
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
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/inspection.png" alt="Septic inspection report being handed over" style="width:100%;height:100%;object-fit:cover;" />
        </div>

        <h2>Protect Your Real Estate Transaction</h2>
        <p>When buying or selling a property with a septic system, a professional inspection isn&rsquo;t just smart most lenders and county authorities require one before closing. Davis Southern Septic provides thorough, certified inspections with written reports delivered quickly to keep your timeline on track.</p>
        <p>Whether you&rsquo;re a buyer wanting confidence in your investment, a seller wanting to disclose proactively, or a real estate agent coordinating multiple closings, we offer reliable, fast service with same-week scheduling across Metro Atlanta.</p>

        <div class="info-box"><p><strong>For Real Estate Agents:</strong> We work quickly and communicate clearly throughout the process. Call us directly to set up repeat agent accounts with priority scheduling: <a href="tel:4708394441" style="color:var(--brand-dark);font-weight:600;">Contact Us</a></p></div>

        <h2>What Our Real Estate Inspection Includes</h2>
        <ul class="check-list" style="margin:12px 0 28px;">
          <li>Locate System: We find and access the tank even without prior records</li>
          <li>Tank condition assessment including structural integrity</li>
          <li>Inlet and outlet baffle inspection</li>
          <li>Sludge and scum level measurement</li>
          <li>Drain field visual evaluation for signs of failure</li>
          <li>Full pump out available to accompany the inspection</li>
          <li>Detailed written report suitable for lender and county requirements</li>
          <li>Photo documentation included</li>
        </ul>

        <h2>Fast Turnaround for Closings</h2>
        <p>We know that real estate deals move fast. We offer same week scheduling and deliver written reports promptly after the inspection so your closing stays on track. We&rsquo;ll also coordinate directly with your real estate agent or attorney if needed.</p>

        <h2>What Happens If Issues Are Found?</h2>
        <p>If our inspection uncovers problems, we&rsquo;ll explain exactly what was found, what it means, and what your options are in plain language, without pressure. Many issues can be repaired for far less than buyers fear, and knowing up front gives both parties room to negotiate fairly.</p>

        <div class="cta-band" style="border-radius:18px; margin-top:40px;">
          <div class="cta-band-inner">
            <h2>Book a Septic Inspection for Your Closing</h2>
            <p>We offer same week availability and serve all of Metro Atlanta. Call now or submit a request online.</p>
            <div class="cta-band-btns">
              <a href="tel:4708394441" class="btn btn-primary">Contact Us</a>
              <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Request an Inspection</a>
            </div>
          </div>
        </div>

      </div>
      <?php get_template_part('template-parts/sidebar-services'); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
