<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

/*
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
?>
<?php responsive_wrapper_bottom(); // after wrapper content hook ?>
</div><!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php responsive_container_end(); // after container hook ?>

<div id="footer" class="clearfix">
	<?php responsive_footer_top(); ?>

	<div id="footer-wrapper">

		<?php get_sidebar( 'footer' ); ?>

		<div class="content">

		
		<?php get_sidebar( 'colophon' ); ?>

		<div class="grid copyright">
			<?php esc_attr_e( '&copy;', 'responsive' ); ?> <?php echo date( 'Y' ); ?><a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
				<?php echo '- Todos os direitos reservados.' ?>
			</a>
		</div><!-- end of .copyright -->

		<div class="grid col-300 scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'responsive' ); ?>"><?php _e( '&uarr;', 'responsive' ); ?></a></div>

		<div class="grid fit powered right">
				<div class='grid consultant'>Consultoria:
					<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/logo-consultor.png' ?>"
				alt="Consultor Web">
				</div>
				<div class='grid fit developer'>Desenvolvido por:
					<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/logo-point.png' ?>"
				alt="Agência Point">
			</div>

		</div><!-- end .powered -->

	</div><!-- end #footer-wrapper -->

	<?php responsive_footer_bottom(); ?>
	</div><!-- end of col-940 -->
</div><!-- end #footer -->
<?php responsive_footer_after(); ?>

<?php wp_footer(); ?>
</body>
</html>