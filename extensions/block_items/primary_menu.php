<?php
/**
 * Display primary menu
 *
 * @package WordPress
 * @subpackage Layout_Manager
 * @since 1.0.0.0
 */

//Register
add_filter('le_layout_block_objects', array('LE_Theme_Primary_Menu','register'));


class LE_Theme_Primary_Menu
{
	/**
	 * Register header
	 *
	 * @access public
	 * @since 1.0.0.0
	 */	
	public static function register($objects)
	{
		$objects['theme_menu'] = array
		(
				'name' => __('Primary menu','layout-engine'),
				'callback' => array('LE_Theme_Primary_Menu','render'), //Admin options
				'callback_frontend' => array('LE_Theme_Primary_Menu','render_frontend') //frontend
		);
			
		return $objects;
	}
	
	/**
	 * Callback to render configuration form.
	 * @see /plugins/layout-engine/blocks/block.shortcode.php for simplified configruation handling example
	 *
	 * @access public
	 * @since 1.0.0.0
	 */	
	public static function render()
	{
		_e('Sorry; but widget does not have any options', 'twentyeleven');	
	}
	
	/**
	 * Display
	 *
	 * @since 1.0.0.0
	 *
	 * @param array $block_item
	 * @param string $layout layout id
	 * @param array $block block settings
	 * @return void
	 */
	public static function render_frontend($block_item = array(), $layout = "", $block = array())
	{
			?>
			<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
				<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->			
			<?php	
	}	
}


?>