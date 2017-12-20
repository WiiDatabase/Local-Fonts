<?php
/*
Plugin Name:  Local Fonts
Plugin URI:   https://github.com/WiiDatabase/Local-Fonts
Description:  Host any fonts locally
Version:      1.0
Author:       iCON
Author URI:   https://wiidatabase.de
License:      MIT
License URI:  https://opensource.org/licenses/MIT
*/

function local_fonts_styles() {
	wp_enqueue_style( 'local-fonts', plugin_dir_url( __FILE__ ) . 'assets/css/local-fonts.min.css' );
}
add_action( 'wp_enqueue_scripts', 'local_fonts_styles' );

function remove_google_fonts() {
	wp_deregister_style('twentythirteen-fonts');
}
add_action('wp_enqueue_scripts','remove_google_fonts',100);

function remove_google_fonts_connect(){
	remove_filter('wp_resource_hints', 'twentythirteen_resource_hints');
}

add_action( 'after_setup_theme', 'remove_google_fonts_connect' );
?>