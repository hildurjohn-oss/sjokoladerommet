<?php
/**
 * Title: Tekst og bilde – Med sitat
 * Slug: sjokoladerommet/tekst-og-bilde
 * Categories: sjokoladerommet-seksjon
 * Keywords: tekst, bilde, sitat, to kolonner, historie
 * Description: Tokolonne-seksjon: portrettfoto til venstre, etikett + overskrift + ingress + sitat + knapp til høyre.
 */
?>
<!-- wp:group {"className":"section"} -->
<div class="wp-block-group section">
<!-- wp:group {"className":"wrap"} -->
<div class="wp-block-group wrap">
<!-- wp:group {"className":"cols-2"} -->
<div class="wp-block-group cols-2">

<!-- venstre: bilde -->
<!-- wp:group {} -->
<div class="wp-block-group">
<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full" style="aspect-ratio:3/4;overflow:hidden;border-radius:18px"></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- høyre: tekst -->
<!-- wp:group {} -->
<div class="wp-block-group">

<!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">Vår historie</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Overskrift her</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">Innledende avsnitt som setter stemning. 2–3 setninger om historien eller saken som engasjerer leseren.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"muted"} -->
<p class="muted">Brødtekst her. Beskriv bakgrunn, verdier eller en historie i mer detalj. Kan være 2–3 avsnitt.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<blockquote style="margin:0;border-left:3px solid var(--accent-deep);padding-left:20px;font-family:'Playfair Display',serif;font-style:italic;font-size:19px;line-height:1.55;color:var(--brun)">&ldquo;Sitatttekst her – noe personlig og minneverdig som beskriver hjertet i virksomheten.&rdquo;</blockquote>
<!-- /wp:html -->

<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"btn-primary"} -->
<div class="wp-block-button btn-primary"><a class="wp-block-button__link wp-element-button" href="/om-oss/">Les mer om oss</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
