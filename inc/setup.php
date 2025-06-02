<?php
function mytheme_setup() {
    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'yourplatform'),
    ));

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('/assets/vendor/bootstrap/css/bootstrap.min.css');
}
add_action('after_setup_theme', 'mytheme_setup');
