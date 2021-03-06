<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spinelli Prestigio
 */
?>

<section class="no-results not-found">
	<div class="entry-content">
		<?php if ( is_search() OR is_page_template( 'busqueda-propiedad.php' ) ) : ?>

			<p>No hay resultado a partir de la búsqueda.</p>

		<?php else : ?>

			<p>No se ha podido encontrar el contenido.</p>

		<?php endif; ?>
	</div><!-- .entry-content -->
</section><!-- .no-results -->
