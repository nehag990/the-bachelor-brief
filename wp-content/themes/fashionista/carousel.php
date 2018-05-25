<div class="carousel_wrap">
    
    <div class="owl-carousel">
       <?php 
       if (get_theme_mod('md_number_slide')): 
            $num_slide = get_theme_mod('md_number_slide'); 
       else : 
            $num_slide = 6;
       endif; 
       $args = array(
        			'posts_per_page' => $num_slide,
        			'orderby' => 'date',
        			'meta_query' => array(
                                    array(
                                    'key' => 'featured-checkbox',
                                    'value' => 'yes'
                            )
                        )
        		 );
        
        $featured_query = new WP_Query($args); ?>
        
        <?php if ($featured_query-> have_posts()) : while ($featured_query-> have_posts()) : $featured_query-> the_post(); ?> 
             	<?php $thumb_slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'carousel-thumb' );
                        $url_slide = $thumb_slide['0']; ?>				
			     <div class="item">
                 
                    <img src="<?php echo $url_slide; ?>" />
                    
                    <div class="carousel_frame">
                        
                        
                        <div class="intro">
                            <span class="cat_carousel"><?php the_category(' '); ?></span>
                            <a class="intro_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                            <a class="readmore_carousel" href="<?php the_permalink(); ?>">                            
                                <?php _e('Read more'); ?>                                  
                            </a>               
                        </div>
                         
                        
                        
                    </div>
                    
                </div>
             
		<?php endwhile; wp_reset_postdata(); endif ?>
            
    </div>
    
    <div class="clearfix"></div>
</div>
