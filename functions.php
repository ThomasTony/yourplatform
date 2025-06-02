<?php
// Load theme setup and asset handlers
require_once get_template_directory() . '/inc/ThemeSetup.php';
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/assets.php';  
require_once get_template_directory() . '/inc/ThemeOptions.php';


// Initialize singleton instance
ThemeSetup::instance();
ThemeOptions::instance();


