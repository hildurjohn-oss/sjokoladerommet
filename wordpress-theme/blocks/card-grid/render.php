<?php
$eyebrow  = get_field('eyebrow')  ?: '';
$title    = get_field('title')    ?: '';
$cards    = get_field('cards')    ?: [];
$cols     = get_field('cols')     ?: '3';
$bg       = get_field('bg')       ?: 'white';
$block_id = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

$section_style = $bg === 'cream' ? 'background:var(--krem-deep)' : '';
$grid_class    = 'cols-' . esc_attr( $cols );
?>
<section class="section"<?php echo $block_id; ?> style="<?php echo $section_style; ?>">
  <div class="wrap">
    <?php if ( $eyebrow || $title ) : ?>
      <div style="text-align:center;margin-bottom:48px">
        <?php if ( $eyebrow ) : ?>
          <p class="eyebrow" style="justify-content:center"><?php echo esc_html( $eyebrow ); ?></p>
        <?php endif; ?>
        <?php if ( $title ) : ?>
          <h2 style="font-size:clamp(28px,3.5vw,44px);margin:16px 0 0"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if ( ! empty( $cards ) ) : ?>
      <div class="<?php echo $grid_class; ?>">
        <?php foreach ( $cards as $i => $card ) :
          $card_image  = $card['image']      ?? null;
          $ribbon      = $card['ribbon']     ?? '';
          $card_title  = $card['card_title'] ?? '';
          $card_desc   = $card['description'] ?? '';
        ?>
          <div class="card" style="position:relative;overflow:hidden;display:flex;flex-direction:column;gap:0">
            <?php if ( $ribbon ) : ?>
              <span class="ribbon"><?php echo esc_html( $ribbon ); ?></span>
            <?php endif; ?>
            <?php if ( $card_image ) : ?>
              <div style="width:100%;aspect-ratio:4/3;overflow:hidden">
                <img src="<?php echo esc_url( $card_image['url'] ); ?>"
                     alt="<?php echo esc_attr( $card_image['alt'] ); ?>"
                     style="width:100%;height:100%;object-fit:cover;display:block">
              </div>
            <?php endif; ?>
            <div style="padding:24px 24px 28px">
              <?php if ( $card_title ) : ?>
                <h3 style="margin:0 0 10px;font-size:22px"><?php echo esc_html( $card_title ); ?></h3>
              <?php endif; ?>
              <?php if ( $card_desc ) : ?>
                <p class="muted" style="margin:0;font-size:15px;line-height:1.65"><?php echo esc_html( $card_desc ); ?></p>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
