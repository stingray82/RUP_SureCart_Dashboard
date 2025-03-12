<?php
/**
 * Plugin Name: My SureCart Dashboard Override
 * Description: Overrides the SureCart dashboard template with a custom version.
 * Version: 1.1
 * Author: Stingray82
 */

namespace rupdashextendersc\SureCartDashboard;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


if ( ! defined( 'RUPDASHEXTENDERSC_TEMPLATE_LOADED' ) ) {
    define( 'RUPDASHEXTENDERSC_TEMPLATE_LOADED', true );

    /**
     * Override the SureCart dashboard template if the current page slug matches the designated dashboard slug.
     *
     * By default, this function checks if the current page's slug is 'customer-dashboard'.
     * However, if the constant RUPDASHEXTENDERSC_TEMPLATE_URL is defined and not empty,
     * its value is used as the dashboard slug instead.
     *
     * @param string $template The original template file.
     * @return string The custom dashboard template if the condition is met, or the original template.
     */
    // Example: To change the dashboard URL slug to 'some-other-url',
    // you can add this line to your theme's functions.php, a custom plugin, or wp-config.php:
    // define( 'RUPDASHEXTENDERSC_TEMPLATE_URL', 'some-other-url' );

    function override_surecart_dashboard_template( $template ) {
        // Set default dashboard slug.
        $dashboard_slug = 'customer-dashboard';

        // Override the default slug if a custom slug is defined via constant.
        if ( defined( 'RUPDASHEXTENDERSC_TEMPLATE_URL' ) && ! empty( RUPDASHEXTENDERSC_TEMPLATE_URL ) ) {
            $dashboard_slug = RUPDASHEXTENDERSC_TEMPLATE_URL;
        }
        
        // Check if the current page matches the dashboard slug.
        if ( is_page( $dashboard_slug ) ) {
            // Build the path to the custom dashboard template.
            $custom_template = plugin_dir_path( __FILE__ ) . 'templates/my-surecart-dashboard.php';
            // If the custom template exists, use it.
            if ( file_exists( $custom_template ) ) {
                return $custom_template;
            }
        }
        // Otherwise, return the original template.
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