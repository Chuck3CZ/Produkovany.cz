<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if ( ! has_site_icon() ) : ?>
<link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/favicon.svg">
<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/favicon.svg">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

  <!-- NAVIGACE + TOPBAR (sticky) -->
  <header id="masthead" class="site-header">

    <div class="topbar">
      🗳️ Komunální volby <strong>9. října a 10. října 2026</strong>
      &nbsp;·&nbsp; Hlasujte pro lepší Dukovany &nbsp;·&nbsp;
      <strong>ProDukovany.cz</strong>
    </div>

    <nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e('Hlavní navigace', 'produkovany'); ?>">

      <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo" rel="home">
        <?php if ( has_custom_logo() ) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <img
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png"
            alt="<?php bloginfo('name'); ?>"
            class="nav-logo-img"
            width="52"
            height="52"
          >
        <?php endif; ?>
        <span class="nav-logo-text">Pro<span>Dukovany</span></span>
      </a>

      <?php $has_menu = has_nav_menu('primary'); ?>

      <?php if ( $has_menu ) : ?>
      <button class="nav-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Otevřít menu', 'produkovany'); ?>">
        <span></span><span></span><span></span>
      </button>
      <?php endif; ?>

      <?php if ( $has_menu ) :
      wp_nav_menu([
        'theme_location' => 'primary',
        'menu_id'        => 'primary-menu',
        'container'      => false,
        'menu_class'     => 'nav-links',
        'fallback_cb'    => false,
      ]);
      endif; ?>

      <a href="#kontakt" class="btn btn-primary nav-cta">Podpořte nás</a>
    </nav>
  </header><!-- #masthead -->
