<?php
/**
 * template-parts/hero-section.php — Simple page hero.
 *
 * Usage (WordPress 5.5+):
 *   get_template_part( 'template-parts/hero-section', null, [
 *       'eyebrow'   => 'Menyen',
 *       'title'     => 'Det vi har i disken denne uka.',
 *       'lead'      => 'Vi baker det vi har lyst på...',
 *       'chips'     => [
 *           [ 'text' => '★ Torsdag–søndag 11–16', 'class' => 'fjord' ],
 *           [ 'text' => 'Glutenfritt på bestilling' ],
 *       ],
 *       'max_width'  => '760px',     // optional, default 760px
 *       'pb'         => '32px',      // optional padding-bottom override
 *       'extra_html' => '',          // optional raw HTML appended after chips
 *   ] );
 */

$eyebrow   = $args['eyebrow']    ?? '';
$title     = $args['title']      ?? '';
$lead      = $args['lead']       ?? '';
$chips     = $args['chips']      ?? [];
$max_width = $args['max_width']  ?? '760px';
$pb        = $args['pb']         ?? '32px';
$extra     = $args['extra_html'] ?? '';
?>

<section class="section" style="padding-bottom:<?php echo esc_attr( $pb ); ?>">
  <div class="wrap">
    <div style="max-width:<?php echo esc_attr( $max_width ); ?>">

      <?php if ( $eyebrow ) : ?>
        <div class="eyebrow" style="margin-bottom:18px"><?php echo esc_html( $eyebrow ); ?></div>
      <?php endif; ?>

      <?php if ( $title ) : ?>
        <h1><?php echo esc_html( $title ); ?></h1>
      <?php endif; ?>

      <?php if ( $lead ) : ?>
        <p class="lead" style="margin-top:22px"><?php echo esc_html( $lead ); ?></p>
      <?php endif; ?>

      <?php if ( $chips ) : ?>
        <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:22px">
          <?php foreach ( $chips as $chip ) :
              $cls = ! empty( $chip['class'] ) ? ' ' . esc_attr( $chip['class'] ) : '';
          ?>
            <span class="chip<?php echo $cls; ?>"><?php echo esc_html( $chip['text'] ); ?></span>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ( $extra ) :
          // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          echo $extra;
      endif; ?>

    </div>
  </div>
</section>
