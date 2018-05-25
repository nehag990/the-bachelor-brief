<?php
//Set content width
if ( ! isset( $content_width ) )
	$content_width = 740;
//////////////////////////////////////////////////////////////////
// Theme set up
//////////////////////////////////////////////////////////////////
add_action( 'after_setup_theme', 'maidesign_theme_setup' );

if ( !function_exists('maidesign_theme_setup') ) {

	function maidesign_theme_setup() {
	
		// Register navigation menu
		register_nav_menus(
			array(
				'main-menu' => 'Primary Menu',
			)
		);
		
		
		// Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
		
		// Feed Links
		add_theme_support( 'automatic-feed-links' );
		
		// Featured image
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'full-thumb', 1080, 0, false );
		add_image_size( 'carousel-thumb', 520, 350, true );	
		add_image_size( 'misc-thumb', 480, 0, false );
        add_image_size( 'rectangle-thumb', 150, 111, true );
	}

}

//////////////////////////////////////////////////////////////////
// Register & enqueue styles/scripts
//////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts','maidesign_load_scripts' );

function maidesign_load_scripts() {

	// Register scripts and styles
	wp_register_style('md_style', get_stylesheet_directory_uri() . '/style.css');
    wp_register_style('bxslider-css', get_template_directory_uri() . '/css/jquery.bxslider.css');
    wp_register_style('slicknav-css', get_template_directory_uri() . '/css/slicknav.css');
	wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
	wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_register_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
	
    wp_register_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', 'jquery', '', true);
    wp_register_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', 'jquery', '', true);
	wp_register_script('md_scripts', get_template_directory_uri() . '/js/maidesign.js', 'jquery', '', true);
	wp_register_script('fitvids', get_template_directory_uri() . '/js/fitvids.js', 'jquery', '', true);
    wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '', true);      
    
	// Enqueue scripts and styles

	wp_enqueue_style('md_style');
    wp_enqueue_style('bxslider-css');
	wp_enqueue_style('slicknav-css');
	wp_enqueue_style('font-awesome');
    wp_enqueue_style('responsive');
	wp_enqueue_style('owl-carousel');
     
	wp_enqueue_style('default_body_font', 'http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic');
    wp_enqueue_style('default_paragraph_font', 'http://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic');
    
    
	wp_enqueue_script('jquery');
    wp_enqueue_script('bxslider');
    wp_enqueue_script('md_scripts');
	wp_enqueue_script('fitvids');	
    wp_enqueue_script('slicknav');
    wp_enqueue_script('owl-carousel');
	
	if (is_singular() && get_option('thread_comments'))	wp_enqueue_script('comment-reply');
	
}

//////////////////////////////////////////////////////////////////
// Include files
//////////////////////////////////////////////////////////////////

// Theme Options
 include('inc/customizer/custom_controller.php');
 include('inc/customizer/customizer_settings.php');
 include('inc/customizer/customizer_style.php');

// Widgets
include("inc/widgets/about_widget.php");
include("inc/widgets/post_widget.php");
include("inc/widgets/categories_widget.php");


//////////////////////////////////////////////////////////////////
// Register footer widgets
//////////////////////////////////////////////////////////////////
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-heading"><span>',
		'after_title' => '</span></h4>',
	));
    
	register_sidebar(array(
		'name' => 'Footer Instagram',
		'before_widget' => '<div id="%1$s" class="widget-instagram %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="block-heading">',
		'after_title' => '</h4>',
		'description' => 'Use the Instagram Slider widget here. Set number of images to 8 or 16.',
	));
}

//////////////////////////////////////////////////////////////////
// PAGINATION
//////////////////////////////////////////////////////////////////
function maidesign_pagination() {
	
	?>
	
	<div class="pagination">

		<div class="older"><?php next_posts_link(__( 'Older Posts <i class="fa fa-angle-double-right"></i>', 'maidesign')); ?></div>
		<div class="newer"><?php previous_posts_link(__( '<i class="fa fa-angle-double-left"></i> Newer Posts', 'maidesign')); ?></div>
		
	</div>
					
	<?php
	
}

//////////////////////////////////////////////////////////////////
// COMMENTS LAYOUT
//////////////////////////////////////////////////////////////////

	function maidesign_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			
			<div class="thecomment">
						
				<div class="author-img">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="comment-text">
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'maidesign'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
						<?php edit_comment_link(__('Edit', 'maidesign')); ?>
					</span>
					<span class="author"><?php echo get_comment_author_link(); ?></span>					
					<?php if ($comment->comment_approved == '0') : ?>
						<em><i class="icon-info-sign"></i> <?php _e('Comment awaiting approval', 'maidesign'); ?></em>
						<br />
					<?php endif; ?>
					<?php comment_text(); ?>
                    <span class="date"><?php printf(__('%1$s at %2$s', 'maidesign'), get_comment_date(),  get_comment_time()) ?></span>
				</div>
						
			</div>
			
			
		</li>

		<?php 
	}

//////////////////////////////////////////////////////////////////
// AUTHOR SOCIAL LINKS
//////////////////////////////////////////////////////////////////
function maidesign_contactmethods( $contactmethods ) {

	$contactmethods['twitter']   = 'Twitter Username';
	$contactmethods['facebook']  = 'Facebook Username';
	$contactmethods['google']    = 'Google Plus Username';
	$contactmethods['tumblr']    = 'Tumblr Username';
	$contactmethods['instagram'] = 'Instagram Username';
	$contactmethods['pinterest'] = 'Pinterest Username';

	return $contactmethods;
}
add_filter('user_contactmethods','maidesign_contactmethods',10,1);

	
	

//////////////////////////////////////////////////////////////////
// PREVENT SCROLL ON READ MORE LINK
//////////////////////////////////////////////////////////////////
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.3.6
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'Vafpress Post Formats UI', // The plugin name
			'slug'     				=> 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/vafpress-post-formats-ui-develop.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Instagram Slider Widget', // The plugin name
			'slug'     				=> 'instagram-slider-widget', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
        array(
			'name'     				=> 'Regenerate Thumbnails', // The plugin name
			'slug'     				=> 'regenerate-thumbnails', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
        array(
			'name'     				=> 'Categories Images', // The plugin name
			'slug'     				=> 'categories-images', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'MailChimp for WordPress', // The plugin name
			'slug'     				=> 'mailchimp-for-wp', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tgmpa';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

/***********Filter excerpt *********/
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**************************pagination************/

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('Previous'),
    'next_text'       => __('Next'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo $paginate_links;
    echo "</nav>";
  }

}

/** Changing excerpt more **/
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**  Tool editor post **/
if ( !function_exists('myformatTinyMCE') ) {	
add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );
function myformatTinyMCE( $in ) {

$in['wordpress_adv_hidden'] = FALSE;

return $in;
}
}

/**
 ******** How to Exclude Pages from WordPress Search Results
 *********/
if (!is_admin())	{  
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');
}

/*
Plugin Name: Durango Reservations Featured Posts
 * Description: A quick plugin to add the Featured Posts code to the DurangoReservations.org website
 * Version: 1.0
 * Author: Sweet P Web Design
 * Author URI: http://www.DurangoWebDevelopment.com
*/

/**
 * Adds a meta box to the post editing screen
 */
function prfx_featured_meta() {
    add_meta_box( 'prfx_meta', __( 'Featured Posts', 'prfx-textdomain' ), 'prfx_meta_callback', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'prfx_featured_meta' );

/**
 * Outputs the content of the meta box
 */

function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

 <p>
    <span class="prfx-row-title"><?php _e( 'Check if this is a featured post: ', 'prfx-textdomain' )?></span>
    <div class="prfx-row-content">
        <label for="featured-checkbox">
            <input type="checkbox" name="featured-checkbox" id="featured-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['featured-checkbox'] ) ) checked( $prfx_stored_meta['featured-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured Item', 'prfx-textdomain' )?>
        </label>

    </div>
</p>   

    <?php
}

/**
 * Saves the custom meta input
 */
function prfx_meta_save( $post_id ) {

    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

// Checks for input and saves - save checked as yes and unchecked at no
if( isset( $_POST[ 'featured-checkbox' ] ) ) {
    update_post_meta( $post_id, 'featured-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'featured-checkbox', 'no' );
}

}
add_action( 'save_post', 'prfx_meta_save' );

?>