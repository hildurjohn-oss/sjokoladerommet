// forside.jsx — Hjem (homepage)

function OpeningChips() {
  return (
    <div style={{ display: 'flex', gap: 10, flexWrap: 'wrap' }}>
      <span className="chip fjord">★ Torsdag–søndag 11–16</span>
      <span className="chip">Gravdalsgata 15, Lofoten</span>
    </div>
  );
}

// ─── Hero: full-bleed striped card with two overlapping photos ───
function HeroFullbleed() {
  return (
    <section className="section" style={{ paddingTop: 32, paddingBottom: 0 }}>
      <div className="wrap">
        <div style={{
          position: 'relative',
          borderRadius: 28,
          overflow: 'hidden',
          background: 'var(--krem-deep)',
          padding: 'clamp(28px, 5vw, 64px)',
        }}>
          {/* Striped background */}
          <div style={{
            position: 'absolute', inset: 0, zIndex: 0,
            backgroundImage: 'repeating-linear-gradient(135deg, var(--accent-soft) 0 28px, var(--krem) 28px 56px)',
            opacity: 0.85,
          }} />

          <div className="hero-grid" style={{ position: 'relative', zIndex: 1 }}>
            {/* Text column */}
            <div>
              <div className="eyebrow" style={{ marginBottom: 18 }}>Sjokoladerommet · Made in Lofoten</div>
              <h1>Sjokolade laget med hjerte, midt&nbsp;i&nbsp;Lofoten.</h1>
              <p className="lead" style={{ maxWidth: 480, marginTop: 22 }}>
                Et lite, fargerikt hus på Gravdal — full av håndlaget sjokolade,
                nybakt kake og kaffe som hjemmelaget. Kom og kos deg hos oss.
              </p>
              <div style={{ display: 'flex', gap: 12, flexWrap: 'wrap', marginTop: 28, marginBottom: 22 }}>
                <a className="btn btn-primary" href="meny.html">Se menyen</a>
                <a className="btn btn-outline" href="bestill-kake.html">Bestill en kake →</a>
              </div>
              <OpeningChips />
            </div>

            {/* Photo column */}
            <div style={{ position: 'relative', minHeight: 320 }}>
              {/* Flower decoration — hidden on mobile via overlay-hide */}
              <div className="overlay-hide" style={{
                position: 'absolute', right: -12, top: -16, zIndex: 2,
                display: 'flex', flexDirection: 'column', alignItems: 'center', gap: 6,
              }}>
                <FlowerMark size={48} color="var(--accent-deep)" />
                <span className="handwrite" style={{ fontSize: 16, color: 'var(--brun-soft)' }}>siden 2018</span>
              </div>

              {/* Main photo */}
              <div style={{
                marginLeft: 'auto',
                boxShadow: '0 30px 60px -30px rgba(59,26,14,.45)',
                transform: 'rotate(2deg)',
                borderRadius: 22, overflow: 'visible',
              }}>
                <FotoSlot id="hero-fullbleed-janett" label="Janett ved disken" aspect="4/5" radius={22} tone="krem" />
              </div>

              {/* Overlapping konfekt photo — hidden on mobile */}
              <div className="overlay-hide" style={{
                position: 'absolute', left: '-4%', bottom: '-6%', width: '54%',
                transform: 'rotate(-4deg)', zIndex: 1,
              }}>
                <FotoSlot
                  id="hero-fullbleed-konfekt" label="konfekt" aspect="1" radius={16} tone="accent"
                  style={{ boxShadow: '0 20px 50px -25px rgba(59,26,14,.4)' }}
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

// ─── Hero: asymmetric two-column ───
function HeroAsymmetric() {
  return (
    <section className="section" style={{ paddingTop: 56, paddingBottom: 32 }}>
      <div className="wrap">
        <div className="hero-grid">
          <div>
            <div className="eyebrow" style={{ marginBottom: 22 }}>Sjokoladerommet · Siden 2018</div>
            <h1>Et fargerikt&nbsp;hus<br />på&nbsp;Gravdal,<br />fullt av sjokolade.</h1>
            <p className="lead" style={{ maxWidth: 480, marginTop: 22 }}>
              Vi lager sjokolade med hjerte og serverer kaffen med glede.
              Mismatchede stoler, friske blomster, og alltid noe nytt i disken.
            </p>
            <div style={{ display: 'flex', gap: 12, flexWrap: 'wrap', marginTop: 28, marginBottom: 22 }}>
              <a className="btn btn-primary" href="meny.html">Se menyen</a>
              <a className="btn btn-outline" href="bestill-kake.html">Bestill en kake →</a>
            </div>
            <OpeningChips />
          </div>

          <div style={{ position: 'relative' }}>
            <FotoSlot id="hero-asym-disken" label="konfekt-disken" aspect="4/5" radius={28} tone="krem" />

            {/* Overlapping small photo — hidden on mobile */}
            <div className="overlay-hide" style={{
              position: 'absolute', left: '-8%', bottom: '-8%', width: '50%',
              transform: 'rotate(-4deg)', zIndex: 1,
            }}>
              <FotoSlot
                id="hero-asym-kaffe" label="kaffekopp" aspect="1" radius={20} tone="accent"
                style={{ boxShadow: '0 20px 50px -25px rgba(59,26,14,.4)' }}
              />
            </div>

            {/* "nybakt" badge — hidden on mobile */}
            <div className="overlay-hide" style={{
              position: 'absolute', right: '-6%', top: '-4%', zIndex: 2,
              background: 'var(--krem)', padding: '10px 16px', borderRadius: 999,
              border: '1.5px solid var(--accent-deep)',
              display: 'flex', alignItems: 'center', gap: 10,
              boxShadow: 'var(--shadow-soft)',
            }}>
              <FlowerMark size={22} color="var(--accent-deep)" />
              <span className="handwrite" style={{ fontSize: 16 }}>nybakt i dag</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

// ─── Hero: centered with three-photo trio ───
function HeroCentered() {
  return (
    <section className="section" style={{ paddingTop: 72, paddingBottom: 32, textAlign: 'center' }}>
      <div className="wrap" style={{ maxWidth: 880 }}>
        <img src="assets/logo.webp" alt="Sjokoladerommet" style={{ width: 120, height: 120, margin: '0 auto 20px' }} />
        <div className="eyebrow" style={{ justifyContent: 'center', marginBottom: 18 }}>Velkommen til Sjokoladerommet</div>
        <h1>Sjokolade laget med hjerte,<br />kaffe servert med glede.</h1>
        <p className="lead" style={{ maxWidth: 560, margin: '22px auto 0' }}>
          Et lite hus på Gravdalsgata 15 — fullt av håndlaget sjokolade, nybakt kake,
          og plass til en god prat. Velkommen, akkurat som du er.
        </p>
        <div style={{ display: 'inline-flex', gap: 12, flexWrap: 'wrap', marginTop: 30, marginBottom: 24, justifyContent: 'center' }}>
          <a className="btn btn-primary" href="meny.html">Se menyen</a>
          <a className="btn btn-outline" href="bestill-kake.html">Bestill en kake →</a>
        </div>
        <div style={{ display: 'flex', gap: 10, justifyContent: 'center', flexWrap: 'wrap' }}>
          <OpeningChips />
        </div>

        {/* Photo trio */}
        <div style={{ display: 'grid', gridTemplateColumns: 'repeat(3, 1fr)', gap: 18, marginTop: 56 }}>
          <FotoSlot id="hero-cent-konfekt" label="konfekt" aspect="3/4" radius={18} tone="accent"
            style={{ transform: 'rotate(-2deg)' }} />
          <FotoSlot id="hero-cent-kaffe" label="kaffe" aspect="3/4" radius={18} tone="fjord"
            style={{ transform: 'translateY(-12px)' }} />
          <FotoSlot id="hero-cent-kake" label="kake" aspect="3/4" radius={18} tone="krem"
            style={{ transform: 'rotate(2deg)' }} />
        </div>
      </div>
    </section>
  );
}

function Hero({ layout }) {
  if (layout === 'asymmetric') return <HeroAsymmetric />;
  if (layout === 'centered')   return <HeroCentered />;
  return <HeroFullbleed />;
}

// ─── Signature products section ───
function Signatur() {
  return (
    <section className="section tight">
      <div className="wrap">
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-end', flexWrap: 'wrap', gap: 20, marginBottom: 36 }}>
          <div>
            <div className="eyebrow" style={{ marginBottom: 14 }}>Faste favoritter</div>
            <h2>Det vi alltid har på lur</h2>
          </div>
          <a className="btn btn-ghost" href="meny.html">Hele menyen →</a>
        </div>

        <div className="cols-3">
          <div className="card" style={{ position: 'relative', overflow: 'hidden' }}>
            <div className="ribbon" style={{ marginBottom: 16 }}>
              <FlowerMark size={16} color="var(--accent-deep)" /> Vår signatur
            </div>
            <FotoSlot id="sig-suksess" label="Suksessterte" aspect="4/3" radius={14} tone="accent"
              style={{ marginBottom: 18 }} />
            <h3>Suksessterte</h3>
            <p className="muted" style={{ marginTop: 8, marginBottom: 0 }}>
              Mandelbunn, smørkrem med ekte vanilje. Denne blir vi spurt om hver eneste uke
              og den vi aldri blir lei av å lage.
            </p>
          </div>

          <div className="card">
            <FotoSlot id="sig-konfektboks" label="konfektboks" aspect="4/3" radius={14} tone="fjord"
              style={{ marginBottom: 18 }} />
            <h3>Håndlaget konfekt</h3>
            <p className="muted" style={{ marginTop: 8, marginBottom: 0 }}>
              Trøfler, karameller og fyldige biter laget her på huset, en boks om gangen.
              Plukk dine egne favoritter i disken.
            </p>
          </div>

          <div className="card">
            <FotoSlot id="sig-kaffe-kake" label="kaffe & kake" aspect="4/3" radius={14} tone="krem"
              style={{ marginBottom: 18 }} />
            <h3>Dagens kaker & kaffe</h3>
            <p className="muted" style={{ marginTop: 8, marginBottom: 0 }}>
              Det som kom ut av ovnen i morges, og en kopp god kaffe.
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}

// ─── Janett's story section ───
function Historie() {
  return (
    <section className="section" style={{ background: 'var(--krem-deep)' }}>
      <div className="wrap">
        <div className="cols-2">
          {/* Photo side */}
          <div style={{ position: 'relative' }}>
            <div style={{ maxWidth: 460 }}>
              <FotoSlot id="hist-janett" label="Janett på kjøkkenet" aspect="3/4" radius={24} tone="krem" />
            </div>

            {/* Overlapping mini card — hidden on mobile */}
            <div className="overlay-hide" style={{
              position: 'absolute', right: -10, bottom: -20, width: '55%',
              transform: 'rotate(3deg)', zIndex: 2,
            }}>
              <div className="card" style={{ padding: 16, maxWidth: 280 }}>
                <FotoSlot id="hist-huset" label="huset på Gravdal" aspect="1" radius={12} tone="accent" />
                <div className="handwrite" style={{ textAlign: 'center', marginTop: 8, fontSize: 15, color: 'var(--brun-soft)' }}>
                  huset, 2018
                </div>
              </div>
            </div>
          </div>

          {/* Text side */}
          <div>
            <div className="eyebrow" style={{ marginBottom: 14 }}>Vår historie</div>
            <h2>Det begynte ved kjøkkenbenken hjemme.</h2>
            <p className="lead" style={{ marginTop: 20 }}>
              I 2018 tok Janett et modig valg, kjøpte et gammelt hus midt på Gravdal,
              og gjorde hobby til levebrød. Slik ble Sjokoladerommet til:
              verksted, utsalg, og kafé — alt under ett tak.
            </p>
            <blockquote style={{
              margin: '28px 0 0', padding: '20px 26px',
              borderLeft: '3px solid var(--accent-deep)',
              background: 'var(--krem)', borderRadius: '0 14px 14px 0',
              fontFamily: '"Playfair Display", serif', fontStyle: 'italic',
              fontSize: 19, lineHeight: 1.5, color: 'var(--brun)',
            }}>
              "Sjokolade er en av mine største laster. Det å lage sjokolade var
              først en hobby ved kjøkkenbenken, men er nå mer og mer blitt en jobb."
              <div style={{
                marginTop: 14, fontFamily: 'Nunito, sans-serif', fontStyle: 'normal',
                fontSize: 13, letterSpacing: '.12em', textTransform: 'uppercase',
                fontWeight: 700, color: 'var(--brun-soft)',
              }}>
                — Janett Haug Larsen, grunnlegger
              </div>
            </blockquote>
            <a className="btn btn-outline" style={{ marginTop: 28 }} href="om-oss.html">Les hele historien →</a>
          </div>
        </div>
      </div>
    </section>
  );
}

// ─── Wellness section ───
function Velvaere() {
  return (
    <section id="velvare" className="section">
      <div className="wrap">
        <div className="cols-2" style={{ alignItems: 'stretch' }}>
          {/* Text side */}
          <div style={{ display: 'flex', flexDirection: 'column', justifyContent: 'center' }}>
            <div className="eyebrow" style={{ marginBottom: 14, color: 'var(--fjord-deep)' }}>
              Velværeavdelingen
            </div>
            <h2>Et hus som tar vare på hele&nbsp;deg.</h2>
            <p className="lead" style={{ marginTop: 18 }}>
              Før Janett begynte med sjokolade utdannet hun seg som hudpleier og velværeterapeut.
              Da huset på Gravdal ble hennes, ble det naturlig å la begge hennes virker
              få plass under samme tak.
            </p>
            <p style={{ marginTop: 8 }}>
              For Janett henger det sammen: sjokolade handler om sansene — smak,
              duft, en liten pause i hverdagen. Det gjør velvære også. Derfor
              finner du, ved siden av kaféen, et stille rom med ansiktsbehandlinger,
              fotpleie og massasje. Kake og kaffe etterpå er inkludert.
            </p>

            <div className="velvare-services">
              {[
                ['Ansiktsbehandling', '60 min · fra 890 kr'],
                ['Klassisk massasje',  '50 min · fra 750 kr'],
                ['Fotpleie',           '45 min · fra 690 kr'],
                ['Sjokoladepause',     'etter hver behandling'],
              ].map(([title, sub]) => (
                <div key={title} className="card-soft" style={{ padding: 18 }}>
                  <div style={{ fontFamily: 'Playfair Display, serif', fontSize: 21, fontWeight: 600 }}>{title}</div>
                  <div className="muted" style={{ fontSize: 14, marginTop: 4 }}>{sub}</div>
                </div>
              ))}
            </div>

            <div style={{ marginTop: 28, display: 'flex', gap: 12, flexWrap: 'wrap', alignItems: 'center' }}>
              <a className="btn btn-primary" href="mailto:hei@sjokoladerommet.no?subject=Time%20hos%20Velv%C3%A6reavdelingen">
                Bestill time
              </a>
              <span className="muted" style={{ fontSize: 14 }}>
                eller ring <b style={{ color: 'var(--brun)' }}>76 08 23 14</b>
              </span>
            </div>
          </div>

          {/* Photo side */}
          <div style={{ position: 'relative' }}>
            <FotoSlot id="velvaere-rom" label="velværerommet" aspect="4/5" radius={24} tone="fjord" />

            {/* Quote badge — hidden on mobile */}
            <div className="overlay-hide" style={{
              position: 'absolute', left: '-6%', top: '8%', zIndex: 2,
              padding: '12px 18px', background: 'var(--krem)',
              borderRadius: 16, boxShadow: 'var(--shadow-soft)',
              border: '1px solid rgba(59,26,14,.08)',
              maxWidth: 220, transform: 'rotate(-3deg)',
            }}>
              <div className="handwrite" style={{ fontSize: 18, lineHeight: 1.4 }}>
                "Kake og kaffe etterpå — det er en del av behandlingen."
              </div>
              <div className="muted" style={{ fontSize: 12, marginTop: 6 }}>— Janett</div>
            </div>

            {/* "Hudpleier" badge — shown on all screens */}
            <div style={{
              position: 'absolute', right: '6%', bottom: '6%', zIndex: 2,
              display: 'flex', alignItems: 'center', gap: 10,
              padding: '10px 16px', background: 'var(--brun)', color: 'var(--krem)',
              borderRadius: 999, fontSize: 13, fontWeight: 700, letterSpacing: '.06em',
            }}>
              <FlowerMark size={18} color="var(--krem)" />
              Janett, hudpleier siden 2003
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

// ─── "Kom innom" CTA ───
function KomInnom() {
  return (
    <section className="section tight">
      <div className="wrap">
        <div className="brun-bg" style={{
          borderRadius: 28,
          padding: 'clamp(36px, 6vw, 80px)',
          position: 'relative',
          overflow: 'hidden',
        }}>
          <div style={{ position: 'absolute', top: -40, right: -40, opacity: 0.18 }}>
            <FlowerMark size={260} color="var(--accent)" />
          </div>
          <div style={{ position: 'relative', maxWidth: 640 }}>
            <h2 style={{ color: 'var(--krem)' }}>Kom innom på torsdag.</h2>
            <p style={{ color: 'rgba(250,245,238,.85)', fontSize: 19, marginTop: 16, maxWidth: 540 }}>
              Vi gleder oss alltid til å se deg. Døra er åpen torsdag til søndag,
              klokka 11 til 16. Ingen timebestilling — bare kom!
            </p>
            <div style={{ display: 'flex', gap: 12, flexWrap: 'wrap', marginTop: 28, alignItems: 'center' }}>
              <a
                className="btn btn-accent"
                href="https://maps.google.com/?q=Gravdalsgata+15,+Gravdal"
                target="_blank"
                rel="noopener noreferrer"
              >Få veibeskrivelse →</a>
              <span style={{ color: 'rgba(250,245,238,.7)', fontSize: 15 }}>Gravdalsgata 15 · 8372 Gravdal</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

// ─── App ───
function App() {
  // Default to fullbleed hero with Villrose accent
  const [heroLayout] = React.useState('fullbleed');
  React.useEffect(() => { applyAccent('villrose'); }, []);

  return (
    <>
      <SideBar current="hjem" />
      <TopBar current="hjem" />
      <main>
        <Hero layout={heroLayout} />
        <Signatur />
        <Historie />
        <Velvaere />
        <KomInnom />
      </main>
      <SiteFooter />
    </>
  );
}

ReactDOM.createRoot(document.getElementById('root')).render(<App />);
