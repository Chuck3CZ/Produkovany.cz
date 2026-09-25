<?php get_header(); ?>

<main id="main" class="site-main page-faq">
<div class="container">

  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-link">&larr; <?php _e( 'Zpět na hlavní stránku', 'produkovany' ); ?></a>

  <header class="faq-header">
    <?php produkovany_section_header( 'Časté dotazy', 'Na co se nás ptáte', 'Nenašli jste odpověď? Napište nám přes kontaktní formulář na hlavní stránce.' ); ?>
  </header>

  <?php if ( have_posts() ) : ?>
  <div class="faq-list">
    <?php while ( have_posts() ) : the_post(); ?>
    <details class="faq-item" id="faq-<?php the_ID(); ?>">
      <summary class="faq-question"><span class="faq-question-text"><?php the_title(); ?></span></summary>
      <div class="faq-answer"><?php the_content(); ?></div>
    </details>
    <?php endwhile; ?>
  </div>
  <?php else : ?>
    <p class="faq-empty"><?php _e( 'Zatím zde nejsou žádné dotazy.', 'produkovany' ); ?></p>
  <?php endif; ?>

  <div class="faq-cta">
    <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="btn btn-primary"><?php _e( 'Zeptat se nás', 'produkovany' ); ?></a>
  </div>

</div>
</main>

<?php get_footer(); ?>
