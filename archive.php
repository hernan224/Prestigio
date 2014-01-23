<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spinelli Prestigio
 */

get_header(); ?>

<section id="primary" class="content-area full-width">
    <main id="main" class="site-main" role="main">

        <header class="page-header">
            <h1 class="entry-title">Listado de propiedades</h1>
        </header><!-- .page-header -->

        <div class="list-wrapper">

            <?php if ( have_posts() ) : ?>

                <ul class="property-post-list">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <li>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <div class="entry-content">
                                    <a href="<?php the_permalink();?>" class="property-post-link">
                                        
										<?php
										// Must be inside a loop.

										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										}
										else {
											echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/no-foto-thumb.png" />';
										}
										?>

                                        <div class="property-list-meta">
                                            <h1 class="entry-title"><?php the_title(); ?></h1>

                                            <div class="meta-wrapper">
                                                <?php $el_id = get_the_ID(); ?>

                                                <span><strong> <?php echo custom_taxonomies_terms($el_id, 'tipo'); ?> en <?php echo custom_taxonomies_terms($el_id, 'operacion'); ?></strong></span>


                                                <?php if( get_field( 'direccion' ) ): ?>
                                                    <span>Dirección: <?php the_field( 'direccion' ); ?></span>
                                                <?php endif; ?>

                                                <?php if( get_field( 'localidad' ) ): ?>
                                                    <span>Localidad: <?php the_field( 'localidad' ); ?></span>
                                                <?php endif; ?>
                                            </div>

                                        </div><!-- .property-list-meta -->

                                    </a><!-- .property-list-wrapper -->
                                </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                        </li>

                    <?php endwhile; ?>

                </ul><!-- .property-post-list -->

                <?php prestigio_content_nav( 'nav-below' ); ?>

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>
        </div><!-- .list-wrapper -->

    </main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
