<?php
$style   = get_field('style')   ?: 'simple';
$eyebrow = get_field('eyebrow') ?: '';
$title   = get_field('title')   ?: 'Overskrift';
$lead    = get_field('lead')    ?: '';
$chips   = get_field('chips')   ?: [];
$image   = get_field('image');
$btn1_label = get_field('btn1_label') ?: '';
$btn1_url   = get_field('btn1_url')   ?: '';
$btn2_label = get_field('btn2_label') ?: '';
$btn2_url   = get_field('btn2_url')   ?: '';

$block_id = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';
?>

<?php if ( $style === 'fullbleed' ) : ?>
<section class="section"<?php echo $block_id; ?>>
  <div class="wrap">
    <div class="hero-forside">
      <div class="cols-2" style="align-items:center;gap:clamp(32px,5vw,72px)">
        <div style="display:flex;flex-direction:column;gap:24px">
          <?php if ( $eyebrow ) : ?>
            <p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
          <?php endif; ?>
          <h1 style="font-size:clamp(36px,5vw,64px);line-height:1.1;margin:0"><?php echo esc_html( $title ); ?></h1>
          <?php if ( $lead ) : ?>
            <p class="lead"><?php echo esc_html( $lead ); ?></p>
          <?php endif; ?>
          <?php if ( $btn1_label || $btn2_label ) : ?>
            <div style="display:flex;flex-wrap:wrap;gap:12px;margin-top:8px">
              <?php if ( $btn1_label && $btn1_url ) : ?>
                <a class="btn btn-primary" href="<?php echo esc_url( $btn1_url ); ?>"><?php echo esc_html( $btn1_label ); ?></a>
              <?php endif; ?>
              <?php if ( $btn2_label && $btn2_url ) : ?>
                <a class="btn btn-outline" href="<?php echo esc_url( $btn2_url ); ?>"><?php echo esc_html( $btn2_label ); ?></a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if ( ! empty( $chips ) ) : ?>
            <div style="display:flex;flex-wrap:wrap;gap:8px;margin-top:4px">
              <?php foreach ( $chips as $chip ) : ?>
                <span class="chip<?php echo ! empty( $chip['style'] ) && $chip['style'] === 'fjord' ? ' fjord' : ''; ?>">
                  <?php echo esc_html( $chip['text'] ); ?>
                </span>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <?php if ( $image ) : ?>
          <div class="hero-portrait-img">
            <img src="<?php echo esc_url( $image['url'] ); ?>"
                 alt="<?php echo esc_attr( $image['alt'] ); ?>"
                 width="<?php echo esc_attr( $image['width'] ); ?>"
                 height="<?php echo esc_attr( $image['height'] ); ?>">
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php else : ?>

<section class="section tight"<?php echo $block_id; ?> style="background:var(--krem-deep)">
  <div class="wrap" style="text-align:center;max-width:720px">
    <?php if ( $eyebrow ) : ?>
      <p class="eyebrow" style="justify-content:center"><?php echo esc_html( $eyebrow ); ?></p>
    <?php endif; ?>
    <h1 style="font-size:clamp(32px,4.5vw,56px);margin:16px 0"><?php echo esc_html( $title ); ?></h1>
    <?php if ( $lead ) : ?>
      <p class="lead" style="margin-bottom:0"><?php echo esc_html( $lead ); ?></p>
    <?php endif; ?>
    <?php if ( ! empty( $chips ) ) : ?>
      <div style="display:flex;flex-wrap:wrap;gap:8px;margin-top:20px;justify-content:center">
        <?php foreach ( $chips as $chip ) : ?>
          <span class="chip<?php echo ! empty( $chip['style'] ) && $chip['style'] === 'fjord' ? ' fjord' : ''; ?>">
            <?php echo esc_html( $chip['text'] ); ?>
          </span>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php endif; ?>
