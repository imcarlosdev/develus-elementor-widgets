<?php
namespace DevelusElementorWidgets;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class DevelusElementorWidgetsPlugin {
	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;
	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		//wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
	}
	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		//require_once( __DIR__ . '/widgets/quick-links/quick-links.php' );
		//require_once( __DIR__ . '/widgets/pages-navigation/pages-navigation.php' );
		require_once( __DIR__ . '/widgets/php-includer/php-includer.php' );
	}
	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();
    // Register Widgets
    // \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\BSAQuickLinks() );

    	//\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\BSAPagesNavigation() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\DevelusPhpIncluderClass() );
	}
	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {
		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		// Register widgets
    	add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
    	// Register widgets categories
    	add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );
  }

  public function add_elementor_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
      'develus-widgetsx',
      [
        'title' => __( 'Develus Widgets', 'develus-elementor-widgets-text-domain' ),
        'icon' => 'fa fa-plug',
      ]
    );
  }
}
// Instantiate Plugin Class
DevelusElementorWidgetsPlugin::instance();
/*
// Activation Hook
function bsa_elementor_widgets_activation() {

}
register_activation_hook(__FILE__, 'bsa_elementor_widgets_activation');

// Deactivation Hook
function bsa_elementor_widgets_deactivation() {

}
register_deactivation_hook(__FILE__, 'bsa_elementor_widgets_deactivation');

// Scripts
function bsa_elementor_widgets_scripts() {
  wp_enqueue_style('bsa-elementor-widgets', plugins_url('assets/css/style.min.css', __FILE__));
  wp_enqueue_script('bsa-elementor-widgets', plugins_url('assets/js/bsa-elementor-widgets.min.js', __FILE__), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'bsa_elementor_widgets_scripts');

require('widgets/widgets.php');
*/
?>
