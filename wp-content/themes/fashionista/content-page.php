<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
   
    
    <div class="post-header">
    		
    	
    		<h1><?php the_title(); ?></h1>
    		           
            <?php if(!get_theme_mod('md_author_date_comment_page')) : ?>
            <div class="post-meta">
    
                    <?php if(!get_theme_mod('md_hide_comment_count')) : ?>
	                <?php if ( comments_open()) :
	        		echo '<div class="comment_count"><i class="fa fa-commenting-o"></i>';
	        		comments_popup_link( 'Comment', '1 Comment', '% Comments', '', '');
	        		echo '</div>';
	        		endif; ?>
	                <?php endif; ?>
                
            		<?php if(!get_theme_mod('md_post_date')) : ?>
                    <div class="meta_date">
            		<i class="fa fa-calendar"></i><?php the_time( get_option('date_format') ); ?>
                    </div>
            		<?php endif; ?>
            		
            		<?php if(!get_theme_mod('md_post_author_name')) : ?>
                    <div class="meta_author">
            		     <i class="fa fa-user"></i><?php the_author_posts_link(); ?>
                    </div>
            		<?php endif; ?>
                                        
            </div>		
            <?php endif; ?>
	</div>
    				
	<?php if(has_post_format('gallery')) : ?>
	
		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
		
		<?php if($images) : ?>
		<div class="post-img">
		<ul class="bxslider">
		<?php foreach($images as $image) : ?>
			
			<?php $the_image = wp_get_attachment_image_src( $image, 'full-thumb' ); ?> 
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li><img src="<?php echo $the_image[0]; ?>" <?php if($the_caption) : ?>title="<?php echo $the_caption; ?>"<?php endif; ?> /></li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		<?php endif; ?>
	
	<?php elseif(has_post_format('video')) : ?>
	
		<div class="post-img">
			<?php $md_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
			<?php if(wp_oembed_get( $md_video )) : ?>
				<?php echo wp_oembed_get($md_video); ?>
			<?php else : ?>
				<?php echo $md_video; ?>
			<?php endif; ?>
		</div>
	
	<?php elseif(has_post_format('audio')) : ?>
	
		<div class="post-img audio">
			<?php $md_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
			<?php if(wp_oembed_get( $md_audio )) : ?>
				<?php echo wp_oembed_get($md_audio); ?>
			<?php else : ?>
				<?php echo $md_audio; ?>
			<?php endif; ?>
		</div>
	
	<?php else : ?>
		
		<?php if(has_post_thumbnail() && !get_theme_mod('md_post_thumb_front_page') )  : ?>
        
		<?php if(!get_theme_mod('md_post_thumb')) : ?>
        
            <div class="post-img">
            
                <?php if(is_single()) : ?>
                
        			<?php the_post_thumbnail('full-thumb'); ?>
                    
        		<?php else : ?>
                
        			<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('full-thumb'); ?></a>
                    
        		<?php endif; ?> 
    		</div>
            
        <?php else : ?>
            
            <div class="post-img">
            
                <?php if(is_single()) : ?>
                    
                    <!-- Not show featured image -->        			
                    
        		<?php else : ?>
        			
                    <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('full-thumb'); ?></a>
                    
        		<?php endif; ?> 
                
            </div>
                
		<?php endif; ?>
        
		<?php endif; ?>
		
	<?php endif; ?>       
                	    
	<div class="post-entry">
		
		<?php the_content(__('<span class="more-button">Read more</span>', 'maidesign')); ?>
		
		<?php wp_link_pages(); ?>
        
	</div>      
                    
    <?php if(!get_theme_mod('md_page_share')) : ?>
    
	<div class="post-share">
        			
		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
        <a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php the_title(); ?>%20-%20<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-thumb' ); ?>
        <?php endif; ?>
        <a class="btnPinIt" href="<?php the_permalink(); ?>" data-image="<?php echo $image[0]; ?>" data-desc="<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a>
        <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
	
    </div>
	<?php endif; ?>	    
    
</article>

<?php comments_template( '', true );  ?>