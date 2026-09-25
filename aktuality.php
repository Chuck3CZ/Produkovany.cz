<?php
/**
 * Přehled všech aktualit – adresa /aktuality/
 * (napojeno přes produkovany_aktuality_template() ve functions.php)
 */
get_header(); ?>

<main id="main" class="site-main page-aktuality">
<div class="container">

  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-link">&larr; <?php _e( 'Zpět na hlavní stránku', 'produkovany' ); ?></a>

  <?php produkovany_section_header( 'Co se děje', 'Aktuality z kampaně' ); ?>

  <?php
  $news = new WP_Query([
    'post_type'           => 'post',
    'posts_per_page'      => -1,
    'ignore_sticky_posts' => true,
  ]);
  if ( $news->have_posts() ) : ?>
  <div class="news-grid">
    <?php while ( $news->have_posts() ) : $news->the_post();
      get_template_part( 'template-parts/news-card' );
    endwhile; wp_reset_postdata(); ?>
  </div>
  <?php else : ?>
    <p class="faq-empty"><?php _e( 'Zatím zde nejsou žádné aktuality.', 'produkovany' ); ?></p>
  <?php endif; ?>

</div>
</main>

<?php get_footer(); ?>
