<?php
// Load theme setup and asset handlers
require_once get_template_directory() . '/inc/ThemeSetup.php';
require_once get_template_directory() . '/inc/ThemeAssets.php';  
require_once get_template_directory() . '/inc/ThemeOptions.php';

add_theme_support('block-patterns');

// Initialize singleton instance
ThemeSetup::instance();
ThemeOptions::instance();
ThemeAssets::get_instance();


