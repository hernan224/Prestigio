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
	<header class="page-header">
		<h1 class="page-title">No se ha encontrado nada</h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_search() ) : ?>

			<p>No hay resultado a partir de la búsqueda.</p>

		<?php else : ?>

			<p>No se ha podido encontrar el contenido.</p>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
