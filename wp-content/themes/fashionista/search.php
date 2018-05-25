<?php get_header(); ?>
	
	<div class="container">
	
		<div id="content">
		
			<div id="main" <?php if(get_theme_mod('md_archive_layout') == 'full') : ?>class="fullwidth"<?php endif; ?>>
			
				<div class="archive-box">
	
					<span><?php _e( 'Search results for:', 'maidesign' ); ?></span>
					<h1><?php printf( __( '%s', 'maidesign' ), get_search_query() ); ?></h1>
					
				</div>
				
                <ul class="list_post">	
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
					<?php get_template_part('content','list'); ?>
						
				<?php endwhile; ?>
                </ul>
                
				<?php maidesign_pagination(); ?>
				
				<?php else : ?>
					
					<p class="nothing"><?php _e( 'Sorry, no posts were found. Try searching for something else.', 'maidesign' ); ?></p>
				
				<?php endif; ?>
				
			</div>
	
<?php if(get_theme_mod('md_archive_layout') == 'full') : else : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>