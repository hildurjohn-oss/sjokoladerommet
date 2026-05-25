<?php
/**
 * Sjokoladerommet — functions.php
 */

// ─── Theme setup ─────────────────────────────────────────────────────────────
add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 120,
        'width'       => 120,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    register_nav_menus( [
        'primary' => __( 'Primær navigasjon', 'sjokoladerommet' ),
    ] );
} );

// ─── Enqueue assets ──────────────────────────────────────────────────────────
add_action( 'wp_enqueue_scripts', function () {
    $uri = get_template_directory_uri();
    $ver = '1.0.0';

    // Google Fonts
    wp_enqueue_style(
        'sjokoladerommet-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Nunito:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style( 'sjokoladerommet-main', $uri . '/assets/css/main.css', [ 'sjokoladerommet-fonts' ], $ver );

    // Main JS (defer, load after DOM)
    wp_enqueue_script( 'sjokoladerommet-main', $uri . '/assets/js/main.js', [], $ver, true );

    // Pass AJAX URL + nonce to JS (used by bestill-kake form)
    wp_localize_script( 'sjokoladerommet-main', 'sjokoladerommet_ajax', [
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'bestill_kake_nonce' ),
    ] );
} );

// ─── Cake order AJAX handler ──────────────────────────────────────────────────
add_action( 'wp_ajax_bestill_kake',        'sjokoladerommet_bestill_kake' );
add_action( 'wp_ajax_nopriv_bestill_kake', 'sjokoladerommet_bestill_kake' );

function sjokoladerommet_bestill_kake() {
    if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ?? '' ) ), 'bestill_kake_nonce' ) ) {
        wp_send_json_error( 'Invalid nonce' );
    }

    $fields = [
        'anledning', 'str', 'smak', 'allergier', 'melding',
        'dato', 'tid', 'navn', 'tlf', 'epost', 'nyhetsbrev',
    ];
    $clean = [];
    foreach ( $fields as $f ) {
        $clean[ $f ] = sanitize_text_field( wp_unslash( $_POST[ $f ] ?? '' ) );
    }

    $to      = get_option( 'admin_email' );
    $subject = 'Ny kakebestilling fra ' . $clean['navn'];
    $message = "Ny bestilling fra Sjokoladerommet:\n\n"
        . "Navn:       " . $clean['navn']      . "\n"
        . "Telefon:    " . $clean['tlf']       . "\n"
        . "E-post:     " . $clean['epost']     . "\n\n"
        . "Anledning:  " . $clean['anledning'] . "\n"
        . "Størrelse:  " . $clean['str']       . "\n"
        . "Smak:       " . $clean['smak']      . "\n"
        . "Hensyn:     " . $clean['allergier'] . "\n"
        . "Henting:    " . $clean['dato'] . ' kl. ' . $clean['tid'] . "\n\n"
        . "Melding:\n"   . $clean['melding']   . "\n\n"
        . "Nyhetsbrev: " . $clean['nyhetsbrev'];

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $clean['navn'] . ' <' . $clean['epost'] . '>',
    ];

    $sent = wp_mail( $to, $subject, $message, $headers );
    if ( $sent ) {
        wp_send_json_success();
    } else {
        wp_send_json_error( 'Mail failed' );
    }
}

// ─── FlowerMark SVG helper ────────────────────────────────────────────────────
require_once get_template_directory() . '/template-parts/flower-mark.php';

// ─── Custom post type: Menyartikler (optional, for dashboard editing) ─────────
add_action( 'init', function () {
    register_post_type( 'menyartikkel', [
        'labels' => [
            'name'               => 'Menyartikler',
            'singular_name'      => 'Menyartikkel',
            'add_new_item'       => 'Legg til menyartikkel',
            'edit_item'          => 'Rediger menyartikkel',
            'view_item'          => 'Se menyartikkel',
            'not_found'          => 'Ingen menyartikler funnet.',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-food',
        'supports'     => [ 'title', 'editor', 'custom-fields' ],
    ] );

    // Taxonomy: kategori (Konfekt, Kaker, Drikke)
    register_taxonomy( 'menykategori', 'menyartikkel', [
        'labels' => [
            'name'          => 'Kategorier',
            'singular_name' => 'Kategori',
            'add_new_item'  => 'Legg til kategori',
        ],
        'hierarchical' => true,
        'show_ui'      => true,
    ] );
} );

// ─── Fallback nav walker for when no menu is assigned ────────────────────────
function sjokoladerommet_fallback_nav( $args ) {
    $current = is_page( 'meny' ) ? 'meny' : ( is_page( 'om-oss' ) ? 'om' : ( is_page( 'bestill-kake' ) ? 'bestill' : 'hjem' ) );
    $links   = [
        [ 'url' => home_url( '/' ),             'label' => 'Hjem',        'id' => 'hjem'    ],
        [ 'url' => home_url( '/meny/' ),         'label' => 'Meny',        'id' => 'meny'    ],
        [ 'url' => home_url( '/om-oss/' ),       'label' => 'Om oss',      'id' => 'om'      ],
        [ 'url' => home_url( '/bestill-kake/' ), 'label' => 'Bestill kake','id' => 'bestill' ],
    ];
    echo '<nav class="nav-links" aria-label="Sidenavigasjon">';
    foreach ( $links as $link ) {
        $class = $link['id'] === $current ? ' class="current"' : '';
        $aria  = $link['id'] === $current ? ' aria-current="page"' : '';
        echo '<a href="' . esc_url( $link['url'] ) . '"' . $class . $aria . '>' . esc_html( $link['label'] ) . '</a>';
    }
    echo '</nav>';
}

// ─── Detect current page for nav highlighting ─────────────────────────────────
function sjokoladerommet_current_page_id() {
    if ( is_page( 'meny' ) )         return 'meny';
    if ( is_page( 'om-oss' ) )       return 'om';
    if ( is_page( 'bestill-kake' ) ) return 'bestill';
    if ( is_front_page() )           return 'hjem';
    return '';
}

// ─── Document title separator ─────────────────────────────────────────────────
add_filter( 'document_title_separator', function () { return '—'; } );
