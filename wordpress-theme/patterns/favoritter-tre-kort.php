<?php
/**
 * Title: Tre kort – Signaturprodukter
 * Slug: sjokoladerommet/favoritter-tre-kort
 * Categories: sjokoladerommet-seksjon
 * Keywords: kort, tre kolonner, produkter, favoritter, signaturer, kaker
 * Description: Tre-kolonne kortvisning med bilde, tittel og beskrivelse. Viser signaturprodukter.
 */
$img = get_template_directory_uri() . '/assets/images/';
?>
<!-- wp:group {"className":"section tight"} -->
<div class="wp-block-group section tight"><!-- wp:group {"className":"wrap"} -->
<div class="wp-block-group wrap"><!-- wp:html -->
<div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:20px;margin-bottom:36px">
  <div>
    <div class="eyebrow" style="margin-bottom:14px">Faste favoritter</div>
    <h2>Det vi alltid har på lur</h2>
  </div>
  <a class="btn btn-ghost" href="/meny/">Hele menyen →</a>
</div>
<!-- /wp:html -->

<!-- wp:group {"className":"cols-3"} -->
<div class="wp-block-group cols-3">

<!-- wp:group {"className":"card"} -->
<div class="wp-block-group card" style="position:relative;overflow:hidden">
<!-- wp:html -->
<div class="ribbon" style="margin-bottom:16px">Vår signatur</div>
<!-- /wp:html -->
<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"14px"}}} -->
<figure class="wp-block-image size-full" style="border-radius:14px;margin-bottom:18px"><img src="<?php echo esc_url( $img . 'sjokoladerommet-hus.jpg' ); ?>" alt="Suksessterte"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Suksessterte</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"muted"} -->
<p class="muted" style="margin-top:8px;margin-bottom:0">Mandelbunn, smørkrem med ekte vanilje. Denne blir vi spurt om hver eneste uke.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"card"} -->
<div class="wp-block-group card">
<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"14px"}}} -->
<figure class="wp-block-image size-full" style="border-radius:14px;margin-bottom:18px"><img src="<?php echo esc_url( $img . 'sjokoladerommet-hus.jpg' ); ?>" alt="Håndlaget konfekt"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Håndlaget konfekt</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"muted"} -->
<p class="muted" style="margin-top:8px;margin-bottom:0">Trøfler, karameller og fyldige biter laget her på huset, en boks om gangen.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"card"} -->
<div class="wp-block-group card">
<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"14px"}}} -->
<figure class="wp-block-image size-full" style="border-radius:14px;margin-bottom:18px"><img src="<?php echo esc_url( $img . 'sjokoladerommet-inne.jpg' ); ?>" alt="Kaffe og kake"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Dagens kaker &amp; kaffe</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"muted"} -->
<p class="muted" style="margin-top:8px;margin-bottom:0">Det som kom ut av ovnen i morges, og en kopp god kaffe.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
