<?php
class ThemeAssets {
    private static $instance = null;

    private function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

   public function enqueue_assets() {
        $theme_uri = get_template_directory_uri();

        wp_enqueue_style('bootstrap-css', $theme_uri . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '5.3.3');
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), '10.0.0');
        wp_enqueue_style('main-css', $theme_uri . '/assets/css/main.css', array('bootstrap-css', 'swiper-css'), wp_get_theme()->get('Version'));
        wp_enqueue_style('responsive-css', $theme_uri . '/assets/css/responsive.css', array('bootstrap-css', 'main-css', 'swiper-css'), wp_get_theme()->get('Version'));
        wp_enqueue_style('font-awesome', $theme_uri . '/assets/vendor/font-awesome/css/all.min.css', array('bootstrap-css'), wp_get_theme()->get('Version'));
        wp_enqueue_style('theme-style', get_stylesheet_uri(), array('main-css'), wp_get_theme()->get('Version'));

        wp_enqueue_script('bootstrap-js', $theme_uri . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '10.0.0', true);

        // ✅ Enqueue jQuery (required for your init script)
        wp_enqueue_script('jquery');

        // ✅ Your custom Swiper init script
        wp_enqueue_script(
            'main-js',
            $theme_uri . '/assets/js/main.js',
            array('jquery', 'swiper-js'),
            wp_get_theme()->get('Version'),
            true
        );
    }
}


