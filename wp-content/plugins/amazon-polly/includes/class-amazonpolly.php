<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       amazon.com
 * @since      1.0.0
 *
 * @package    Amazonpolly
 * @subpackage Amazonpolly/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Amazonpolly
 * @subpackage Amazonpolly/includes
 * @author     AWS Labs
 */
class Amazonpolly {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Amazonpolly_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'amazonpolly';
		$this->version     = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Amazonpolly_Loader. Orchestrates the hooks of the plugin.
	 * - Amazonpolly_I18n. Defines internationalization functionality.
	 * - Amazonpolly_Admin. Defines all hooks for the admin area.
	 * - Amazonpolly_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-amazonpolly-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-amazonpolly-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-amazonpolly-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/amazonpolly-metabox.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-amazonpolly-public.php';

		/**
		 * The class responsible for creating the podcast feature.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-amazonpolly-pollycast.php';

		/**
		 * Load AWS PHP SDK
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'vendor/aws/aws-autoloader.php';

		$this->loader = new Amazonpolly_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Amazonpolly_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Amazonpolly_I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}


	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Amazonpolly_Admin( $this->get_plugin_name(), $this->get_version() );



		$this->loader->add_action( 'admin_print_footer_scripts', $plugin_admin, 'amazon_polly_add_quicktags' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'amazon_polly_field_checkbox' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'amazon_polly_save_post' );
		$this->loader->add_action( 'before_delete_post', $plugin_admin, 'amazon_polly_delete_post' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'amazon_polly_add_options_page' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'amazon_polly_register_settings' );
		$this->loader->add_action( 'wp_ajax_polly_transcribe', $plugin_admin, 'amazon_polly_ajax_transcribe' );

		$plugin = plugin_basename( plugin_dir_path( dirname( __FILE__ ) ) . 'amazonpolly.php' );
		$this->loader->add_filter( "plugin_action_links_$plugin", $plugin_admin, 'plugin_add_settings_link' );
		$this->loader->add_filter( "plugin_action_links_$plugin", $plugin_admin, 'plugin_add_settings_link' );

		$this->loader->add_filter( 'wp_kses_allowed_html', $plugin_admin, 'amazon_polly_allowed_tags' );
		$this->loader->add_filter( 'tiny_mce_before_init', $plugin_admin, 'amazon_polly_allowed_tags_tinymce' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		// Front-end
		$plugin_public = new Amazonpolly_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_filter( 'the_content', $plugin_public, 'amazon_polly_filter', 99999 );
		$this->loader->add_action( 'customize_register', $plugin_public, 'customize_register' );

		// Podcast
		$amazon_pollycast = new Amazonpolly_PollyCast();
		$this->loader->add_filter( 'pre_get_posts', $amazon_pollycast, 'filter_pre_get_posts' );
		$this->loader->add_filter( 'the_excerpt_rss', $amazon_pollycast, 'filter_force_html_decode', 99999 );

		// Pollycast Feed
		$plugin_admin = new Amazonpolly_Admin( $this->get_plugin_name(), $this->get_version() );
		if ( $plugin_admin->amazon_polly_is_podcast_enabled() ) {
			$this->loader->add_action( 'init', $amazon_pollycast, 'create_podcast' );
		}
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Amazonpolly_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
