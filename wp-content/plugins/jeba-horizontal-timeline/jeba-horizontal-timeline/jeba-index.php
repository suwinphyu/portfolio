<?php
/*
Plugin Name: Jeba Horizontal Timeline
Plugin URI: http://prowpexpert.com
Description: This is Jeba Horizontal Timeline wordpress timeline plugin really looking awesome sliding. Everyone can use the cute timeline plugin easily like other wordpress plugin. Here everyone can use timeline from post, page or other custom post. Also can use slide timeline from every post category. By using [jeba_timeline] shortcode use the slider every where post, page and template.
Author: Md Jahed
Version: 1.0
Author URI: http://prowpexpert.com/
*/
function jeba_wp_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'jeba_wp_latest_jquery');

function jeba_timeline_plugin_function() {
    wp_enqueue_style( 'jebacss-d', plugins_url( '/js/style.css', __FILE__ ));
}

add_action('init','jeba_timeline_plugin_function');
function jeba_timeline_js() {
    wp_enqueue_script( 'jeba-js-d', plugins_url( '/js/jquery.mobile.custom.min.js', __FILE__ ), true);
    wp_enqueue_script( 'jeba-jss-d', plugins_url( '/js/main.js', __FILE__ ), true);
}

add_action('wp_footer','jeba_timeline_js');
function jeba_script_timeline () {?>
	<script type="text/javascript">
		jQuery(document).ready(function()
			{
				jQuery(".events ol li:first-child a").addClass("selected");
	jQuery(".events-content ol li:first-child").addClass("selected");
			});
	</script>
	<style type="text/css"> 
	.cd-horizontal-timeline ol, .cd-horizontal-timeline ul {
  list-style: outside none none;
}
	</style>
	

<?php
}
add_action('wp_head','jeba_script_timeline');
function jeba_timeline_section_shortcode($atts, $content = null) {

	// Adding shortcode attribute
	extract( shortcode_atts( array(
		'count' => '',
		'category' => '',
		'post_type' => '',
	), $atts) );

	return'<section class="cd-horizontal-timeline">
		  
		  '.do_shortcode('[ttime post_type="'.$post_type.'" category="'.$category.'" count="'.$count.'"]').'
          

	  
	  '.do_shortcode('[tcontent post_type="'.$post_type.'" category="'.$category.'" count="'.$count.'"]').'
	  
	  
			</section>	
	
	';
}
add_shortcode('jeba_timeline', 'jeba_timeline_section_shortcode');

function jeba_timeline_thumb_shortcode($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'count' => -1,
		'post_type' => 'post',
	), $atts ) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $post_type, 'category_name' => $category)
        );		
	$list = ' 	<div class="timeline">
		<div class="events-wrapper">
			<div class="events">
				<ol>';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
	
		$list .= '
			<li><a href="#0" data-date="'.get_the_date('d/m/Y').'">'.get_the_date('j M').'</a></li>
		';        
	endwhile;
	$list.= '</ol>

				<span class="filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->
			
		<ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev inactive">Prev</a></li>
			<li><a href="#0" class="next">Next</a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> <!-- .timeline -->
';
	wp_reset_query();
	return $list;
}
add_shortcode('ttime', 'jeba_timeline_thumb_shortcode');	
function jeba_timeline_content_shortcode($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'count' => -1,
		'post_type' => 'post',
	), $atts ) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $post_type, 'category_name' => $category)
        );		
	$list = ' <div class="events-content">
		<ol>';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$list .= '
			<li data-date="'.get_the_date('d/m/Y').'">
				<h2>'.get_the_title().'</h2>
				<em>'.get_the_date('F jS Y').'</em>
				 
            <p>'.get_the_content().'</p>
          
			</li>
		'; 
	endwhile;
	$list.= '</ol>
	</div> <!-- .events-content -->';
	wp_reset_query();
	return $list;
}
add_shortcode('tcontent', 'jeba_timeline_content_shortcode');	


?>