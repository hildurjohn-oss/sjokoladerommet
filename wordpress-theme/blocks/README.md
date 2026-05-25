# Sjokoladerommet — Block Patterns

10 reusable design sections for the WordPress block editor. Each pattern matches the site's visual design and can be inserted, rearranged, and edited without touching code.

## How to use

1. Open any page in the WordPress editor
2. Click **+ Add Block**
3. Go to the **Patterns** tab
4. Select **Sjokoladerommet** from the category list
5. Click a pattern to insert it — the full section appears as editable blocks

---

## Available patterns

| Pattern | Slug | Best for |
|---------|------|----------|
| Hero – Enkel seksjon | `sjokoladerommet/hero-enkel` | Interior page headers (Meny, Om oss) |
| Hero – Fullskjerm med bilde | `sjokoladerommet/hero-fullbleed` | Home page hero |
| Tre kort – Signaturprodukter | `sjokoladerommet/favoritter-tre-kort` | Featured products section |
| Tekst og bilde – Med sitat | `sjokoladerommet/tekst-og-bilde` | Story section with photo |
| Tjenester og bilde | `sjokoladerommet/tjenester-og-bilde` | Wellness/services section |
| CTA – Mørk bakgrunn | `sjokoladerommet/cta-mork` | Page-bottom call to action |
| Menyliste – Kategori med priser | `sjokoladerommet/menyliste-seksjon` | One menu category |
| Tidslinje | `sjokoladerommet/tidslinje` | Milestones / history |
| Verdier – Fire-kolonne kortgrid | `sjokoladerommet/verdier-grid` | Core values or features |
| Sitat – Stort sentrert | `sjokoladerommet/sitat-stor` | Closing quote |

---

## What you can edit visually (without switching to HTML)

Most patterns expose these as standard Gutenberg blocks you can click and type into directly:

- **Eyebrow text** — small uppercase label above headings
- **Headings** (H1, H2, H3) — click to retype
- **Paragraphs** — body text and lead text
- **Images** — click any image block → Replace → pick from media library

The patterns in `blocks-registry.json` list the exact editable blocks for each pattern.

---

## Editing HTML-only elements

Some elements use `wp:html` blocks because of complex or custom styling. To edit these:

1. Click the HTML block in the editor
2. Click the **three-dot menu (⋮)** in the block toolbar → **Edit as HTML** (or press `Ctrl+Shift+Alt+M`)
3. Edit the raw HTML
4. Click **Done** to return to visual view

### Common HTML-only elements by pattern

**Buttons** (in hero-fullbleed, tekst-og-bilde, cta-mork, tjenester-og-bilde):
```html
<a class="btn btn-primary" href="/meny/">Se menyen</a>
```
Change the `href` and the link text.

**Info chips** (in hero-enkel, hero-fullbleed):
```html
<span class="chip fjord">★ Torsdag–søndag 11–16</span>
<span class="chip">Gravdalsgata 15, Lofoten</span>
```
Edit text directly. `.chip.fjord` uses the blue-green color; `.chip` alone uses cream.

**Menu items** (in menyliste-seksjon) — add a new item by duplicating a `<li>`:
```html
<li style="display:grid;grid-template-columns:1fr auto;gap:16px;align-items:baseline">
  <div>
    <div style="font-family:'Playfair Display',serif;font-weight:600;font-size:21px">Produktnavn</div>
    <div class="muted" style="font-size:15px;margin-top:4px">Beskrivelse her.</div>
  </div>
  <div style="font-weight:700;color:var(--brun);white-space:nowrap;font-size:15px">32 kr/stk</div>
</li>
```

**Timeline steps** (in tidslinje) — add a new step by duplicating a `<li>`:
```html
<li style="display:grid;grid-template-columns:68px 1fr;gap:28px;padding:22px 0;position:relative">
  <div style="...">2025</div>
  <div style="...">
    <span style="..."></span><!-- dot marker -->
    <h3>Steg tittel</h3>
    <p class="muted" style="...">Beskrivelse av hva som skjedde.</p>
  </div>
</li>
```

**Services grid** (in tjenester-og-bilde) — edit price/name inside each `.card-soft` div.

---

## Building a full page with patterns

### Forside (homepage)
1. Hero – Fullskjerm med bilde
2. Tre kort – Signaturprodukter
3. Tekst og bilde – Med sitat *(Janetts historie)*
4. Tjenester og bilde *(Velværeavdelingen)*
5. CTA – Mørk bakgrunn

### Meny
1. Hero – Enkel seksjon
2. Menyliste *(Konfekt & sjokolade)*
3. Menyliste *(Kaker)* — insert again, then edit the HTML to change category title + items
4. Menyliste *(Kaffe & drikke)*
5. CTA – Mørk bakgrunn *(or Sitat – Stort sentrert)*

### Om oss
1. Hero – Enkel seksjon
2. Tidslinje
3. Verdier – Fire-kolonne kortgrid
4. Tjenester og bilde
5. Sitat – Stort sentrert

---

## CSS design tokens

All patterns use these variables from `assets/css/main.css`. You can reference them in inline styles or custom HTML:

```css
--brun: #3B1A0E          /* Chocolate brown — main text */
--brun-soft: #5a2e1f     /* Lighter brown — muted text */
--krem: #FAF5EE          /* Cream white — page background */
--krem-deep: #F2EADD     /* Deep cream — section backgrounds */
--fjord: #C5E5E7         /* Fjord teal — chip backgrounds */
--fjord-deep: #9bcfd2    /* Deep teal — eyebrow accents */
--accent: #E8A0AF        /* Rose pink */
--accent-deep: #d27d8e   /* Deep rose — buttons, borders */
--accent-soft: #f5d4da   /* Soft rose — hover states */
```

## Button classes

```html
<a class="btn btn-primary" href="...">Primary (rose)</a>
<a class="btn btn-outline" href="...">Outline</a>
<a class="btn btn-ghost"   href="...">Ghost (no border)</a>
<a class="btn btn-accent"  href="...">Accent (used on dark bg)</a>
```

---

## Custom CSS classes used by patterns

| Class | Description |
|-------|-------------|
| `.cols-2` | 2-column CSS grid, collapses at 820px |
| `.cols-3` | 3-column grid, 2-col at 820px, 1-col at 560px |
| `.cols-4` | 4-column grid, 2-col at 820px, 1-col at 560px |
| `.hero-forside` | Striped diagonal background card (homepage hero) |
| `.section` | Full vertical padding section |
| `.section.tight` | Reduced padding section |
| `.wrap` | Max-width constrained, centered container |
| `.card` | White card with border, radius, shadow |
| `.card-soft` | Cream card, lighter style |
| `.brun-bg` | Dark brown background (used in CTA) |
| `.eyebrow` | Small uppercase label with leading line |
| `.lead` | Larger intro paragraph text |
| `.muted` | Secondary/muted brown text color |
| `.handwrite` | Italic Playfair Display (signature style) |
| `.chip` | Small tag/badge |
| `.chip.fjord` | Tag with teal background |
| `.ribbon` | Accent ribbon label on cards |
| `.velvare-services` | 2-column services grid |
