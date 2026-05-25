// meny.jsx — Menyside

const SJOKOLADER = [
  { n: "Mørk 70% — Lofotsalt",   d: "Belgisk mørk sjokolade med flakssalt fra Henningsvær.", p: "32 kr/stk" },
  { n: "Bringebær & rose",        d: "Lys sjokolade, bringebærpulver, knust rose. Vår vårfavoritt.", p: "32 kr/stk" },
  { n: "Karamell & havsalt",      d: "Myk karamell i mørk sjokolade. Klassisk og farlig god.", p: "32 kr/stk" },
  { n: "Tjukk trøffel",           d: "Mørk trøffel rullet i kakao. Tre stykker er minimum.", p: "32 kr/stk" },
  { n: "Hasselnøtt & gianduja",   d: "Italiensk skole — nøtter, mørk sjokolade, mye glede.", p: "36 kr/stk" },
  { n: "Krunsj",                  d: "Lys sjokolade med karamelliserte cornflakes. Mest populær hos barna.", p: "32 kr/stk" },
];

const KAKER = [
  { n: "Suksessterte",             d: "Mandelbunn, smørkrem, ekte vanilje. Vår signatur.", p: "65 kr/stykke · 580 kr hel", sig: true },
  { n: "Sjokoladekake med bringebær", d: "Saftig sjokoladebunn, bringebærkrem, rikelig med ganache.", p: "62 kr/stykke" },
  { n: "Verdens beste (egentlig)", d: "Marengs, vaniljekrem, mandler. Janetts oldemor sin oppskrift.", p: "58 kr/stykke" },
  { n: "Gulrotkake",               d: "Mye krydder, ostekrem. Helt rolig — uten rosiner.", p: "55 kr/stykke" },
  { n: "Sitronterte",              d: "Sprø bunn, syrlig sitronkrem, brent marengs på toppen.", p: "62 kr/stykke" },
  { n: "Dagens muffins",           d: "Det vi har lyst til å lage i dag. Spør i disken.", p: "38 kr/stykke" },
];

const DRIKKE = [
  { n: "Kaffe",            d: "Filterkaffe, ettermalt om morgenen.", p: "38 kr" },
  { n: "Espresso",         d: "Solnedgang i en kopp.", p: "32 kr" },
  { n: "Cappuccino / Latte", d: "Med eller uten havremelk.", p: "52 kr" },
  { n: "Varm sjokolade",   d: "Ekte smeltet sjokolade, ikke pulver. Stor forskjell.", p: "62 kr" },
  { n: "Te (utvalg)",      d: "Bli stående litt og les boksene — vi har mange.", p: "38 kr" },
  { n: "Husets saft",      d: "Lages av Janetts mor. Skifter med sesongen.", p: "32 kr" },
];

function MenyHero() {
  return (
    <section className="section" style={{ paddingBottom: 32 }}>
      <div className="wrap">
        <div style={{ maxWidth: 760 }}>
          <div className="eyebrow" style={{ marginBottom: 18 }}>Menyen</div>
          <h1>Det vi har i disken denne uka.</h1>
          <p className="lead" style={{ marginTop: 22 }}>
            Vi baker det vi har lyst på, og noen ting har vi alltid. Sjokoladene
            lages her i huset, kakene står klare når vi åpner kl. 11. Stikk
            innom — vi anbefaler gjerne.
          </p>
          <div style={{ display: 'flex', gap: 10, flexWrap: 'wrap', marginTop: 22 }}>
            <span className="chip fjord">★ Torsdag–søndag 11–16</span>
            <span className="chip">Glutenfritt på bestilling</span>
            <span className="chip">Også vegansk utvalg</span>
          </div>
        </div>
      </div>
    </section>
  );
}

function MenuList({ title, items, accent }) {
  return (
    <div>
      <div style={{
        display: 'flex', alignItems: 'baseline', gap: 14, marginBottom: 24,
        paddingBottom: 14, borderBottom: '1.5px solid var(--brun)',
      }}>
        <FlowerMark size={22} color={accent} />
        <h2 style={{ fontSize: 'clamp(24px, 3vw, 36px)' }}>{title}</h2>
      </div>
      <ul style={{ listStyle: 'none', padding: 0, margin: 0, display: 'flex', flexDirection: 'column', gap: 18 }}>
        {items.map((it, i) => (
          <li key={i} style={{ display: 'grid', gridTemplateColumns: '1fr auto', gap: 16, alignItems: 'baseline' }}>
            <div>
              <div style={{ display: 'flex', alignItems: 'baseline', gap: 10, flexWrap: 'wrap' }}>
                <span style={{ fontFamily: 'Playfair Display, serif', fontWeight: 600, fontSize: 21 }}>{it.n}</span>
                {it.sig && (
                  <span className="chip accent" style={{ padding: '2px 10px', fontSize: 11, letterSpacing: '.1em', textTransform: 'uppercase' }}>
                    Signatur
                  </span>
                )}
              </div>
              <div className="muted" style={{ fontSize: 15, marginTop: 4 }}>{it.d}</div>
            </div>
            <div style={{
              fontFamily: 'Nunito', fontWeight: 700, color: 'var(--brun)',
              fontVariantNumeric: 'tabular-nums', whiteSpace: 'nowrap', fontSize: 15,
            }}>{it.p}</div>
          </li>
        ))}
      </ul>
    </div>
  );
}

function MenySections() {
  return (
    <section className="section" style={{ paddingTop: 24 }}>
      <div className="wrap">
        <div className="meny-grid">
          {/* Left: confectionery + cakes */}
          <div style={{ display: 'flex', flexDirection: 'column', gap: 64 }}>
            <MenuList title="Konfekt & sjokolade" items={SJOKOLADER} accent="var(--accent-deep)" />
            <MenuList title="Kaker"                items={KAKER}      accent="var(--accent-deep)" />
          </div>
          {/* Right: photo + drinks */}
          <div style={{ display: 'flex', flexDirection: 'column', gap: 32 }}>
            <div style={{ width: '100%', aspectRatio: '4/5', borderRadius: 24, overflow: 'hidden', flexShrink: 0 }}>
              <img src="/assets/images/sjokoladerommet-inne.jpg" alt="Disken" style={{ width: '100%', height: '100%', objectFit: 'cover', display: 'block' }} />
            </div>
            <MenuList title="Kaffe & drikke" items={DRIKKE} accent="var(--fjord-deep)" />
          </div>
        </div>
      </div>
    </section>
  );
}

function MenyNote() {
  return (
    <section className="section tight">
      <div className="wrap">
        <div className="card-soft" style={{
          padding: 'clamp(24px, 4vw, 48px)', borderRadius: 24,
          display: 'flex', gap: 24, alignItems: 'center', flexWrap: 'wrap',
        }}>
          <div style={{ flex: '1 1 300px' }}>
            <div className="handwrite" style={{ fontSize: 24, color: 'var(--brun)', marginBottom: 8 }}>
              "Allergi eller noe spesielt? Si fra — vi finner ut av det sammen."
            </div>
            <div className="muted" style={{ fontSize: 14 }}>— Janett</div>
          </div>
          <a className="btn btn-primary" href="bestill-kake.html">Bestill egen kake →</a>
        </div>
      </div>
    </section>
  );
}

function App() {
  React.useEffect(() => { applyAccent('villrose'); }, []);

  return (
    <>
      <SideBar current="meny" />
      <TopBar current="meny" />
      <main>
        <MenyHero />
        <MenySections />
        <MenyNote />
      </main>
      <SiteFooter />
    </>
  );
}

ReactDOM.createRoot(document.getElementById('root')).render(<App />);
