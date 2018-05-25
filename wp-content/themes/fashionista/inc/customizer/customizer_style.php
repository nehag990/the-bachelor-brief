<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
function maidesign_customizer_css() {
    ?>
    <style type="text/css">      
        
        #logo {
            padding-top:<?php echo get_theme_mod( 'md_header_padding_top' ); ?>px;
            padding-bottom:<?php echo get_theme_mod( 'md_header_padding_bottom' ); ?>px;            
        }
        
        <?php if(get_theme_mod( 'md_show_date_related' )) : ?>        
        .item-related span.date {
            display: block;
        }
        <?php endif; ?>

        /**********************Menu color****************/
         <?php if(get_theme_mod( 'md_menu_text_color' )) : ?>
        .menu li a, 
        #top-social a, 
        ul.menu ul a, .menu ul ul a,
        .slicknav_nav a,
        #top-search a 
        {
            color: <?php echo get_theme_mod( 'md_menu_text_color' ); ?>;
        }
        #navigation-wrapper .menu > li.menu-item-has-children > a:after {
            color: <?php echo get_theme_mod( 'md_menu_text_color' ); ?>;
        }
        .slicknav_menu .slicknav_icon-bar {
            background-color: <?php echo get_theme_mod( 'md_menu_text_color' ); ?>;
        }
        <?php endif; ?> 

        <?php if(get_theme_mod( 'md_background_menu_color' )) : ?>
        #top-bar, .menu .sub-menu, .menu .children {
            background-color: <?php echo get_theme_mod( 'md_background_menu_color' ); ?>;
        }        
        <?php endif; ?>  

        <?php if(get_theme_mod( 'md_border_menu_dropdown' )) : ?>
        ul.menu ul a, .menu ul ul a,
        ul.menu ul li:last-child a
        {
            border-color: <?php echo get_theme_mod( 'md_border_menu_dropdown' ); ?>;
        }  

        <?php endif; ?>

        <?php if(get_theme_mod( 'md_box_shadow_menu' )) : ?>
        #top-bar {
            box-shadow: 0px 1px 5px rgba(190, 190, 190, 0.30);
            -webkit-box-shadow: 0px 1px 5px rgba(190, 190, 190, 0.30);
            -moz-box-shadow: 0px 1px 5px rgba(190, 190, 190, 0.30);
        }  
        <?php endif; ?>  
        /**********************End menu color****************/

        /**********************Footer color****************/ 
        <?php if(get_theme_mod( 'md_footer_text_color' )) : ?>       
        #footer_meta h2, .footer_social a {
            color: <?php echo get_theme_mod( 'md_footer_text_color' ); ?>;
        }
        <?php endif; ?>

        <?php if(get_theme_mod( 'md_footer_background_color' )) : ?>
        #footer_meta {
            background-color: <?php echo get_theme_mod( 'md_footer_background_color' ); ?>;
        }
        <?php endif; ?>

        /**********************End footer color****************/
        <?php if(get_theme_mod( 'md_post_author_name' )) : ?>
        .meta_date {
            border-right: none;
            margin-right: 0;
            padding-right: 0;
        }
        <?php endif; ?> 

        /************************************************COLOR ACCENT***********************/
        <?php if(get_theme_mod( 'md_color_accent' )) : ?>  
        a,
        #navigation-wrapper .menu > li.menu-item-has-children > a:hover:after,
        .cat-blog a,
        .more-button,
        .post-tags a,
        .menu li a:hover,
        ul.menu ul a:hover,
		.menu ul ul a:hover,
        .meta_author a:hover,
        .comment_count a:hover,
        .author-content h5 a,
        .post-tags a:hover,
        .widget .list_cat_with_img li:hover h2 a,
        .cat_carousel a,
        .post-entry blockquote p:before       
        {
	      color: <?php echo get_theme_mod( 'md_color_accent' ); ?>;
		}
        
        .cat-blog a:hover,
        .comment_heading h4:after,
        #respond h3:after,
        .cat_carousel a:hover,
        .post-comments span.reply a:hover,
        .widget-heading>span:after,
        .widget .tagcloud a:hover       
        {
		  background-color: <?php echo get_theme_mod( 'md_color_accent' ); ?>;
		}

        .widget .tagcloud a:hover,
        .cat_carousel a,
        .cat-blog a
        {
          border-color: <?php echo get_theme_mod( 'md_color_accent' ); ?>;  
        }
        
        <?php endif; ?>          
        /************************************************END COLOR ACCENT***********************/

		<?php if(get_theme_mod( 'md_custom_css' )) : ?>
		<?php echo get_theme_mod( 'md_custom_css' ); ?>
		<?php endif; ?>               
		
    </style>
    <?php
}
add_action( 'wp_head', 'maidesign_customizer_css' );

?>