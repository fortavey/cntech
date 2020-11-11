<?php
/*
 *
 * Template name: Keyses
 *
 */
get_header();
?>

<div class="wrapper">
	<div class="search-container">

			<?php
      /* Start the Loop */
      $query = new WP_Query('post_type=keyses&posts_per_page=-1');
			while ( $query->have_posts() ) :
				$query->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
          </header><!-- .entry-header -->

          <div class="entry-summary">
            <?php the_excerpt(); ?>
          </div><!-- .entry-summary -->

        </article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; wp_reset_postdata(); ?>

	</div>
</div>

<?php
get_footer();