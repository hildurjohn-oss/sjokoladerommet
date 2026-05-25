<?php
/**
 * Title: Tekst og bilde – Med sitat
 * Slug: sjokoladerommet/tekst-og-bilde
 * Categories: sjokoladerommet-seksjon
 * Keywords: tekst, bilde, to kolonner, historie, sitat, portrett
 * Description: To-kolonne seksjon: portrettfoto venstre, overskrift, ingress, sitat og lenkeknapp høyre.
 */
$img = get_template_directory_uri() . '/assets/images/';
?>
<!-- wp:group {"className":"section","style":{"color":{"background":"var(--krem-deep)"}}} -->
<div class="wp-block-group section" style="background:var(--krem-deep)"><!-- wp:group {"className":"wrap"} -->
<div class="wp-block-group wrap"><!-- wp:group {"className":"cols-2"} -->
<div class="wp-block-group cols-2">

<!-- wp:group -->
<div class="wp-block-group">
<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"24px"}}} -->
<figure class="wp-block-image size-full" style="border-radius:24px;overflow:hidden;aspect-ratio:3/4"><img src="<?php echo esc_url( $img . 'janett-haug-larsen.jpg' ); ?>" alt="Janett på kjøkkenet" style="width:100%;height:100%;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">Vår historie</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Det begynte ved kjøkkenbenken hjemme.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">I 2018 tok Janett et modig valg, kjøpte et gammelt hus midt på Gravdal, og gjorde hobby til levebrød. Slik ble Sjokoladerommet til: verksted, utsalg, og kafé — alt under ett tak.</p>
<!-- /wp:paragraph -->
<!-- wp:html -->
<blockquote style="margin:28px 0 0;padding:20px 26px;border-left:3px solid var(--accent-deep);background:var(--krem);border-radius:0 14px 14px 0;font-family:'Playfair Display',serif;font-style:italic;font-size:19px;line-height:1.5;color:var(--brun)">
  "Sjokolade er en av mine største laster. Det å lage sjokolade var først en hobby ved kjøkkenbenken, men er nå mer og mer blitt en jobb."
  <div style="margin-top:14px;font-family:Nunito,sans-serif;font-style:normal;font-size:13px;letter-spacing:.12em;text-transform:uppercase;font-weight:700;color:var(--brun-soft)">— Janett Haug Larsen, grunnlegger</div>
</blockquote>
<a class="btn btn-outline" style="margin-top:28px;display:inline-block" href="/om-oss/">Les hele historien →</a>
<!-- /wp:html -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
