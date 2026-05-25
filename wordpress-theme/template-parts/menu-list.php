<?php
/**
 * template-parts/menu-list.php — A titled list of menu items with price column.
 *
 * Usage:
 *   get_template_part( 'template-parts/menu-list', null, [
 *       'title'  => 'Konfekt & sjokolade',
 *       'accent' => 'var(--accent-deep)',
 *       'items'  => [
 *           [ 'n' => 'Mørk 70%', 'd' => 'Belgisk mørk sjokolade...', 'p' => '32 kr/stk' ],
 *           [ 'n' => 'Suksessterte', 'd' => '...', 'p' => '65 kr', 'sig' => true ],
 *       ],
 *   ] );
 *
 * Item keys:
 *   n    string  Product name (required)
 *   d    string  Description (required)
 *   p    string  Price (required)
 *   sig  bool    If true, shows "Signatur" chip next to the name
 */

$title  = $args['title']  ?? '';
$accent = $args['accent'] ?? 'var(--accent-deep)';
$items  = $args['items']  ?? [];

if ( ! $items ) return;
?>

<div>
  <div style="display:flex;align-items:baseline;gap:14px;margin-bottom:24px;padding-bottom:14px;border-bottom:1.5px solid var(--brun)">
    <?php sjokoladerommet_flower_mark( 22, $accent ); ?>
    <h2 style="font-size:clamp(24px,3vw,36px)"><?php echo esc_html( $title ); ?></h2>
  </div>

  <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:18px">
    <?php foreach ( $items as $it ) : ?>
      <li style="display:grid;grid-template-columns:1fr auto;gap:16px;align-items:baseline">

        <div>
          <div style="display:flex;align-items:baseline;gap:10px;flex-wrap:wrap">
            <span style="font-family:'Playfair Display',serif;font-weight:600;font-size:21px">
              <?php echo esc_html( $it['n'] ); ?>
            </span>
            <?php if ( ! empty( $it['sig'] ) ) : ?>
              <span class="chip accent"
                    style="padding:2px 10px;font-size:11px;letter-spacing:.1em;text-transform:uppercase">
                Signatur
              </span>
            <?php endif; ?>
          </div>
          <div class="muted" style="font-size:15px;margin-top:4px">
            <?php echo esc_html( $it['d'] ); ?>
          </div>
        </div>

        <div style="font-family:Nunito,sans-serif;font-weight:700;color:var(--brun);font-variant-numeric:tabular-nums;white-space:nowrap;font-size:15px">
          <?php echo esc_html( $it['p'] ); ?>
        </div>

      </li>
    <?php endforeach; ?>
  </ul>
</div>
