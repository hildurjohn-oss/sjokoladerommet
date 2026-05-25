<?php
/**
 * Title: Hero – Fullskjerm med bilde (Forside)
 * Slug: sjokoladerommet/hero-fullbleed
 * Categories: sjokoladerommet-seksjon
 * Keywords: hero, forside, fullskjerm, bilde, to kolonner
 * Description: Forsidehero med stripet bakgrunn, to-kolonne layout og portrettfoto.
 */
$img = get_template_directory_uri() . '/assets/images/';
?>
<!-- wp:group {"className":"section","style":{"spacing":{"padding":{"top":"32px","bottom":"0"}}}} -->
<div class="wp-block-group section" style="padding-top:32px;padding-bottom:0"><!-- wp:group {"className":"wrap"} -->
<div class="wp-block-group wrap"><!-- wp:group {"className":"hero-forside"} -->
<div class="wp-block-group hero-forside"><!-- wp:group {"className":"cols-2"} -->
<div class="wp-block-group cols-2">

<!-- wp:group -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">Sjokoladerommet · Made in Lofoten</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Sjokolade laget med hjerte, midt&nbsp;i&nbsp;Lofoten.</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">Et lite, fargerikt hus på Gravdal — full av håndlaget sjokolade, nybakt kake og kaffe som hjemmelaget. Kom og kos deg hos oss.</p>
<!-- /wp:paragraph -->
<!-- wp:html -->
<div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:28px;margin-bottom:22px">
<a class="btn btn-primary" href="/meny/">Se menyen</a>
<a class="btn btn-outline" href="/bestill-kake/">Bestill en kake →</a>
</div>
<div style="display:flex;gap:10px;flex-wrap:wrap">
<span class="chip fjord">★ Torsdag–søndag 11–16</span>
<span class="chip">Gravdalsgata 15, Lofoten</span>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group">
<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"hero-portrait-img"} -->
<figure class="wp-block-image size-full hero-portrait-img"><img src="<?php echo esc_url( $img . 'janett-haug-larsen.jpg' ); ?>" alt="Janett ved disken"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
