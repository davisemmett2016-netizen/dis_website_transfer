<?php
/**
 * Template Name: Pumping & Inspections
 */
get_header(); ?>

<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>Services<span>/</span>Pumping &amp; Inspections</div>
      <h1>Septic Pumping &amp; Inspections</h1>
      <p>Routine pumping and full system inspections that prevent backups, extend system life, and save you from expensive repairs down the road.</p>
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
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/pumping.jpg" alt="Septic tank pumping service in Metro Atlanta" style="width:100%;height:100%;object-fit:cover;" />
        </div>

        <h2>Regular Pumping Is the Best Investment You Can Make</h2>
        <p>Your septic tank collects solid waste over time. Without regular pumping, that waste builds up, overflows into the drain field, and causes irreversible damage that can cost $10,000 or more to repair. A routine pump out every 3&ndash;5 years typically costs a fraction of that and catches issues early when they&rsquo;re still inexpensive to fix.</p>
        <p>Davis Southern Septic makes the process easy: we locate the tank, access the lids, perform a thorough pump-out, inspect the system, and leave your yard clean and tidy.</p>

        <div class="info-box"><p><strong>How often should you pump?</strong> The average household of 4 should pump every 3&ndash;5 years. Smaller tanks, garbage disposals, or larger households may need service more frequently. We&rsquo;ll advise you after your first visit.</p></div>

        <h2>What&rsquo;s Included in Our Pumping Service</h2>
        <ul class="check-list" style="margin:12px 0 28px;">
          <li>Tank locate and lid access including buried lids</li>
          <li>Complete vacuum pump-out of liquid and solid waste</li>
          <li>Tank interior rinse and backflush</li>
          <li>Baffle inspection (inlet and outlet)</li>
          <li>Structural integrity check of tank walls and lid</li>
          <li>Drain field visual assessment</li>
          <li>Safe waste transport to a licensed treatment facility</li>
          <li>Written service summary with condition notes</li>
        </ul>

        <h2>What Our Full Inspection Checks</h2>
        <p>When you add a full inspection to your pumping service, our technicians go further &mdash; evaluating every accessible component of your system and giving you a clear picture of its current health.</p>
        <ul class="check-list" style="margin:12px 0 28px;">
          <li>Inlet and outlet pipe condition</li>
          <li>Distribution box inspection (if applicable)</li>
          <li>Drain field absorption area evaluation</li>
          <li>Signs of hydraulic overload or biomat formation</li>
          <li>Riser and access lid condition assessment</li>
          <li>Recommendations for any follow-up work needed</li>
        </ul>

        <h2>Riser Installation: Never Dig Again</h2>
        <p>If your tank lids are buried several feet underground, each service visit requires digging them up at additional cost and effort. We offer tank riser installation that brings the lids to ground level, making future pump-outs faster, cheaper, and less disruptive to your yard.</p>

        <div class="cta-band" style="border-radius:18px; margin-top:40px;">
          <div class="cta-band-inner">
            <h2>Schedule a Pump-Out Today</h2>
            <p>We serve Metro Atlanta and surrounding counties. Typical service completed within 1&ndash;2 hours. Call or request a service now.</p>
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
