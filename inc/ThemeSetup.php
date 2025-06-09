<?php
// inc/themesetup.php

use Carbon_Fields\Carbon_Fields;

class ThemeSetup {
    private static $instance = null;

    // Singleton instance method
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Private constructor to prevent direct instantiation
    private function __construct() {
        // Hook to boot Carbon Fields
        add_action('after_setup_theme', [$this, 'boot_carbon_fields']);

        // Hook to set up theme features
        add_action('after_setup_theme', [$this, 'setup_theme']);

        // Register shortcodes on init
        // add_action('init', [$this, 'register_shortcodes']);
    }

    public function boot_carbon_fields() {
        // Load Composer autoload for Carbon Fields
        require_once get_template_directory() . '/inc/carbon-fields/vendor/autoload.php';

        // Boot Carbon Fields
        Carbon_Fields::boot();
    }

    public function setup_theme() {
        // Let WordPress manage the document title
        add_theme_support('title-tag');

        // Enable support for post thumbnails
        add_theme_support('post-thumbnails');

        // Enable support Block Patterns
        add_theme_support('block-patterns');

        // Register navigation menu
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'yourplatform'),
            'popular_category' => __('Popular Category', 'yourplatform'),
        ));

        // Add support for editor styles
        add_theme_support('editor-styles');
        add_editor_style('/assets/vendor/bootstrap/css/bootstrap.min.css');
    }

    // public function register_shortcodes() {
    //     add_shortcode('yourplatform_breadcrumb', [$this, 'breadcrumb_shortcode']);
    // }

    // public function breadcrumb_shortcode($atts) {
    //     ob_start();
    //     get_template_part('template-parts/breadcrumb');
    //     return ob_get_clean();
    // }

}

