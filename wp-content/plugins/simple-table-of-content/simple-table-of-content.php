<?php
/*
* Plugin Name: Simple Table of Content
* Author: Omar Faruque
* Author URL: http://www.aboutdhaka.com
* Description: A powerful user friendly plugin that automatically creates a table of contents under pages, posts etc.
* Version: 1.0
* Licence: Code House
*/

function tableofContents($atts){ 
	extract(shortcode_atts(array( "tag" => '' ), $atts));
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			var output = ''; 
			
			$("<?= $tag; ?>").each(function(i, val){

				var htmlOut = $(this).html().split('&nbsp;').join('');
				console.log(htmlOut);
				if(htmlOut != ''){
					output += '<li><a href="#'+$(this).html().split(' ').join('_').split('&nbsp;').join('')+'">'+htmlOut+'</a></li>';
					$(this).attr('id', $(this).html().split(' ').join('_').split('&nbsp;').join(''));
				}
			});
			
			$('.of-toc').html('<div class="codeHouseTableContent"><p class="tocHeading"><b>Contents</b> [<a onClick="return false" href="#">Show Table Of Contents</a>]</p><ul class="of-toc-list">'+output+'</ul></div>');
			$('.codeHouseTableContent ul').hide();
		});
	</script>
<?php
return '<div class="of-toc"></div>';
}
add_shortcode('codeHouse-TOC', 'tableofContents');


function add_toc_button() {
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
   if ( get_user_option('rich_editing') == 'true') {
     add_filter('mce_external_plugins', 'add_tableofContent_button_js');
     add_filter('mce_buttons', 'register_toc_button');
   }
}
add_action('init', 'add_toc_button');


function register_toc_button($buttons) {
   array_push($buttons, "|", "table_of_content");
   return $buttons; 
}

function add_tableofContent_button_js($plugin_array) {
   $plugin_array['table_of_content'] = plugin_dir_url( __FILE__ ).'js/editor_plugin.js';
   return $plugin_array;
}

function codeHouse_TOC_EnqueScript() {
        wp_enqueue_style( 'codeHouseTableOfContent', plugin_dir_url(__FILE__) . 'css/codeHouseTableOfContent.css' );
        wp_enqueue_script('codeHouseTableOfContentjs', plugin_dir_url(__FILE__) . 'js/codeHouseTableOfContentjs.js', array(), '2.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'codeHouse_TOC_EnqueScript' );
?>