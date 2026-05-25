# Sjokoladerommet — WordPress Theme

A custom WordPress theme converted from the static React/JSX site design.

---

## Requirements

- WordPress 6.0 or newer
- PHP 8.0 or newer
- No additional plugins required

---

## Installation

1. **Copy the theme folder** into your WordPress installation:
   ```
   wp-content/themes/sjokoladerommet/
   ```
   Copy everything inside `/wordpress-theme/` to that path.

2. **Activate the theme** in WordPress Admin → Appearance → Themes.

3. **Create the four pages** in WordPress Admin → Pages → Add New:

   | Page title    | Slug            | Page template    |
   |---------------|-----------------|------------------|
   | Hjem          | *(front page)*  | *(none needed)*  |
   | Meny          | `meny`          | Meny             |
   | Om oss        | `om-oss`        | Om oss           |
   | Bestill kake  | `bestill-kake`  | Bestill kake     |

4. **Set the homepage**: WordPress Admin → Settings → Reading → "A static page" → select **Hjem** as the front page.

5. **Set up the navigation menu**: WordPress Admin → Appearance → Menus:
   - Create a new menu called `Primær navigasjon`
   - Add the four pages in order: Hjem, Meny, Om oss, Bestill kake
   - Assign it to the **Primær navigasjon** location
   - Save the menu

6. **Configure the order email**: Cake orders are emailed to the WordPress admin email address (Settings → General → Administration Email). Make sure that email is correct.

---

## Local testing with LocalWP

1. Download and install [LocalWP](https://localwp.com/) (free).
2. Create a new site (any name, e.g. `sjokoladerommet`).
3. Open the site's `wp-content/themes/` folder and paste the theme there.
4. Follow the installation steps above.
5. Open the site in your browser via LocalWP's "Open Site" button.

---

## File structure

```
wordpress-theme/
├── style.css                   Theme header (required by WordPress)
├── functions.php               Assets, menus, AJAX handler, helper functions
├── index.php                   Blog fallback (required by WordPress)
├── front-page.php              Homepage (HeroFullbleed + sections)
├── page.php                    Generic page fallback
├── page-meny.php               Menu page
├── page-om-oss.php             About page
├── page-bestill-kake.php       Cake order form (multi-step, vanilla JS)
├── header.php                  Topbar + mobile nav
├── footer.php                  Footer + wp_footer()
├── single.php                  Single blog post
├── assets/
│   ├── css/main.css            All styles (copied from styles.css)
│   ├── js/main.js              Mobile nav + multi-step form logic
│   └── images/                 Logo + photos
└── template-parts/
    ├── flower-mark.php         PHP function: sjokoladerommet_flower_mark()
    └── mini-map.php            Stylised SVG map of Gravdal
```

---

## Editing menu content

Menu items (konfekt, kaker, drikke) are currently hardcoded in `page-meny.php`.  
To make them editable in the WordPress dashboard:

1. Go to **Menyartikler** in the sidebar (the custom post type is already registered).
2. Add items with title = product name, content = description, and custom fields:
   - `pris` — price string (e.g. `32 kr/stk`)
   - `kategori` — set via the **Menykategorier** taxonomy (Konfekt, Kaker, Drikke)
3. Update `page-meny.php` to query `WP_Query` with `post_type => 'menyartikkel'` instead of the hardcoded arrays (a developer task, ~20 lines of PHP).

---

## Cake order emails

Orders submitted through the Bestill kake form are sent via `wp_mail()` to the admin email.  
If emails are not arriving locally, install the **WP Mail SMTP** plugin and configure it with a real SMTP server or use [Mailpit](https://mailpit.axllent.org/) to catch local emails.

---

## Deploying to your live site

1. Export the theme folder and upload it to your live server via SFTP.
2. Repeat the installation steps on the live WordPress site.
3. The Vercel static site and the WordPress site are completely independent — they share only the GitHub repository (on different branches).
