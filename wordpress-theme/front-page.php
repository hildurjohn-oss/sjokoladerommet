<?php
/**
 * front-page.php — Homepage (auto-used by WordPress when a static front page is set).
 *
 * Recommended ACF block layout for this page:
 *   1. acf/hero-section   (style: fullbleed — portrait photo, buttons, chips)
 *   2. acf/card-grid      (cols: 3 — Signaturprodukter)
 *   3. acf/two-column     (text mode, image left — Janetts historie with quote)
 *   4. acf/two-column     (services mode, image right — Velværeavdelingen)
 *   5. acf/cta            (Besøk oss — address, map button)
 */
get_header();
$img = get_template_directory_uri() . '/assets/images/';
?>

<main>

<!-- ═══ HERO ════════════════════════════════════════════════════════════════ -->
<section class="section" style="padding-top:32px;padding-bottom:0">
  <div class="wrap">
    <div style="position:relative;border-radius:28px;overflow:hidden;background:var(--krem-deep);padding:clamp(28px,5vw,64px)">

      <!-- Striped background -->
      <div style="position:absolute;inset:0;z-index:0;background-image:repeating-linear-gradient(135deg,var(--accent-soft) 0 28px,var(--krem) 28px 56px);opacity:.85"></div>

      <div class="hero-grid" style="position:relative;z-index:1">

        <!-- Text column -->
        <div>
          <div class="eyebrow" style="margin-bottom:18px">Sjokoladerommet · Made in Lofoten</div>
          <h1>Sjokolade laget med hjerte, midt&nbsp;i&nbsp;Lofoten.</h1>
          <p class="lead" style="max-width:480px;margin-top:22px">
            Et lite, fargerikt hus på Gravdal — full av håndlaget sjokolade,
            nybakt kake og kaffe som hjemmelaget. Kom og kos deg hos oss.
          </p>
          <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:28px;margin-bottom:22px">
            <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/meny/' ) ); ?>">Se menyen</a>
            <a class="btn btn-outline" href="<?php echo esc_url( home_url( '/bestill-kake/' ) ); ?>">Bestill en kake →</a>
          </div>
          <div style="display:flex;gap:10px;flex-wrap:wrap">
            <span class="chip fjord">★ Torsdag–søndag 11–16</span>
            <span class="chip">Gravdalsgata 15, Lofoten</span>
          </div>
        </div>

        <!-- Photo column -->
        <div style="position:relative;min-height:320px">

          <!-- Flower decoration (desktop only) -->
          <div class="overlay-hide" style="position:absolute;right:-12px;top:-16px;z-index:2;display:flex;flex-direction:column;align-items:center;gap:6px">
            <?php sjokoladerommet_flower_mark( 48, 'var(--accent-deep)' ); ?>
            <span class="handwrite" style="font-size:16px;color:var(--brun-soft)">siden 2018</span>
          </div>

          <!-- Main photo -->
          <div style="margin-left:auto;box-shadow:0 30px 60px -30px rgba(59,26,14,.45);transform:rotate(2deg);border-radius:22px;overflow:hidden">
            <div style="width:100%;aspect-ratio:4/5;overflow:hidden;flex-shrink:0">
              <img src="<?php echo esc_url( $img . 'janett-haug-larsen.jpg' ); ?>" alt="Janett ved disken" style="width:100%;height:100%;object-fit:cover;display:block">
            </div>
          </div>

          <!-- Overlapping konfekt photo (desktop only) -->
          <div class="overlay-hide" style="position:absolute;left:-4%;bottom:-6%;width:54%;transform:rotate(-4deg);z-index:1">
            <div style="width:100%;aspect-ratio:1;border-radius:16px;overflow:hidden;flex-shrink:0;box-shadow:0 20px 50px -25px rgba(59,26,14,.4)">
              <img src="<?php echo esc_url( $img . 'sjokoladerommet-hus.jpg' ); ?>" alt="Konfekt" style="width:100%;height:100%;object-fit:cover;display:block">
            </div>
          </div>

        </div>
      </div><!-- /.hero-grid -->
    </div>
  </div>
</section>

<!-- ═══ SIGNATUR ════════════════════════════════════════════════════════════ -->
<section class="section tight">
  <div class="wrap">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:20px;margin-bottom:36px">
      <div>
        <div class="eyebrow" style="margin-bottom:14px">Faste favoritter</div>
        <h2>Det vi alltid har på lur</h2>
      </div>
      <a class="btn btn-ghost" href="<?php echo esc_url( home_url( '/meny/' ) ); ?>">Hele menyen →</a>
    </div>

    <div class="cols-3">
      <?php
      $signatur_cards = [
          [
              'image'       => $img . 'sjokoladerommet-hus.jpg',
              'alt'         => 'Suksessterte',
              'title'       => 'Suksessterte',
              'description' => 'Mandelbunn, smørkrem med ekte vanilje. Denne blir vi spurt om hver eneste uke og den vi aldri blir lei av å lage.',
              'ribbon'      => 'Vår signatur',
          ],
          [
              'image'       => $img . 'sjokoladerommet-hus.jpg',
              'alt'         => 'Håndlaget konfekt',
              'title'       => 'Håndlaget konfekt',
              'description' => 'Trøfler, karameller og fyldige biter laget her på huset, en boks om gangen. Plukk dine egne favoritter i disken.',
          ],
          [
              'image'       => $img . 'sjokoladerommet-inne.jpg',
              'alt'         => 'Kaffe og kake',
              'title'       => 'Dagens kaker & kaffe',
              'description' => 'Det som kom ut av ovnen i morges, og en kopp god kaffe.',
          ],
      ];
      foreach ( $signatur_cards as $card ) :
          get_template_part( 'template-parts/card', null, $card );
      endforeach;
      ?>
    </div>
  </div>
</section>

<!-- ═══ JANETTS HISTORIE ════════════════════════════════════════════════════ -->
<section class="section" style="background:var(--krem-deep)">
  <div class="wrap">
    <div class="cols-2">

      <!-- Photo side -->
      <div style="position:relative">
        <div style="max-width:460px">
          <div style="width:100%;aspect-ratio:3/4;border-radius:24px;overflow:hidden;flex-shrink:0">
            <img src="<?php echo esc_url( $img . 'janett-haug-larsen.jpg' ); ?>" alt="Janett på kjøkkenet" style="width:100%;height:100%;object-fit:cover;display:block">
          </div>
        </div>

        <!-- Overlapping mini-card (desktop only) -->
        <div class="overlay-hide" style="position:absolute;right:-10px;bottom:-20px;width:55%;transform:rotate(3deg);z-index:2">
          <div class="card" style="padding:16px;max-width:280px">
            <div style="width:100%;aspect-ratio:1;border-radius:12px;overflow:hidden;flex-shrink:0">
              <img src="<?php echo esc_url( $img . 'sjokoladerommet-hus.jpg' ); ?>" alt="Huset på Gravdal" style="width:100%;height:100%;object-fit:cover;display:block">
            </div>
            <div class="handwrite" style="text-align:center;margin-top:8px;font-size:15px;color:var(--brun-soft)">huset, 2018</div>
          </div>
        </div>
      </div>

      <!-- Text side -->
      <div>
        <div class="eyebrow" style="margin-bottom:14px">Vår historie</div>
        <h2>Det begynte ved kjøkkenbenken hjemme.</h2>
        <p class="lead" style="margin-top:20px">
          I 2018 tok Janett et modig valg, kjøpte et gammelt hus midt på Gravdal,
          og gjorde hobby til levebrød. Slik ble Sjokoladerommet til:
          verksted, utsalg, og kafé — alt under ett tak.
        </p>
        <blockquote style="margin:28px 0 0;padding:20px 26px;border-left:3px solid var(--accent-deep);background:var(--krem);border-radius:0 14px 14px 0;font-family:'Playfair Display',serif;font-style:italic;font-size:19px;line-height:1.5;color:var(--brun)">
          "Sjokolade er en av mine største laster. Det å lage sjokolade var
          først en hobby ved kjøkkenbenken, men er nå mer og mer blitt en jobb."
          <div style="margin-top:14px;font-family:Nunito,sans-serif;font-style:normal;font-size:13px;letter-spacing:.12em;text-transform:uppercase;font-weight:700;color:var(--brun-soft)">
            — Janett Haug Larsen, grunnlegger
          </div>
        </blockquote>
        <a class="btn btn-outline" style="margin-top:28px" href="<?php echo esc_url( home_url( '/om-oss/' ) ); ?>">Les hele historien →</a>
      </div>

    </div>
  </div>
</section>

<!-- ═══ VELVÆREAVDELINGEN ═══════════════════════════════════════════════════ -->
<section id="velvare" class="section">
  <div class="wrap">
    <div class="cols-2" style="align-items:stretch">

      <!-- Text side -->
      <div style="display:flex;flex-direction:column;justify-content:center">
        <div class="eyebrow" style="margin-bottom:14px;color:var(--fjord-deep)">Velværeavdelingen</div>
        <h2>Et hus som tar vare på hele&nbsp;deg.</h2>
        <p class="lead" style="margin-top:18px">
          Før Janett begynte med sjokolade utdannet hun seg som hudpleier og velværeterapeut.
          Da huset på Gravdal ble hennes, ble det naturlig å la begge hennes virker
          få plass under samme tak.
        </p>
        <p style="margin-top:8px">
          For Janett henger det sammen: sjokolade handler om sansene — smak,
          duft, en liten pause i hverdagen. Det gjør velvære også. Derfor
          finner du, ved siden av kaféen, et stille rom med ansiktsbehandlinger,
          fotpleie og massasje. Kake og kaffe etterpå er inkludert.
        </p>
        <div class="velvare-services">
          <?php
          $services = [
            [ 'Ansiktsbehandling', '60 min · fra 890 kr' ],
            [ 'Klassisk massasje',  '50 min · fra 750 kr' ],
            [ 'Fotpleie',           '45 min · fra 690 kr' ],
            [ 'Sjokoladepause',     'etter hver behandling' ],
          ];
          foreach ( $services as $s ) : ?>
            <div class="card-soft" style="padding:18px">
              <div style="font-family:'Playfair Display',serif;font-size:21px;font-weight:600"><?php echo esc_html( $s[0] ); ?></div>
              <div class="muted" style="font-size:14px;margin-top:4px"><?php echo esc_html( $s[1] ); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
        <div style="margin-top:28px;display:flex;gap:12px;flex-wrap:wrap;align-items:center">
          <a class="btn btn-primary" href="mailto:hei@sjokoladerommet.no?subject=Time%20hos%20Velv%C3%A6reavdelingen">Bestill time</a>
          <span class="muted" style="font-size:14px">eller ring <b style="color:var(--brun)">76 08 23 14</b></span>
        </div>
      </div>

      <!-- Photo side -->
      <div style="position:relative">
        <div style="width:100%;aspect-ratio:4/5;border-radius:24px;overflow:hidden;flex-shrink:0">
          <img src="<?php echo esc_url( $img . 'sjokoladerommet-inne.jpg' ); ?>" alt="Velværerommet" style="width:100%;height:100%;object-fit:cover;display:block">
        </div>

        <!-- Quote badge (desktop only) -->
        <div class="overlay-hide" style="position:absolute;left:-6%;top:8%;z-index:2;padding:12px 18px;background:var(--krem);border-radius:16px;box-shadow:var(--shadow-soft);border:1px solid rgba(59,26,14,.08);max-width:220px;transform:rotate(-3deg)">
          <div class="handwrite" style="font-size:18px;line-height:1.4">
            "Kake og kaffe etterpå — det er en del av behandlingen."
          </div>
          <div class="muted" style="font-size:12px;margin-top:6px">— Janett</div>
        </div>

        <!-- Hudpleier badge -->
        <div style="position:absolute;right:6%;bottom:6%;z-index:2;display:flex;align-items:center;gap:10px;padding:10px 16px;background:var(--brun);color:var(--krem);border-radius:999px;font-size:13px;font-weight:700;letter-spacing:.06em">
          <?php sjokoladerommet_flower_mark( 18, 'var(--krem)' ); ?>
          Janett, hudpleier siden 2003
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ KOM INNOM ════════════════════════════════════════════════════════════ -->
<section class="section tight">
  <div class="wrap">
    <div class="brun-bg" style="border-radius:28px;padding:clamp(36px,6vw,80px);position:relative;overflow:hidden">
      <div style="position:absolute;top:-40px;right:-40px;opacity:.18">
        <?php sjokoladerommet_flower_mark( 260, 'var(--accent)' ); ?>
      </div>
      <div style="position:relative;max-width:640px">
        <h2 style="color:var(--krem)">Kom innom på torsdag.</h2>
        <p style="color:rgba(250,245,238,.85);font-size:19px;margin-top:16px;max-width:540px">
          Vi gleder oss alltid til å se deg. Døra er åpen torsdag til søndag,
          klokka 11 til 16. Ingen timebestilling — bare kom!
        </p>
        <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:28px;align-items:center">
          <a class="btn btn-accent" href="https://maps.google.com/?q=Gravdalsgata+15,+Gravdal" target="_blank" rel="noopener noreferrer">Få veibeskrivelse →</a>
          <span style="color:rgba(250,245,238,.7);font-size:15px">Gravdalsgata 15 · 8372 Gravdal</span>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
