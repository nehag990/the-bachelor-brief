<div class="post-pagination">
	
	<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
	?>
	
	<?php if (!empty( $prev_post )) : ?>
	<span class="pagi-prev"><a href="<?php echo get_permalink( $prev_post->ID ); ?>"><i class="fa fa-caret-left"></i></i> <?php _e('Previous Post', 'maidesign'); ?></a></span>
	<?php endif; ?>
	
	<?php if (!empty( $next_post )) : ?>
	<span class="pagi-next"><a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php _e('Next Post', 'maidesign'); ?> <i class="fa fa-caret-right"></i></a></span>
	<?php endif; ?>
	
</div>