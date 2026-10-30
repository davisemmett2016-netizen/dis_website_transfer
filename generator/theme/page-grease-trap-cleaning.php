<?php
/**
 * Template Name: Grease Trap Cleaning
 */
get_header(); ?>

<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>Services<span>/</span>Grease Trap Cleaning</div>
      <h1>Commercial Grease Trap Cleaning</h1>
      <p>Keep your restaurant, cafeteria, food service facility, or commercial kitchen in compliance with professional grease trap cleaning, grease trap pumping, and maintenance services across Metro Atlanta and Georgia.</p>
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
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/grease-trap-cleaning.webp" alt="Grease trap before and after professional cleaning" style="width:100%;height:100%;object-fit:cover;" />
        </div>

        <h2>Professional Grease Trap Service for Metro Atlanta Businesses</h2>
        <p>Grease traps are a critical component of any commercial kitchen, intercepting fats, oils, and grease (FOG) before they enter the municipal sewer system. Local health codes and wastewater authorities require regular cleaning &mdash; and violations can result in fines, shutdowns, and costly emergency calls.</p>
        <p>Davis Southern Septic provides reliable, hassle-free grease trap cleaning for restaurants, cafeterias, hotels, food trucks, and any commercial food service operation across Metro Atlanta and surrounding counties.</p>

        <div class="info-box"><p><strong>Health Code Reminder:</strong> Most jurisdictions require grease traps to be cleaned when they reach 25% capacity, typically every 1&ndash;3 months for busy kitchens. We&rsquo;ll help you establish the right cleaning frequency.</p></div>

        <h2>Our Grease Trap Cleaning Process</h2>
        <ul class="check-list" style="margin:12px 0 28px;">
          <li>Arrival during your preferred time window and we work around your schedule</li>
          <li>Safe lid removal and access to the full trap</li>
          <li>Complete pump-out of all accumulated grease and solids</li>
          <li>Manual scraping of trap walls, baffles, and covers</li>
          <li>Inspection of inlet and outlet pipes for blockages or damage</li>
          <li>Responsible waste transport and disposal at an approved facility</li>
          <li>Service report and manifest documentation for your compliance records</li>
        </ul>

        <h2>Why Choose Davis Southern Septic for Grease Trap Service?</h2>
        <p>We understand that restaurant operations can&rsquo;t afford long service windows or unreliable crews. Our team is in and out efficiently, with minimal disruption to your kitchen or dining room. We provide all compliance documentation you need for health inspections, and we&rsquo;ll set up a recurring service schedule so you never fall out of compliance.</p>
        <ul class="check-list" style="margin:12px 0 28px;">
          <li>Early morning, late night, and weekend availability</li>
          <li>Fully licensed and insured for commercial work</li>
          <li>Compliance manifests provided after every service</li>
          <li>Flexible monthly, quarterly, or custom service schedules</li>
          <li>Single location or multi-site accounts welcome</li>
        </ul>

        <div class="cta-band" style="border-radius:18px; margin-top:40px;">
          <div class="cta-band-inner">
            <h2>Schedule Your Grease Trap Cleaning</h2>
            <p>We serve restaurants and commercial kitchens across all Metro Atlanta counties and more. Call now or request a service quote online.</p>
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
