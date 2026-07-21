  <!-- FOOTER -->
  <footer id="colophon" class="site-footer">
    <div class="footer-inner">

      <div class="footer-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
          <span class="footer-logo-pro">Pro</span><span class="footer-logo-duk">Dukovany</span><span class="footer-logo-cz">.cz</span>
        </a>
        <p>Volební kandidátka ProDukovany<br>
          Komunální volby <?php echo esc_html(get_theme_mod('election_year','2026')); ?>
        </p>
      </div>

      <div class="footer-widgets">
        <?php if ( is_active_sidebar('footer-1') ) : ?>
          <div class="footer-col">
            <?php dynamic_sidebar('footer-1'); ?>
          </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar('footer-2') ) : ?>
          <div class="footer-col">
            <?php dynamic_sidebar('footer-2'); ?>
          </div>
        <?php endif; ?>

        <div class="footer-col">
          <h4 class="footer-widget-title"><?php _e('Navigace', 'produkovany'); ?></h4>
          <?php
          wp_nav_menu([
            'theme_location' => 'footer',
            'container'      => false,
            'menu_class'     => 'footer-menu',
            'depth'          => 1,
          ]);
          ?>
        </div>
      </div><!-- .footer-widgets -->

    </div><!-- .footer-inner -->

    <div class="footer-bottom">
      <p>
        <?php _e('Web vytvořil', 'produkovany'); ?>
        <a href="https://martin.gabrhelovi.cz/" target="_blank" rel="noopener">Martin Gabrhel</a>
        &nbsp;&middot;&nbsp;
        &copy; <?php echo date('Y'); ?>
        <?php bloginfo('name'); ?> &nbsp;&middot;&nbsp;
        <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php _e('Ochrana osobních údajů', 'produkovany'); ?></a>
      </p>
      <?php if ( is_user_logged_in() ) : ?>
        <a href="<?php echo esc_url(admin_url()); ?>" class="footer-login-icon" title="<?php esc_attr_e('Administrace', 'produkovany'); ?>">
          🔓
        </a>
      <?php else : ?>
        <a href="<?php echo esc_url(wp_login_url( home_url() )); ?>" class="footer-login-icon" title="<?php esc_attr_e('Přihlásit se', 'produkovany'); ?>">
          🔒
        </a>
      <?php endif; ?>
    </div>
  </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
