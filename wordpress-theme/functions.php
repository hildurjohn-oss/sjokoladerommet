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

// ─── Nav walker — strips <li> wrapper, adds aria-current + class="current" ────
class Sjokoladerommet_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item    = $data_object;
        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $active  = in_array( 'current-menu-item', $classes, true )
                || in_array( 'current_page_item',  $classes, true );

        $atts          = [];
        $atts['href']  = ! empty( $item->url ) ? $item->url : '#';
        if ( $active ) {
            $atts['class']       = 'current';
            $atts['aria-current'] = 'page';
        }

        $attr_str = '';
        foreach ( $atts as $k => $v ) {
            $attr_str .= ' ' . esc_attr( $k ) . '="' . esc_attr( $v ) . '"';
        }

        $output .= '<a' . $attr_str . '>' . esc_html( $item->title ) . '</a>';
    }
    public function end_el(   &$output, $data_object, $depth = 0, $args = null ) {}
    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl(   &$output, $depth = 0, $args = null ) {}
}

// ─── Menu-list helper (used by page-meny.php and menu-list template part) ─────
function sjokoladerommet_menu_list( string $title, array $items, string $accent ): void {
    ?>
    <div>
      <div style="display:flex;align-items:baseline;gap:14px;margin-bottom:24px;padding-bottom:14px;border-bottom:1.5px solid var(--brun)">
        <?php sjokoladerommet_flower_mark( 22, $accent ); ?>
        <h2 style="font-size:clamp(24px,3vw,36px)"><?php echo esc_html( $title ); ?></h2>
      </div>
      <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:18px">
        <?php foreach ( $items as $it ) : ?>
          <li style="display:grid;grid-template-columns:1fr auto;gap:16px;align-items:baseline">
            <div>
              <div style="display:flex;align-items:baseline;gap:10px;flex-wrap:wrap">
                <span style="font-family:'Playfair Display',serif;font-weight:600;font-size:21px"><?php echo esc_html( $it['n'] ); ?></span>
                <?php if ( ! empty( $it['sig'] ) ) : ?>
                  <span class="chip accent" style="padding:2px 10px;font-size:11px;letter-spacing:.1em;text-transform:uppercase">Signatur</span>
                <?php endif; ?>
              </div>
              <div class="muted" style="font-size:15px;margin-top:4px"><?php echo esc_html( $it['d'] ); ?></div>
            </div>
            <div style="font-family:Nunito,sans-serif;font-weight:700;color:var(--brun);font-variant-numeric:tabular-nums;white-space:nowrap;font-size:15px"><?php echo esc_html( $it['p'] ); ?></div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php
}

// ─── Image helper — outputs a responsive cover-fit image block ────────────────
function sjokoladerommet_image( string $src, string $alt, string $aspect = '4/3', int $radius = 18, string $extra_style = '' ): void {
    $wrap_style = 'width:100%;aspect-ratio:' . $aspect . ';border-radius:' . $radius . 'px;overflow:hidden;flex-shrink:0;'
                . $extra_style;
    ?>
    <div style="<?php echo esc_attr( $wrap_style ); ?>">
      <img src="<?php echo esc_url( $src ); ?>" alt="<?php echo esc_attr( $alt ); ?>"
           style="width:100%;height:100%;object-fit:cover;display:block">
    </div>
    <?php
}

// ─── 404 page title ───────────────────────────────────────────────────────────
add_filter( 'wp_title', function ( $title ) {
    if ( is_404() ) return '404 — Siden finnes ikke';
    return $title;
} );
