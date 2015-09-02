<?php

class Eng_Widget_FeatureBox extends WP_Widget {

	function Eng_Widget_FeatureBox() {
		$widget_ops = array('classname' => 'featurebox', 'description' => 'Insert a feature box using HTML. Styled for the Home Page Features Footer widget area.');
		$this->WP_Widget('featurebox', 'Feature Box', $widget_ops);
	}

function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		global $wp_query;
		$current_page = $wp_query->post->ID;
	 
			echo $before_widget;
			remove_filter( 'widget_title', 'esc_html' );
			$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
			$subtitle = empty($instance['subtitle']) ? '' : apply_filters('widget_subtitle', $instance['subtitle']);
			$full_list_url = empty($instance['full_list_url']) ? '' : apply_filters('widget_full_list_url', $instance['full_list_url']);
			$full_list_linktext = empty($instance['full_list_linktext']) ? '' : apply_filters('widget_full_list_linktext', $instance['full_list_linktext']);
			$imgurl = empty($instance['imgurl']) ? '&nbsp;' : apply_filters('widget_imgurl', $instance['imgurl']);
			$imglink = empty($instance['imglink']) ? '' : apply_filters('widget_imglink', $instance['imglink']);
			$caption = empty($instance['caption']) ? '' : apply_filters('widget_caption', $instance['caption']);

			echo "<div class=\"heading\">";
				
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };			
			if ( !empty( $full_list_linktext ) ) { echo "<h5><a href=\"".$full_list_url."\">".$full_list_linktext."</a> &raquo;</h5>"; };		
			echo "</div>";
			echo "<div class=\"ufl-highlight\">";
				if($imglink){ echo "<a href=\"".$imglink."\" >"; };
				if ( !empty( $subtitle ) ) {echo "<h4>".$subtitle."</h4>";};
				echo "<img src=\"".$imgurl."\" title=\"$title: $subtitle\" alt=\"$title: $subtitle\" />";
				echo "<p>".$caption."</p>"; 
				if($imglink){ echo "<span></span></a>"; };
				
				echo "<br class=\"clear_hide\" />";
			echo "</div>";
				

			echo $after_widget;
	}
 
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title'], '<br><br />');
		$instance['subtitle'] = strip_tags($new_instance['subtitle'], '<br><br />');
		$instance['full_list_url'] = strip_tags($new_instance['full_list_url']);
		$instance['full_list_linktext'] = strip_tags($new_instance['full_list_linktext']);
		$instance['imgurl'] = strip_tags($new_instance['imgurl']);
		$instance['imglink'] = strip_tags($new_instance['imglink']);
		$instance['caption'] = strip_tags($new_instance['caption'], '<br><br />');
		return $instance;
	}
 
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'subtitle' => '', 'full_list_url' => '', 'full_list_linktext' => '', 'imgurl' => '', 'imglink' => '', 'caption' => '' ) );
		$title = strip_tags($instance['title'], '<br><br />');
		$subtitle = strip_tags($instance['subtitle'], '<br><br />');
		$full_list_url = strip_tags($instance['full_list_url']);
		$full_list_linktext = strip_tags($instance['full_list_linktext']);
		$imgurl = strip_tags($instance['imgurl']);
		$imglink = strip_tags($instance['imglink']);
		$caption = esc_textarea($instance['caption']);
?>

			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('subtitle'); ?>">Subtitle: <input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo esc_attr($subtitle); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('full_list_linktext'); ?>">Full List (View All) Link Text: <input class="widefat" id="<?php echo $this->get_field_id('full_list_linktext'); ?>" name="<?php echo $this->get_field_name('full_list_linktext'); ?>" type="text" value="<?php echo esc_attr($full_list_linktext); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('full_list_url'); ?>">Link (URL) when you click Full List: <input class="widefat" id="<?php echo $this->get_field_id('full_list_url'); ?>" name="<?php echo $this->get_field_name('full_list_url'); ?>" type="text" value="<?php echo esc_attr($full_list_url); ?>" /></label></p>

			
			<p><label for="<?php echo $this->get_field_id('imgurl'); ?>">Location (URL) of Image: <input class="widefat" id="<?php echo $this->get_field_id('imgurl'); ?>" name="<?php echo $this->get_field_name('imgurl'); ?>" type="text" value="<?php echo esc_attr($imgurl); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('imglink'); ?>">Link (URL) when you click: <input class="widefat" id="<?php echo $this->get_field_id('imglink'); ?>" name="<?php echo $this->get_field_name('imglink'); ?>" type="text" value="<?php echo esc_attr($imglink); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('caption'); ?>">Caption (limit 200 characters): <textarea maxlength="200" class="widefat" rows="3" cols="20" id="<?php echo $this->get_field_id('caption'); ?>" name="<?php echo $this->get_field_name('caption'); ?>"><?php echo $caption; ?></textarea></label></p>

<?php	}
}
register_widget('Eng_Widget_FeatureBox');
?>