<?php
/**
 * Twenty Eleven (LE) functions and definitions
 */

$template_dir = get_stylesheet_directory();

// If user has not installed layout engine framework, informat user to do so.
require( $template_dir . '/extensions/compatibility.php' );

if(class_exists('LE_Base'))
{
			// Create theme settings based on LessCSS and hooks
			require( $template_dir . '/extensions/lesscss_options.php' );
			
			// Create default layout, custom blocks and custom block items
			require( $template_dir . '/extensions/layout.php' );
			
			//Custom drag and drop objects based on twenty eleven theme using LE API
			require( $template_dir . '/extensions/block_items/random_header.php' );
			require( $template_dir . '/extensions/block_items/primary_menu.php' );
			require( $template_dir . '/extensions/block_items/theme_logo.php' );
			
			//Implement hard coded layout through plugin api.
			require( $template_dir . '/extensions/hard_coded_filters.php' );
	
			//Fixing template checks
			if ( ! isset( $content_width ) ) $content_width = 900;
}


?>