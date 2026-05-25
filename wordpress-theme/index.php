<?php
/**
 * Index — fallback template (blog loop).
 * WordPress requires this file. Regular pages use front-page.php or page-*.php.
 */
get_header();
?>

<main>
  <section class="section">
    <div class="wrap" style="max-width:760px">

      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
          <article style="margin-bottom:48px;padding-bottom:48px;border-bottom:1px solid rgba(59,26,14,.08)">
            <div class="eyebrow" style="margin-bottom:12px"><?php echo get_the_date( 'd. F Y' ); ?></div>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="muted" style="margin-top:12px"><?php the_excerpt(); ?></div>
            <a class="btn btn-ghost" style="margin-top:16px" href="<?php the_permalink(); ?>">Les mer →</a>
          </article>
        <?php endwhile; ?>

        <div style="margin-top:32px">
          <?php the_posts_pagination( [ 'prev_text' => '← Forrige', 'next_text' => 'Neste →' ] ); ?>
        </div>

      <?php else : ?>
        <h1>Ingen innlegg funnet</h1>
        <p class="lead">Kom tilbake snart — vi har mye på gang.</p>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>
