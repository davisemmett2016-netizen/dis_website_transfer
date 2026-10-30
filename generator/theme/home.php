<?php
/**
 * home.php — WordPress loads this when "Posts page" is set in Reading settings.
 * Force-load our front-page template instead.
 */
$fp = get_stylesheet_directory() . '/front-page.php';
if ( file_exists( $fp ) ) {
    require $fp;
    exit;
}
get_header(); ?>
<main style="padding:80px 0; min-height:60vh;">
  <div class="dss-wrap">
    <p>No content found. <a href="<?php echo esc_url(home_url('/')); ?>">Return home</a>.</p>
  </div>
</main>
<?php get_footer(); ?>
