<?php
/**
 * index.php — Fallback template
 * WordPress uses front-page.php for the homepage automatically.
 * This only loads if front-page.php is somehow skipped.
 * As a safety net, force-load front-page.php if we're on the front page.
 */
if ( is_front_page() || is_home() ) {
    $fp = get_stylesheet_directory() . '/front-page.php';
    if ( file_exists( $fp ) ) {
        require $fp;
        exit;
    }
}
get_header(); ?>
<main style="padding:80px 0; min-height:60vh;">
  <div class="dss-wrap">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <div style="margin-top:24px;"><?php the_content(); ?></div>
    <?php endwhile; else: ?>
      <p>No content found. <a href="<?php echo esc_url(home_url('/')); ?>">Return home</a>.</p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
