<?php
/**
 * The main template file.
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_LE
 */



get_header(); 

//Exclude header and footer as we already loaded them elsewhere.
@dynamic_block(array('exclude_block_sections'=>array('header','footer')));

get_footer();

?>