<?php get_header(); ?>
<main style="padding:80px 0; min-height:60vh;">
  <div class="dss-wrap">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <div style="margin-top:24px; max-width:800px; line-height:1.75; font-size:.97rem;"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>
