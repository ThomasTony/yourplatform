<?php
class ThemeAssets {
    private static $instance = null;

    private function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function enqueue_assets() {
        $theme_uri = get_template_directory_uri();

        // Bootstrap CSS
        wp_enqueue_style(
            'bootstrap-css',
            $theme_uri . '/assets/vendor/bootstrap/css/bootstrap.min.css',
            array(),
            '5.3.3'
        );

        // Swiper CSS (CDN)
        wp_enqueue_style(
            'swiper-css',
            'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css',
            array(),
            '10.0.0'
        );

        // Main.css (custom stylesheet)
        wp_enqueue_style(
            'main-css',
            $theme_uri . '/assets/css/main.css',
            array('bootstrap-css', 'swiper-css'),
            wp_get_theme()->get('Version')
        );


        // Font Awesome
        wp_enqueue_style(
            'font-awesome',
            $theme_uri . '/assets/vendor/font-awesome/css/all.min.css',
            array('bootstrap-css'),
            wp_get_theme()->get('Version')
        );

        // Theme's main style (optional)
        wp_enqueue_style(
            'theme-style',
            get_stylesheet_uri(),
            array('main-css'),
            wp_get_theme()->get('Version')
        );

        // Bootstrap JS
        wp_enqueue_script(
            'bootstrap-js',
            $theme_uri . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
            array(),
            '5.3.3',
            true
        );

        // Swiper JS (CDN)
        wp_enqueue_script(
            'swiper-js',
            'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js',
            array(),
            '10.0.0',
            true
        );
    }
}


