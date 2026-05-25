<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$logo_url = get_template_directory_uri() . '/assets/images/logo.webp';
$current  = sjokoladerommet_current_page_id();
?>

<!-- ─── Sticky topbar ─── -->
<header class="topbar">
  <div class="wrap">

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brandmark">
      <img src="<?php echo esc_url( $logo_url ); ?>" alt="Sjokoladerommet" width="46" height="46">
      <span class="wordmark">Sjokoladerommet</span>
    </a>

    <?php
    wp_nav_menu( [
        'theme_location' => 'primary',
        'container'      => 'nav',
        'container_class'=> 'nav-links',
        'container_attrs'=> [ 'aria-label' => 'Sidenavigasjon' ],
        'depth'          => 1,
        'fallback_cb'    => 'sjokoladerommet_fallback_nav',
        'items_wrap'     => '%3$s',
        'walker'         => new Sjokoladerommet_Nav_Walker(),
    ] );
    ?>

    <button class="hamburger" aria-label="Åpne meny" aria-expanded="false" aria-controls="mobile-nav">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>

  </div>
</header>

<!-- ─── Mobile nav overlay ─── -->
<div id="mobile-nav" class="mobile-nav" role="dialog" aria-modal="true" aria-label="Navigasjonsmeny">
  <?php
  wp_nav_menu( [
      'theme_location' => 'primary',
      'container'      => 'nav',
      'container_class'=> 'nav-links',
      'depth'          => 1,
      'fallback_cb'    => 'sjokoladerommet_fallback_nav',
      'items_wrap'     => '%3$s',
      'walker'         => new Sjokoladerommet_Nav_Walker(),
  ] );
  ?>
  <div class="meta">
    <b>Sjokoladerommet</b><br>
    Gravdalsgata 15<br>
    8372 Gravdal, Lofoten<br><br>
    <b>Torsdag–søndag 11–16</b><br>
    Mandag–onsdag: stengt
  </div>
</div>

<?php

/**
 * Custom nav walker — adds aria-current="page" and class="current" to
 * the active menu item's <a> tag (WordPress puts it on the <li> by default).
 */
class Sjokoladerommet_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item    = $data_object;
        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $active  = in_array( 'current-menu-item', $classes, true )
                || in_array( 'current_page_item',  $classes, true );

        $atts             = [];
        $atts['href']     = ! empty( $item->url ) ? $item->url : '';
        $atts['class']    = $active ? 'current' : '';
        if ( $active ) $atts['aria-current'] = 'page';

        $attr_str = '';
        foreach ( $atts as $k => $v ) {
            if ( $v ) $attr_str .= ' ' . $k . '="' . esc_attr( $v ) . '"';
        }

        $output .= '<a' . $attr_str . '>' . esc_html( $item->title ) . '</a>';
    }
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {}
    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl(   &$output, $depth = 0, $args = null ) {}
}
