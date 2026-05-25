<?php
/**
 * Single post template.
 */
get_header();
?>

<main>
  <section class="section">
    <div class="wrap" style="max-width:800px">

      <?php while ( have_posts() ) : the_post(); ?>

        <div class="eyebrow" style="margin-bottom:16px">
          <?php echo esc_html( get_the_date( 'd. F Y' ) ); ?>
          <?php if ( get_the_author() ) echo ' · ' . esc_html( get_the_author() ); ?>
        </div>
        <h1><?php the_title(); ?></h1>

        <?php if ( has_post_thumbnail() ) : ?>
          <div style="margin-top:32px;border-radius:22px;overflow:hidden;aspect-ratio:16/9">
            <?php the_post_thumbnail( 'large', [ 'style' => 'width:100%;height:100%;object-fit:cover;display:block' ] ); ?>
          </div>
        <?php endif; ?>

        <div style="margin-top:32px;line-height:1.7">
          <?php the_content(); ?>
        </div>

        <div style="margin-top:48px;padding-top:32px;border-top:1px solid rgba(59,26,14,.08)">
          <a class="btn btn-ghost" href="<?php echo esc_url( home_url( '/' ) ); ?>">← Tilbake</a>
        </div>

      <?php endwhile; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>
