<?php
/**
 * Plugin Name: My SureCart Dashboard Override
 * Description: Overrides the SureCart dashboard template with a custom version.
 * Version: 1.0
 * Author: Your Name
 */

namespace rupdashextendersc\SureCartDashboard;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'RUPDASHEXTENDERSC_TEMPLATE_LOADED' ) ) {
    define( 'RUPDASHEXTENDERSC_TEMPLATE_LOADED', true );

    /**
     * Override the SureCart dashboard template.
     *
     * @param string $template The original template file.
     * @return string The modified template file if condition is met.
     */
    function override_surecart_dashboard_template( $template ) {
        // Adjust 'customer-dashboard' to match your dashboard page's slug if needed.
        $custom_template = plugin_dir_path( __FILE__ ) . 'templates/my-surecart-dashboard.php';
        if ( file_exists( $custom_template ) ) {
            return $custom_template;
        }
        return $template;
    }
    add_filter( 'template_include', __NAMESPACE__ . '\\override_surecart_dashboard_template', 9999 );
}




if ( ! defined( 'RUPDASHEXTENDERSC_TEMPLATE_LOADED' ) ) {
    define( 'RUPDASHEXTENDERSC_TEMPLATE_LOADED', true );

    /**
     * Override the SureCart dashboard template.
     *
     * @param string $template The original template file.
     * @return string The modified template file if condition is met.
     */
    function override_surecart_dashboard_template( $template ) {
        // Adjust 'customer-dashboard' to match your dashboard page's slug if needed.
        $custom_template = plugin_dir_path( __FILE__ ) . 'templates/my-surecart-dashboard2.php';
        if ( file_exists( $custom_template ) ) {
            return $custom_template;
        }
        return $template;
    }
    add_filter( 'template_include', __NAMESPACE__ . '\\override_surecart_dashboard_template', 9999 );
}




// Your plugin should already be enquirying styles but examples are included here for the dashboard icon and an example icon
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\my_plugin_enqueue_styles' );
function my_plugin_enqueue_styles() {
    $css_url = plugin_dir_url( __FILE__ ) . 'assets/css/myplugin.css';
    wp_enqueue_style( 'my-plugin-styles', $css_url, array(), '1.0' );
}