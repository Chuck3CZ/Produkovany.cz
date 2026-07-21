<?php get_header(); ?>

<main id="main" class="site-main">
<div class="container">

  <header class="archive-header">
    <?php the_archive_title('<h1 class="archive-title">', '</h1>'); ?>
    <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
  </header>

  <div class="news-grid">
    <?php while ( have_posts() ) : the_post();
      $cats = get_the_category();
      $cat_name = $cats ? $cats[0]->name : 'Aktuality';
    ?>
    <article <?php post_class('news-card'); ?>>
      <div class="news-thumb">
        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('produkovany-thumb'); ?></a>
        <?php else : ?>
          <span>📰</span>
        <?php endif; ?>
      </div>
      <div class="news-body">
        <div class="news-tag"><?php echo esc_html($cat_name); ?></div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php the_excerpt(); ?></p>
        <div class="news-date"><?php echo get_the_date('j. F Y'); ?></div>
      </div>
    </article>
    <?php endwhile; ?>
  </div>

  <?php the_posts_navigation(); ?>

</div>
</main>

<?php get_footer(); ?>
