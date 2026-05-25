<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php $logo_url = get_template_directory_uri() . '/assets/images/logo.webp'; ?>

<!-- ─── Sticky topbar ─── -->
<header class="topbar">
  <div class="wrap">

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brandmark">
      <img src="<?php echo esc_url( $logo_url ); ?>" alt="Sjokoladerommet" width="46" height="46">
      <span class="wordmark">Sjokoladerommet</span>
    </a>

    <nav class="nav-links" aria-label="Sidenavigasjon">
      <?php
      wp_nav_menu( [
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '%3$s',
          'depth'          => 1,
          'fallback_cb'    => 'sjokoladerommet_fallback_nav',
          'walker'         => new Sjokoladerommet_Nav_Walker(),
      ] );
      ?>
    </nav>

    <button class="hamburger"
            aria-label="Åpne meny"
            aria-expanded="false"
            aria-controls="mobile-nav">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>

  </div>
</header>

<!-- ─── Mobile nav overlay ─── -->
<div id="mobile-nav"
     class="mobile-nav"
     role="dialog"
     aria-modal="true"
     aria-label="Navigasjonsmeny">

  <nav class="nav-links" aria-label="Sidenavigasjon">
    <?php
    wp_nav_menu( [
        'theme_location' => 'primary',
        'container'      => false,
        'items_wrap'     => '%3$s',
        'depth'          => 1,
        'fallback_cb'    => 'sjokoladerommet_fallback_nav',
        'walker'         => new Sjokoladerommet_Nav_Walker(),
    ] );
    ?>
  </nav>

  <div class="meta">
    <b>Sjokoladerommet</b><br>
    Gravdalsgata 15<br>
    8372 Gravdal, Lofoten<br><br>
    <b>Torsdag–søndag 11–16</b><br>
    Mandag–onsdag: stengt
  </div>
</div>
