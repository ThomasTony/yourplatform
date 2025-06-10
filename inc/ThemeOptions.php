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
        add_action('admin_menu', [$this, 'remove_duplicate_submenu'], 999);
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

    public function remove_duplicate_submenu() {
        remove_submenu_page('theme-options', 'theme-options');
    }

    public function register_fields() {

        // Add second options page under 'General Setting'
        Container::make('theme_options', __('General Setting'))
            ->set_page_parent('theme-options') 

            // Contact
            ->add_tab(__('General'), [
                Field::make('text', 'yp_primary_email', __('Primary Email')),
                Field::make('text', 'yp_primary_phone', __('Primary Phone')),
                Field::make('textarea', 'yp_primary_location', __('Primary Location')),
                Field::make('text', 'yp_primary_map_location', __('Google Map Link')),
            ])

            // Header
            ->add_tab(__('Header'), [
                Field::make('select', 'yp_header_menu', __('Header Menu'))
                ->set_required(true)
                ->add_options(function() {
                    $menus = wp_get_nav_menus();

                    $options = [
                        '' => __('Select Menu') 
                    ];

                    foreach ($menus as $menu) {
                        $options[$menu->term_id] = $menu->name;
                    }

                    return !empty($options) ? $options : [0 => __('No menus found')];
                }),
            ])

            // Footer
            ->add_tab(__('Footer'), [
                // Column 1
                Field::make('separator', 'crb_footer_col1_sep', 'Column 1'),
                Field::make('text', 'yp_footer_col1_title', __('Title')),
                Field::make('image', 'yp_footer_col1_image', __('Image')),

                // Column 2
                Field::make('separator', 'crb_footer_col2_sep', 'Column 2'),
                Field::make('text', 'yp_footer_col2_title', __('Title')), 
                Field::make('select', 'yp_footer_col2_menu', __('Menu')) 
                    ->set_required(true)
                    ->add_options(function () {
                        $menus = wp_get_nav_menus();

                        $options = [
                            '' => __('Select Menu') 
                        ];

                        foreach ($menus as $menu) {
                            $options[$menu->term_id] = $menu->name;
                        }

                        return !empty($options) ? $options : [0 => __('No menus found')];
                }),

                // Column 3
                Field::make('separator', 'crb_footer_col_3_sep', 'Column 3'),
                Field::make('text', 'yp_footer_col_3_title', __('Title')), 
                Field::make('select', 'yp_footer_col_3_menu', __('Menu')) 
                    ->set_required(true)
                    ->add_options(function () {
                        $menus = wp_get_nav_menus();

                        $options = [
                            '' => __('Select Menu') 
                        ];

                        foreach ($menus as $menu) {
                            $options[$menu->term_id] = $menu->name;
                        }

                        return !empty($options) ? $options : [0 => __('No menus found')];
                }),

                // Column 4
                Field::make('separator', 'yp_footer_col_4_sep', 'Column 4'),
                Field::make('text', 'yp_footer_col_4_title', __('Title')), 
                Field::make( 'complex', 'yp_footer_col_4_contact_info', 'Contact info' )
                    ->add_fields( array(
                        Field::make( 'text', 'name' ),
                        Field::make( 'text', 'email' ),
                        Field::make( 'text', 'phone' ),
                ) ),

                // Copyrights
                Field::make('separator', 'yp_footer_copyrights_sep', 'Copyrights'),
                Field::make('text', 'yp_copy_rights', __('Copyrights')),

            ]);
        
        // Add second options page under 'General Setting'
        Container::make( 'theme_options', 'Social Links' )
            ->set_page_parent('theme-options') // reference to a top level container
            ->add_fields( array(
                Field::make('text', 'yp_facebook', __('Facebook URL')),
                Field::make('text', 'yp_instagram', __('Instagram URL')),
                Field::make('text', 'yp_linkedin', __('LinkedIn URL')),
                Field::make('text', 'yp_youtube', __('YouTube URL')),
            ));
        
       Container::make('theme_options', 'Sidebar Settings')
        ->set_page_parent('theme-options') // Must match the slug of your top-level theme options page
        ->add_tab(__('Row 1'), [
            Field::make('text', 'yp_sidebar_row_1_title', 'Title'),
            Field::make('textarea', 'yp_sidebar_row_1_content', 'Description')->set_rows(4),
            Field::make('image', 'yp_sidebar_row_1_image', 'Image')->set_value_type('url'),
        ])
        ->add_tab(__('Row 2 - Ad'), [
            Field::make('image', 'yp_sidebar_row_2_image', 'Image')->set_value_type('url'),
            Field::make('text', 'yp_sidebar_row_2_url', 'Ad Link / URL'),
        ])
        ->add_tab(__('Row 3'), [
            Field::make('text', 'yp_sidebar_row_3_title', 'Title'),
        ])
        ->add_tab(__('Row 4'), [
            Field::make('text', 'yp_sidebar_row_4_title', 'Title'),
            Field::make('association', 'yp_sidebar_row_4_categories', 'Select Categories')
                ->set_types([
                    [
                        'type'     => 'term',
                        'taxonomy' => 'category', // default WP taxonomy
                    ],
                ])
                ->set_max(1)
                ->set_help_text('Choose categories to show on homepage.'),
        ])
        ->add_tab(__('Row 5'), [
            Field::make('text', 'yp_sidebar_row_5_title', 'Title'),
            Field::make('association', 'yp_sidebar_row_5_categories', 'Select Categories')
                ->set_types([
                    [
                        'type'     => 'term',
                        'taxonomy' => 'category',
                    ],
                ])
                ->set_max(1)
                ->set_help_text('Choose categories to show on homepage.'),
        ])
        ->add_tab(__('Row 6'), [
            Field::make('text', 'yp_sidebar_row_6_title', 'Title'),
            Field::make('textarea', 'yp_sidebar_row_6_content', 'Description')->set_rows(4),
            Field::make('association', 'yp_sidebar_row_6_contact_form', 'Select Contact Form')
                ->set_types([
                    [
                        'type'      => 'post',
                        'post_type' => 'wpcf7_contact_form',
                    ],
                ])
                ->set_max(1)
                ->set_help_text('Choose a Contact Form 7 form to display.'),
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
    }

    public static function get_sidebar_widgets_info() {
        $data = [];

        // Row 1
        $data['row1'] = [
            'title'       => carbon_get_theme_option('yp_sidebar_row_1_title'),
            'description' => carbon_get_theme_option('yp_sidebar_row_1_content'),
            'image'       => carbon_get_theme_option('yp_sidebar_row_1_image'),
        ];

        // Row 2 (Ad)
        $data['row2'] = [
            'image' => carbon_get_theme_option('yp_sidebar_row_2_image'),
            'url'   => carbon_get_theme_option('yp_sidebar_row_2_url'),
        ];

        // Row 3
        $data['row3'] = [
            'title' => carbon_get_theme_option('yp_sidebar_row_3_title'),
        ];

        // Row 4 (Categories)
        $data['row4'] = [
            'title'      => carbon_get_theme_option('yp_sidebar_row_4_title'),
            'categories' => carbon_get_theme_option('yp_sidebar_row_4_categories'),
        ];

        // Row 5 (Categories)
        $data['row5'] = [
            'title'      => carbon_get_theme_option('yp_sidebar_row_5_title'),
            'categories' => carbon_get_theme_option('yp_sidebar_row_5_categories'),
        ];

        // Row 6 (Contact Form)
        $data['row6'] = [
            'title'       => carbon_get_theme_option('yp_sidebar_row_6_title'),
            'description' => carbon_get_theme_option('yp_sidebar_row_6_content'),
            'contact_form'=> carbon_get_theme_option('yp_sidebar_row_6_contact_form'),
        ];

        return $data;
    }

    public static function get_general_settings() {

        $general_settings = [
            'email'       => carbon_get_theme_option('yp_primary_email'),
            'phone'       => carbon_get_theme_option('yp_primary_phone'),
            'location'    => carbon_get_theme_option('yp_primary_location'),
            'map_link'    => carbon_get_theme_option('yp_primary_map_location'),
        ];

        return $general_settings;
    }

    public static function get_header_menu() {

        $menu_id = carbon_get_theme_option('yp_header_menu');

        if (!$menu_id) {
            return false; // No menu selected
        }

        $menu = wp_get_nav_menu_object((int) $menu_id);

        return $menu ?: false;
    }

    public static function get_footer_settings() {
        return [
            'col1' => [
                'title' => carbon_get_theme_option('yp_footer_col1_title'),
                'image' => carbon_get_theme_option('yp_footer_col1_image'),
            ],
            'col2' => [
                'title' => carbon_get_theme_option('yp_footer_col2_title'),
                'menu_id' => carbon_get_theme_option('yp_footer_col2_menu'),
            ],
            'col3' => [
                'title' => carbon_get_theme_option('yp_footer_col_3_title'),
                'menu_id' => carbon_get_theme_option('yp_footer_col_3_menu'),
            ],
            'col4' => [
                'title' => carbon_get_theme_option('yp_footer_col_4_title'),
                'contact_info' => carbon_get_theme_option('yp_footer_col_4_contact_info'), // This returns an array from complex field
            ],
           'copyrights' => [
                'text' => '© ' . date('Y') . ' ' . get_bloginfo('name') . ', ' . carbon_get_theme_option('yp_copy_rights'),
            ],


        ];
    }

    public static function get_menu_term($menu_id){

         if (!$menu_id) {
            return false; // No menu selected
        }

        $menu = wp_get_nav_menu_object((int) $menu_id);

        return $menu ?: false;
    }



}


