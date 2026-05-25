<?php
$eyebrow  = get_field('eyebrow')  ?: '';
$title    = get_field('title')    ?: 'Meny';
$accent   = get_field('accent')   ?: 'rose';
$items    = get_field('items')    ?: [];
$block_id = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

$accent_color = $accent === 'fjord' ? 'var(--fjord-deep)' : 'var(--accent-deep)';
?>
<section class="section"<?php echo $block_id; ?>>
  <div class="wrap" style="max-width:820px">
    <?php if ( $eyebrow ) : ?>
      <p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
    <?php endif; ?>
    <div style="display:flex;align-items:baseline;gap:14px;margin-bottom:32px;padding-bottom:14px;border-bottom:1.5px solid var(--brun)">
      <?php sjokoladerommet_flower_mark( 22, $accent_color ); ?>
      <h2 style="font-size:clamp(24px,3vw,36px);margin:0"><?php echo esc_html( $title ); ?></h2>
    </div>
    <?php if ( ! empty( $items ) ) : ?>
      <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:18px">
        <?php foreach ( $items as $item ) :
          $name      = $item['name']        ?? '';
          $desc      = $item['description'] ?? '';
          $price     = $item['price']       ?? '';
          $signature = ! empty( $item['signature'] );
        ?>
          <li style="display:grid;grid-template-columns:1fr auto;gap:16px;align-items:baseline">
            <div>
              <div style="display:flex;align-items:baseline;gap:10px;flex-wrap:wrap">
                <span style="font-family:'Playfair Display',serif;font-weight:600;font-size:21px"><?php echo esc_html( $name ); ?></span>
                <?php if ( $signature ) : ?>
                  <span class="chip accent" style="padding:2px 10px;font-size:11px;letter-spacing:.1em;text-transform:uppercase">Signatur</span>
                <?php endif; ?>
              </div>
              <?php if ( $desc ) : ?>
                <div class="muted" style="font-size:15px;margin-top:4px"><?php echo esc_html( $desc ); ?></div>
              <?php endif; ?>
            </div>
            <?php if ( $price ) : ?>
              <div style="font-family:Nunito,sans-serif;font-weight:700;color:var(--brun);font-variant-numeric:tabular-nums;white-space:nowrap;font-size:15px"><?php echo esc_html( $price ); ?></div>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>
