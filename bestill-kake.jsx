// bestill-kake.jsx — Multi-step cake order form

const ANLEDNINGER = [
  { id: 'bursdag', t: 'Bursdag',        s: 'Stor eller liten — vi liker begge.' },
  { id: 'daap',    t: 'Dåp / navnefest', s: 'Lyse farger, ofte navn på toppen.' },
  { id: 'konf',    t: 'Konfirmasjon',    s: 'Større runder. Vi tar gjerne 30+.' },
  { id: 'bryllup', t: 'Bryllup',         s: 'Snakk med oss god tid i forveien.' },
  { id: 'minne',   t: 'Minnestund',      s: 'Diskret, varmt, hjemmebakt.' },
  { id: 'kos',     t: 'Bare fordi',      s: 'Den beste grunnen, egentlig.' },
];

const STR = [
  { id: 's',  t: 'Liten',    s: '6–8 personer',   p: '480 kr' },
  { id: 'm',  t: 'Mellom',   s: '10–14 personer',  p: '780 kr',       pop: true },
  { id: 'l',  t: 'Stor',     s: '16–20 personer',  p: '1 180 kr' },
  { id: 'xl', t: 'Festkake', s: '25+ personer',    p: 'fra 1 580 kr' },
];

const SMAK = [
  { id: 'suksess', t: 'Suksessterte',           s: 'Vår signatur — mandel, smørkrem, vanilje.', sig: true },
  { id: 'sjok',    t: 'Sjokolade & bringebær', s: 'Saftig bunn, ganache, friske bær.' },
  { id: 'verdens', t: 'Verdens beste',          s: 'Marengs, vaniljekrem, mandler.' },
  { id: 'sitron',  t: 'Sitronterte',            s: 'Syrlig krem, brent marengs.' },
  { id: 'gulrot',  t: 'Gulrotkake',             s: 'Krydder, ostekrem. Uten rosiner.' },
  { id: 'annet',   t: 'Noe helt annet',         s: 'Skriv ønsket i meldingsfeltet.' },
];

const ALLERGIER = ['Glutenfri', 'Laktosefri', 'Vegansk', 'Nøttefri', 'Eggefri'];

// Available pickup dates: min 3 days ahead, only Thu–Sun
function hentingsDatoer() {
  const result = [];
  const start = new Date();
  start.setDate(start.getDate() + 3);
  start.setHours(0, 0, 0, 0);
  for (let i = 0; i < 28 && result.length < 8; i++) {
    const d = new Date(start);
    d.setDate(start.getDate() + i);
    const day = d.getDay(); // 0=Sun 4=Thu 5=Fri 6=Sat
    if (day === 4 || day === 5 || day === 6 || day === 0) result.push(d);
  }
  return result;
}

const UKEDAGER = ['søndag', 'mandag', 'tirsdag', 'onsdag', 'torsdag', 'fredag', 'lørdag'];
const MÅNEDER  = ['jan', 'feb', 'mar', 'apr', 'mai', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'des'];
function fmtDato(d) {
  return `${UKEDAGER[d.getDay()]} ${d.getDate()}. ${MÅNEDER[d.getMonth()]}`;
}
const TIDER = ['11:00', '12:00', '13:00', '14:00', '15:00', '15:45'];

const STEPS = [
  { n: 1, label: 'Anledning' },
  { n: 2, label: 'Størrelse' },
  { n: 3, label: 'Smak' },
  { n: 4, label: 'Ekstra' },
  { n: 5, label: 'Henting' },
  { n: 6, label: 'Kontakt' },
];

function Stepper({ step }) {
  return (
    <div style={{ display: 'flex', alignItems: 'center', gap: 6, marginBottom: 36, flexWrap: 'wrap' }}>
      {STEPS.map((s, i) => {
        const done   = step > s.n;
        const active = step === s.n;
        return (
          <React.Fragment key={s.n}>
            <div style={{ display: 'flex', alignItems: 'center', gap: 8 }}>
              <div style={{
                width: 28, height: 28, borderRadius: '50%',
                display: 'flex', alignItems: 'center', justifyContent: 'center',
                background: done ? 'var(--brun)' : active ? 'var(--accent-deep)' : 'var(--krem-deep)',
                color: (done || active) ? 'var(--krem)' : 'var(--brun-soft)',
                fontWeight: 700, fontSize: 13, transition: 'all .2s ease', flexShrink: 0,
              }}>{done ? '✓' : s.n}</div>
              {/* Show label only for active step on small screens */}
              <span style={{
                fontSize: 13, fontWeight: 600,
                color: active ? 'var(--brun)' : 'var(--brun-soft)',
              }} className={active ? '' : 'stepper-label'}>{s.label}</span>
            </div>
            {i < STEPS.length - 1 && (
              <div style={{ width: 20, height: 2, background: done ? 'var(--brun)' : 'var(--krem-deep)', borderRadius: 2, flexShrink: 0 }} />
            )}
          </React.Fragment>
        );
      })}
    </div>
  );
}

function ChoiceCard({ selected, onClick, title, sub, badge, price, popular }) {
  return (
    <button
      onClick={onClick}
      className={'choice ' + (selected ? 'sel' : '')}
      style={{ textAlign: 'left', position: 'relative' }}
    >
      {popular && (
        <div style={{
          position: 'absolute', top: -8, right: 12,
          background: 'var(--accent-deep)', color: 'var(--krem)',
          fontSize: 10, fontWeight: 700, letterSpacing: '.1em', textTransform: 'uppercase',
          padding: '3px 10px', borderRadius: 999,
        }}>Populær</div>
      )}
      <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'baseline', gap: 8 }}>
        <span className="ttl">{title}</span>
        {badge && <FlowerMark size={16} color="var(--accent-deep)" />}
      </div>
      <span className="sub">{sub}</span>
      {price && <span style={{ fontWeight: 700, marginTop: 6, color: 'var(--brun)', display: 'block' }}>{price}</span>}
    </button>
  );
}

function StepShell({ title, intro, children }) {
  return (
    <div>
      <h2 style={{ marginBottom: 10 }}>{title}</h2>
      {intro && <p className="muted" style={{ maxWidth: 560, marginBottom: 28 }}>{intro}</p>}
      {children}
    </div>
  );
}

function Summary({ data }) {
  const items = [
    ['Anledning', ANLEDNINGER.find(a => a.id === data.anledning)?.t],
    ['Størrelse', (() => { const s = STR.find(s => s.id === data.str); return s ? `${s.t} · ${s.s}` : null; })()],
    ['Smak',      SMAK.find(s => s.id === data.smak)?.t],
    ['Hensyn',    data.allergier?.length ? data.allergier.join(', ') : null],
    ['Henting',   data.dato && data.tid ? `${data.dato} kl. ${data.tid}` : null],
  ].filter(([, v]) => v);

  if (!items.length) return null;
  return (
    <div className="card-soft" style={{ padding: 20, marginBottom: 24 }}>
      <div className="eyebrow" style={{ marginBottom: 12, fontSize: 11 }}>Din bestilling så langt</div>
      <div style={{ display: 'flex', flexDirection: 'column', gap: 6 }}>
        {items.map(([k, v]) => (
          <div key={k} style={{ display: 'flex', justifyContent: 'space-between', gap: 16, fontSize: 14 }}>
            <span style={{ color: 'var(--brun-soft)' }}>{k}</span>
            <b style={{ color: 'var(--brun)', textAlign: 'right' }}>{v}</b>
          </div>
        ))}
      </div>
    </div>
  );
}

function ContactStep({ data, setData, errors }) {
  return (
    <StepShell
      title="Bare litt info til oss"
      intro="Vi sender en bekreftelse innen 24 timer. Hvis du heller vil ringe — det går også (76 08 23 14)."
    >
      <div className="contact-grid">
        <div className="field">
          <label htmlFor="navn">Navn</label>
          <input id="navn" type="text" value={data.navn || ''}
            placeholder="Fornavn etternavn"
            onChange={e => setData({ ...data, navn: e.target.value })} />
          {errors.navn && <div className="err">{errors.navn}</div>}
        </div>
        <div className="field">
          <label htmlFor="tlf">Telefon</label>
          <input id="tlf" type="tel" value={data.tlf || ''}
            placeholder="f.eks. 901 23 456"
            onChange={e => setData({ ...data, tlf: e.target.value })} />
          {errors.tlf && <div className="err">{errors.tlf}</div>}
        </div>
      </div>
      <div className="field">
        <label htmlFor="epost">E-post</label>
        <input id="epost" type="email" value={data.epost || ''}
          placeholder="navn@eksempel.no"
          onChange={e => setData({ ...data, epost: e.target.value })} />
        {errors.epost && <div className="err">{errors.epost}</div>}
      </div>
      <label style={{ display: 'flex', alignItems: 'center', gap: 10, fontSize: 14, color: 'var(--brun-soft)', marginTop: 8, cursor: 'pointer' }}>
        <input type="checkbox" checked={!!data.nyhetsbrev}
          onChange={e => setData({ ...data, nyhetsbrev: e.target.checked })}
          style={{ width: 18, height: 18, accentColor: 'var(--accent-deep)', cursor: 'pointer', flexShrink: 0 }}
        />
        Hold meg oppdatert med sesongmenyer (sjelden, og aldri kjedelig)
      </label>
    </StepShell>
  );
}

function Done({ data, reset }) {
  const valgtKake = SMAK.find(s => s.id === data.smak)?.t || 'kake';
  return (
    <div style={{ textAlign: 'center', padding: '20px 0 40px' }}>
      <FlowerMark size={60} color="var(--accent-deep)" style={{ margin: '0 auto 20px' }} />
      <h2 style={{ maxWidth: 600, margin: '0 auto' }}>
        Takk{data.navn ? `, ${data.navn.split(' ')[0]}` : ''}!
        Vi har fått bestillingen din.
      </h2>
      <p className="lead" style={{ maxWidth: 540, margin: '20px auto 0' }}>
        En {valgtKake.toLowerCase()} til {data.dato || ''}
        {data.tid ? ` kl. ${data.tid}` : ''}.
        Du får en bekreftelse på e-post innen 24 timer — og en
        rask telefon hvis vi lurer på noe.
      </p>
      <div className="handwrite" style={{ fontSize: 22, marginTop: 28, color: 'var(--brun-soft)' }}>
        Vi gleder oss til å se deg!<br />
        <span style={{ color: 'var(--accent-deep)' }}>— Janett</span>
      </div>
      <div style={{ display: 'flex', gap: 12, justifyContent: 'center', marginTop: 36, flexWrap: 'wrap' }}>
        <a className="btn btn-outline" href="index.html">Tilbake til forsiden</a>
        <button className="btn btn-ghost" onClick={reset}>Bestill én til</button>
      </div>
    </div>
  );
}

function Bestilling() {
  const [step, setStep] = React.useState(1);
  const [data, setData] = React.useState({
    anledning: null, str: null, smak: null,
    allergier: [], melding: '',
    dato: null, tid: null,
    navn: '', tlf: '', epost: '', nyhetsbrev: false,
  });
  const [errors, setErrors] = React.useState({});
  const datoer = React.useMemo(hentingsDatoer, []);

  const reset = () => {
    setStep(1);
    setData({ anledning: null, str: null, smak: null, allergier: [], melding: '', dato: null, tid: null, navn: '', tlf: '', epost: '', nyhetsbrev: false });
    setErrors({});
  };

  const next = () => {
    const e = {};
    if (step === 1 && !data.anledning) e.anledning = 'Velg en anledning';
    if (step === 2 && !data.str)       e.str = 'Velg en størrelse';
    if (step === 3 && !data.smak)      e.smak = 'Velg en smak';
    if (step === 5 && (!data.dato || !data.tid)) e.henting = 'Velg dato og tid';
    if (step === 6) {
      if (!data.navn?.trim()) e.navn = 'Navn må fylles ut';
      if (!data.tlf?.trim() || data.tlf.replace(/\D/g, '').length < 8) e.tlf = 'Telefonnummer må ha minst 8 sifre';
      if (!data.epost?.trim() || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(data.epost)) e.epost = 'Sjekk e-postadressen';
    }
    setErrors(e);
    if (Object.keys(e).length === 0) {
      if (step === 6) setStep(7);
      else setStep(step + 1);
    }
  };

  const prev = () => { if (step > 1) { setStep(step - 1); setErrors({}); } };

  const toggleAlg = a => setData({
    ...data,
    allergier: data.allergier.includes(a)
      ? data.allergier.filter(x => x !== a)
      : [...data.allergier, a],
  });

  if (step === 7) return <Done data={data} reset={reset} />;

  return (
    <div>
      <Stepper step={step} />

      <div className="bestilling-grid">
        {/* Form column */}
        <div>
          {step === 1 && (
            <StepShell title="Hva skal vi feire?" intro="Det hjelper oss å tenke litt rundt smak, størrelse og dekor.">
              <div className="choice-grid">
                {ANLEDNINGER.map(a => (
                  <ChoiceCard key={a.id} selected={data.anledning === a.id}
                    onClick={() => setData({ ...data, anledning: a.id })}
                    title={a.t} sub={a.s} />
                ))}
              </div>
              {errors.anledning && <div className="err" style={{ marginTop: 12 }}>{errors.anledning}</div>}
            </StepShell>
          )}

          {step === 2 && (
            <StepShell title="Hvor mange skal kose seg?" intro="Vi runder gjerne opp — det er bedre med en bit til overs enn å gå tom.">
              <div className="choice-grid">
                {STR.map(s => (
                  <ChoiceCard key={s.id} selected={data.str === s.id}
                    onClick={() => setData({ ...data, str: s.id })}
                    title={s.t} sub={s.s} price={s.p} popular={s.pop} />
                ))}
              </div>
              {errors.str && <div className="err" style={{ marginTop: 12 }}>{errors.str}</div>}
            </StepShell>
          )}

          {step === 3 && (
            <StepShell title="Hvilken smak frister i dag?" intro="Suksessterten er trygg. Men alt er godt.">
              <div className="choice-grid">
                {SMAK.map(s => (
                  <ChoiceCard key={s.id} selected={data.smak === s.id}
                    onClick={() => setData({ ...data, smak: s.id })}
                    title={s.t} sub={s.s} badge={s.sig} />
                ))}
              </div>
              {errors.smak && <div className="err" style={{ marginTop: 12 }}>{errors.smak}</div>}
            </StepShell>
          )}

          {step === 4 && (
            <StepShell title="Noe spesielt vi bør vite?" intro="Allergier, navn på toppen, en favorittfarge — alt teller.">
              <div className="field">
                <label>Hensyn</label>
                <div style={{ display: 'flex', gap: 8, flexWrap: 'wrap' }}>
                  {ALLERGIER.map(a => (
                    <button key={a}
                      className={'choice ' + (data.allergier.includes(a) ? 'sel' : '')}
                      onClick={() => toggleAlg(a)}
                      style={{ padding: '8px 14px', fontSize: 14, fontWeight: 600, flex: '0 0 auto' }}
                    >{a}</button>
                  ))}
                </div>
                <div className="hint">Vi tilpasser så langt det er praktisk mulig — gi oss et lite spillerom.</div>
              </div>
              <div className="field">
                <label htmlFor="melding">Melding til oss</label>
                <textarea id="melding" rows="4"
                  value={data.melding}
                  placeholder="F.eks. 'Skal stå Mia 5 år på toppen, blå dekor', eller 'Hun elsker bringebær'."
                  onChange={e => setData({ ...data, melding: e.target.value })}
                />
              </div>
            </StepShell>
          )}

          {step === 5 && (
            <StepShell title="Når skal du hente?" intro="Vi har åpent torsdag til søndag, 11–16. Bestilling må være inne minst 3 dager før.">
              <label style={{ fontSize: 14, fontWeight: 700, display: 'block', marginBottom: 10 }}>Dato</label>
              <div className="choice-grid" style={{ marginBottom: 22 }}>
                {datoer.map((d, i) => {
                  const lbl = fmtDato(d);
                  return (
                    <ChoiceCard key={i}
                      selected={data.dato === lbl}
                      onClick={() => setData({ ...data, dato: lbl })}
                      title={lbl.split(' ').slice(1).join(' ')}
                      sub={lbl.split(' ')[0]}
                    />
                  );
                })}
              </div>
              <label style={{ fontSize: 14, fontWeight: 700, display: 'block', marginBottom: 10 }}>Tidspunkt</label>
              <div style={{ display: 'flex', gap: 8, flexWrap: 'wrap' }}>
                {TIDER.map(t => (
                  <button key={t}
                    className={'choice ' + (data.tid === t ? 'sel' : '')}
                    onClick={() => setData({ ...data, tid: t })}
                    style={{ padding: '10px 18px', fontSize: 15, fontWeight: 700, flex: '0 0 auto' }}
                  >{t}</button>
                ))}
              </div>
              {errors.henting && <div className="err" style={{ marginTop: 14 }}>{errors.henting}</div>}
            </StepShell>
          )}

          {step === 6 && <ContactStep data={data} setData={setData} errors={errors} />}

          {/* Navigation buttons */}
          <div style={{ display: 'flex', justifyContent: 'space-between', gap: 12, marginTop: 36, alignItems: 'center' }}>
            <button className="btn btn-ghost" onClick={prev}
              disabled={step === 1}
              style={{ opacity: step === 1 ? 0.3 : 1, pointerEvents: step === 1 ? 'none' : 'auto' }}
            >← Tilbake</button>
            <button className="btn btn-primary" onClick={next}>
              {step === 6 ? 'Send bestilling' : 'Videre →'}
            </button>
          </div>
        </div>

        {/* Sidebar: summary + how-it-works */}
        <aside className="bestilling-sidebar" style={{ position: 'sticky', top: 100 }}>
          <Summary data={data} />
          <div className="card-soft" style={{ padding: 22 }}>
            <FlowerMark size={26} color="var(--accent-deep)" />
            <div style={{ fontFamily: 'Playfair Display, serif', fontSize: 20, fontWeight: 600, marginTop: 10 }}>
              Hvordan funker det?
            </div>
            <ol style={{ paddingLeft: 18, marginTop: 10, color: 'var(--brun-soft)', fontSize: 14, lineHeight: 1.6 }}>
              <li>Du fyller inn — det tar ca. 2 minutter.</li>
              <li>Janett ringer eller mailer for å bekrefte.</li>
              <li>Du henter på Gravdalsgata 15, til avtalt tid.</li>
              <li>Betaling i kafeen (kort, Vipps, kontant).</li>
            </ol>
            <div className="handwrite" style={{ fontSize: 16, marginTop: 12, color: 'var(--brun)' }}>
              "Vi prøver alltid å si ja."
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}

function BestillingsHero() {
  return (
    <section className="section" style={{ paddingBottom: 24 }}>
      <div className="wrap" style={{ maxWidth: 760 }}>
        <div className="eyebrow" style={{ marginBottom: 18 }}>Bestill kake</div>
        <h1>La oss bake noe spesielt for deg.</h1>
        <p className="lead" style={{ marginTop: 22 }}>
          Bursdag, dåp, eller bare en god grunn til kake — vi tar imot bestillinger
          torsdag til søndag, så lenge vi får tre dagers varsel. Vi gleder oss til å høre fra deg.
        </p>
      </div>
    </section>
  );
}

function App() {
  React.useEffect(() => { applyAccent('villrose'); }, []);

  return (
    <>
      <SideBar current="bestill" />
      <TopBar current="bestill" />
      <main>
        <BestillingsHero />
        <section className="section" style={{ paddingTop: 0 }}>
          <div className="wrap">
            <div className="card" style={{ padding: 'clamp(24px, 4vw, 56px)', borderRadius: 28 }}>
              <Bestilling />
            </div>
          </div>
        </section>
      </main>
      <SiteFooter />
    </>
  );
}

ReactDOM.createRoot(document.getElementById('root')).render(<App />);
