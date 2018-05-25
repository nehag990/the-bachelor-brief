<?php get_header(); ?>
    
    <div class="container">
        
        <div id="content">
        
            <div id="main" <?php if(get_theme_mod('md_blog_layout') == 'full') : ?>class="fullwidth"<?php endif; ?>>
            
                <ul class="list_post">
                
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                    <?php if(get_theme_mod('md_blog_layout') != 'normal') : ?>
                            
                        <?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
                        <!-- First post -->
                        <?php get_template_part('content'); ?>
                        <?php endif; ?>                         
                        
                        <?php if( $wp_query->current_post != 0  && !is_paged() || is_paged() ) : ?>
                        <?php get_template_part('content','list'); ?>
                        <?php endif; ?>
                        
                    <?php else : ?>  
                        
                        <?php get_template_part('content'); ?>
                        
                    <?php endif; ?>
                    
                <?php endwhile; wp_reset_query(); endif; ?> 

                </ul>
                
                <div class="clearfix"></div>
                
                <div class="control_page">
                       <?php
                            if (function_exists(custom_pagination)) {
                                custom_pagination($custom_query->max_num_pages,"",$paged);
                            }
                       ?>
                </div>
                
            </div>  
            
                 
            
<?php if(get_theme_mod('md_blog_layout') == 'full') : else : ?><?php get_sidebar(); ?><?php endif; ?>       
<?php get_footer(); ?>