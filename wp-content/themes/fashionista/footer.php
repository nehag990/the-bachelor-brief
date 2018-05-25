		
		
		<!-- END CONTENT -->
		</div>
		
	<!-- END CONTAINER -->
	</div>
	
	<footer id="footer">
        
        <div class="container">
    
	    	<div class="wrap_to_top">
	        	<a href="#" class="to-top"><i class="fa fa-angle-up"></i></a>
	      	</div>	

	    </div>
	    
        <div id="footer-instagram">
    				
    		<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Instagram') ) ?>
    				
    	</div>
        
        <div id="footer_meta">
			
            <div class="container">
            
			<?php if(!get_theme_mod('md_footer_social')) : ?>
            <div class="footer_social">
				<?php if(get_theme_mod('md_facebook')) : ?><a href="http://facebook.com/<?php echo get_theme_mod('md_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if(get_theme_mod('md_twitter')) : ?><a href="http://twitter.com/<?php echo get_theme_mod('md_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if(get_theme_mod('md_instagram')) : ?><a href="http://instagram.com/<?php echo get_theme_mod('md_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if(get_theme_mod('md_pinterest')) : ?><a href="http://pinterest.com/<?php echo get_theme_mod('md_pinterest'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if(get_theme_mod('md_bloglovin')) : ?><a href="http://bloglovin.com/<?php echo get_theme_mod('md_bloglovin'); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
				<?php if(get_theme_mod('md_google')) : ?><a href="http://plus.google.com/<?php echo get_theme_mod('md_google'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if(get_theme_mod('md_tumblr')) : ?><a href="http://<?php echo get_theme_mod('md_tumblr'); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if(get_theme_mod('md_youtube')) : ?><a href="http://youtube.com/<?php echo get_theme_mod('md_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				<?php if(get_theme_mod('md_rss')) : ?><a href="<?php echo get_theme_mod('md_rss'); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
			</div>
            <?php endif; ?> 
		
			<h2><?php echo get_theme_mod('md_footer_copyright'); ?></h2>	
			            
            </div>
            	
		</div>
        
		
	</footer>
	
	<?php wp_footer(); ?>
	
</body>

</html>