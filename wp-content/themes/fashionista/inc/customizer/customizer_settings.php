<?php

//////////////////////////////////////////////////////////////////
// Customizer - Add Custom Styling
//////////////////////////////////////////////////////////////////
function maidesign_customizer_style()
{
	wp_enqueue_style('customizer-css', get_stylesheet_directory_uri() . '/functions/customizer/css/customizer.css');
}
add_action('customize_controls_print_styles', 'maidesign_customizer_style');

//////////////////////////////////////////////////////////////////
// Customizer - Add Settings
//////////////////////////////////////////////////////////////////
function maidesign_register_theme_customizer( $wp_customize ) {
 	
	// Add Sections
	
	$wp_customize->add_section( 'maidesign_new_section_custom_css' , array(
   		'title'      => 'Custom CSS',
   		'description'=> 'Add your custom CSS which will overwrite the theme CSS',
   		'priority'   => 103,
	) );
	
	$wp_customize->add_section( 'maidesign_new_section_color_general' , array(
   		'title'      => 'Colors: General',
   		'description'=> '',
   		'priority'   => 102,
	) );
	
	$wp_customize->add_section( 'maidesign_new_section_footer' , array(
   		'title'      => 'Footer Settings',
   		'description'=> '',
   		'priority'   => 97,
	) );
	
	$wp_customize->add_section( 'maidesign_new_section_social' , array(
   		'title'      => 'Social Settings',
   		'description'=> 'Enter your social media usernames. Icons will not show if left blank.',
   		'priority'   => 96,
	) );

	$wp_customize->add_section( 'maidesign_new_section_page' , array(
   		'title'      => 'Page Settings',
   		'description'=> '',
   		'priority'   => 95,
	) );
	
	$wp_customize->add_section( 'maidesign_new_section_post' , array(
   		'title'      => 'Post Settings',
   		'description'=> '',
   		'priority'   => 94,
	) );
    $wp_customize->add_section( 'maidesign_new_section_related' , array(
   		'title'      => 'Related Posts Settings',
   		'description'=> '',
   		'priority'   => 94,
	) );
	
	$wp_customize->add_section( 'maidesign_new_section_logo_header' , array(
   		'title'      => 'Header Settings',
   		'description'=> '',
   		'priority'   => 92,
	) );
    $wp_customize->add_section( 'maidesign_new_section_carousel' , array(
   		'title'      => 'Slider area Settings',
   		'description'=> '',
   		'priority'   => 91,
	) );

	$wp_customize->add_section( 'maidesign_new_section_general' , array(
   		'title'      => 'General Settings',
   		'description'=> '',
   		'priority'   => 89,
	) );

	// Add Setting
		
		// General
		$wp_customize->add_setting(
			'md_favicon'
		);
		$wp_customize->add_setting(
	        'md_blog_layout',
	        array(
	            'default'     => 'list'
	        )
	    );       
                
        
		// Header & Logo
		$wp_customize->add_setting(
	        'md_menu_text_color',
	        array(
	            'default'     => '#000'
	        )
	    );
	    $wp_customize->add_setting(
	        'md_background_menu_color',
	        array(
	            'default'     => '#FFF'
	        )
	    );
	    $wp_customize->add_setting(
	        'md_border_menu_dropdown',
	        array(
	            'default'     => '#3D3D3D'
	        )
	    );
	    $wp_customize->add_setting(
	        'md_box_shadow_menu',
	        array(
	            'default'     => false
	        )
	    );
		$wp_customize->add_setting(
	        'md_logo'
	    );
		$wp_customize->add_setting(
	        'md_logo_retina'
	    );
		$wp_customize->add_setting(
	        'md_header_padding_top',
	        array(
	            'default'     => '114'
	        )
	    );
		$wp_customize->add_setting(
	        'md_header_padding_bottom',
	        array(
	            'default'     => '26'
	        )
	    );	    

	    // Carousel slider
        $wp_customize->add_setting(
	        'md_hide_carousel',
            array(
	            'default'     => false
	        )
	    );  
        $wp_customize->add_setting(
	        'md_show_only_carousel_homepage',
            array(
	            'default'     => false
	        )
	    );  
        $wp_customize->add_setting(
	        'md_number_slide',
            array(
	            'default'     => 6
	        )
	    );  
		      
		// Related settings
       $wp_customize->add_setting(
	        'md_change_text_related',
	        array(
	            'default'     => 'Related:'
	        )
	    );
        $wp_customize->add_setting(
	        'md_related_by',
	        array(
	            'default'     => 'cat'
	        )
	    );
        $wp_customize->add_setting(
	        'md_related_order',
	        array(
	            'default'     => 'rand'
	        )
	    );        
        
        $wp_customize->add_setting(
	        'md_show_date_related',
	        array(
	            'default'     => false
	        )
	    );
        $wp_customize->add_setting(
	        'md_show_related_only_single',
	        array(
	            'default'     => false
	        )
	    );   
	          
		// Post Settings
		$wp_customize->add_setting(
	        'md_post_tags',
	        array(
	            'default'     => false
	        )
	    );
		$wp_customize->add_setting(
	        'md_post_author',
	        array(
	            'default'     => false
	        )
	    );
		$wp_customize->add_setting(
	        'md_post_related',
	        array(
	            'default'     => false
	        )
	    );
		$wp_customize->add_setting(
	        'md_post_share',
	        array(
	            'default'     => false
	        )
	    );
		$wp_customize->add_setting(
	        'md_post_thumb',
	        array(
	            'default'     => false
	        )
	    );
        $wp_customize->add_setting(
	        'md_post_thumb_front_page',
	        array(
	            'default'     => false
	        )
	    );        

		$wp_customize->add_setting(
	        'md_post_author_name',
	        array(
	            'default'     => false
	        )
	    );
		$wp_customize->add_setting(
	        'md_post_cat',
	        array(
	            'default'     => false
	        )
	    );
        
		// Page
		$wp_customize->add_setting(
	        'md_page_share',
	        array(
	            'default'     => false
	        )
	    );
        
        $wp_customize->add_setting(
	        'md_author_date_comment_page',
	        array(
	            'default'     => false
	        )
	    );
        
		// Social Media
		
		$wp_customize->add_setting(
	        'md_facebook',
	        array(
	            'default'     => 'mailoveparis'
	        )
	    );
		$wp_customize->add_setting(
	        'md_twitter',
	        array(
	            'default'     => ''
	        )
	    );
		$wp_customize->add_setting(
	        'md_instagram',
	        array(
	            'default'     => ''
	        )
	    );
		$wp_customize->add_setting(
	        'md_pinterest',
	        array(
	            'default'     => ''
	        )
	    );
		$wp_customize->add_setting(
	        'md_tumblr',
	        array(
	            'default'     => ''
	        )
	    );
		$wp_customize->add_setting(
	        'md_bloglovin',
	        array(
	            'default'     => ''
	        )
	    );
		$wp_customize->add_setting(
	        'md_tumblr',
	        array(
	            'default'     => ''
	        )
	    );
		$wp_customize->add_setting(
	        'md_google',
	        array(
	            'default'     => ''
	        )
	    );
		$wp_customize->add_setting(
	        'md_youtube',
	        array(
	            'default'     => ''
	        )
	    );
		$wp_customize->add_setting(
	        'md_rss',
	        array(
	            'default'     => ''
	        )
	    );
		
		// Footer Options

	    $wp_customize->add_setting(
	        'md_footer_social',
	        array(
	            'default'     => false
	        )
	    );

		$wp_customize->add_setting(
	        'md_footer_copyright',
	        array(
	            'default'     => '&copy; 2016 Your copyright. All Rights Reserved - Designed by <a href="http://www.mailovedesign.com">Mai</a>'
	        )
	    );		
		$wp_customize->add_setting(
	        'md_color_accent',
	        array(
	            'default'     => 'B4967B'
	        )
	    );	
	    $wp_customize->add_setting(
	        'md_footer_text_color',
	        array(
	            'default'     => '#C7C7C7'
	        )
	    );
	    $wp_customize->add_setting(
	        'md_footer_background_color',
	        array(
	            'default'     => '#141414'
	        )
	    );	
	    
	    
            		
		// Custom CSS
		$wp_customize->add_setting(
			'md_custom_css'
		);

    // Add Control
	
		// General
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'upload_favicon',
				array(
					'label'      => 'Upload Favicon',
					'section'    => 'maidesign_new_section_general',
					'settings'   => 'md_favicon',
					'priority'	 => 1
				)
			)
		);
		
    	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'blog_layout',
				array(
					'label'          => 'Homepage Layout',
					'section'        => 'maidesign_new_section_general',
					'settings'       => 'md_blog_layout',
					'type'           => 'radio',
					'priority'	 => 2,
					'choices'        => array(
						'list'   => 'First full - Then list',
						'normal'  => 'Normal'
					)
				)
			)
		);
		// Header and Logo
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_text_color',
				array(
					'label'      => 'Menu text color',
					'section'    => 'maidesign_new_section_logo_header',
					'settings'   => 'md_menu_text_color',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'background_menu_color',
				array(
					'label'      => 'Menu Background Color',
					'section'    => 'maidesign_new_section_logo_header',
					'settings'   => 'md_background_menu_color',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'border_menu_dropdown',
				array(
					'label'      => 'Border Dropdown Menu',
					'section'    => 'maidesign_new_section_logo_header',
					'settings'   => 'md_border_menu_dropdown',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'box_shadow_menu',
				array(
					'label'      => 'Box shadow for Menu bar',
					'section'    => 'maidesign_new_section_logo_header',
					'settings'   => 'md_box_shadow_menu',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		
		
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'upload_logo',
				array(
					'label'      => 'Upload Logo',
					'section'    => 'maidesign_new_section_logo_header',
					'settings'   => 'md_logo',
					'priority'	 => 6
				)
			)
		);
		
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_top',
				array(
					'label'      => 'Top Header Padding',
					'section'    => 'maidesign_new_section_logo_header',
					'settings'   => 'md_header_padding_top',
					'type'		 => 'number',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_bottom',
				array(
					'label'      => 'Bottom Header Padding',
					'section'    => 'maidesign_new_section_logo_header',
					'settings'   => 'md_header_padding_bottom',
					'type'		 => 'number',
					'priority'	 => 9
				)
			)
		);
        
        
        /* Carousel */
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'md_hide_carousel',
				array(
					'label'      => 'Hide Slider',
					'section'    => 'maidesign_new_section_carousel',
					'settings'   => 'md_hide_carousel',
					'type'		 => 'checkbox',
					'priority'	 => 31
				)
			)
		);
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'show_only_carousel_homepage',
				array(
					'label'      => 'Show Slider only homepage',
					'section'    => 'maidesign_new_section_carousel',
					'settings'   => 'md_show_only_carousel_homepage',
					'type'		 => 'checkbox',
					'priority'	 => 31
				)
			)
		);
        
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'number_slide',
				array(
					'label'      => 'Number of slide',
					'section'    => 'maidesign_new_section_carousel',
					'settings'   => 'md_number_slide',
					'type'		 => 'number',
					'priority'	 => 31
				)
			)
		);        
        
		// Post Settings
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_cat',
				array(
					'label'      => 'Hide Category',
					'section'    => 'maidesign_new_section_post',
					'settings'   => 'md_post_cat',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_author_name',
				array(
					'label'      => 'Hide Author Name',
					'section'    => 'maidesign_new_section_post',
					'settings'   => 'md_post_author_name',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_tags',
				array(
					'label'      => 'Hide Tags',
					'section'    => 'maidesign_new_section_post',
					'settings'   => 'md_post_tags',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_share',
				array(
					'label'      => 'Hide Share Buttons',
					'section'    => 'maidesign_new_section_post',
					'settings'   => 'md_post_share',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_author',
				array(
					'label'      => 'Hide Author Box',
					'section'    => 'maidesign_new_section_post',
					'settings'   => 'md_post_author',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_related',
				array(
					'label'      => 'Hide Related Posts Box',
					'section'    => 'maidesign_new_section_post',
					'settings'   => 'md_post_related',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_thumb',
				array(
					'label'      => 'Hide Featured Image of Single Sost (Individual post)',
					'section'    => 'maidesign_new_section_post',
					'settings'   => 'md_post_thumb',
					'type'		 => 'checkbox',
					'priority'	 => 8
				)
			)
		);
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_thumb_front_page',
				array(
					'label'      => 'Hide All Featured Image of post',
					'section'    => 'maidesign_new_section_post',
					'settings'   => 'md_post_thumb_front_page',
					'type'		 => 'checkbox',
					'priority'	 => 9
				)
			)
		);

        //Related post settings
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'change_text_related',
				array(
					'label'      => 'Change text: Related',
					'section'    => 'maidesign_new_section_related',
					'settings'   => 'md_change_text_related',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
        
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'related_by',
				array(
					'label'          => 'Related posts by',
					'section'        => 'maidesign_new_section_related',
					'settings'       => 'md_related_by',
					'type'           => 'radio',
					'priority'	 => 9,
					'choices'        => array(
						'cat'   => 'Categories',
						'tag'  => 'Tags'
					)
				)
			)
		);
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'related_order',
				array(
					'label'          => 'Order of Related posts',
					'section'        => 'maidesign_new_section_related',
					'settings'       => 'md_related_order',
					'type'           => 'radio',
					'priority'	 => 10,
					'choices'        => array(
						'rand'   => 'random',
						'date'  => 'Date'
					)
				)
			)
		);
        
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'show_date_related',
				array(
					'label'      => 'Show date at bottom of related posts',
					'section'    => 'maidesign_new_section_related',
					'settings'   => 'md_show_date_related',
					'type'		 => 'checkbox',
					'priority'	 => 11
				)
			)
		);
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'show_related_only_single',
				array(
					'label'      => 'Show related only at single post (individual post)',
					'section'    => 'maidesign_new_section_related',
					'settings'   => 'md_show_related_only_single',
					'type'		 => 'checkbox',
					'priority'	 => 11
				)
			)
		);

		// Page
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_share',
				array(
					'label'      => 'Hide Share Buttons',
					'section'    => 'maidesign_new_section_page',
					'settings'   => 'md_page_share',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
        
        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'author_date_comment_page',
				array(
					'label'      => 'Hide author name, date & comment count of page',
					'section'    => 'maidesign_new_section_page',
					'settings'   => 'md_author_date_comment_page',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
        
		// Social Media
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'facebook',
				array(
					'label'      => 'Facebook',
					'section'    => 'maidesign_new_section_social',
					'settings'   => 'md_facebook',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'twitter',
				array(
					'label'      => 'Twitter',
					'section'    => 'maidesign_new_section_social',
					'settings'   => 'md_twitter',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'instagram',
				array(
					'label'      => 'Instagram',
					'section'    => 'maidesign_new_section_social',
					'settings'   => 'md_instagram',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pinterest',
				array(
					'label'      => 'Pinterest',
					'section'    => 'maidesign_new_section_social',
					'settings'   => 'md_pinterest',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'bloglovin',
				array(
					'label'      => 'Bloglovin',
					'section'    => 'maidesign_new_section_social',
					'settings'   => 'md_bloglovin',
					'type'		 => 'text',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'google',
				array(
					'label'      => 'Google Plus',
					'section'    => 'maidesign_new_section_social',
					'settings'   => 'md_google',
					'type'		 => 'text',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'tumblr',
				array(
					'label'      => 'Tumblr',
					'section'    => 'maidesign_new_section_social',
					'settings'   => 'md_tumblr',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'youtube',
				array(
					'label'      => 'Youtube',
					'section'    => 'maidesign_new_section_social',
					'settings'   => 'md_youtube',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'rss',
				array(
					'label'      => 'RSS Link',
					'section'    => 'maidesign_new_section_social',
					'settings'   => 'md_rss',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		
		// Footer
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_social',
				array(
					'label'      => 'Disable Footer Social',
					'section'    => 'maidesign_new_section_footer',
					'settings'   => 'md_footer_social',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_copyright',
				array(
					'label'      => 'Footer Copyright Text',
					'section'    => 'maidesign_new_section_footer',
					'settings'   => 'md_footer_copyright',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_background_color',
				array(
					'label'      => 'Footer Background Color',
					'section'    => 'maidesign_new_section_footer',
					'settings'   => 'md_footer_background_color',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_text_color',
				array(
					'label'      => 'Footer Text Color',
					'section'    => 'maidesign_new_section_footer',
					'settings'   => 'md_footer_text_color',
					'priority'	 => 2
				)
			)
		);
        
        // Color Settings				
			// Colors accent
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_accent',
				array(
					'label'      => 'Accent Color',
					'section'    => 'maidesign_new_section_color_general',
					'settings'   => 'md_color_accent',
					'priority'	 => 1
				)
			)
		);
		// Custom CSS
		$wp_customize->add_control(
			new Customize_CustomCss_Control(
				$wp_customize,
				'custom_css',
				array(
					'label'      => 'Custom CSS',
					'section'    => 'maidesign_new_section_custom_css',
					'settings'   => 'md_custom_css',
					'type'		 => 'custom_css',
					'priority'	 => 1
				)
			)
		);
        
	
		
	

	// Remove Sections
	$wp_customize->remove_section( 'title_tagline');
	$wp_customize->remove_section( 'nav');
	$wp_customize->remove_section( 'static_front_page');
	$wp_customize->remove_section( 'colors');
	$wp_customize->remove_section( 'background_image');
	
 
}
add_action( 'customize_register', 'maidesign_register_theme_customizer' );
?>