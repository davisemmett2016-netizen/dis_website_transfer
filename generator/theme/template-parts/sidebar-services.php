<aside class="service-sidebar">

  <!-- CTA box -->
  <div class="sidebar-cta">
    <h4>Ready to Get Started?</h4>
    <p>Call now or request a service online. We serve Metro Atlanta and surrounding counties.</p>
    <a href="tel:4708394441" class="btn btn-primary btn-full" style="margin-bottom:12px;">&#128222; Contact Us</a>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white btn-full">Request a Service</a>
  </div>

  <!-- All Services -->
  <div class="sidebar-box">
    <h4>All Services</h4>
    <a href="<?php echo esc_url(home_url('/installs-maintenance')); ?>" class="sidebar-service-link">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      Installs &amp; Maintenance
    </a>
    <a href="<?php echo esc_url(home_url('/grease-trap-cleaning')); ?>" class="sidebar-service-link">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      Grease Trap Cleaning
    </a>
    <a href="<?php echo esc_url(home_url('/real-estate-inspections')); ?>" class="sidebar-service-link">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      Real Estate Inspections
    </a>
    <a href="<?php echo esc_url(home_url('/pumping-inspections')); ?>" class="sidebar-service-link">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      Pumping &amp; Inspections
    </a>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="sidebar-service-link" style="color:#e05c5c;">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      24/7 Emergency Service
    </a>
  </div>

  <!-- Business Hours -->
  <div class="sidebar-box">
    <h4>Business Hours</h4>
    <p style="font-size:.88rem; color:var(--text); line-height:1.9;">
      <strong style="color:var(--dark);">Mon &ndash; Fri:</strong> 8:00 AM &ndash; 5:00 PM<br/>
      <strong style="color:var(--dark);">Saturday:</strong> By Appointment<br/>
      <strong style="color:var(--dark);">Sunday:</strong> By Appointment<br/>
      <span style="font-size:.8rem; color:var(--brand-dark); font-weight:600;">&#9679; Emergency Service Always Available</span>
    </p>
  </div>

  <!-- Service Areas — display only, not links, with More badge -->
  <div class="sidebar-box">
    <h4>Service Areas</h4>
    <div class="county-tags" style="gap:7px; margin:0;">
      <?php foreach(['Fayette','Henry','Clayton','Coweta','Fulton','Douglas','Gwinnett','Forsyth','Cherokee'] as $c): ?>
      <span class="county-tag" style="font-size:.78rem; padding:5px 12px; cursor:default;"><?php echo esc_html($c); ?></span>
      <?php endforeach; ?>
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="county-tag county-tag--more" style="font-size:.78rem; padding:5px 12px;">More &#8594;</a>
    </div>
  </div>

</aside>
