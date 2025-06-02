<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ThemeOptions {
    private static $instance = null;

    // Get the singleton instance
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Private constructor to prevent direct instantiation
    private function __construct() {
        add_action('carbon_fields_register_fields', [$this, 'register_fields']);
        add_action('admin_menu', [$this, 'add_admin_menu']);
    }

    public function add_admin_menu() {
        add_menu_page(
            __('Theme Options'),
            __('Theme Options'),
            'manage_options',
            'theme-options',        // Menu slug
            '__return_null',        // No custom callback; Carbon Fields renders page
            'dashicons-admin-generic',
            61
        );
    }

    public function register_fields() {
        Container::make('theme_options', __('Theme Options'))
            ->set_page_parent('theme-options')  // Must match menu slug above
            ->add_tab(__('Social Links'), [
                Field::make('text', 'yp_facebook', __('Facebook URL')),
                Field::make('text', 'yp_instagram', __('Instagram URL')),
                Field::make('text', 'yp_linkedin', __('LinkedIn URL')),
                Field::make('text', 'yp_youtube', __('YouTube URL')),
            ])
            ->add_tab(__('Contact'), [
                Field::make('text', 'yp_contact_email', __('Contact Email')),
                Field::make('text', 'yp_contact_phone', __('Contact Phone')),
            ]);
    }

    public static function get_social_links() {
        
        $field_list = ['facebook', 'instagram', 'x', 'youtube', 'linkedin'];
        $data = [];

        foreach($field_list as $field){
            $value = carbon_get_theme_option('yp_'.$field);
            if($value){
                $data[$field] = $value;
            }
        }

        return $data;

        // return [
        //     'facebook_url'    => carbon_get_theme_option('yp_facebook_url'),
        //     'instagram_url'   => carbon_get_theme_option('yp_instagram_url'),
        //     'linkedin_url'    => carbon_get_theme_option('yp_linkedin_url'),
        //     'youtube_url'     => carbon_get_theme_option('yp_youtube_url')
        // ];
    }

}


