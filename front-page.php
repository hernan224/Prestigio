<?php
/**
 * The front page template file.
 *
 * @package Prestigio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="front-page" class="site-front-page" role="main">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; ?>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
