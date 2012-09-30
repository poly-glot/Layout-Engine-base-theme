<?php
/**
 * If user has not installed Layout Engine framework, then inform user to do so
 */

function le_framework_installed()
{
			$template_dir = get_template_directory();
			if(!class_exists('LE_Base'))
			{
				$message = __(sprintf('This theme cannot be run without Layout Engine framwork. Please <a href="%1$s">click here install it</a>.', admin_url('plugin-install.php?tab=search&s=layout+engine&plugin-search-input=Search+Plugins')),'twentyeleven');
	
				if(is_admin())
				{
					add_action( 'admin_notices', 'le_framework_admin_notice' );					
				}else{
					wp_die($message);	
				}
			}
}

function le_framework_admin_notice()
{
		$ct = wp_get_theme();
		$theme_name = $ct->display('Name');
		
		$message = __(sprintf('The current theme <b>%2$s</b> cannot be run without Layout Engine framwork. Please <a href="%1$s">click here install it</a>.', admin_url('plugin-install.php?tab=search&s=layout+engine&plugin-search-input=Search+Plugins'), $theme_name),'twentyeleven');
		$plugins = get_plugins();
		
		if(is_array($plugins) && array_key_exists('layout-engine/layout-engine.php', $plugins))
		{
			$message = __(sprintf('The current theme <b>%2$s</b> cannot be run without Layout Engine framwork. Please <a href="%1$s">click here to active layout engine</a>.', admin_url('plugins.php?plugin_status=inactive'), $theme_name),'twentyeleven');
		}
		//if ( strpos( $_SERVER['PHP_SELF'], 'profile.php' ) && isset( $_GET['updated'] ) && $email = get_option( get_current_user_id() . '_new_email' ) )
		//echo "<div class='update-nag'>" . sprintf( __( "Your email address has not been updated yet. Please check your inbox at %s for a confirmation email." ), $email['newemail'] ) . "</div>";	
		
		echo "<div class='error'>$message</div>";
}
add_action('init','le_framework_installed');

//Remove Twenty Eleven Options, as Layout Engine provide more powerful features
function le_remove_twenty_eleven_options()
{
	 remove_action( 'admin_menu', 'twentyeleven_theme_options_add_page' );
}
add_action('_admin_menu','le_remove_twenty_eleven_options');

?>