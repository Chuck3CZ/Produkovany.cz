<?php get_header(); ?>

<main id="main" class="site-main">

  <!-- ═══════════════════════════════════════════════
       HERO
  ═══════════════════════════════════════════════ -->
  <section class="hero" id="uvod">
    <div class="hero-bg"></div>
    <div class="hero-logo">
      <img
        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png"
        alt="ProDukovany logo"
        class="hero-logo-img"
      >
    </div>
    <div class="hero-content">
      <span class="hero-badge">
        🗳️ Volební kandidátka &middot; Dukovany <?php echo esc_html(get_theme_mod('election_year','2026')); ?>
      </span>
      <h1><?php echo nl2br(esc_html(get_theme_mod('hero_heading', "Bezpečná obec.\nŽivá komunita."))); ?></h1>
      <p><?php echo esc_html(get_theme_mod('hero_subheading', 'Staráme se o bezpečnost, pohodu a budoucnost Dukovan. Protože domov není jen místo — je to pocit jistoty a sounáležitosti.')); ?></p>
      <div class="hero-btns">
        <a href="#program" class="btn btn-primary"><?php _e('Náš program', 'produkovany'); ?></a>
        <a href="#kandidati" class="btn btn-outline"><?php _e('Poznejte nás', 'produkovany'); ?></a>
      </div>
    </div>
  </section>

  <svg class="wave" viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <path d="M0 60 L1440 60 L1440 20 Q720 -10 0 20 Z" fill="var(--white)"/>
  </svg>

  <!-- ═══════════════════════════════════════════════
       4 PILÍŘE
  ═══════════════════════════════════════════════ -->
  <section class="pillars-section section" id="priority">
    <div class="container">
      <?php produkovany_section_header('Naše priority', 'Čtyři pilíře lepších Dukovan'); ?>

      <div class="pillars-grid">
        <?php
        $pillars_query = new WP_Query([
          'post_type'      => 'pillar',
          'posts_per_page' => 4,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
        ]);
        if ( $pillars_query->have_posts() ) :
          while ( $pillars_query->have_posts() ) : $pillars_query->the_post();
            $icon  = get_post_meta(get_the_ID(), '_pillar_icon', true) ?: '✦';
            $color = get_post_meta(get_the_ID(), '_pillar_color', true) ?: 'var(--red)';
        ?>
        <div class="pillar-card" style="--accent:<?php echo esc_attr($color); ?>">
          <div class="pillar-icon"><?php echo esc_html($icon); ?></div>
          <h3><?php the_title(); ?></h3>
          <p><?php the_excerpt(); ?></p>
        </div>
        <?php
          endwhile; wp_reset_postdata();
        else :
        ?>
        <div class="pillar-card" style="--accent:var(--red)">
          <div class="pillar-icon" style="background:#FADBD8">📢</div>
          <h3>Transparentnost a komunikace</h3>
          <p>Prosazujeme otevřené hospodaření obce a včasné informování občanů. Chceme vést skutečný dialog – rozhodnutí obce se mají tvořit společně s jejími obyvateli.</p>
        </div>
        <div class="pillar-card" style="--accent:var(--green)">
          <div class="pillar-icon" style="background:#D5F5E3">🚧</div>
          <h3>Doprava a infrastruktura</h3>
          <p>Zaměříme se na bezpečnější cesty pro pěší i cyklisty, lepší možnosti parkování a postupné zlepšování stavu obecních komunikací.</p>
        </div>
        <div class="pillar-card" style="--accent:var(--green)">
          <div class="pillar-icon" style="background:#D5F5E3">🏘️</div>
          <h3>Rozvoj obce a služby</h3>
          <p>Podpoříme dostupné bydlení pro mladé, péči o seniory, kvalitní školství i sportovní a kulturní život v obci. Spolky a aktivní občané si zaslouží podporu obce.</p>
        </div>
        <div class="pillar-card" style="--accent:var(--blue)">
          <div class="pillar-icon" style="background:#D6EAF8">🛡️</div>
          <h3>Bezpečnost v obci</h3>
          <p>Chceme, aby se v Dukovanech žilo bezpečně i v době výstavby nových jaderných bloků. Budeme prosazovat opatření ke zklidnění dopravy a posílení bezpečnosti v obci.</p>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
       PROGRAM – detailní
  ═══════════════════════════════════════════════ -->
  <section class="program-section section" id="program">
    <div class="container">
      <div class="section-label" style="color:#FADBD8">Volební program</div>
      <h2 class="section-title" style="color:#fff; max-width:100%">Aktuálně program doručujeme ve fyzické podobě, později bude přidán i zde na stránky</h2>

      <div class="program-stats" style="margin-top:56px">
        <div class="stat-box">
          <div class="stat-num">4</div>
          <div class="stat-label">Oblasti programu</div>
        </div>
        <div class="stat-box">
          <div class="stat-num">20+</div>
          <div class="stat-label">Konkrétních bodů</div>
        </div>
        <div class="stat-box">
          <div class="stat-num">100%</div>
          <div class="stat-label">Transparentnost</div>
        </div>
        <div class="stat-box">
          <div class="stat-num">🏠</div>
          <div class="stat-label">Domov pro nás</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
       KANDIDÁTI
  ═══════════════════════════════════════════════ -->
  <section class="candidates-section section" id="kandidati">
    <div class="container">
      <?php produkovany_section_header('Lidé za ProDukovany', 'Váš tým pro lepší obec', 'Jsme sousedé, rodiče a přátelé. Nejsme politici z povolání — jsme lidé, kteří chtějí ve zdravé obci žít.'); ?>

      <div class="candidates-grid">
        <?php
        $kandidati = new WP_Query([
          'post_type'      => 'kandidat',
          'posts_per_page' => 15,
          'meta_key'       => '_kandidat_order',
          'orderby'        => 'meta_value_num',
          'order'          => 'ASC',
        ]);
        if ( $kandidati->have_posts() ) :
          while ( $kandidati->have_posts() ) : $kandidati->the_post();
            $order    = get_post_meta(get_the_ID(), '_kandidat_order',    true);
            $povolani = get_post_meta(get_the_ID(), '_kandidat_povolani', true);
        ?>
        <div class="candidate-card">
          <div class="candidate-photo">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('produkovany-square', ['alt' => get_the_title()]); ?>
            <?php else : ?>
              <span aria-hidden="true">👤</span>
            <?php endif; ?>
          </div>
          <div class="candidate-info">
            <?php if ($order) : ?>
              <div class="candidate-num"><?php echo absint($order); ?></div>
            <?php endif; ?>
            <h4><?php the_title(); ?></h4>
            <?php if ($povolani) : ?>
              <p class="candidate-povolani"><?php echo esc_html($povolani); ?></p>
            <?php endif; ?>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
       AKTUALITY
  ═══════════════════════════════════════════════ -->
  <section class="news-section section" id="aktuality">
    <div class="container">
      <?php produkovany_section_header('Co se děje', 'Aktuality z kampaně'); ?>

      <div class="news-grid">
        <?php
        $news = new WP_Query([
          'post_type'      => 'post',
          'posts_per_page' => 3,
          'ignore_sticky_posts' => true,
        ]);
        if ( $news->have_posts() ) :
          while ( $news->have_posts() ) : $news->the_post();
            $cats = get_the_category();
            $cat_name = $cats ? $cats[0]->name : 'Aktuality';
        ?>
        <article class="news-card">
          <div class="news-thumb">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('produkovany-thumb'); ?>
            <?php else : ?>
              <span aria-hidden="true">📰</span>
            <?php endif; ?>
          </div>
          <div class="news-body">
            <div class="news-tag"><?php echo esc_html($cat_name); ?></div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
            <div class="news-date"><?php echo get_the_date('j. F Y'); ?></div>
          </div>
        </article>
        <?php endwhile; wp_reset_postdata(); endif; ?>
      </div>

      <div style="text-align:center; margin-top:40px">
        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline-dark">
          <?php _e('Všechny aktuality', 'produkovany'); ?> →
        </a>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
       CTA BANNER
  ═══════════════════════════════════════════════ -->
  <section class="cta-banner">
    <h2>Dukovany patří nám všem.</h2>
    <p>Vaše podpora a hlas rozhodují. Pomozte nám vytvořit obec, na kterou budeme hrdí.</p>
    <a href="#kontakt" class="btn btn-white"><?php _e('Napište nám', 'produkovany'); ?></a>
  </section>

  <!-- ═══════════════════════════════════════════════
       KONTAKT
  ═══════════════════════════════════════════════ -->
  <section class="contact-section section" id="kontakt">
    <div class="container contact-inner">
      <div class="contact-info-col">
        <?php produkovany_section_header('Spojte se s námi', 'Máte otázku nebo nápad?'); ?>

        <?php
        // Výchozí hodnoty – zobrazí se dokud nejsou přepsány v Customizeru
        $contact_defaults = [
            1 => [ 'label' => 'E-mail',   'value' => 'info@produkovany.cz',        'icon' => '📧', 'url' => 'mailto:info@produkovany.cz' ],
            2 => [ 'label' => 'Facebook', 'value' => 'facebook.com/ProDukovany',   'icon' => '👍', 'url' => 'https://facebook.com/ProDukovany' ],
            3 => [ 'label' => 'Obec',     'value' => 'Dukovany, okres Třebíč',     'icon' => '📍', 'url' => '' ],
            4 => [ 'label' => '',         'value' => '',                            'icon' => '',   'url' => '' ],
        ];

        for ( $i = 1; $i <= 4; $i++ ) :
          $d     = $contact_defaults[$i];
          $label = get_theme_mod( "contact_{$i}_label", $d['label'] );
          $value = get_theme_mod( "contact_{$i}_value", $d['value'] );
          $icon  = get_theme_mod( "contact_{$i}_icon",  $d['icon']  );
          $url   = get_theme_mod( "contact_{$i}_url",   $d['url']   );
          if ( empty($label) && empty($value) ) continue;
          $icon = $icon ?: '📌';
        ?>
        <div class="contact-item">
          <div class="contact-icon"><?php echo esc_html($icon); ?></div>
          <div>
            <strong><?php echo esc_html($label); ?></strong>
            <p>
              <?php if ( $url ) : ?>
                <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener"><?php echo esc_html($value); ?></a>
              <?php else : ?>
                <?php echo esc_html($value); ?>
              <?php endif; ?>
            </p>
          </div>
        </div>
        <?php endfor; ?>

      </div>

      <div class="contact-form-col">
        <?php
        $kontakt_status = isset( $_GET['kontakt'] ) ? $_GET['kontakt'] : '';
        if ( $kontakt_status === 'ok' ) : ?>
          <div class="form-notice form-notice--ok">
            ✅ <strong>Zpráva odeslána!</strong> Děkujeme, ozveme se vám co nejdříve.
          </div>
        <?php elseif ( $kontakt_status === 'captcha' ) : ?>
          <div class="form-notice form-notice--error">
            🤖 <strong>Špatná odpověď na ověřovací otázku.</strong> Zkuste to prosím znovu.
          </div>
        <?php elseif ( $kontakt_status === 'chyba' ) : ?>
          <div class="form-notice form-notice--error">
            ❌ <strong>Zprávu se nepodařilo odeslat.</strong> Zkuste to prosím znovu, nebo nás kontaktujte přímo na e-mailu níže.
          </div>
        <?php endif; ?>

        <?php if ( shortcode_exists('contact-form-7') ) {
          echo do_shortcode('[contact-form-7 id="kontakt-form" title="Kontakt ProDukovany"]');
        } else {
        if ( $kontakt_status !== 'ok' ) : ?>
        <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
          <input type="hidden" name="action" value="produkovany_contact">
          <?php wp_nonce_field('produkovany_contact_form', 'produkovany_nonce'); ?>
          <div class="form-group">
            <label for="cf-name"><?php _e('Jméno', 'produkovany'); ?> <span class="form-optional">(nepovinné)</span></label>
            <input type="text" id="cf-name" name="cf_name"
              value="<?php echo esc_attr( $_GET['cf_name'] ?? '' ); ?>"
              placeholder="Jméno, přezdívka nebo Anonym">
          </div>
          <div class="form-group">
            <label for="cf-message"><?php _e('Zpráva', 'produkovany'); ?></label>
            <textarea id="cf-message" name="cf_message"
              placeholder="Váš vzkaz nebo nápad co by se mohlo zlepšit..." required></textarea>
          </div>
          <?php
          // Matematická captcha — vygeneruj dvě čísla a ulož součet do session
          if ( ! session_id() ) session_start();
          $a = wp_rand( 1, 9 );
          $b = wp_rand( 1, 9 );
          $_SESSION['produkovany_captcha'] = $a + $b;
          ?>
          <div class="form-group captcha-group">
            <label for="cf-captcha">
              <?php printf( __( 'Kolik je %d + %d?', 'produkovany' ), $a, $b ); ?>
              <span class="form-optional">(ověření)</span>
            </label>
            <input type="number" id="cf-captcha" name="cf_captcha"
              placeholder="<?php esc_attr_e('Váš výsledek', 'produkovany'); ?>"
              min="0" max="20" required autocomplete="off">
          </div>
          <button type="submit" class="btn btn-primary"><?php _e('Odeslat zprávu', 'produkovany'); ?></button>
        </form>
        <?php endif;
        } ?>
      </div>
    </div>
  </section>

</main><!-- #main -->

<?php get_footer(); ?>
