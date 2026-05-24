// om-oss.jsx — Om oss (Janetts historie)

function OmHero() {
  return (
    <section className="section" style={{ paddingBottom: 32 }}>
      <div className="wrap">
        <div className="cols-2" style={{ alignItems: 'center' }}>
          <div>
            <div className="eyebrow" style={{ marginBottom: 18 }}>Om oss · Janett</div>
            <h1>Et fargerikt hus, en kvinne med mel på forkleet, og en stor svakhet for sjokolade.</h1>
            <p className="lead" style={{ marginTop: 22 }}>
              Sjokoladerommet er Janett. Den varme latteren bak disken,
              det mismatchede serviset, blomstene i vinduskarmen.
              Vi er ikke en kjede — vi er ett hus, på Gravdalsgata 15.
            </p>
          </div>
          <div style={{ position: 'relative' }}>
            <div style={{ maxWidth: 460, marginLeft: 'auto' }}>
              <FotoSlot id="om-janett-portrett" label="Janett, portrett" aspect="3/4" radius={24} tone="krem" />
            </div>
            {/* "Grunnlegger" badge */}
            <div style={{
              position: 'absolute', left: 0, bottom: -10, zIndex: 2,
              padding: '10px 16px', background: 'var(--krem)', borderRadius: 999,
              border: '1.5px solid var(--accent-deep)',
              display: 'flex', alignItems: 'center', gap: 10,
            }}>
              <FlowerMark size={20} color="var(--accent-deep)" />
              <span style={{ fontWeight: 700, fontSize: 13, letterSpacing: '.1em', textTransform: 'uppercase' }}>
                Grunnlegger
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function Timeline() {
  const steps = [
    { y: "1998", t: "Drøm nummer én",   b: "Janett begynner som lærling i hudpleie. Hun forelsker seg i håndverk — og i tanken på et eget sted en gang." },
    { y: "2003", t: "Velværeterapeut",  b: "Fullført utdannelse. Jobber 15 år i ulike institutt rundt i Lofoten. Sjokoladen er fortsatt en hobby — ikke en jobb." },
    { y: "2014", t: "Drøm nummer to",  b: "Kjøkkenbenken hjemme blir for liten. Bestillinger til bursdager, dåp og bryllup begynner å renne inn. Naboer spør om hun ikke burde åpne sted." },
    { y: "2018", t: "Huset på Gravdal", b: "Et modig valg: hun kjøper det gamle huset på Gravdalsgata 15. Verksted og kafé åpner 25. juli. Velværerommet får sin egen plass." },
    { y: "2024", t: "Fortsatt her",     b: "Bygget om kjøkkenet, fått inn flere kaker på menyen, og lært én ting til hvert år. Janett står fortsatt i disken hver torsdag." },
  ];

  return (
    <section className="section" style={{ background: 'var(--krem-deep)' }}>
      <div className="wrap" style={{ maxWidth: 920 }}>
        <div className="eyebrow" style={{ marginBottom: 16 }}>Veien hit</div>
        <h2 style={{ marginBottom: 48 }}>Fra kjøkkenbenk til Gravdalsgata.</h2>

        <ol style={{ listStyle: 'none', padding: 0, margin: 0, display: 'flex', flexDirection: 'column', gap: 0, position: 'relative' }}>
          {/* Vertical timeline line */}
          <div style={{ position: 'absolute', left: 76, top: 8, bottom: 8, width: 2, background: 'var(--accent-soft)' }} />

          {steps.map((s, i) => (
            <li key={i} style={{ display: 'grid', gridTemplateColumns: '68px 1fr', gap: 28, padding: '22px 0', position: 'relative' }}>
              <div style={{
                fontFamily: 'Playfair Display, serif', fontWeight: 600, fontSize: 26,
                color: 'var(--brun)', textAlign: 'right', lineHeight: 1.2,
              }}>{s.y}</div>
              <div style={{ position: 'relative', paddingLeft: 28 }}>
                <span style={{
                  position: 'absolute', left: -8, top: 8, width: 16, height: 16, borderRadius: '50%',
                  background: 'var(--accent-deep)', border: '3px solid var(--krem-deep)',
                }} />
                <h3>{s.t}</h3>
                <p className="muted" style={{ marginTop: 8, marginBottom: 0, maxWidth: 560 }}>{s.b}</p>
              </div>
            </li>
          ))}
        </ol>
      </div>
    </section>
  );
}

function Kjerneverdier() {
  const v = [
    { t: "Varme",          d: "Hver gjest skal kjenne seg sett og velkommen — også om det bare er en kaffe." },
    { t: "Håndverk",       d: "Alt lages i huset. Vi tar ingen snarveier — ikke med sjokolade, ikke med velvære." },
    { t: "Glede",          d: "Vi har fargerike stoler, vi ler høyt, og vi har alltid blomster i vinduet." },
    { t: "Lokal stolthet", d: "Vi er Lofoten. Saltet kommer fra Henningsvær, multene fra Gravdalsmyra." },
  ];
  return (
    <section className="section">
      <div className="wrap">
        <div className="eyebrow" style={{ marginBottom: 14 }}>Det vi tror på</div>
        <h2 style={{ marginBottom: 40 }}>Fire ting vi prøver å huske, hver dag.</h2>
        <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(200px, 1fr))', gap: 18 }}>
          {v.map((it, i) => (
            <div key={i} className="card" style={{ padding: 28, display: 'flex', flexDirection: 'column', gap: 12 }}>
              <FlowerMark size={28} color="var(--accent-deep)" />
              <h3>{it.t}</h3>
              <p className="muted" style={{ margin: 0, fontSize: 15 }}>{it.d}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function Velvaere() {
  return (
    <section className="section" style={{ background: 'var(--fjord)' }}>
      <div className="wrap">
        <div className="cols-2">
          <div>
            <div className="eyebrow" style={{ marginBottom: 14 }}>Velværeavdelingen</div>
            <h2>Hvorfor en velværeavdeling i en sjokoladekafé?</h2>
            <p className="lead" style={{ marginTop: 18 }}>
              Fordi det henger sammen — og fordi det var sjokoladen som kom etterpå.
            </p>
            <p style={{ marginTop: 8 }}>
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
            <a className="btn btn-primary" style={{ marginTop: 20 }} href="index.html#velvare">
              Se behandlingene →
            </a>
          </div>
          <FotoSlot id="om-velvaere" label="velværerommet" aspect="4/5" radius={24} tone="fjord" />
        </div>
      </div>
    </section>
  );
}

function Quote() {
  return (
    <section className="section tight">
      <div className="wrap" style={{ maxWidth: 880, textAlign: 'center' }}>
        <FlowerMark size={40} color="var(--accent-deep)" style={{ margin: '0 auto 16px' }} />
        <blockquote style={{
          fontFamily: 'Playfair Display, serif', fontStyle: 'italic', fontWeight: 500,
          fontSize: 'clamp(20px, 2.4vw, 30px)', lineHeight: 1.35, margin: 0, color: 'var(--brun)',
        }}>
          "Jeg drømte ikke om en kjede eller noe stort. Jeg drømte om et hus
          der folk hadde lyst til å bli litt. Der det luktet sjokolade når
          du åpnet døra. Det er det vi er."
        </blockquote>
        <div className="handwrite" style={{ marginTop: 22, fontSize: 22, color: 'var(--brun-soft)' }}>
          — Janett
        </div>
      </div>
    </section>
  );
}

function App() {
  React.useEffect(() => { applyAccent('villrose'); }, []);

  return (
    <>
      <SideBar current="om" />
      <TopBar current="om" />
      <main>
        <OmHero />
        <Timeline />
        <Kjerneverdier />
        <Velvaere />
        <Quote />
      </main>
      <SiteFooter />
    </>
  );
}

ReactDOM.createRoot(document.getElementById('root')).render(<App />);
