<?php
global $houzez_opt_name;

$date_languages = array(  'xx'=> 'default',
    'af'=>'Afrikaans',
    'ar'=>'Arabic',
    'ar-DZ' =>'Algerian',
    'az'=>'Azerbaijani',
    'be'=>'Belarusian',
    'bg'=>'Bulgarian',
    'bs'=>'Bosnian',
    'ca'=>'Catalan',
    'cs'=>'Czech',
    'cy-GB'=>'Welsh/UK',
    'da'=>'Danish',
    'de'=>'German',
    'el'=>'Greek',
    'en-AU'=>'English/Australia',
    'en-GB'=>'English/UK',
    'en-NZ'=>'English/New Zealand',
    'eo'=>'Esperanto',
    'es'=>'Spanish',
    'et'=>'Estonian',
    'eu'=>'Karrikas-ek',
    'fa'=>'Persian',
    'fi'=>'Finnish',
    'fo'=>'Faroese',
    'fr'=>'French',
    'fr-CA'=>'Canadian-French',
    'fr-CH'=>'Swiss-French',
    'gl'=>'Galician',
    'he'=>'Hebrew',
    'hi'=>'Hindi',
    'hr'=>'Croatian',
    'hu'=>'Hungarian',
    'hy'=>'Armenian',
    'id'=>'Indonesian',
    'ic'=>'Icelandic',
    'it'=>'Italian',
    'it-CH'=>'Italian-CH',
    'ja'=>'Japanese',
    'ka'=>'Georgian',
    'kk'=>'Kazakh',
    'km'=>'Khmer',
    'ko'=>'Korean',
    'ky'=>'Kyrgyz',
    'lb'=>'Luxembourgish',
    'lt'=>'Lithuanian',
    'lv'=>'Latvian',
    'mk'=>'Macedonian',
    'ml'=>'Malayalam',
    'ms'=>'Malaysian',
    'nb'=>'Norwegian',
    'nl'=>'Dutch',
    'nl-BE'=>'Dutch-Belgium',
    'nn'=>'Norwegian-Nynorsk',
    'no'=>'Norwegian',
    'pl'=>'Polish',
    'pt'=>'Portuguese',
    'pt-BR'=>'Brazilian',
    'rm'=>'Romansh',
    'ro'=>'Romanian',
    'ru'=>'Russian',
    'sk'=>'Slovak',
    'sl'=>'Slovenian',
    'sq'=>'Albanian',
    'sr'=>'Serbian',
    'sr-SR'=>'Serbian-i18n',
    'sv'=>'Swedish',
    'ta'=>'Tamil',
    'th'=>'Thai',
    'tj'=>'Tajiki',
    'tr'=>'Turkish',
    'uk'=>'Ukrainian',
    'vi'=>'Vietnamese',
    'zh-CN'=>'Chinese',
    'zh-HK'=>'Chinese-Hong-Kong',
    'zh-TW'=>'Chinese Taiwan',
);

Redux::setSection( $houzez_opt_name, array(
    'title'  => esc_html__( 'General', 'houzez' ),
    'id'     => 'general-options',
    'desc'   => '',
    'icon'   => 'el-icon-dashboard el-icon-small',
    'fields'        => array(
        array(
            'id'       => 'site_breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html__( 'Breadcrumb?', 'houzez' ),
            'desc'     => '',
            'subtitle' => esc_html__( 'Show breadcrumb', 'houzez' ),
            'default'  => 1,
            'on'       => esc_html__( 'Yes', 'houzez' ),
            'off'      => esc_html__( 'No', 'houzez' ), 
        ),
        array(
            'id'       => 'phone_number_full',
            'type'     => 'switch',
            'title'    => esc_html__( 'Phone/Mobile Number', 'houzez' ),
            'desc'     => '',
            'subtitle' => esc_html__( 'Show full phone number for agents, agencies across the site.', 'houzez' ),
            'default'  => 1,
            'on'       => esc_html__( 'Yes', 'houzez' ),
            'off'      => esc_html__( 'No', 'houzez' ), 
        ),
        array(
            'id'       => 'gallery_caption',
            'type'     => 'switch',
            'title'    => esc_html__( 'Gallery Image Caption?', 'houzez' ),
            'desc'     => '',
            'subtitle' => esc_html__( 'Show impage caption for property detail page gallery?', 'houzez' ),
            'default'  => 0,
            'on'       => esc_html__( 'Yes', 'houzez' ),
            'off'      => esc_html__( 'No', 'houzez' ),
        ),
        array(
            'id'       => 'lightbox_caption',
            'type'     => 'switch',
            'title'    => esc_html__( 'Popup Gallery Image Caption?', 'houzez' ),
            'desc'     => '',
            'subtitle' => esc_html__( 'Show impage caption for popup gallery?', 'houzez' ),
            'default'  => 0,
            'on'       => esc_html__( 'Yes', 'houzez' ),
            'off'      => esc_html__( 'No', 'houzez' ),
        ),
        array(
            'id'       => 'terms_condition',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => esc_html__( 'Terms & Conditions Page', 'houzez' ),
            'subtitle' => '',
            'desc'     => esc_html__( 'Select which page to use for Terms & Conditions', 'houzez' ),
        ),
        array(
            'id'        => 'houzez_date_language',
            'type'      => 'select',
            'title'     => esc_html__( 'Language for datepicker', 'houzez' ),
            'subtitle'  => esc_html__( 'This applies for the calendar field type available for properties.', 'houzez' ),
            'options'   => $date_languages,
            'default' => 'US'
        ),
        /*array(
            'id'        => 'default_country',
            'type'      => 'select',
            'title'     => esc_html__( 'Country', 'houzez' ),
            'subtitle'  => esc_html__( 'Select default country', 'houzez' ),
            'options'   => $Countries,
            'default' => 'US'
        ),*/
        
        array(
            'id'       => 'users_admin_access',
            'type'     => 'switch',
            'title'    => esc_html__( 'Block Users Admin Access?', 'houzez' ),
            'desc'     => '',
            'subtitle' => esc_html__( 'Restrict user admin panel access', 'houzez' ),
            'default'  => 1,
            'on'       => esc_html__( 'Yes', 'houzez' ),
            'off'      => esc_html__( 'No', 'houzez' ),
        ),
        
        array(
            'id'       => 'houzez_templates',
            'type'     => 'select',
            'multi'    => true,
            'title'    => esc_html__('Templates', 'houzez'),
            'subtitle' => esc_html__('Select templates which you want to remove from template list when add new page', 'houzez'),
            'options' => array(
                'template/template-listing-grid-v1.php' => 'Template listings grid v1',
                'template/template-listing-grid-v1-fullwidth-2cols.php' => 'Template listings grid v1 full width 2Cols',
                'template/template-listing-grid-v1-fullwidth-3cols.php' => 'Template listings grid v1 full width 3Cols',
                'template/template-listing-grid-v1-fullwidth-4cols.php' => 'Template listings grid v1 full width 4Cols',
                'template/template-listing-grid-v2.php' => 'Template listings grid v2',
                'template/template-listing-grid-v2-fullwidth-2cols.php' => 'Template listings grid v2 full width 2Cols',
                'template/template-listing-grid-v2-fullwidth-3cols.php' => 'Template listings grid v2 full width 3Cols',
                'template/template-listing-grid-v2-fullwidth-4cols.php' => 'Template listings grid v2 full width 4Cols',
                'template/template-listing-grid-v3.php' => 'Template listings grid v3',
                'template/template-listing-grid-v3-fullwidth-2cols.php' => 'Template listings grid v3 full width 2Cols',
                'template/template-listing-grid-v3-fullwidth-3cols.php' => 'Template listings grid v3 full width 3Cols',
                'template/template-listing-grid-v4.php' => 'Template listings grid v4',
                'template/template-listing-grid-v5.php' => 'Template listings grid v5',
                'template/template-listing-grid-v5-fullwidth-2cols.php' => 'Template listings grid v5 full width 2Cols',
                'template/template-listing-grid-v5-fullwidth-3cols.php' => 'Template listings grid v5 full width 3Cols',
                'template/template-listing-grid-v6.php' => 'Template listings grid v6',
                'template/template-listing-grid-v6-fullwidth-2cols.php' => 'Template listings grid v6 full width 2Cols',
                'template/template-listing-grid-v6-fullwidth-3cols.php' => 'Template listings grid v6 full width 3Cols',
                'template/template-listing-list-v1.php' => 'Template listings list v1',
                'template/template-listing-list-v1-fullwidth.php' => 'Template listings list v1 full width',
                'template/template-listing-list-v2.php' => 'Template listings list v2',
                'template/template-listing-list-v2-fullwidth.php' => 'Template listings list v2 full width',
                'template/template-listing-list-v5.php' => 'Template listings list v5',
                'template/template-listing-list-v5-fullwidth.php' => 'Template listings list v5 full width',
                'template/properties-parallax.php' => 'Template Listings Parallax',
                'template/property-listings-map.php' => 'Property Listing Half Map',
                'template/template-splash.php' => 'Splash Page Template',
                'template/reset_password.php' => 'Reset Password',
                'template/template-agents.php' => 'Template all agents',
                'template/template-agencies.php' => 'Template all agencies',
                'template/template-compare.php' => 'Compare Properties',
                'template/template-packages.php' => 'Packages',
                'template/template-onepage.php' => 'One Page Template',
                'template/template-page.php' => 'Page Template',
                'template/template-payment.php' => 'Payment Page',
                'template/template-stripe-charge.php' => 'Stripe Charge Page',
                'template/template-paypal-ipn.php' => 'Paypal Webhook ( Recurring Payment )',
                'template/blog-masonry.php' => 'Blog Masonry Template',
                'template/user_dashboard_crm.php' => 'Houzez CRM',
                'template/user_dashboard_favorites.php' => 'User Dashboard Favorite Properties',
                'template/user_dashboard_gdpr.php' => 'User Dashboard GDPR Request',
                'template/user_dashboard_insight.php' => 'User Dashboard Insight',
                'template/user_dashboard_invoices.php' => 'User Dashboard Invoices',
                'template/user_dashboard_membership.php' => 'User Dashboard Membership Info',
                'template/user_dashboard_saved_search.php' => 'User Dashboard Saved Search',
            )
        ),

        array(
            'id'       => 'measurement_unit_global',
            'type'     => 'switch',
            'title'    => esc_html__( 'Measurement Unit Globally', 'houzez' ),
            'subtitle' => esc_html__( 'Enable/Disable property measurement unit globally, it will overwrite measurement unit added for single properties', 'houzez' ),
            'default'  => 0,
            'on'       => esc_html__( 'Enabled', 'houzez' ),
            'off'      => esc_html__( 'Disabled', 'houzez' ),
        ),
        array(
            'id'        => 'measurement_unit',
            'type'      => 'select',
            'title'     => esc_html__( 'Measurement Unit', 'houzez' ),
            'subtitle'  => esc_html__( 'Select the measurement unit you will use on the website', 'houzez' ),
            'required' => array( 'measurement_unit_global', '=', '1' ),
            'options'   => array(
                'sqft' => 'Square Feet - ft²',
                'sq_meter' => 'Square Meters - m²',
            ),
            'default' => 'sqft'
        ),
        array(
            'id'        => 'measurement_unit_sqft_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Square Feet Text', 'houzez' ),
            'subtitle'  => esc_html__( 'Enter text for square feet', 'houzez' ),
            'default' => 'sqft'
        ),
        array(
            'id'        => 'measurement_unit_square_meter_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Square Meters Text', 'houzez' ),
            'subtitle'  => esc_html__( 'Enter text for square meters', 'houzez' ),
            'default' => 'm²'
        ),

        /*
        array(
            'id'       => 'site_scroll_top',
            'type'     => 'switch',
            'title'    => esc_html__( 'Scroll To Top?', 'houzez' ),
            'desc'     => '',
            'subtitle' => esc_html__( 'Enable/Disable Scroll to top', 'houzez' ),
            'default'  => 1,
            'on'       => esc_html__( 'Enabled', 'houzez' ),
            'off'      => esc_html__( 'Disabled', 'houzez' ),
        ),*/
        array(
            'id'       => 'sticky_sidebar',
            'type'     => 'checkbox',
            'title'    => esc_html__( 'Sticky Sidebar', 'houzez' ),
            'desc'     => '',
            'subtitle'     => esc_html__('Select in which page templates you want the sidebars to be sticky', 'houzez'),
            'options'  => array(
                'default_sidebar' => esc_html__('Default Page Template (Blog)', 'houzez'),
                'property_listings' => esc_html__('Listing Page', 'houzez'),
                'single_property' => esc_html__('Property Detail Page', 'houzez'),
                'agent_sidebar' => esc_html__('Agent Profile Page', 'houzez'),
                'agency_sidebar' => esc_html__('Agency Profile Page', 'houzez'),
                'search_sidebar' => esc_html__('Search Result Page', 'houzez'),
                'page_sidebar' => esc_html__('Page Template', 'houzez')
            ),
            'default' => array(
                'default_sidebar' => '0',
                'property_listings' => '1',
                'single_property' => '1',
                'agent_sidebar' => '0',
                'agency_sidebar' => '0',
                'search_sidebar' => '0',
                'page_sidebar' => '0'
            )
        ),
    )
));