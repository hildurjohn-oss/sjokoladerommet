<?php
$text_mode   = get_field('text_mode')   ?: 'text';
$eyebrow     = get_field('eyebrow')     ?: '';
$title       = get_field('title')       ?: '';
$lead        = get_field('lead')        ?: '';
$body        = get_field('body')        ?: '';
$quote_text  = get_field('quote_text')  ?: '';
$btn_label   = get_field('btn_label')   ?: '';
$btn_url     = get_field('btn_url')     ?: '';
$image       = get_field('image');
$image_side  = get_field('image_side')  ?: 'left';
$accent      = get_field('accent')      ?: 'rose';
$bg          = get_field('bg')          ?: 'white';

$services        = get_field('services')         ?: [];
$contact_btn_label = get_field('contact_btn_label') ?: '';
$contact_btn_url   = get_field('contact_btn_url')   ?: '';
$contact_extra     = get_field('contact_extra')     ?: '';

$block_id     = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';
$section_bg   = $bg === 'cream' ? 'background:var(--krem-deep)' : '';
$accent_color = $accent === 'fjord' ? 'var(--fjord-deep)' : 'var(--accent-deep)';
$eyebrow_color = $accent === 'fjord' ? 'color:var(--fjord-deep)' : '';

$left_col  = $image_side === 'left'  ? 'image' : 'text';
$right_col = $image_side === 'right' ? 'image' : 'text';
?>
<section class="section"<?php echo $block_id; ?> style="<?php echo $section_bg; ?>">
  <div class="wrap">
    <div class="cols-2" style="align-items:center;gap:clamp(32px,5vw,72px)">

      <?php
      ob_start();
      if ( $image ) :
      ?>
        <div style="width:100%;aspect-ratio:3/4;border-radius:18px;overflow:hidden">
          <img src="<?php echo esc_url( $image['url'] ); ?>"
               alt="<?php echo esc_attr( $image['alt'] ); ?>"
               style="width:100%;height:100%;object-fit:cover;display:block">
        </div>
      <?php
      endif;
      $image_html = ob_get_clean();

      ob_start();
      ?>
      <div style="display:flex;flex-direction:column;gap:20px">
        <?php if ( $eyebrow ) : ?>
          <p class="eyebrow" style="<?php echo $eyebrow_color; ?>"><?php echo esc_html( $eyebrow ); ?></p>
        <?php endif; ?>
        <?php if ( $title ) : ?>
          <h2 style="font-size:clamp(26px,3.5vw,42px);margin:0"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>
        <?php if ( $lead ) : ?>
          <p class="lead"><?php echo esc_html( $lead ); ?></p>
        <?php endif; ?>
        <?php if ( $body ) : ?>
          <p class="muted" style="font-size:17px;line-height:1.75"><?php echo esc_html( $body ); ?></p>
        <?php endif; ?>

        <?php if ( $text_mode === 'services' && ! empty( $services ) ) : ?>
          <div class="velvare-services" style="margin-top:8px">
            <?php foreach ( $services as $svc ) :
              $svc_name  = $svc['service_name']  ?? '';
              $svc_desc  = $svc['service_desc']  ?? '';
              $svc_price = $svc['service_price'] ?? '';
            ?>
              <div class="card-soft" style="padding:18px 20px">
                <div style="display:flex;justify-content:space-between;align-items:baseline;gap:12px">
                  <span style="font-family:'Playfair Display',serif;font-size:17px;font-weight:600"><?php echo esc_html( $svc_name ); ?></span>
                  <?php if ( $svc_price ) : ?>
                    <span style="font-weight:700;color:var(--brun);white-space:nowrap;font-size:14px"><?php echo esc_html( $svc_price ); ?></span>
                  <?php endif; ?>
                </div>
                <?php if ( $svc_desc ) : ?>
                  <p class="muted" style="margin:6px 0 0;font-size:14px;line-height:1.5"><?php echo esc_html( $svc_desc ); ?></p>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
          <?php if ( $contact_btn_label && $contact_btn_url ) : ?>
            <div style="display:flex;flex-wrap:wrap;align-items:center;gap:16px;margin-top:8px">
              <a class="btn btn-primary" href="<?php echo esc_url( $contact_btn_url ); ?>"><?php echo esc_html( $contact_btn_label ); ?></a>
              <?php if ( $contact_extra ) : ?>
                <span class="muted" style="font-size:15px"><?php echo esc_html( $contact_extra ); ?></span>
              <?php endif; ?>
            </div>
          <?php endif; ?>

        <?php else : ?>

          <?php if ( $quote_text ) : ?>
            <blockquote style="margin:0;border-left:3px solid <?php echo $accent_color; ?>;padding-left:20px;font-family:'Playfair Display',serif;font-style:italic;font-size:19px;line-height:1.55;color:var(--brun)">
              &ldquo;<?php echo esc_html( $quote_text ); ?>&rdquo;
            </blockquote>
          <?php endif; ?>
          <?php if ( $btn_label && $btn_url ) : ?>
            <div style="margin-top:4px">
              <a class="btn btn-primary" href="<?php echo esc_url( $btn_url ); ?>"><?php echo esc_html( $btn_label ); ?></a>
            </div>
          <?php endif; ?>

        <?php endif; ?>
      </div>
      <?php $text_html = ob_get_clean(); ?>

      <?php if ( $image_side === 'left' ) : ?>
        <?php echo $image_html; ?>
        <?php echo $text_html; ?>
      <?php else : ?>
        <?php echo $text_html; ?>
        <?php echo $image_html; ?>
      <?php endif; ?>

    </div>
  </div>
</section>
