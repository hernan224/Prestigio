<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Spinelli Prestigio
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			
			<?php do_action( 'prestigio_credits' ); ?>
			
			<div class="site-info-logo">
			    <a href="<?php bloginfo( 'home' ); ?>">Spinelli Prestigio</a>
			</div>
			
			<div class="site-info-contact">
			    <ul>
			        <li><i class="fa fa-map-marker"></i> Rodriguez 315 - Bahía Blanca</li>
			        <li><i class="fa fa-phone-square"></i>(0291) 454-8845 / 452-5289</li>
			        <li><i class="fa fa-envelope"></i><a href="#">info@spinellipretigio.com.ar</a></li>
			        <li><i class="fa fa-qrcode"></i><a href="#">Data Fiscal</a></li>
			    </ul>
			</div>
			
			<nav class="footer-navigation">
			    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>

			<div class="site-info-copyright">
				<p>Todos los derechos reservados <?php echo date( 'Y' ); ?>. Desarrollo por <a href="http://imotionconsulting.com.ar/" target="_blank">IMotion Consulting</a></p>
			</div>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>