<footer id="dss-footer">
  <div class="dss-wrap">
    <div class="footer-grid">

      <!-- Brand -->
      <div>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="dss-logo" style="margin-bottom:0;">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logo.png" alt="Davis Southern Septic" class="dss-logo-img" style="filter:brightness(0) invert(1); max-height:52px;" />
        </a>
        <p class="footer-desc">Trusted septic installation, maintenance, grease trap cleaning, and real estate inspections across Metro Atlanta and surrounding Georgia cities.</p>
        <div class="footer-phone">
          <a href="tel:4708394441">&#128222; 470.839.4441</a>
          <a href="mailto:contact@davissouthernseptic.com" style="color:rgba(255,255,255,.5);font-size:.82rem;">contact@davissouthernseptic.com</a>
        </div>
      </div>

      <!-- Services -->
      <div>
        <div class="footer-col-title">Our Services</div>
        <div class="footer-links">
          <a href="<?php echo esc_url(home_url('/installs-maintenance')); ?>">Installs &amp; Maintenance</a>
          <a href="<?php echo esc_url(home_url('/grease-trap-cleaning')); ?>">Grease Trap Cleaning</a>
          <a href="<?php echo esc_url(home_url('/real-estate-inspections')); ?>">Real Estate Inspections</a>
          <a href="<?php echo esc_url(home_url('/pumping-inspections')); ?>">Pumping &amp; Inspections</a>
          <a href="<?php echo esc_url(home_url('/contact')); ?>">Emergency Service</a>
        </div>
      </div>

      <!-- Service Areas — linked counties leading to city pages -->
      <div>
        <div class="footer-col-title">Service Areas</div>
        <?php
        require_once get_stylesheet_directory() . '/template-parts/city-data.php';
        $footer_counties = [
            'fayette'  => 'Fayette County',
            'henry'    => 'Henry County',
            'clayton'  => 'Clayton County',
            'coweta'   => 'Coweta County',
            'fulton'   => 'Fulton County',
            'douglas'  => 'Douglas County',
            'gwinnett' => 'Gwinnett County',
            'forsyth'  => 'Forsyth County',
            'cherokee' => 'Cherokee County',
        ];
        foreach ($footer_counties as $slug => $name):
        ?>
        <div style="margin-bottom:10px;">
          <a href="<?php echo esc_url(home_url('/county/' . $slug)); ?>"
             style="color:white; font-size:.88rem; font-weight:600; display:flex; align-items:center; gap:6px; margin-bottom:4px; transition:color .2s;"
             onmouseover="this.style.color='var(--brand)'" onmouseout="this.style.color='white'">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <?php echo esc_html($name); ?>
          </a>
          <?php
          $all = dss_get_counties_cities();
          $cities = isset($all[$slug]) ? array_slice($all[$slug]['cities'], 0, 4) : [];
          foreach ($cities as $city):
            $cslug = dss_city_slug($city);
          ?>
          <a href="<?php echo esc_url(home_url('/city/' . $cslug)); ?>"
             style="color:rgba(255,255,255,.45); font-size:.78rem; display:inline-block; margin-right:8px; transition:color .2s;"
             onmouseover="this.style.color='var(--brand)'" onmouseout="this.style.color='rgba(255,255,255,.45)'">
            <?php echo esc_html($city); ?>
          </a>
          <?php endforeach; ?>
          <a href="<?php echo esc_url(home_url('/county/' . $slug)); ?>"
             style="color:var(--brand); font-size:.75rem; font-weight:600; display:inline-block; margin-top:2px;">
            +more &rarr;
          </a>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Hours + Quick Links -->
      <div>
        <div class="footer-col-title">Business Hours</div>
        <div style="font-size:.86rem; line-height:1.9; color:rgba(255,255,255,.6); margin-bottom:24px;">
          <div><strong style="color:white;">Mon &ndash; Fri:</strong> 8:00 AM &ndash; 5:00 PM</div>
          <div><strong style="color:white;">Saturday:</strong> By Appointment</div>
          <div><strong style="color:white;">Sunday:</strong> By Appointment</div>
          <div style="margin-top:8px; color:var(--brand); font-weight:600; font-size:.82rem;">&#9679; Emergency Service Always Available</div>
        </div>
        <div class="footer-col-title">Quick Links</div>
        <div class="footer-links">
          <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
          <a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a>
          <a href="<?php echo esc_url(home_url('/reviews')); ?>">Reviews</a>
          <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a>
          <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a>
          <a href="<?php echo esc_url(home_url('/terms')); ?>">Terms &amp; Conditions</a>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> Davis Southern Septic. All Rights Reserved. &nbsp;|&nbsp; <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" style="color:inherit;text-decoration:underline;">Privacy Policy</a> &nbsp;|&nbsp; <a href="<?php echo esc_url(home_url('/terms')); ?>" style="color:inherit;text-decoration:underline;">Terms</a></span>
      <span>Proudly Serving Metro Atlanta &mdash; Fayette, Henry, Clayton, Coweta, Fulton, Douglas, Gwinnett, Forsyth &amp; Cherokee Counties, GA and More</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
