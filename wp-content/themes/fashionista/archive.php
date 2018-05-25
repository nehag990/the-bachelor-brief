<?php get_header(); ?>
	
	<?php if (have_posts()) : ?>
	
	<div class="container">
	
		<div id="content">
		
			<div id="main" <?php if(get_theme_mod('md_archive_layout') == 'full') : ?>class="fullwidth"<?php endif; ?>>
			
				<div class="archive-box">
	
					<?php
						if ( is_day() ) :
							echo _e( '<span>Daily Archives</span>', 'maidesign' );
							printf( __( '<h1>%s</h1>', 'maidesign' ), get_the_date() );

						elseif ( is_month() ) :
							echo _e( '<span>Monthly Archives</span>', 'maidesign' );
							printf( __( '<h1>%s</h1>', 'maidesign' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'maidesign' ) ) );

						elseif ( is_year() ) :
							echo _e( '<span>Yearly Archives</span>', 'maidesign' );
							printf( __( '<h1>%s</h1>', 'maidesign' ), get_the_date( _x( 'Y', 'yearly archives date format', 'maidesign' ) ) );

						else :
							_e( '<h1>Archives</h1>', 'maidesign' );

						endif;
					?>
					
				</div>
				
                <ul class="list_post">		
				<?php while (have_posts()) : the_post(); ?>
						
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