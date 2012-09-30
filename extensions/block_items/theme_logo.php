<?php
/**
 * Display logo company info
 *
 * @package WordPress
 * @subpackage Layout_Manager
 * @since 1.0.0.0
 */

//Register
add_filter('le_layout_block_objects', array('LE_Theme_Logo','register'));


class LE_Theme_Logo
{
	/**
	 * Register header
	 *
	 * @access public
	 * @since 1.0.0.0
	 */	
	public static function register($objects)
	{
		$objects['theme_logo'] = array
		(
				'name' => __('Runtime logos','layout-engine'),
				'callback' => array('LE_Theme_Logo','render'), //Admin options
				'callback_frontend' => array('LE_Theme_Logo','render_frontend') //frontend
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
			<hgroup class="row">
				<h1 id="site-titlex" class="span4"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-descriptionx" class="span6"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>		
		<?php	
	}	
}


?>