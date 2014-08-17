<?php 
	add_action('init', function(){
		remove_action('admin_menu', 'cyberchimps_add_upsell');
		remove_action( 'tgmpa_register', 'responsive_install_plugins' );
		remove_action( 'admin_init', 'responsive_theme_options_init' );
		remove_action( 'admin_menu', 'responsive_theme_options_add_page' );
	});
?>