<li>
<article id="post-<?php the_ID(); ?>" <?php post_class('post_list'); ?>>     
    
    <div class="side_left">
    			
	<?php if(has_post_format('gallery')) : ?>
	
		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
		
		<?php if($images) : ?>
		<div class="post-img">
		<ul class="bxslider">
		<?php foreach($images as $image) : ?>
			
			<?php $the_image = wp_get_attachment_image_src( $image, 'misc-thumb' ); ?> 
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
		
		<?php if(has_post_thumbnail()) : ?>
        
		<?php if(!get_theme_mod('md_post_thumb')) : ?>
        
            <div class="post-img">
            
                <?php if(is_single()) : ?>
                
        			<?php the_post_thumbnail('misc-thumb'); ?>
                    
        		<?php else : ?>
                
        			<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('misc-thumb'); ?></a>
                    
        		<?php endif; ?> 
    		</div>
            
        <?php else : ?>
            
            <div class="post-img">  
        			
                    <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('misc-thumb'); ?></a>                    
        	
            </div>
                
		<?php endif; ?>
        
		<?php endif; ?>
		
	<?php endif; ?> 
    </div>	<!-- end side_left -->   
    
    <div class="side_right">
    
        <div class="post-header">

    		<?php if(!get_theme_mod('md_post_cat')) : ?>
			<span class="cat-blog"><?php the_category(' '); ?></span>
			<?php endif; ?>
    		
    		<?php if(is_single()) : ?>
    			<h1><?php the_title(); ?></h1>
    		<?php else : ?>
    			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
    		<?php endif; ?>     
    		
    	</div>       
                    	    
    	<div class="post-entry">
    		
    		<?php the_excerpt(); ?>
    		
    		<?php wp_link_pages(); ?>
            
    	</div>    	
        
		
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
        
     </div> <!-- end side-right -->
    
    
</article> 
</li>