<?php
/**
 * Generic page template — renders any WordPress page that doesn't have a
 * dedicated template (page-{slug}.php).
 */
get_header();
?>

<main>
  <section class="section">
    <div class="wrap" style="max-width:800px">

      <?php while ( have_posts() ) : the_post(); ?>
        <div class="eyebrow" style="margin-bottom:16px"><?php echo esc_html( get_the_date( 'd. F Y' ) ); ?></div>
        <h1><?php the_title(); ?></h1>
        <div style="margin-top:32px;line-height:1.7">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>
