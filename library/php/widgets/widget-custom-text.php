<?php 

class Eng_custom_text extends WP_Widget {
	function Eng_custom_text() {
		$widget_ops = array('classname' => 'widget_eng_custom_text', 'description' => 'Insert text or HTML' );
		$this->WP_Widget('Eng_custom_text', 'Custom Text', $widget_ops);
	}
 
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
 
		$unique_page_content = get_page_by_title($instance['unique_page_id']);
		global $wp_query;
		$current_page = $wp_query->post->ID;
 
		if ($current_page==$unique_page_content->ID || empty($instance['unique_page_id']) ) {

			echo $before_widget;
			$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
			
			$text = $instance['text'];
			 
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
			
			echo "<div class=\"textwidget\">".wpautop($text)."</div>";

			echo $after_widget;
		}
	}
 
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['text'] = $new_instance['text'];
 
		$instance['unique_page_id'] = $new_instance['unique_page_id'];

		return $instance;
	}
 
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', '$unique_page_id' => '' ) );
		$title = strip_tags($instance['title']);
		
		$text = format_to_edit($instance['text']);

		$unique_page_id = $instance['unique_page_id'];
?>

			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
			
			<label for="<?php echo $this->get_field_id('text'); ?>">Text:</label>

			<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
	
			<p>
				<label for="<?php echo $this->get_field_id( 'unique_page_id' ); ?>">Display only on page:</label>
				<select id="<?php echo $this->get_field_id( 'unique_page_id' ); ?>" name="<?php echo $this->get_field_name( 'unique_page_id' ); ?>" class="widefat" style="width:100%;">
					<option value="">
					<?php echo esc_attr(__('All pages')); ?></option> 
					<?php 
					$pages = get_pages(); 
					foreach ($pages as $pagg) {
						$title = $pagg->post_title;
						$option = '<option ';
						$option .= 'value="'.htmlspecialchars($title).'" ';
						if ($title == $instance['unique_page_id']) {
							$option .= ' selected="selected" >';
						} else {
							$option .= ' >';
						}
						$option .= $title;
						$option .= '</option>';
						echo $option;
				 	 }
				 	?>
				</select>
			</p>
				
<?php
	}
}
register_widget('Eng_custom_text');

?>