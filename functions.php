<?php
/**
 * ProDukovany Theme – functions.php
 *
 * Changelog:
 * 1.1.0 – Přidán SVG favicon (assets/images/favicon.svg), podpora site_icon,
 *          reálný volební program ve 4 kategoriích, topbar s přesným datem voleb.
 * 1.0.0 – Základní verze šablony.
 */

define( 'PRODUKOVANY_VERSION', '1.3.3' );

// ── Základní nastavení tématu ───────────────────────────────────────────────
function produkovany_setup() {
    // Podpora překladu
    load_theme_textdomain( 'produkovany', get_template_directory() . '/languages' );

    // Automatické RSS, title tag, atd.
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

    // Podpora vlastní ikony webu (Site Identity → Site Icon v Customizeru)
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 80,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // Navigační menu
    register_nav_menus([
        'primary' => __( 'Hlavní navigace', 'produkovany' ),
        'footer'  => __( 'Patička', 'produkovany' ),
    ]);

    // Velikosti obrázků
    add_image_size( 'produkovany-thumb',  800, 500, true );
    add_image_size( 'produkovany-square', 400, 400, true );
    add_image_size( 'produkovany-hero',  1920, 800, true );
}
add_action( 'after_setup_theme', 'produkovany_setup' );

// ── Stylesheets & Scripty ───────────────────────────────────────────────────
function produkovany_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'produkovany-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600&display=swap',
        [],
        null
    );

    // Hlavní CSS
    wp_enqueue_style(
        'produkovany-style',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'produkovany-fonts' ],
        PRODUKOVANY_VERSION
    );

    // Hlavní JS
    wp_enqueue_script(
        'produkovany-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        PRODUKOVANY_VERSION,
        true
    );

    // Komentáře
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'produkovany_enqueue_assets' );

// ── Widget oblasti ──────────────────────────────────────────────────────────
function produkovany_widgets_init() {
    register_sidebar([
        'name'          => __( 'Boční panel', 'produkovany' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgety pro boční panel.', 'produkovany' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
    register_sidebar([
        'name'          => __( 'Patička – sloupec 1', 'produkovany' ),
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ]);
    register_sidebar([
        'name'          => __( 'Patička – sloupec 2', 'produkovany' ),
        'id'            => 'footer-2',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action( 'widgets_init', 'produkovany_widgets_init' );

// ── Custom Post Type: Kandidáti ─────────────────────────────────────────────
function produkovany_register_cpt() {
    register_post_type( 'kandidat', [
        'labels' => [
            'name'               => __( 'Kandidáti', 'produkovany' ),
            'singular_name'      => __( 'Kandidát', 'produkovany' ),
            'add_new'            => __( 'Přidat kandidáta', 'produkovany' ),
            'add_new_item'       => __( 'Přidat nového kandidáta', 'produkovany' ),
            'edit_item'          => __( 'Upravit kandidáta', 'produkovany' ),
            'menu_name'          => __( 'Kandidáti', 'produkovany' ),
        ],
        'public'       => true,
        'show_in_rest' => true,
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'menu_icon'    => 'dashicons-groups',
        'rewrite'      => [ 'slug' => 'kandidati' ],
    ]);

    register_post_type( 'pillar', [
        'labels' => [
            'name'          => __( 'Programové body', 'produkovany' ),
            'singular_name' => __( 'Programový bod', 'produkovany' ),
            'add_new_item'  => __( 'Přidat bod programu', 'produkovany' ),
            'menu_name'     => __( 'Program', 'produkovany' ),
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_rest' => true,
        'supports'     => [ 'title', 'editor', 'thumbnail' ],
        'menu_icon'    => 'dashicons-clipboard',
    ]);
}
add_action( 'init', 'produkovany_register_cpt' );

// ── Custom Meta: pořadí kandidáta ───────────────────────────────────────────
function produkovany_kandidat_meta_box() {
    add_meta_box(
        'kandidat_meta',
        __( 'Údaje kandidáta', 'produkovany' ),
        'produkovany_kandidat_meta_html',
        'kandidat',
        'side'
    );
}
add_action( 'add_meta_boxes', 'produkovany_kandidat_meta_box' );

function produkovany_kandidat_meta_html( $post ) {
    $order    = get_post_meta( $post->ID, '_kandidat_order',    true );
    $povolani = get_post_meta( $post->ID, '_kandidat_povolani', true );
    wp_nonce_field( 'produkovany_kandidat_save', 'produkovany_kandidat_nonce' );
    ?>
    <p>
        <label><strong><?php _e( 'Číslo na kandidátce', 'produkovany' ); ?></strong></label><br>
        <input type="number" name="kandidat_order" value="<?php echo esc_attr( $order ); ?>" style="width:100%">
    </p>
    <p>
        <label><strong><?php _e( 'Povolání', 'produkovany' ); ?></strong></label><br>
        <input type="text" name="kandidat_povolani" value="<?php echo esc_attr( $povolani ); ?>" placeholder="např. Elektrotechnik" style="width:100%">
    </p>
    <p style="color:#888;font-size:12px">
        💡 Jméno = název příspěvku<br>
        📷 Foto = náhledový obrázek
    </p>
    <?php
}

function produkovany_save_kandidat_meta( $post_id ) {
    if ( ! isset( $_POST['produkovany_kandidat_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['produkovany_kandidat_nonce'], 'produkovany_kandidat_save' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( isset( $_POST['kandidat_order'] ) )
        update_post_meta( $post_id, '_kandidat_order',    absint( $_POST['kandidat_order'] ) );
    if ( isset( $_POST['kandidat_povolani'] ) )
        update_post_meta( $post_id, '_kandidat_povolani', sanitize_text_field( $_POST['kandidat_povolani'] ) );
}
add_action( 'save_post_kandidat', 'produkovany_save_kandidat_meta' );

// ── Customizer ──────────────────────────────────────────────────────────────
function produkovany_customizer( $wp_customize ) {
    $wp_customize->add_section( 'produkovany_hero', [
        'title'    => __( 'Hero sekce', 'produkovany' ),
        'priority' => 30,
    ]);
    $wp_customize->add_setting( 'hero_heading', [ 'default' => 'Bezpečná obec. Živá komunita.' ] );
    $wp_customize->add_control( 'hero_heading', [
        'label'   => __( 'Nadpis hero', 'produkovany' ),
        'section' => 'produkovany_hero',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting( 'hero_subheading', [ 'default' => 'Staráme se o bezpečnost, pohodu a budoucnost Dukovan.' ] );
    $wp_customize->add_control( 'hero_subheading', [
        'label'   => __( 'Podnadpis hero', 'produkovany' ),
        'section' => 'produkovany_hero',
        'type'    => 'textarea',
    ]);
    $wp_customize->add_setting( 'election_year', [ 'default' => '2026' ] );
    $wp_customize->add_control( 'election_year', [
        'label'   => __( 'Rok voleb', 'produkovany' ),
        'section' => 'produkovany_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_section( 'produkovany_contact', [
        'title'       => __( 'Kontaktní položky', 'produkovany' ),
        'description' => __( 'Až 4 kontaktní položky. Každá má nadpis, hodnotu, emoji ikonu a volitelný odkaz (URL). Prázdné položky se nezobrazí.', 'produkovany' ),
        'priority'    => 40,
    ]);

    // Výchozí hodnoty pro 4 položky
    $defaults = [
        1 => [ 'label' => 'E-mail',   'value' => 'info@produkovany.cz', 'icon' => '📧', 'url' => 'mailto:info@produkovany.cz' ],
        2 => [ 'label' => 'Facebook', 'value' => 'ProDukovany',         'icon' => '👍', 'url' => 'https://facebook.com/ProDukovany' ],
        3 => [ 'label' => 'Obec',     'value' => 'Dukovany, okres Třebíč', 'icon' => '📍', 'url' => '' ],
        4 => [ 'label' => '',         'value' => '',                    'icon' => '',   'url' => '' ],
    ];

    for ( $i = 1; $i <= 4; $i++ ) :
        $d = $defaults[$i];
        $wp_customize->add_setting( "contact_{$i}_label", [ 'default' => $d['label'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( "contact_{$i}_label", [
            'label'   => sprintf( __( 'Položka %d – nadpis', 'produkovany' ), $i ),
            'section' => 'produkovany_contact',
            'type'    => 'text',
        ]);
        $wp_customize->add_setting( "contact_{$i}_value", [ 'default' => $d['value'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( "contact_{$i}_value", [
            'label'   => sprintf( __( 'Položka %d – text / hodnota', 'produkovany' ), $i ),
            'section' => 'produkovany_contact',
            'type'    => 'text',
        ]);
        $wp_customize->add_setting( "contact_{$i}_icon", [ 'default' => $d['icon'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( "contact_{$i}_icon", [
            'label'       => sprintf( __( 'Položka %d – emoji ikona', 'produkovany' ), $i ),
            'description' => __( 'Např. 📧 📱 👍 📍 🌐', 'produkovany' ),
            'section'     => 'produkovany_contact',
            'type'        => 'text',
        ]);
        $wp_customize->add_setting( "contact_{$i}_url", [ 'default' => $d['url'], 'sanitize_callback' => 'esc_url_raw' ] );
        $wp_customize->add_control( "contact_{$i}_url", [
            'label'       => sprintf( __( 'Položka %d – odkaz (URL, nepovinné)', 'produkovany' ), $i ),
            'description' => __( 'Např. mailto:…, https://…, tel:…', 'produkovany' ),
            'section'     => 'produkovany_contact',
            'type'        => 'url',
        ]);
    endfor;
}
add_action( 'customize_register', 'produkovany_customizer' );

// ── Excerpt délka ───────────────────────────────────────────────────────────
function produkovany_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'produkovany_excerpt_length' );

// ── Helper: sekční nadpis ───────────────────────────────────────────────────
function produkovany_section_header( $label, $title, $subtitle = '' ) {
    echo '<div class="section-label">' . esc_html( $label ) . '</div>';
    echo '<h2 class="section-title">' . esc_html( $title ) . '</h2>';
    if ( $subtitle ) {
        echo '<p class="section-subtitle">' . esc_html( $subtitle ) . '</p>';
    }
}

// ── Kontaktní formulář – zpracování ─────────────────────────────────────────
function produkovany_handle_contact() {

    // Ověření nonce
    if ( ! isset( $_POST['produkovany_nonce'] ) ||
         ! wp_verify_nonce( $_POST['produkovany_nonce'], 'produkovany_contact_form' ) ) {
        wp_die( __( 'Chyba zabezpečení, zkuste to prosím znovu.', 'produkovany' ), 403 );
    }

    // Ověření captcha
    if ( ! session_id() ) session_start();
    $captcha_answer  = intval( $_POST['cf_captcha'] ?? -1 );
    $captcha_correct = intval( $_SESSION['produkovany_captcha'] ?? -2 );
    unset( $_SESSION['produkovany_captcha'] ); // jednorázové použití
    if ( $captcha_answer !== $captcha_correct ) {
        wp_safe_redirect( add_query_arg( 'kontakt', 'captcha', wp_get_referer() ) . '#kontakt' );
        exit;
    }

    // Sanitace vstupů
    $name    = sanitize_text_field( wp_unslash( $_POST['cf_name']    ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['cf_message'] ?? '' ) );
    $name    = $name ?: 'Anonym';

    // Povinná pouze zpráva
    if ( empty( $message ) ) {
        wp_safe_redirect( add_query_arg( 'kontakt', 'chyba', wp_get_referer() ) . '#kontakt' );
        exit;
    }

    // Cílová adresa – z Customizeru, nebo admin e-mail
    $to      = get_theme_mod( 'contact_1_value', get_option( 'admin_email' ) );
    $subject = sprintf( '[ProDukovany.cz] Zpráva od: %s', $name );
    $body    = sprintf(
        "Od: %s\n\nZpráva:\n%s\n\n---\nOdesláno přes kontaktní formulář na %s",
        $name, $message, home_url()
    );
    $headers = [ 'Content-Type: text/plain; charset=UTF-8' ];

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_safe_redirect( add_query_arg( 'kontakt', 'ok', wp_get_referer() ) . '#kontakt' );
    } else {
        wp_safe_redirect( add_query_arg( 'kontakt', 'chyba', wp_get_referer() ) . '#kontakt' );
    }
    exit;
}
add_action( 'admin_post_nopriv_produkovany_contact', 'produkovany_handle_contact' );
add_action( 'admin_post_produkovany_contact',        'produkovany_handle_contact' );
