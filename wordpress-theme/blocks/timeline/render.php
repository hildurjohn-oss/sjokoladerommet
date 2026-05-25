<?php
$eyebrow  = get_field('eyebrow')  ?: '';
$title    = get_field('title')    ?: 'Vår historie';
$items    = get_field('items')    ?: [];
$block_id = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';
?>
<section class="section"<?php echo $block_id; ?>>
  <div class="wrap" style="max-width:820px">
    <?php if ( $eyebrow ) : ?>
      <p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
    <?php endif; ?>
    <?php if ( $title ) : ?>
      <h2 style="font-size:clamp(28px,3.5vw,44px);margin:16px 0 40px"><?php echo esc_html( $title ); ?></h2>
    <?php endif; ?>
    <?php if ( ! empty( $items ) ) : ?>
      <ul style="list-style:none;padding:0;margin:0;border-left:2px solid var(--accent-soft)">
        <?php foreach ( $items as $item ) :
          $year  = $item['year']        ?? '';
          $step  = $item['step_title']  ?? '';
          $desc  = $item['description'] ?? '';
        ?>
          <li style="display:grid;grid-template-columns:68px 1fr;gap:28px;padding:22px 0;position:relative">
            <div style="text-align:right;padding-right:20px;font-family:'Playfair Display',serif;font-size:18px;font-weight:600;color:var(--accent-deep);line-height:1.3"><?php echo esc_html( $year ); ?></div>
            <div style="position:relative">
              <span style="position:absolute;left:-37px;top:6px;width:12px;height:12px;border-radius:50%;background:var(--accent-deep);border:2px solid var(--krem);display:block"></span>
              <?php if ( $step ) : ?>
                <h3 style="margin:0 0 8px;font-size:20px"><?php echo esc_html( $step ); ?></h3>
              <?php endif; ?>
              <?php if ( $desc ) : ?>
                <p class="muted" style="margin:0;font-size:16px;line-height:1.65"><?php echo esc_html( $desc ); ?></p>
              <?php endif; ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>
