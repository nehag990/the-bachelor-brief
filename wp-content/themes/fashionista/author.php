<?php get_header(); ?>
	
	<div class="container">
	
		<div id="content">
		
			<div id="main" <?php if(get_theme_mod('md_archive_layout') == 'full') : ?>class="fullwidth"<?php endif; ?>>
			
				<div class="archive-box">
					
					<span><?php _e( 'All Posts By:', 'maidesign' ); ?></span>
					<h1><?php the_post(); echo get_the_author(); ?></h1>
					
				</div>
				
                <ul class="list_post">		
				<?php rewind_posts(); if (have_posts()) : while (have_posts()) : the_post(); ?>
						
					<?php get_template_part('content','list'); ?>
						
				<?php endwhile; ?>
				</ul>
                
                <div class="clearfix"></div>  
                <div class="control_page">
                       <?php
                            if (function_exists(custom_pagination)) {
                                custom_pagination($custom_query->max_num_pages,"",$paged);
                            }
                       ?>
                </div>
				
				<?php endif; ?>
			
			</div>
	
<?php if(get_theme_mod('md_archive_layout') == 'full') : else : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>