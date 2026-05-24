// shared.jsx — Nav, Footer, FlowerMark, FotoSlot

const ACCENTS = {
  villrose:   { name: "Villrose",   c: "#E8A0AF", deep: "#d27d8e", soft: "#f5d4da" },
  honninggul: { name: "Honninggul", c: "#F5C842", deep: "#d4a818", soft: "#fbe7a3" },
  terrakotta: { name: "Terrakotta", c: "#C97B55", deep: "#a55d3b", soft: "#ecc7b3" },
};

function applyAccent(name) {
  const a = ACCENTS[name] || ACCENTS.villrose;
  const r = document.documentElement;
  r.style.setProperty('--accent', a.c);
  r.style.setProperty('--accent-deep', a.deep);
  r.style.setProperty('--accent-soft', a.soft);
}

// 5-petal flower brand mark
function FlowerMark({ size = 28, color, style }) {
  const c = color || 'currentColor';
  const petals = [];
  for (let i = 0; i < 5; i++) {
    const a = (i * 72 - 90) * Math.PI / 180;
    const cx = 50 + Math.cos(a) * 22;
    const cy = 50 + Math.sin(a) * 22;
    petals.push(<circle key={i} cx={cx} cy={cy} r="14" fill={c} />);
  }
  return (
    <svg viewBox="0 0 100 100" width={size} height={size} style={style} aria-hidden="true">
      {petals}
      <circle cx="50" cy="50" r="10" fill="#F5C842" />
    </svg>
  );
}

// Photo placeholder — shows striped background with label until real photo is placed
function FotoSlot({ id, label, aspect = '4/3', radius = 18, tone = 'krem', style = {}, className = '' }) {
  const toneBg = {
    krem:   'var(--krem-deep)',
    accent: 'var(--accent-soft)',
    fjord:  'var(--fjord)',
  }[tone] || 'var(--krem-deep)';

  return (
    <div
      id={id}
      className={className}
      style={{
        width: '100%',
        aspectRatio: aspect,
        borderRadius: radius,
        background: `repeating-linear-gradient(135deg, ${toneBg} 0 12px, var(--krem) 12px 24px)`,
        border: '1px solid rgba(59,26,14,.08)',
        overflow: 'hidden',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        flexShrink: 0,
        ...style,
      }}
    >
      <span style={{
        background: 'var(--krem)', padding: '6px 10px', borderRadius: 6,
        border: '1px solid rgba(59,26,14,.1)',
        fontSize: 12, fontFamily: 'ui-monospace, monospace',
        color: 'var(--brun-soft)', letterSpacing: '0.04em',
        maxWidth: '80%', textAlign: 'center',
      }}>foto: {label}</span>
    </div>
  );
}

function NavLinks({ current, onClick }) {
  const items = [
    { href: "index.html", label: "Hjem",          id: "hjem"    },
    { href: "meny.html",  label: "Meny",           id: "meny"    },
    { href: "om-oss.html",label: "Om oss",         id: "om"      },
    { href: "bestill-kake.html", label: "Bestill kake", id: "bestill" },
  ];
  return (
    <nav className="nav-links" aria-label="Sidenavigasjon">
      {items.map(it => (
        <a
          key={it.id}
          href={it.href}
          className={current === it.id ? 'current' : ''}
          onClick={onClick}
          aria-current={current === it.id ? 'page' : undefined}
        >{it.label}</a>
      ))}
    </nav>
  );
}

function TopBar({ current }) {
  const [open, setOpen] = React.useState(false);

  // Lock body scroll when mobile menu is open
  React.useEffect(() => {
    document.body.style.overflow = open ? 'hidden' : '';
    return () => { document.body.style.overflow = ''; };
  }, [open]);

  const close = () => setOpen(false);

  return (
    <>
      <header className="topbar">
        <div className="wrap">
          <a href="index.html" className="brandmark" onClick={close}>
            <img src="assets/logo.webp" alt="Sjokoladerommet" />
            <span className="wordmark">Sjokoladerommet</span>
          </a>

          <NavLinks current={current} />

          <button
            className={"hamburger" + (open ? " open" : "")}
            aria-label={open ? "Lukk meny" : "Åpne meny"}
            aria-expanded={open}
            aria-controls="mobile-nav"
            onClick={() => setOpen(o => !o)}
          >
            <span className="bar" />
            <span className="bar" />
            <span className="bar" />
          </button>
        </div>
      </header>

      {/* Mobile navigation overlay */}
      <div
        id="mobile-nav"
        className={"mobile-nav" + (open ? " open" : "")}
        role="dialog"
        aria-modal="true"
        aria-label="Navigasjonsmeny"
      >
        <NavLinks current={current} onClick={close} />
        <div className="meta">
          <b>Sjokoladerommet</b><br />
          Gravdalsgata 15<br />
          8372 Gravdal, Lofoten<br /><br />
          <b>Torsdag–søndag 11–16</b><br />
          Mandag–onsdag: stengt
        </div>
      </div>
    </>
  );
}

function SideBar({ current }) {
  return (
    <aside className="sidebar">
      <a href="index.html" className="brandmark">
        <img src="assets/logo.webp" alt="Sjokoladerommet" />
        <span className="wordmark">Sjokolade­rommet</span>
      </a>
      <NavLinks current={current} />
      <div className="meta">
        Gravdalsgata 15<br />
        8372 Gravdal<br /><br />
        <b style={{ color: 'var(--brun)' }}>Tor–søn 11–16</b><br />
        Man–ons stengt
      </div>
    </aside>
  );
}

function SiteFooter() {
  return (
    <footer className="site-footer">
      <div className="wrap">
        <div className="grid">
          <div>
            <div style={{ display: 'flex', alignItems: 'center', gap: 14, marginBottom: 18 }}>
              <img src="assets/logo.webp" alt="" style={{ width: 72, height: 72, objectFit: 'contain' }} />
              <div>
                <div style={{ fontFamily: 'Playfair Display, serif', fontSize: 24 }}>Sjokoladerommet</div>
                <div style={{ fontSize: 12, letterSpacing: '.2em', textTransform: 'uppercase', opacity: .7, marginTop: 4 }}>Made in Lofoten</div>
              </div>
            </div>
            <p style={{ maxWidth: 360 }}>
              Vi lager sjokolade med hjerte, serverer kaffe med glede, og ønsker alle
              velkommen — akkurat som de er. Kom innom for en prat, en kake og en bit Lofoten.
            </p>
            <p className="handwrite" style={{ marginTop: 18, fontSize: 20, color: 'var(--krem)' }}>— Janett</p>
          </div>

          <div>
            <h4>Åpningstider</h4>
            <ul>
              <li><span>Mandag</span><b>Stengt</b></li>
              <li><span>Tirsdag</span><b>Stengt</b></li>
              <li><span>Onsdag</span><b>Stengt</b></li>
              <li><span>Torsdag</span><b>11–16</b></li>
              <li><span>Fredag</span><b>11–16</b></li>
              <li><span>Lørdag</span><b>11–16</b></li>
              <li><span>Søndag</span><b>11–16</b></li>
            </ul>
          </div>

          <div>
            <h4>Finn oss</h4>
            <p>
              Gravdalsgata 15<br />
              8372 Gravdal<br />
              Lofoten, Norge
            </p>
            <div className="map-card" style={{ marginTop: 14 }}>
              <MiniMap />
              <div className="map-pin">
                <div className="lbl">Sjokoladerommet</div>
                <div className="dot" />
              </div>
            </div>
          </div>
        </div>

        <div className="legal">
          <span>© {new Date().getFullYear()} Sjokoladerommet AS · Org.nr 921 458 102</span>
          <span>Laget med kjærlighet i Gravdal</span>
        </div>
      </div>
    </footer>
  );
}

// Stylised mini-map of Gravdal — fjords + roads, abstract
function MiniMap() {
  return (
    <svg viewBox="0 0 320 200" preserveAspectRatio="none">
      <defs>
        <pattern id="water" width="8" height="8" patternUnits="userSpaceOnUse" patternTransform="rotate(45)">
          <line x1="0" y1="0" x2="0" y2="8" stroke="rgba(255,255,255,.45)" strokeWidth="1" />
        </pattern>
      </defs>
      <rect width="320" height="200" fill="#C5E5E7" />
      <rect width="320" height="200" fill="url(#water)" />
      <path d="M-10,80 C40,60 80,90 130,80 C180,72 210,95 260,90 C300,87 330,100 340,120 L340,210 L-10,210 Z" fill="#FAF5EE" />
      <path d="M-10,40 C30,30 60,55 100,45 C140,35 180,50 220,40 C260,32 300,40 340,55 L340,-10 L-10,-10 Z" fill="#FAF5EE" />
      <path d="M30,40 L55,18 L75,40 Z M85,42 L110,22 L132,42 Z M150,44 L172,26 L195,44 Z" fill="rgba(59,26,14,.12)" />
      <path d="M0,140 Q90,130 160,138 T320,150" stroke="rgba(59,26,14,.35)" strokeWidth="2" fill="none" strokeDasharray="6 4" />
      <path d="M160,138 L165,110" stroke="rgba(59,26,14,.35)" strokeWidth="2" fill="none" />
      <text x="14" y="190" fontFamily="ui-monospace, monospace" fontSize="9" fill="rgba(59,26,14,.55)" letterSpacing="0.1em">GRAVDAL · LOFOTEN</text>
      <text x="232" y="65" fontFamily="ui-monospace, monospace" fontSize="9" fill="rgba(59,26,14,.45)" letterSpacing="0.1em">VESTFJORDEN</text>
    </svg>
  );
}

// Expose to page scripts
Object.assign(window, {
  ACCENTS, applyAccent,
  FlowerMark, FotoSlot,
  NavLinks, TopBar, SideBar, SiteFooter, MiniMap,
});
