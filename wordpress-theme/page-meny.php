<?php
/**
 * Template Name: Meny
 * Converts meny.jsx — menu page with konfekt, kaker, drikke + photo.
 */
get_header();
$img = get_template_directory_uri() . '/assets/images/';

$sjokolader = [
    [ 'n' => 'Mørk 70% — Lofotsalt',  'd' => 'Belgisk mørk sjokolade med flakssalt fra Henningsvær.',                'p' => '32 kr/stk' ],
    [ 'n' => 'Bringebær & rose',       'd' => 'Lys sjokolade, bringebærpulver, knust rose. Vår vårfavoritt.',         'p' => '32 kr/stk' ],
    [ 'n' => 'Karamell & havsalt',     'd' => 'Myk karamell i mørk sjokolade. Klassisk og farlig god.',               'p' => '32 kr/stk' ],
    [ 'n' => 'Tjukk trøffel',          'd' => 'Mørk trøffel rullet i kakao. Tre stykker er minimum.',                 'p' => '32 kr/stk' ],
    [ 'n' => 'Hasselnøtt & gianduja',  'd' => 'Italiensk skole — nøtter, mørk sjokolade, mye glede.',                'p' => '36 kr/stk' ],
    [ 'n' => 'Krunsj',                 'd' => 'Lys sjokolade med karamelliserte cornflakes. Mest populær hos barna.', 'p' => '32 kr/stk' ],
];

$kaker = [
    [ 'n' => 'Suksessterte',                'd' => 'Mandelbunn, smørkrem, ekte vanilje. Vår signatur.',             'p' => '65 kr/stykke · 580 kr hel', 'sig' => true ],
    [ 'n' => 'Sjokoladekake med bringebær', 'd' => 'Saftig sjokoladebunn, bringebærkrem, rikelig med ganache.',    'p' => '62 kr/stykke' ],
    [ 'n' => 'Verdens beste (egentlig)',     'd' => 'Marengs, vaniljekrem, mandler. Janetts oldemor sin oppskrift.','p' => '58 kr/stykke' ],
    [ 'n' => 'Gulrotkake',                  'd' => 'Mye krydder, ostekrem. Helt rolig — uten rosiner.',            'p' => '55 kr/stykke' ],
    [ 'n' => 'Sitronterte',                 'd' => 'Sprø bunn, syrlig sitronkrem, brent marengs på toppen.',       'p' => '62 kr/stykke' ],
    [ 'n' => 'Dagens muffins',              'd' => 'Det vi har lyst til å lage i dag. Spør i disken.',             'p' => '38 kr/stykke' ],
];

$drikke = [
    [ 'n' => 'Kaffe',              'd' => 'Filterkaffe, ettermalt om morgenen.',                  'p' => '38 kr' ],
    [ 'n' => 'Espresso',           'd' => 'Solnedgang i en kopp.',                               'p' => '32 kr' ],
    [ 'n' => 'Cappuccino / Latte', 'd' => 'Med eller uten havremelk.',                           'p' => '52 kr' ],
    [ 'n' => 'Varm sjokolade',     'd' => 'Ekte smeltet sjokolade, ikke pulver. Stor forskjell.','p' => '62 kr' ],
    [ 'n' => 'Te (utvalg)',        'd' => 'Bli stående litt og les boksene — vi har mange.',     'p' => '38 kr' ],
    [ 'n' => 'Husets saft',        'd' => 'Lages av Janetts mor. Skifter med sesongen.',         'p' => '32 kr' ],
];
?>

<main>

<!-- ═══ HERO ════════════════════════════════════════════════════════════════ -->
<?php get_template_part( 'template-parts/hero-section', null, [
    'eyebrow' => 'Menyen',
    'title'   => 'Det vi har i disken denne uka.',
    'lead'    => 'Vi baker det vi har lyst på, og noen ting har vi alltid. Sjokoladene lages her i huset, kakene står klare når vi åpner kl. 11. Stikk innom — vi anbefaler gjerne.',
    'chips'   => [
        [ 'text' => '★ Torsdag–søndag 11–16', 'class' => 'fjord' ],
        [ 'text' => 'Glutenfritt på bestilling' ],
        [ 'text' => 'Også vegansk utvalg' ],
    ],
    'pb' => '32px',
] ); ?>

<!-- ═══ MENYINNHOLD ═════════════════════════════════════════════════════════ -->
<section class="section" style="padding-top:24px">
  <div class="wrap">
    <div class="meny-grid">

      <!-- Left column: konfekt + kaker -->
      <div style="display:flex;flex-direction:column;gap:64px">
        <?php get_template_part( 'template-parts/menu-list', null, [
            'title'  => 'Konfekt & sjokolade',
            'items'  => $sjokolader,
            'accent' => 'var(--accent-deep)',
        ] ); ?>
        <?php get_template_part( 'template-parts/menu-list', null, [
            'title'  => 'Kaker',
            'items'  => $kaker,
            'accent' => 'var(--accent-deep)',
        ] ); ?>
      </div>

      <!-- Right column: photo + drikke -->
      <div style="display:flex;flex-direction:column;gap:32px">
        <div style="width:100%;aspect-ratio:4/5;border-radius:24px;overflow:hidden;flex-shrink:0">
          <img src="<?php echo esc_url( $img . 'sjokoladerommet-inne.jpg' ); ?>"
               alt="Disken"
               style="width:100%;height:100%;object-fit:cover;display:block">
        </div>
        <?php get_template_part( 'template-parts/menu-list', null, [
            'title'  => 'Kaffe & drikke',
            'items'  => $drikke,
            'accent' => 'var(--fjord-deep)',
        ] ); ?>
      </div>

    </div>
  </div>
</section>

<!-- ═══ JANETT-SITAT / CTA ═══════════════════════════════════════════════════ -->
<section class="section tight">
  <div class="wrap">
    <div class="card-soft" style="padding:clamp(24px,4vw,48px);border-radius:24px;display:flex;gap:24px;align-items:center;flex-wrap:wrap">
      <div style="flex:1 1 300px">
        <div class="handwrite" style="font-size:24px;color:var(--brun);margin-bottom:8px">
          "Allergi eller noe spesielt? Si fra — vi finner ut av det sammen."
        </div>
        <div class="muted" style="font-size:14px">— Janett</div>
      </div>
      <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/bestill-kake/' ) ); ?>">Bestill egen kake →</a>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
