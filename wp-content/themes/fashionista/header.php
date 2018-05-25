<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php bloginfo('name'); echo ' - '; is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<?php if(get_theme_mod('md_favicon')) : ?>
	<link rel="shortcut icon" href="<?php echo get_theme_mod('md_favicon'); ?>" />
	<?php endif; ?>
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>> 

    <div id="top-bar">
		
		<div class="container">	
        
            <div id="navigation-wrapper">
				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'menu' ) ); ?>
			</div>
        
			<div class="menu-mobile"></div>
			
			<div class="meta_top">

				<!-- Search -->
				<?php if(!get_theme_mod('md_topbar_search_check')) : ?>

				<div class="show-search">
					<?php get_search_form(); ?>
				</div>
					
				<div id="top-search">
						<a href="#"><i class="fa fa-search"></i></a>
				</div>	
				<?php endif; ?>
				<!-- end Search -->		

				<?php if(!get_theme_mod('md_topbar_social_check')) : ?>
				<div id="top-social">
					<span class="text_follow">Follow:</span>
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

			</div> <!--end meta_top -->
			
		</div>
	
	</div>    
	
	<header id="header">
	
		<div class="container">		
            
			<div id="logo">
				
				<?php if(!get_theme_mod('md_logo')) : ?>					
				
						<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
					
				<?php else : ?>
					
						<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_mod('md_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
					
				<?php endif; ?>
				
			</div> <!-- end logo -->
                            
		</div>	 
        
	</header>    
    

    <?php if (!get_theme_mod('md_hide_carousel')) : ?>
    
        <?php if (get_theme_mod('md_show_only_carousel_homepage')) : ?>
        
            <?php if (is_home()) : get_template_part( 'carousel'); endif; ?>
        
        <?php else:  ?>
        
            <?php get_template_part( 'carousel'); ?>
            
        <?php endif; ?>
        
    <?php endif; ?>