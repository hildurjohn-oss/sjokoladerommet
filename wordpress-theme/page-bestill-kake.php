<?php
/**
 * Template Name: Bestill kake
 * Converts bestill-kake.jsx — multi-step order form (vanilla JS, no React)
 */
get_header();
?>

<main>

<!-- ═══ HERO ════════════════════════════════════════════════════════════════ -->
<section class="section" style="padding-bottom:24px">
  <div class="wrap" style="max-width:760px">
    <div class="eyebrow" style="margin-bottom:18px">Bestill kake</div>
    <h1>La oss bake noe spesielt for deg.</h1>
    <p class="lead" style="margin-top:22px">
      Bursdag, dåp, eller bare en god grunn til kake — vi tar imot bestillinger
      torsdag til søndag, så lenge vi får tre dagers varsel. Vi gleder oss til å høre fra deg.
    </p>
  </div>
</section>

<!-- ═══ BESTILLINGSSKJEMA ═══════════════════════════════════════════════════ -->
<section class="section" style="padding-top:0">
  <div class="wrap">
    <div class="card" style="padding:clamp(24px,4vw,56px);border-radius:28px">

      <!-- ── Success panel (hidden until submitted) ── -->
      <div id="bestill-done" style="display:none;text-align:center;padding:20px 0 40px">
        <?php sjokoladerommet_flower_mark( 60, 'var(--accent-deep)', 'margin:0 auto 20px;display:block' ); ?>
        <h2 style="max-width:600px;margin:0 auto">
          Takk<span class="done-name"></span>! Vi har fått bestillingen din.
        </h2>
        <p class="lead" style="max-width:540px;margin:20px auto 0">
          Du får en bekreftelse på e-post innen 24 timer — og en
          rask telefon hvis vi lurer på noe.
        </p>
        <div class="handwrite" style="font-size:22px;margin-top:28px;color:var(--brun-soft)">
          Vi gleder oss til å se deg!<br>
          <span style="color:var(--accent-deep)">— Janett</span>
        </div>
        <div style="display:flex;gap:12px;justify-content:center;margin-top:36px;flex-wrap:wrap">
          <a class="btn btn-outline" href="<?php echo esc_url( home_url( '/' ) ); ?>">Tilbake til forsiden</a>
        </div>
      </div>

      <!-- ── Form wrap ── -->
      <div id="bestill-form-wrap">

        <!-- Stepper -->
        <div class="stepper" aria-label="Steg i bestillingsprosessen">
          <?php
          $steps = [ 'Anledning', 'Størrelse', 'Smak', 'Ekstra', 'Henting', 'Kontakt' ];
          foreach ( $steps as $i => $label ) :
              $n = $i + 1;
              $last = $n === count( $steps );
          ?>
            <div class="stepper-item">
              <div class="stepper-dot <?php echo $n === 1 ? 'active' : ''; ?>" aria-hidden="true"><?php echo $n; ?></div>
              <span class="stepper-label <?php echo $n === 1 ? 'active' : ''; ?>"><?php echo esc_html( $label ); ?></span>
            </div>
            <?php if ( ! $last ) : ?>
              <div class="stepper-connector" aria-hidden="true"></div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>

        <form id="bestill-form" novalidate>

          <div class="bestilling-grid">

            <!-- ── Form column ── -->
            <div>

              <!-- Step 1: Anledning -->
              <div id="step-1" class="step-panel active">
                <h2 style="margin-bottom:10px">Hva skal vi feire?</h2>
                <p class="muted" style="max-width:560px;margin-bottom:28px">Det hjelper oss å tenke litt rundt smak, størrelse og dekor.</p>
                <div class="choice-grid">
                  <?php
                  $anledninger = [
                      [ 'id' => 'bursdag', 't' => 'Bursdag',         's' => 'Stor eller liten — vi liker begge.' ],
                      [ 'id' => 'daap',    't' => 'Dåp / navnefest', 's' => 'Lyse farger, ofte navn på toppen.' ],
                      [ 'id' => 'konf',    't' => 'Konfirmasjon',    's' => 'Større runder. Vi tar gjerne 30+.' ],
                      [ 'id' => 'bryllup', 't' => 'Bryllup',         's' => 'Snakk med oss god tid i forveien.' ],
                      [ 'id' => 'minne',   't' => 'Minnestund',      's' => 'Diskret, varmt, hjemmebakt.' ],
                      [ 'id' => 'kos',     't' => 'Bare fordi',      's' => 'Den beste grunnen, egentlig.' ],
                  ];
                  foreach ( $anledninger as $a ) : ?>
                    <button type="button" class="choice" data-field="anledning" data-value="<?php echo esc_attr( $a['id'] ); ?>">
                      <span class="ttl"><?php echo esc_html( $a['t'] ); ?></span>
                      <span class="sub"><?php echo esc_html( $a['s'] ); ?></span>
                    </button>
                  <?php endforeach; ?>
                </div>
                <div class="err" id="err-anledning" style="display:none;margin-top:12px"></div>
              </div>

              <!-- Step 2: Størrelse -->
              <div id="step-2" class="step-panel">
                <h2 style="margin-bottom:10px">Hvor mange skal kose seg?</h2>
                <p class="muted" style="max-width:560px;margin-bottom:28px">Vi runder gjerne opp — det er bedre med en bit til overs enn å gå tom.</p>
                <div class="choice-grid">
                  <?php
                  $storrelser = [
                      [ 'id' => 's',  't' => 'Liten',    's' => '6–8 personer',  'p' => '480 kr',       'pop' => false ],
                      [ 'id' => 'm',  't' => 'Mellom',   's' => '10–14 personer', 'p' => '780 kr',       'pop' => true  ],
                      [ 'id' => 'l',  't' => 'Stor',     's' => '16–20 personer', 'p' => '1 180 kr',     'pop' => false ],
                      [ 'id' => 'xl', 't' => 'Festkake', 's' => '25+ personer',  'p' => 'fra 1 580 kr', 'pop' => false ],
                  ];
                  foreach ( $storrelser as $s ) : ?>
                    <button type="button" class="choice" data-field="str" data-value="<?php echo esc_attr( $s['id'] ); ?>" style="position:relative">
                      <?php if ( $s['pop'] ) : ?>
                        <div style="position:absolute;top:-8px;right:12px;background:var(--accent-deep);color:var(--krem);font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:3px 10px;border-radius:999px">Populær</div>
                      <?php endif; ?>
                      <div style="display:flex;justify-content:space-between;align-items:baseline;gap:8px">
                        <span class="ttl"><?php echo esc_html( $s['t'] ); ?></span>
                      </div>
                      <span class="sub"><?php echo esc_html( $s['s'] ); ?></span>
                      <span style="font-weight:700;margin-top:6px;color:var(--brun);display:block"><?php echo esc_html( $s['p'] ); ?></span>
                    </button>
                  <?php endforeach; ?>
                </div>
                <div class="err" id="err-str" style="display:none;margin-top:12px"></div>
              </div>

              <!-- Step 3: Smak -->
              <div id="step-3" class="step-panel">
                <h2 style="margin-bottom:10px">Hvilken smak frister i dag?</h2>
                <p class="muted" style="max-width:560px;margin-bottom:28px">Suksessterten er trygg. Men alt er godt.</p>
                <div class="choice-grid">
                  <?php
                  $smak = [
                      [ 'id' => 'suksess', 't' => 'Suksessterte',           's' => 'Vår signatur — mandel, smørkrem, vanilje.', 'sig' => true  ],
                      [ 'id' => 'sjok',    't' => 'Sjokolade & bringebær', 's' => 'Saftig bunn, ganache, friske bær.',          'sig' => false ],
                      [ 'id' => 'verdens', 't' => 'Verdens beste',          's' => 'Marengs, vaniljekrem, mandler.',             'sig' => false ],
                      [ 'id' => 'sitron',  't' => 'Sitronterte',            's' => 'Syrlig krem, brent marengs.',                'sig' => false ],
                      [ 'id' => 'gulrot',  't' => 'Gulrotkake',             's' => 'Krydder, ostekrem. Uten rosiner.',           'sig' => false ],
                      [ 'id' => 'annet',   't' => 'Noe helt annet',         's' => 'Skriv ønsket i meldingsfeltet.',             'sig' => false ],
                  ];
                  foreach ( $smak as $s ) : ?>
                    <button type="button" class="choice" data-field="smak" data-value="<?php echo esc_attr( $s['id'] ); ?>">
                      <div style="display:flex;justify-content:space-between;align-items:baseline;gap:8px">
                        <span class="ttl"><?php echo esc_html( $s['t'] ); ?></span>
                        <?php if ( $s['sig'] ) : ?>
                          <?php sjokoladerommet_flower_mark( 16, 'var(--accent-deep)' ); ?>
                        <?php endif; ?>
                      </div>
                      <span class="sub"><?php echo esc_html( $s['s'] ); ?></span>
                    </button>
                  <?php endforeach; ?>
                </div>
                <div class="err" id="err-smak" style="display:none;margin-top:12px"></div>
              </div>

              <!-- Step 4: Ekstra -->
              <div id="step-4" class="step-panel">
                <h2 style="margin-bottom:10px">Noe spesielt vi bør vite?</h2>
                <p class="muted" style="max-width:560px;margin-bottom:28px">Allergier, navn på toppen, en favorittfarge — alt teller.</p>
                <div class="field">
                  <label>Hensyn</label>
                  <div style="display:flex;gap:8px;flex-wrap:wrap">
                    <?php foreach ( [ 'Glutenfri', 'Laktosefri', 'Vegansk', 'Nøttefri', 'Eggefri' ] as $a ) : ?>
                      <button type="button" class="choice" data-allergy="<?php echo esc_attr( $a ); ?>" style="padding:8px 14px;font-size:14px;font-weight:600;flex:0 0 auto"><?php echo esc_html( $a ); ?></button>
                    <?php endforeach; ?>
                  </div>
                  <div class="hint">Vi tilpasser så langt det er praktisk mulig — gi oss et lite spillerom.</div>
                </div>
                <div class="field">
                  <label for="field-melding">Melding til oss</label>
                  <textarea id="field-melding" rows="4" placeholder="F.eks. 'Skal stå Mia 5 år på toppen, blå dekor', eller 'Hun elsker bringebær'."></textarea>
                </div>
              </div>

              <!-- Step 5: Henting -->
              <div id="step-5" class="step-panel">
                <h2 style="margin-bottom:10px">Når skal du hente?</h2>
                <p class="muted" style="max-width:560px;margin-bottom:28px">Vi har åpent torsdag til søndag, 11–16. Bestilling må være inne minst 3 dager før.</p>
                <label style="font-size:14px;font-weight:700;display:block;margin-bottom:10px">Dato</label>
                <div class="choice-grid" id="date-grid" style="margin-bottom:22px">
                  <!-- populated by JS -->
                </div>
                <label style="font-size:14px;font-weight:700;display:block;margin-bottom:10px">Tidspunkt</label>
                <div style="display:flex;gap:8px;flex-wrap:wrap">
                  <?php foreach ( [ '11:00', '12:00', '13:00', '14:00', '15:00', '15:45' ] as $t ) : ?>
                    <button type="button" class="choice" data-time="<?php echo esc_attr( $t ); ?>" style="padding:10px 18px;font-size:15px;font-weight:700;flex:0 0 auto"><?php echo esc_html( $t ); ?></button>
                  <?php endforeach; ?>
                </div>
                <div class="err" id="err-henting" style="display:none;margin-top:14px"></div>
              </div>

              <!-- Step 6: Kontakt -->
              <div id="step-6" class="step-panel">
                <h2 style="margin-bottom:10px">Bare litt info til oss</h2>
                <p class="muted" style="max-width:560px;margin-bottom:28px">Vi sender en bekreftelse innen 24 timer. Hvis du heller vil ringe — det går også (76 08 23 14).</p>
                <div class="contact-grid">
                  <div class="field">
                    <label for="field-navn">Navn</label>
                    <input id="field-navn" type="text" placeholder="Fornavn etternavn">
                    <div class="err" id="err-navn" style="display:none"></div>
                  </div>
                  <div class="field">
                    <label for="field-tlf">Telefon</label>
                    <input id="field-tlf" type="tel" placeholder="f.eks. 901 23 456">
                    <div class="err" id="err-tlf" style="display:none"></div>
                  </div>
                </div>
                <div class="field">
                  <label for="field-epost">E-post</label>
                  <input id="field-epost" type="email" placeholder="navn@eksempel.no">
                  <div class="err" id="err-epost" style="display:none"></div>
                </div>
                <label style="display:flex;align-items:center;gap:10px;font-size:14px;color:var(--brun-soft);margin-top:8px;cursor:pointer">
                  <input id="field-nyhetsbrev" type="checkbox" style="width:18px;height:18px;accent-color:var(--accent-deep);cursor:pointer;flex-shrink:0">
                  Hold meg oppdatert med sesongmenyer (sjelden, og aldri kjedelig)
                </label>
              </div>

              <!-- Nav buttons -->
              <div style="display:flex;justify-content:space-between;gap:12px;margin-top:36px;align-items:center">
                <button type="button" id="btn-prev" class="btn btn-ghost" style="opacity:.3;pointer-events:none">← Tilbake</button>
                <button type="button" id="btn-next" class="btn btn-primary">Videre →</button>
              </div>

            </div><!-- /.form-column -->

            <!-- ── Sidebar ── -->
            <aside class="bestilling-sidebar" style="position:sticky;top:100px">

              <div id="summary-box" style="display:none" class="card-soft" style="padding:20px;margin-bottom:24px">
                <div class="eyebrow" style="margin-bottom:12px;font-size:11px">Din bestilling så langt</div>
                <div id="summary-list" style="display:flex;flex-direction:column;gap:6px"></div>
              </div>

              <div class="card-soft" style="padding:22px">
                <?php sjokoladerommet_flower_mark( 26, 'var(--accent-deep)' ); ?>
                <div style="font-family:'Playfair Display',serif;font-size:20px;font-weight:600;margin-top:10px">Hvordan funker det?</div>
                <ol style="padding-left:18px;margin-top:10px;color:var(--brun-soft);font-size:14px;line-height:1.6">
                  <li>Du fyller inn — det tar ca. 2 minutter.</li>
                  <li>Janett ringer eller mailer for å bekrefte.</li>
                  <li>Du henter på Gravdalsgata 15, til avtalt tid.</li>
                  <li>Betaling i kafeen (kort, Vipps, kontant).</li>
                </ol>
                <div class="handwrite" style="font-size:16px;margin-top:12px;color:var(--brun)">"Vi prøver alltid å si ja."</div>
              </div>

            </aside>

          </div><!-- /.bestilling-grid -->
        </form>

      </div><!-- /#bestill-form-wrap -->

    </div><!-- /.card -->
  </div>
</section>

</main>

<?php get_footer(); ?>
