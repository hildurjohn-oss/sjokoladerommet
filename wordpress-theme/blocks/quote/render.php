<?php
$quote    = get_field('quote')       ?: '';
$citation = get_field('citation')    ?: '';
$accent   = get_field('accent')      ?: 'rose';
$bg       = get_field('bg')          ?: 'white';
$block_id = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

$section_bg    = $bg === 'cream' ? 'background:var(--krem-deep)' : '';
$accent_color  = $accent === 'fjord' ? 'var(--fjord-deep)' : 'var(--accent-deep)';
?>
<section class="section"<?php echo $block_id; ?> style="<?php echo $section_bg; ?>">
  <div class="wrap" style="max-width:680px;text-align:center">
    <?php sjokoladerommet_flower_mark( 36, $accent_color ); ?>
    <?php if ( $quote ) : ?>
      <blockquote style="margin:28px 0 20px;font-family:'Playfair Display',serif;font-style:italic;font-size:clamp(22px,3vw,34px);line-height:1.45;color:var(--brun)">
        &ldquo;<?php echo esc_html( $quote ); ?>&rdquo;
      </blockquote>
    <?php endif; ?>
    <?php if ( $citation ) : ?>
      <cite style="font-style:normal;font-size:15px;letter-spacing:.06em;color:var(--brun-soft);text-transform:uppercase"><?php echo esc_html( $citation ); ?></cite>
    <?php endif; ?>
  </div>
</section>
