<?php
/**
 * Template Name: Reviews
 */
get_header(); ?>

<div class="page-hero">
  <div class="hero-dots"></div>
  <div class="dss-wrap">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span>Reviews</div>
      <h1>Customer Reviews</h1>
      <p>Don&rsquo;t take our word for it. See what Metro Atlanta homeowners and businesses say about Davis Southern Septic.</p>
      <div class="page-hero-actions">
        <a href="tel:4708394441" class="btn btn-primary">Call 470.839.4441</a>
      </div>
    </div>
  </div>
</div>

<section class="dss-section">
  <div class="dss-wrap">

    <!-- Summary box -->
    <div class="review-summary-box reveal">
      <span class="review-big-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
      <span class="review-big-num">5.0</span>
      <span class="review-big-label">Average Rating on Google</span>
      <a href="https://g.page/r/review" target="_blank" rel="noopener noreferrer" class="btn btn-outline-white" style="margin-top:24px;">Leave Us a Review &#8594;</a>
    </div>

    <!-- Reviews grid -->
    <div class="reviews-grid reveal">
      <?php
      $reviews = [
        ['i'=>'M','n'=>'Michael T.','a'=>'Fayette County','t'=>'Davis Southern came out the same day I called. They pumped my tank, spotted a baffle issue, and fixed it on the spot. Pricing was fair and they left my yard spotless. These are my go-to guys from now on.'],
        ['i'=>'S','n'=>'Sarah K.','a'=>'Henry County','t'=>'Used them for a real estate inspection before closing. Fast, professional, and the written report was exactly what our lender needed. Will absolutely call again. Communication throughout was excellent.'],
        ['i'=>'J','n'=>'James R.','a'=>'Coweta County','t'=>'They installed a brand-new septic system for our new build in Coweta County. Pulled the permits, handled the inspection, and finished ahead of schedule. Very impressed with the whole process.'],
        ['i'=>'L','n'=>'Linda F.','a'=>'Clayton County','t'=>'Our restaurant grease trap was overdue and we were nervous about the mess. Their crew was in and out in under 2 hours, zero disruption to our lunch service. Will be setting up quarterly service.'],
        ['i'=>'D','n'=>'David M.','a'=>'Fulton County','t'=>'Woke up to a backed-up drain on a Sunday morning. Called and had someone on the way within the hour. Genuinely impressed. This is who I\'ll always call for septic work.'],
        ['i'=>'R','n'=>'Rachel B.','a'=>'Douglas County','t'=>'Honest, straightforward, and thorough. They explained every issue they found without trying to upsell unnecessary work. Rare to find that kind of integrity in any service company these days.'],
        ['i'=>'T','n'=>'Tommy H.','a'=>'Cherokee County','t'=>'Had my tank pumped and a full inspection done. They found a cracked baffle and fixed it same day. Great communication, fair price, and the yard looked perfect when they left.'],
        ['i'=>'A','n'=>'Amanda G.','a'=>'Forsyth County','t'=>'Best experience I\'ve had with any service company in years. On time, friendly, did exactly what they said they would, and for the exact price quoted. Will recommend to everyone I know.'],
        ['i'=>'C','n'=>'Carlos M.','a'=>'Gwinnett County','t'=>'Needed an emergency pump out on a Friday evening. They answered, came out, and resolved the issue same night. I truly cannot thank them enough. These guys are the real deal.'],
      ];
      foreach($reviews as $r): ?>
      <div class="review-full-card">
        <div class="r-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="r-text" style="font-size:.93rem;">&ldquo;<?php echo esc_html($r['t']); ?>&rdquo;</p>
        <div class="r-author" style="margin-top:18px;">
          <div class="r-avatar"><?php echo esc_html($r['i']); ?></div>
          <div><div class="r-name"><?php echo esc_html($r['n']); ?></div><div class="r-source">Google Review &mdash; <?php echo esc_html($r['a']); ?></div></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center; margin-top:48px;" class="reveal">
      <p style="margin-bottom:20px; color:var(--text);">Had a great experience with us? We&rsquo;d love to hear from you.</p>
      <a href="https://g.page/r/review" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Leave a Google Review &#8594;</a>
    </div>

  </div>
</section>

<div class="cta-band">
  <div class="dss-wrap cta-band-inner">
    <h2>Ready to Experience the Difference?</h2>
    <p>Join the hundreds of Metro Atlanta customers who trust Davis Southern Septic for all their septic needs.</p>
    <div class="cta-band-btns">
      <a href="tel:4708394441" class="btn btn-primary">Call 470.839.4441</a>
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-white">Get a Free Quote</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
