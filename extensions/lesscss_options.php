<?php
/**
 * Hook into settings extracted from LessCSS and manipulate them.
 *
 * @param $settings extracted from less.css
 * @since 1.0.0.0
 * @return array
 */
function modify_le_lesscss_settings($settings)
{
	//Define choices for Font
	if(array_key_exists('theme-font', $settings))
	{
		$settings['theme-font']['choices'] = array(
												  		'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
														'Georgia, "Times New Roman", Times, serif' => 'Georgia, "Times New Roman", Times, serif',
														'"Courier New", Courier, monospace' => '"Courier New", Courier, monospace',
														'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
														'"Palatino Linotype", "Book Antiqua", Palatino, serif' => '"Palatino Linotype", "Book Antiqua", Palatino, serif'
				   								  );
	}
	return $settings;
}
add_filter('le_lesscss_settings','modify_le_lesscss_settings');



?>