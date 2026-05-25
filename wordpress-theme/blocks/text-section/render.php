<?php
$eyebrow = get_field('eyebrow') ?: '';
$title   = get_field('title')   ?: '';
$lead    = get_field('lead')    ?: '';
$body    = get_field('body')    ?: '';
$accent  = get_field('accent')  ?: 'rose';
$align   = get_field('align')   ?: 'left';
$block_id = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

$accent_color = $accent === 'fjord' ? 'var(--fjord-deep)' : 'var(--accent-deep)';
$text_align   = $align === 'center' ? 'text-align:center;max-width:720px;margin-inline:auto' : '';
$eyebrow_justify = $align === 'center' ? 'justify-content:center' : '';
?>
<section class="section"<?php echo $block_id; ?>>
  <div class="wrap">
    <div style="<?php echo esc_attr( $text_align ); ?>">
      <?php if ( $eyebrow ) : ?>
        <p class="eyebrow" style="<?php echo esc_attr( $eyebrow_justify ); ?>;color:<?php echo $accent === 'fjord' ? 'var(--fjord-deep)' : 'var(--accent-deep)'; ?>"><?php echo esc_html( $eyebrow ); ?></p>
      <?php endif; ?>
      <?php if ( $title ) : ?>
        <h2 style="font-size:clamp(28px,3.5vw,44px);margin:16px 0"><?php echo esc_html( $title ); ?></h2>
      <?php endif; ?>
      <?php if ( $lead ) : ?>
        <p class="lead"><?php echo esc_html( $lead ); ?></p>
      <?php endif; ?>
      <?php if ( $body ) : ?>
        <p class="muted" style="font-size:17px;line-height:1.75"><?php echo esc_html( $body ); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>
