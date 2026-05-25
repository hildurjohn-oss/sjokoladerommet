<?php
/**
 * template-parts/card.php — Product / feature card with image.
 *
 * Usage:
 *   get_template_part( 'template-parts/card', null, [
 *       'image'       => get_template_directory_uri() . '/assets/images/sjokoladerommet-hus.jpg',
 *       'alt'         => 'Suksessterte',
 *       'title'       => 'Suksessterte',
 *       'description' => 'Mandelbunn, smørkrem med ekte vanilje...',
 *       'ribbon'      => 'Vår signatur',   // optional ribbon label
 *       'aspect'      => '4/3',            // optional, default '4/3'
 *       'style'       => '',               // optional extra inline style on the outer .card div
 *   ] );
 */

$image  = $args['image']       ?? '';
$alt    = $args['alt']         ?? '';
$title  = $args['title']       ?? '';
$desc   = $args['description'] ?? '';
$ribbon = $args['ribbon']      ?? '';
$aspect = $args['aspect']      ?? '4/3';
$style  = $args['style']       ?? '';
?>

<div class="card" style="position:relative;overflow:hidden;<?php echo esc_attr( $style ); ?>">

  <?php if ( $ribbon ) : ?>
    <div class="ribbon" style="margin-bottom:16px">
      <?php sjokoladerommet_flower_mark( 16, 'var(--accent-deep)' ); ?>
      <?php echo esc_html( $ribbon ); ?>
    </div>
  <?php endif; ?>

  <?php if ( $image ) : ?>
    <div style="width:100%;aspect-ratio:<?php echo esc_attr( $aspect ); ?>;border-radius:14px;overflow:hidden;flex-shrink:0;margin-bottom:18px">
      <img src="<?php echo esc_url( $image ); ?>"
           alt="<?php echo esc_attr( $alt ); ?>"
           style="width:100%;height:100%;object-fit:cover;display:block">
    </div>
  <?php endif; ?>

  <?php if ( $title ) : ?>
    <h3><?php echo esc_html( $title ); ?></h3>
  <?php endif; ?>

  <?php if ( $desc ) : ?>
    <p class="muted" style="margin-top:8px;margin-bottom:0">
      <?php echo esc_html( $desc ); ?>
    </p>
  <?php endif; ?>

</div>
