<?php
/**
 * 404 — Page not found.
 */
get_header();
?>

<main>
  <section class="section" style="text-align:center">
    <div class="wrap" style="max-width:640px">
      <?php sjokoladerommet_flower_mark( 56, 'var(--accent-deep)', 'margin:0 auto 24px;display:block' ); ?>
      <div class="eyebrow" style="justify-content:center;margin-bottom:16px">404</div>
      <h1>Denne siden finnes ikke.</h1>
      <p class="lead" style="margin-top:20px">
        Kanskje du lette etter noe annet? Prøv en av lenkene nedenfor,
        eller kom innom oss i Gravdalsgata 15.
      </p>
      <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-top:32px">
        <a class="btn btn-primary"  href="<?php echo esc_url( home_url( '/' ) ); ?>">Tilbake til forsiden</a>
        <a class="btn btn-outline"  href="<?php echo esc_url( home_url( '/meny/' ) ); ?>">Se menyen</a>
        <a class="btn btn-ghost"    href="<?php echo esc_url( home_url( '/bestill-kake/' ) ); ?>">Bestill kake</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
