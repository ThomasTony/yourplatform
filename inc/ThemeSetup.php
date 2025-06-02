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

        // Hook to remove duplicate submenu in admin menu
        add_action('admin_head', [$this, 'remove_duplicate_submenu']);
    }

    public function boot_carbon_fields() {
        // Load Composer autoload for Carbon Fields
        require_once get_template_directory() . '/inc/carbon-fields/vendor/autoload.php';

        // Boot Carbon Fields
        Carbon_Fields::boot();
    }

    public function remove_duplicate_submenu() {
        global $submenu;
        if (isset($submenu['theme-options'])) {
            // Remove first submenu item duplicating the parent menu
            unset($submenu['theme-options'][0]);
        }
    }
}

