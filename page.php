<?php get_header(); ?>

<main id="main" class="site-main page-static">
<div class="container">

  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('static-page'); ?>>
    <header class="entry-header">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail('produkovany-hero'); ?>
    </div>
    <?php endif; ?>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </article>

  <?php endwhile; ?>

</div>
</main>

<?php get_footer(); ?>
