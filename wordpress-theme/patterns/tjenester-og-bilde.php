<?php
/**
 * Title: Tjenester og bilde – Velværeavdelingen
 * Slug: sjokoladerommet/tjenester-og-bilde
 * Categories: sjokoladerommet-seksjon
 * Keywords: tjenester, velvære, bilde, priser, behandling, massasje
 * Description: To-kolonne seksjon: tjenesteliste med priser til venstre, bilde til høyre.
 */
$img = get_template_directory_uri() . '/assets/images/';
?>
<!-- wp:group {"className":"section"} -->
<div class="wp-block-group section"><!-- wp:group {"className":"wrap"} -->
<div class="wp-block-group wrap"><!-- wp:group {"className":"cols-2","style":{"layout":{"selfStretch":"fill"}}} -->
<div class="wp-block-group cols-2" style="align-items:stretch">

<!-- wp:group -->
<div class="wp-block-group" style="display:flex;flex-direction:column;justify-content:center">
<!-- wp:paragraph {"className":"eyebrow","style":{"color":{"text":"var(--fjord-deep)"}}} -->
<p class="eyebrow" style="color:var(--fjord-deep)">Velværeavdelingen</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Et hus som tar vare på hele&nbsp;deg.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">Før Janett begynte med sjokolade utdannet hun seg som hudpleier og velværeterapeut. Da huset på Gravdal ble hennes, ble det naturlig å la begge hennes virker få plass under samme tak.</p>
<!-- /wp:paragraph -->
<!-- wp:html -->
<div class="velvare-services">
  <div class="card-soft" style="padding:18px"><div style="font-family:'Playfair Display',serif;font-size:21px;font-weight:600">Ansiktsbehandling</div><div class="muted" style="font-size:14px;margin-top:4px">60 min · fra 890 kr</div></div>
  <div class="card-soft" style="padding:18px"><div style="font-family:'Playfair Display',serif;font-size:21px;font-weight:600">Klassisk massasje</div><div class="muted" style="font-size:14px;margin-top:4px">50 min · fra 750 kr</div></div>
  <div class="card-soft" style="padding:18px"><div style="font-family:'Playfair Display',serif;font-size:21px;font-weight:600">Fotpleie</div><div class="muted" style="font-size:14px;margin-top:4px">45 min · fra 690 kr</div></div>
  <div class="card-soft" style="padding:18px"><div style="font-family:'Playfair Display',serif;font-size:21px;font-weight:600">Sjokoladepause</div><div class="muted" style="font-size:14px;margin-top:4px">etter hver behandling</div></div>
</div>
<div style="margin-top:28px;display:flex;gap:12px;flex-wrap:wrap;align-items:center">
  <a class="btn btn-primary" href="mailto:hei@sjokoladerommet.no?subject=Time%20hos%20Velv%C3%A6reavdelingen">Bestill time</a>
  <span class="muted" style="font-size:14px">eller ring <b style="color:var(--brun)">76 08 23 14</b></span>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group">
<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"24px"}}} -->
<figure class="wp-block-image size-full" style="border-radius:24px;overflow:hidden;aspect-ratio:4/5"><img src="<?php echo esc_url( $img . 'sjokoladerommet-inne.jpg' ); ?>" alt="Velværerommet" style="width:100%;height:100%;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
