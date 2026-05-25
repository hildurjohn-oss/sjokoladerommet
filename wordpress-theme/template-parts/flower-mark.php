<?php
/**
 * Outputs the 5-petal FlowerMark SVG.
 *
 * Usage: sjokoladerommet_flower_mark(28, 'currentColor');
 */
function sjokoladerommet_flower_mark( $size = 28, $color = 'currentColor', $style = '' ) {
    $petals = '';
    for ( $i = 0; $i < 5; $i++ ) {
        $angle = ( $i * 72 - 90 ) * M_PI / 180;
        $cx    = round( 50 + cos( $angle ) * 22, 2 );
        $cy    = round( 50 + sin( $angle ) * 22, 2 );
        $petals .= '<circle cx="' . $cx . '" cy="' . $cy . '" r="14" fill="' . esc_attr( $color ) . '" />';
    }
    $style_attr = $style ? ' style="' . esc_attr( $style ) . '"' : '';
    echo '<svg viewBox="0 0 100 100" width="' . (int) $size . '" height="' . (int) $size . '"'
        . $style_attr . ' aria-hidden="true">'
        . $petals
        . '<circle cx="50" cy="50" r="10" fill="#F5C842" /></svg>';
}
