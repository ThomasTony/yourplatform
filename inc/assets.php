<?php
function mytheme_enqueue_assets() {
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

    // Main theme style (optional)
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        array('bootstrap-css', 'swiper-css'),
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
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');
