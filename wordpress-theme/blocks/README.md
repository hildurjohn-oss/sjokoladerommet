# Sjokoladerommet — ACF Custom Blocks

8 ACF-powered blocks for the WordPress block editor. Each block appears under the **Sjokoladerommet** category in the block inserter. All fields are editable in the block sidebar — no HTML editing required.

## Requirements

- **Advanced Custom Fields PRO** — Repeater fields require ACF Pro.
- ACF Pro must be installed and activated before these blocks appear.

---

## How to use

1. Open any page in the WordPress editor
2. Click **+ Add Block**
3. Search for a block name, or scroll to **Sjokoladerommet** in the category list
4. Click the block to insert it
5. Edit all content in the right-hand **sidebar panel** (no code editing needed)

---

## Available blocks

| Block | ID | Best for |
|-------|----|----------|
| Hero – Seksjon | `acf/hero-section` | Page heroes — two modes: simple header or fullbleed with photo |
| Tekstseksjon | `acf/text-section` | Standalone heading + body text |
| Menyliste | `acf/menu-list` | One menu category with items and prices |
| Tidslinje | `acf/timeline` | Milestone/history timeline |
| Kortgrid | `acf/card-grid` | 3- or 4-column image card grid |
| Sitat | `acf/quote` | Large centered quote with attribution |
| CTA – Mørk bakgrunn | `acf/cta` | Dark CTA section at the bottom of pages |
| To kolonner – Bilde og tekst | `acf/two-column` | Photo + text, or photo + services list |

---

## Block details

### Hero – Seksjon (`acf/hero-section`)

Two layout modes selected in the sidebar:

**Simple** — Centered H1 with eyebrow and lead text. Use on Meny, Om oss, Bestill kake.

**Fullbleed** — Diagonal-stripe card with portrait photo, two buttons, and info chips. Use on the homepage.

Fields:
- **Style** — `simple` or `fullbleed`
- **Eyebrow** — Short label above title
- **Title** — H1 heading
- **Lead** — 2–3 sentence intro
- **Image** — Portrait photo (fullbleed only, 4:5 ratio recommended)
- **Button 1 / Button 2** — Label and URL (fullbleed only)
- **Chips** (repeater) — Info chips with text and color (`default` = cream, `fjord` = teal)

---

### Tekstseksjon (`acf/text-section`)

Generic centered or left-aligned content section.

Fields:
- **Eyebrow**, **Title** (H2), **Lead**, **Body**
- **Accent** — `rose` or `fjord` (eyebrow color)
- **Align** — `left` or `center`

---

### Menyliste (`acf/menu-list`)

One menu category. Insert multiple times for Konfekt, Kaker, Drikke.

Fields:
- **Eyebrow**, **Title** (H2), **Accent** (FlowerMark color)
- **Items** (repeater): Name, Description, Price, Signature badge (toggle)

---

### Tidslinje (`acf/timeline`)

Vertical timeline with dot markers.

Fields:
- **Eyebrow**, **Title** (H2)
- **Items** (repeater): Year, Step title (H3), Description

---

### Kortgrid (`acf/card-grid`)

Responsive card grid.

Fields:
- **Eyebrow**, **Title** (H2)
- **Cols** — `3` or `4` columns
- **Background** — `white` or `cream`
- **Cards** (repeater): Image, Ribbon badge, Card title (H3), Description

---

### Sitat (`acf/quote`)

Large centered blockquote with FlowerMark.

Fields:
- **Quote** — Quote text (quotation marks added automatically)
- **Citation** — Author/source
- **Accent** — FlowerMark color
- **Background** — `white` or `cream`

---

### CTA – Mørk bakgrunn (`acf/cta`)

Dark brown section, always full-width. Use at the bottom of pages.

Fields:
- **Title** (white H2), **Body**
- **Button 1 / Button 2** — Label and URL
- **Address** — Small text below buttons

---

### To kolonner – Bilde og tekst (`acf/two-column`)

Two-column layout. Select **Text mode** in the sidebar:

**Text mode** — Photo + eyebrow, heading, lead, body, optional quote, button.

**Services mode** — Photo + services grid (name, description, price per service), booking button, optional extra text (e.g. phone number).

Fields:
- **Text mode** — `text` or `services`
- **Eyebrow**, **Title** (H2), **Lead**, **Body**
- **Quote text** (text mode), **Button label/URL** (text mode)
- **Image**, **Image side** (`left` or `right`)
- **Accent**, **Background**
- **Services** (repeater, services mode): Service name, Description, Price
- **Contact button** label/URL + extra text (services mode)

---

## Building a full page

### Forside (homepage)
1. Hero – Seksjon (fullbleed)
2. Kortgrid (3 cols) — Signaturprodukter
3. To kolonner – Janetts historie (text mode, image left)
4. To kolonner – Velværeavdelingen (services mode, image right)
5. CTA – Mørk bakgrunn

### Meny
1. Hero – Seksjon (simple)
2. Menyliste — Konfekt & sjokolade
3. Menyliste — Kaker
4. Menyliste — Kaffe & drikke
5. CTA – Mørk bakgrunn

### Om oss
1. Hero – Seksjon (simple)
2. Tidslinje
3. Kortgrid (4 cols, cream bg) — Verdier
4. To kolonner – Velværeavdelingen (services mode)
5. Sitat – Stort sentrert

---

## CSS design tokens

```css
--brun:        #3B1A0E   /* Chocolate brown — main text */
--brun-soft:   #5a2e1f   /* Lighter brown — muted text */
--krem:        #FAF5EE   /* Cream white — page background */
--krem-deep:   #F2EADD   /* Deep cream — section backgrounds */
--fjord:       #C5E5E7   /* Fjord teal — chip backgrounds */
--fjord-deep:  #9bcfd2   /* Deep teal — eyebrow accents */
--accent:      #E8A0AF   /* Rose pink */
--accent-deep: #d27d8e   /* Deep rose — buttons, borders */
--accent-soft: #f5d4da   /* Soft rose — hover states */
```

## Button classes (usable in Custom HTML blocks)

```html
<a class="btn btn-primary" href="...">Primary (rose)</a>
<a class="btn btn-outline" href="...">Outline</a>
<a class="btn btn-ghost"   href="...">Ghost (no border)</a>
<a class="btn btn-accent"  href="...">Accent (used on dark bg)</a>
```
