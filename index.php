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
        <a href="#aktuality" class="btn btn-outline"><?php _e('Aktuality', 'produkovany'); ?></a>
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
      <h2 class="section-title" style="color:#fff; max-width:100%">Co konkrétně chceme pro Dukovany</h2>

      <div class="program-detail-grid">

        <div class="program-category">
          <div class="program-cat-header">
            <span class="program-cat-icon">📢</span>
            <h3>1. Transparentnost a komunikace</h3>
          </div>
          <ul class="program-list">
            <li>Naprosto transparentní hospodaření obce</li>
            <li>Řádnou a včasnou informovanost občanů o dění v obci a plánovaných záměrech obce</li>
            <li>Modernizaci a zefektivnění správy obce</li>
            <li>O rovný a spravedlivý přístup ke všem občanům při vyřizování jejich žádostí a požadavků</li>
          </ul>
        </div>

        <div class="program-category">
          <div class="program-cat-header">
            <span class="program-cat-icon">🚧</span>
            <h3>2. Doprava a infrastruktura</h3>
          </div>
          <ul class="program-list">
            <li>Vybudování asfaltového parkoviště před obchodem s rozšířením směrem ke vstupu na fotbalové hřiště a nahrazení hliněné stezky pod topoly regulérním chodníkem</li>
            <li>Zajištění bezplatného připojení k teplovodu pro novou zástavbu i pro majitele nemovitostí, kteří se dříve odmítli připojit a teď by o to měli zájem</li>
            <li>Takovou cenotvorbu tepla, aby byli občané motivováni k připojení k teplovodu, popřípadě ho více využívat</li>
            <li>Celkovou opravu místní komunikace od zámku směrem k objektu bývalého kravína včetně vybudování chodníku</li>
          </ul>
          <div class="program-more" id="program-more-2">
            <ul class="program-list">
              <li>Vyasfaltování dnes hliněné komunikace od objektu SEDUK k fotbalovému hřišti pro cyklo/pěší a dopravní obsluhu pozemků rezidentů</li>
              <li>Rozšíření poloměru zpevněného povrchu na sokolské louce, abychom se při společenských akcích nebrodili v blátě</li>
              <li>Rekonstrukci toalet v Sokolovně</li>
              <li>Zefektivnění plánování a provádění údržby v obci, aby nedocházelo ke znehodnocení investic do obecní infrastruktury</li>
              <li>Dodržování územního plánu obce, aby nebyl narušen celkový ráz/vzhled obce nepatřičnou zástavbou</li>
              <li>Zrychlení internetového připojení domácnostem</li>
              <li>Zajištění instalace AlzaBoxu v obci, který díky spolupráci s Balíkovnou rozšíří možnosti vyzvedávání zásilek i mimo omezenou otevírací dobu místní pošty</li>
            </ul>
          </div>
          <button type="button" class="program-toggle" aria-expanded="false" aria-controls="program-more-2">
            <span class="program-toggle-text">Zjistit více</span>
            <span class="program-toggle-arrow" aria-hidden="true">▾</span>
          </button>
        </div>

        <div class="program-category">
          <div class="program-cat-header">
            <span class="program-cat-icon">🏘️</span>
            <h3>3. Rozvoj obce a služby</h3>
          </div>
          <ul class="program-list">
            <li>Výstavbu dostupných obecních bytů pro mladé rodiny</li>
            <li>Modernizaci zázemí školy a školky a zvýšení úrovně vzdělávání</li>
            <li>Rozšíření péče o seniory (např. senior taxi) a ubytovacích prostor s pečovatelskou službou</li>
            <li>Vyšší podporu zájmových spolků, které pracují s dětmi, a jejich činnosti</li>
          </ul>
          <div class="program-more" id="program-more-3">
            <ul class="program-list">
              <li>Rozšíření výběru zájmových kroužků, které mohou děti navštěvovat, např. o tenis a plavání</li>
              <li>Výběr kvalitního a spolehlivého provozovatele restaurace v majetku obce</li>
              <li>Výstavbu prostor pro služby v oblasti zdravotnictví, maloobchodu a dalších, které se v obci momentálně nenacházejí, a motivaci podnikatelských subjektů, aby tyto služby v obci poskytovaly</li>
              <li>Zajištění modernizace posilovny</li>
              <li>Zajištění stálé obsluhy a údržby všech sportovišť</li>
            </ul>
          </div>
          <button type="button" class="program-toggle" aria-expanded="false" aria-controls="program-more-3">
            <span class="program-toggle-text">Zjistit více</span>
            <span class="program-toggle-arrow" aria-hidden="true">▾</span>
          </button>
        </div>

        <div class="program-category">
          <div class="program-cat-header">
            <span class="program-cat-icon">🛡️</span>
            <h3>4. Bezpečnost v obci</h3>
          </div>
          <ul class="program-list">
            <li>Instalaci radarů s úsekovým měřením na všechny silniční vjezdy a výjezdy do/z obce a instalaci zpomalovacího semaforu na přechodu u školy</li>
            <li>Získání statusu obce s částečnou přenesenou působností v oblasti dopravy, aby obec mohla efektivněji zajistit dodržování silničního zákona na obecních komunikacích</li>
            <li>Rozšíření obytné zóny z lokality „Holandsko“ o lokalitu „Podevsí“ a obytnou lokalitu u zámecké zdi s cílem zajistit přednost chodců (dětí) před automobily</li>
            <li>Vedení dialogu s vlastníky pozemků, krajem a ČEZ a. s. za účelem výstavby cyklostezky na trase Jamolice-Dukovany-EDU a kruhového objezdu u čerpací stanice</li>
          </ul>
          <div class="program-more" id="program-more-4">
            <ul class="program-list">
              <li>Vybudování infrastruktury pro systém zabezpečení obce</li>
              <li>Vybudování zázemí pro agenturního bezpečnostního pracovníka a obecní policii, která bude (dočasně) zřízena v případě zhoršení bezpečnostní situace v obci během výstavby EDU II</li>
            </ul>
          </div>
          <button type="button" class="program-toggle" aria-expanded="false" aria-controls="program-more-4">
            <span class="program-toggle-text">Zjistit více</span>
            <span class="program-toggle-arrow" aria-hidden="true">▾</span>
          </button>
        </div>

      </div>

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
            $order      = get_post_meta(get_the_ID(), '_kandidat_order',    true);
            $povolani   = get_post_meta(get_the_ID(), '_kandidat_povolani', true);
            $has_popis  = trim( wp_strip_all_tags( get_the_content() ) ) !== '';
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
          <?php if ($has_popis) : ?>
          <a href="<?php the_permalink(); ?>" class="candidate-more" aria-label="<?php echo esc_attr( sprintf( __('Zjistit více o %s', 'produkovany'), get_the_title() ) ); ?>">
            <span class="candidate-more-icon" aria-hidden="true">&darr;</span>
            <span class="candidate-more-label" aria-hidden="true"><?php _e('Zjistit více', 'produkovany'); ?></span>
          </a>
          <?php endif; ?>
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
       FAQ – časté dotazy
  ═══════════════════════════════════════════════ -->
  <?php
  $faq = new WP_Query([
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'orderby'        => [ 'menu_order' => 'ASC', 'date' => 'ASC' ],
  ]);
  if ( $faq->have_posts() ) : ?>
  <section class="faq-section section" id="faq">
    <div class="container">
      <?php produkovany_section_header('Časté dotazy', 'Na co se nás ptáte'); ?>

      <div class="faq-list">
        <?php while ( $faq->have_posts() ) : $faq->the_post(); ?>
        <details class="faq-item">
          <summary class="faq-question"><?php the_title(); ?></summary>
          <div class="faq-answer"><?php the_content(); ?></div>
        </details>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

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
