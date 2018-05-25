<?php
/**
 * Plugin Name: Categories list with image Widget
 */

add_action( 'widgets_init', 'maidesign_cat_list_load_widget' );

function maidesign_cat_list_load_widget() {
	register_widget( 'maidesign_cat_list_with_image_widget' );
}

class maidesign_cat_list_with_image_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function maidesign_cat_list_with_image_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'maidesign_cat_list_with_image_widget', 'description' => __('A widget that displays List categories with featured image', 'maidesign_cat_list_with_image_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'maidesign_cat_list_with_image_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'maidesign_cat_list_with_image_widget', __('List categories with images', 'maidesign_cat_list_with_image_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
        $categories = $instance['categories'];		
	
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>				
			
		<?php 
        if (function_exists('z_taxonomy_image_url')) :
             
            if ($categories == 'all' || $categories == 'only_parent') :           
                $args = array(
                  'orderby' => 'id',
                  'parent' => 0                                     
                );                
            else :
                $args = array(
                  'orderby' => 'id',
                  'parent' => $categories
                );    
            endif;
            //////////////////////////////////////////////////////////////////////////////////////////
            //get only parents
            $Parent_categories = get_categories($args);
            ?>
                        
            <ul class="list_cat_with_img">
            
            <?php 
            foreach($Parent_categories as $category) { ?>                              
                <li style="background-image: url(<?php echo z_taxonomy_image_url($category->term_id, 'carousel-thumb'); ?>);">
                    <h2><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->cat_name; ?></a></h2> 
                </li>    
                
                <?php
                if ($categories != 'only_parent') : 
                //get all children of this category
                $args_child = array('orderby' => 'name','order' => 'ASC','parent' => $category->term_id);
                $Child_categories = get_categories($args_child);
                ?>
                
                <ul>                
                    <?php foreach ($Child_categories as $c){ ?>
                        <li style="background-image: url(<?php echo z_taxonomy_image_url($c->term_id, 'carousel-thumb'); ?>);">
                            <h2><a href="<?php echo get_category_link( $c->term_id ); ?>"><?php echo $c->cat_name; ?></a></h2>                        
                        </li>
                        
                    <?php } ?> 
                </ul>
                <?php endif; ?>
                
                
            <?php } ?>
            
            </ul>            
        
        <?php endif; ?>   
        
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['categories'] = $new_instance['categories'];

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Categories', 'maidesign'), 'categories' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'maidesign'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
		</p>
		
		<!-- Category -->
		<p>
		<label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label> 
		<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
			<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>
            <option value='only_parent' <?php if ('only_parent' == $instance['categories']) echo 'selected="selected"'; ?>>Parent categories</option>
			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
			<?php foreach($categories as $category) { ?>
			<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
			<?php } ?>
		</select>
		</p>

	<?php
	}
}

?>