<?php
/*
Plugin Name: Insert Aside
Plugin URI: http://enigmastation.com
Description: Plugin inserts "aside" content
Author: Joseph B. Ottinger (joeo@enigmastation.com)
Version: 1.0
Author URI: http://enigmastation.com/
*/

add_filter('the_content', 'handle_insert_aside');
add_action('wp_print_styles', 'handle_insert_aside_stylesheet');

function handle_insert_aside_stylesheet() {
   wp_register_style( 'insert_aside_stylesheet', get_bloginfo('wpurl') . 
   '/wp-content/plugins/insert-aside/insert-aside.css');
   wp_enqueue_style('insert_aside_stylesheet');
}


function handle_insert_aside($the_content)
{
   $new_content=preg_replace("/\[aside\]/i", "<div class='insertaside'>", $the_content);
   $new_content=preg_replace("/\[\/aside\]/i", "</div>", $new_content);
   return $new_content;
}
?>