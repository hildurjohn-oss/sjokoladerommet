<?php
/**
 * Template Name: Om oss
 *
 * Recommended ACF block layout for this page:
 *   1. acf/hero-section  (style: simple — Om oss heading)
 *   2. acf/timeline      (Vår historie — milestones 1998–2024)
 *   3. acf/card-grid     (cols: 4, bg: cream — Verdier/core values)
 *   4. acf/two-column    (services mode, image right — Velværeavdelingen)
 *   5. acf/quote         (Closing quote, bg: cream)
 */
get_header();
$img = get_template_directory_uri() . '/assets/images/';

$timeline = [
    [ 'y' => '1998', 't' => 'Drøm nummer én',   'b' => 'Janett begynner som lærling i hudpleie. Hun forelsker seg i håndverk — og i tanken på et eget sted en gang.' ],
    [ 'y' => '2003', 't' => 'Velværeterapeut',  'b' => 'Fullført utdannelse. Jobber 15 år i ulike institutt rundt i Lofoten. Sjokoladen er fortsatt en hobby — ikke en jobb.' ],
    [ 'y' => '2014', 't' => 'Drøm nummer to',   'b' => 'Kjøkkenbenken hjemme blir for liten. Bestillinger til bursdager, dåp og bryllup begynner å renne inn. Naboer spør om hun ikke burde åpne sted.' ],
    [ 'y' => '2018', 't' => 'Huset på Gravdal', 'b' => 'Et modig valg: hun kjøper det gamle huset på Gravdalsgata 15. Verksted og kafé åpner 25. juli. Velværerommet får sin egen plass.' ],
    [ 'y' => '2024', 't' => 'Fortsatt her',     'b' => 'Bygget om kjøkkenet, fått inn flere kaker på menyen, og lært én ting til hvert år. Janett står fortsatt i disken hver torsdag.' ],
];

$verdier = [
    [ 't' => 'Varme',          'd' => 'Hver gjest skal kjenne seg sett og velkommen — også om det bare er en kaffe.' ],
    [ 't' => 'Håndverk',       'd' => 'Alt lages i huset. Vi tar ingen snarveier — ikke med sjokolade, ikke med velvære.' ],
    [ 't' => 'Glede',          'd' => 'Vi har fargerike stoler, vi ler høyt, og vi har alltid blomster i vinduet.' ],
    [ 't' => 'Lokal stolthet', 'd' => 'Vi er Lofoten. Saltet kommer fra Henningsvær, multene fra Gravdalsmyra.' ],
];
?>

<main>

<!-- ═══ HERO ════════════════════════════════════════════════════════════════ -->
<section class="section" style="padding-bottom:32px">
  <div class="wrap">
    <div class="cols-2" style="align-items:center">

      <div>
        <div class="eyebrow" style="margin-bottom:18px">Om oss · Janett</div>
        <h1>Et fargerikt hus, en kvinne med mel på forkleet, og en stor svakhet for sjokolade.</h1>
        <p class="lead" style="margin-top:22px">
          Sjokoladerommet er Janett. Den varme latteren bak disken,
          det mismatchede serviset, blomstene i vinduskarmen.
          Vi er ikke en kjede — vi er ett hus, på Gravdalsgata 15.
        </p>
      </div>

      <div style="position:relative">
        <div style="max-width:460px;margin-left:auto">
          <div style="width:100%;aspect-ratio:3/4;border-radius:24px;overflow:hidden;flex-shrink:0">
            <img src="<?php echo esc_url( $img . 'janett-haug-larsen.jpg' ); ?>" alt="Janett Haug Larsen" style="width:100%;height:100%;object-fit:cover;display:block">
          </div>
        </div>
        <!-- Grunnlegger badge -->
        <div style="position:absolute;left:0;bottom:-10px;z-index:2;padding:10px 16px;background:var(--krem);border-radius:999px;border:1.5px solid var(--accent-deep);display:flex;align-items:center;gap:10px">
          <?php sjokoladerommet_flower_mark( 20, 'var(--accent-deep)' ); ?>
          <span style="font-weight:700;font-size:13px;letter-spacing:.1em;text-transform:uppercase">Grunnlegger</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ TIDSLINJE ═══════════════════════════════════════════════════════════ -->
<section class="section" style="background:var(--krem-deep)">
  <div class="wrap" style="max-width:920px">
    <div class="eyebrow" style="margin-bottom:16px">Veien hit</div>
    <h2 style="margin-bottom:48px">Fra kjøkkenbenk til Gravdalsgata.</h2>

    <ol style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:0;position:relative">
      <!-- Vertical line -->
      <div style="position:absolute;left:76px;top:8px;bottom:8px;width:2px;background:var(--accent-soft)"></div>

      <?php foreach ( $timeline as $step ) : ?>
        <li style="display:grid;grid-template-columns:68px 1fr;gap:28px;padding:22px 0;position:relative">
          <div style="font-family:'Playfair Display',serif;font-weight:600;font-size:26px;color:var(--brun);text-align:right;line-height:1.2">
            <?php echo esc_html( $step['y'] ); ?>
          </div>
          <div style="position:relative;padding-left:28px">
            <span style="position:absolute;left:-8px;top:8px;width:16px;height:16px;border-radius:50%;background:var(--accent-deep);border:3px solid var(--krem-deep)"></span>
            <h3><?php echo esc_html( $step['t'] ); ?></h3>
            <p class="muted" style="margin-top:8px;margin-bottom:0;max-width:560px"><?php echo esc_html( $step['b'] ); ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- ═══ KJERNEVERDIER ═══════════════════════════════════════════════════════ -->
<section class="section">
  <div class="wrap">
    <div class="eyebrow" style="margin-bottom:14px">Det vi tror på</div>
    <h2 style="margin-bottom:40px">Fire ting vi prøver å huske, hver dag.</h2>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px">
      <?php foreach ( $verdier as $v ) : ?>
        <div class="card" style="padding:28px;display:flex;flex-direction:column;gap:12px">
          <?php sjokoladerommet_flower_mark( 28, 'var(--accent-deep)' ); ?>
          <h3><?php echo esc_html( $v['t'] ); ?></h3>
          <p class="muted" style="margin:0;font-size:15px"><?php echo esc_html( $v['d'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ VELVÆREAVDELINGEN ═══════════════════════════════════════════════════ -->
<section class="section" style="background:var(--fjord)">
  <div class="wrap">
    <div class="cols-2">

      <div>
        <div class="eyebrow" style="margin-bottom:14px">Velværeavdelingen</div>
        <h2>Hvorfor en velværeavdeling i en sjokoladekafé?</h2>
        <p class="lead" style="margin-top:18px">
          Fordi det henger sammen — og fordi det var sjokoladen som kom etterpå.
        </p>
        <p style="margin-top:8px">
          Janett er utdannet velværeterapeut og jobbet i 15 år med hud og hender
          før hun åpnet huset på Gravdal. Da hun fant lokalet hadde det allerede
          et lite, stille rom på baksiden — perfekt for behandlinger. Det føltes
          umulig å la det stå tomt.
        </p>
        <p>
          I dag bruker mange gjester begge deler i samme besøk: en behandling
          først, en kopp kaffe og en bit suksessterte etterpå. Og det er nettopp
          poenget — hele deg blir tatt vare på. Sansene, kroppen, magen.
        </p>
        <a class="btn btn-primary" style="margin-top:20px" href="<?php echo esc_url( home_url( '/#velvare' ) ); ?>">Se behandlingene →</a>
      </div>

      <div style="width:100%;aspect-ratio:4/5;border-radius:24px;overflow:hidden;flex-shrink:0">
        <img src="<?php echo esc_url( $img . 'sjokoladerommet-inne.jpg' ); ?>" alt="Velværerommet" style="width:100%;height:100%;object-fit:cover;display:block">
      </div>

    </div>
  </div>
</section>

<!-- ═══ SITAT ════════════════════════════════════════════════════════════════ -->
<section class="section tight">
  <div class="wrap" style="max-width:880px;text-align:center">
    <?php sjokoladerommet_flower_mark( 40, 'var(--accent-deep)', 'margin:0 auto 16px;display:block' ); ?>
    <blockquote style="font-family:'Playfair Display',serif;font-style:italic;font-weight:500;font-size:clamp(20px,2.4vw,30px);line-height:1.35;margin:0;color:var(--brun)">
      "Jeg drømte ikke om en kjede eller noe stort. Jeg drømte om et hus
      der folk hadde lyst til å bli litt. Der det luktet sjokolade når
      du åpnet døra. Det er det vi er."
    </blockquote>
    <div class="handwrite" style="margin-top:22px;font-size:22px;color:var(--brun-soft)">— Janett</div>
  </div>
</section>

</main>

<?php get_footer(); ?>
