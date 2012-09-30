<?php
/**
 * Modify layout using filter
 */

/**
 * Available actions (by ref)
 * dynamic_block_{block_name}_before where block_name is name of block e.g. header. action can have two arguments "block" and "block_settings" as array
 * dynamic_block_{block_name}_before_block_items
 * dynamic_block_{block_name}_after where block_name is name of block e.g. header. action can have two arguments "block" and "block_settings" as array
 * If you want to disable certain block base on certain condition(s), you can add hide key to $block
 * You can override render callback of block items by writing a function theme_block_item_{block_item_id} where block_item_id is id of block item e.g. widget, shortcode, post_loop etc.
 */


/**
 * Manipulate block items at runtime.
 * Add logos dynamically without providing any control to user.
 *
 * @since 1.0.0.0
 *
 * @param ref array $block_items list of block items in a block
 * @return void
 */
function le_theme_filter_header_block_items(&$block_items)
{
	if(!empty($block_items))
	{
		$blocks_new = array();
		
		$blocks_new[] = array(
								'id' => 'theme_logo',
								'name' => 'Runtime Logos',
								'title' => '',
								'columns' => 3,
								'runtime_id' => 'o7r7ot',
								'args' => array()
							 );

		foreach($block_items as $item)
			$blocks_new[] = $item;
		
		$block_items = $blocks_new;
	}
}

add_action('dynamic_block_header_before_block_items', 'le_theme_filter_header_block_items')

?>