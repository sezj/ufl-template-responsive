<?php

/* Register Tabbed Child/Sibling pages List. */

function shortcode_tabbed_nav_menu ($atts, $content = null) {  
	global $post;
	$child_of = $post->post_parent;
	if ( $atts['level'] == 'siblings') {
		$child_of = $post->post_parent;
	}
	if ( $atts['level'] == 'children') {
		$child_of = $post->ID;
	}

	// Extract shortcode arguments
	extract(shortcode_atts(array(
		'exclude' => '',
		'include' => '',				// include only the designated pages
		'sort_column' => 'menu_order',
		'sort_order' => 'ASC',
		'level' => 'siblings'			// change to 'children' to display current page children
	), $atts));

	$content = do_shortcode($content);

	$args = (array(
	    'child_of' => $child_of,    
	    'title_li' => '',
	    'depth' => 1,
		'exclude' => $exclude,
	    'include' => $include,
	    'sort_column' => $sort_column,
	    'sort_order' => $sort_order,
	    'echo' => 0,
	    'walker' => new ufandshands_page_walker
	));
	$page_list = wp_list_pages($args);
	$tabbed_menu .= '<ul class="tabs">'. $page_list .'</ul>';
	if ( is_page_template('template-full-width.php') ) {
		$tabbed_menu .= '<div class="tab-content span-22 alpha omega">';
	} else {
		$tabbed_menu .= '<div class="tab-content span-17 alpha omega">';
	}
	$tabbed_menu .= $content;
	$tabbed_menu .= '</div><br class="clear" />';
	return $tabbed_menu;
}  

add_shortcode('tabbed-nav-menu', 'shortcode_tabbed_nav_menu'); 

?>