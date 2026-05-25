<?php
$title       = get_field('title')       ?: 'Besøk oss';
$body        = get_field('body')        ?: '';
$btn1_label  = get_field('btn1_label')  ?: '';
$btn1_url    = get_field('btn1_url')    ?: '';
$btn2_label  = get_field('btn2_label')  ?: '';
$btn2_url    = get_field('btn2_url')    ?: '';
$address     = get_field('address')     ?: '';
$block_id    = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';
?>
<section class="section brun-bg"<?php echo $block_id; ?> style="position:relative;overflow:hidden;text-align:center">
  <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;opacity:.18">
    <?php sjokoladerommet_flower_mark( 320, '#FAF5EE' ); ?>
  </div>
  <div class="wrap" style="position:relative;z-index:1;max-width:680px">
    <h2 style="font-size:clamp(28px,4vw,52px);color:#FAF5EE;margin:0 0 20px"><?php echo esc_html( $title ); ?></h2>
    <?php if ( $body ) : ?>
      <p style="color:rgba(250,245,238,.75);font-size:17px;line-height:1.7;margin-bottom:32px"><?php echo esc_html( $body ); ?></p>
    <?php endif; ?>
    <?php if ( $btn1_label || $btn2_label ) : ?>
      <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-bottom:24px">
        <?php if ( $btn1_label && $btn1_url ) : ?>
          <a class="btn btn-accent" href="<?php echo esc_url( $btn1_url ); ?>"><?php echo esc_html( $btn1_label ); ?></a>
        <?php endif; ?>
        <?php if ( $btn2_label && $btn2_url ) : ?>
          <a class="btn" style="border-color:rgba(250,245,238,.4);color:#FAF5EE" href="<?php echo esc_url( $btn2_url ); ?>"><?php echo esc_html( $btn2_label ); ?></a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if ( $address ) : ?>
      <p style="color:rgba(250,245,238,.55);font-size:14px;letter-spacing:.04em;margin:0"><?php echo esc_html( $address ); ?></p>
    <?php endif; ?>
  </div>
</section>
