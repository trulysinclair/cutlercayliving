<?php
/**
 * Name         : Elementor Addons For Houzez
 * Description  : Provides additional Elementor Elements for the Houzez theme
 * Author : Waqas Riaz
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Houzez_Elementor_Extensions' ) ) {
    final class Houzez_Elementor_Extensions {

        const HOUZEZ_GROUP = 'houzez';

        /**
         * Houzez_Extensions The single instance of Houzez_Extensions.
         * @var     object
         * @access  private
         * @since   1.5.6
         */
        private static $_instance = null;

        /**
         * Constructor function.
         * @access  public
         * @since   1.5.6
         * @return  void
         */
        public function __construct() {
            add_action( 'elementor/elements/categories_registered', array( $this, 'add_widget_categories' ) );
            add_action( 'elementor/widgets/widgets_registered', array( $this, 'elementor_widgets' ) );
            add_action( 'elementor/frontend/before_enqueue_scripts', [ $this, 'houzez_enqueue_scripts' ] );
            add_action( 'elementor/dynamic_tags/register_tags', [ $this, 'register_tags' ] );
        }

        /**
         * Houzez_Elementor_Extensions Instance
         *
         * Ensures only one instance of Houzez_Elementor_Extensions is loaded or can be loaded.
         *
         * @since 1.5.6
         * @static
         * @return Houzez_Elementor_Extensions instance
         */
        public static function instance () {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }


        /**
         * Widget Category Register
         *
         * @since  1.5.6
         * @access public
         */
        public function add_widget_categories( $elements_manager ) {
            $elements_manager->add_category(
                'houzez-elements',
                [
                    'title' => esc_html__( 'Houzez Elements', 'houzez-theme-functionality' ),
                    'icon' => 'fa fa-plug',
                ]
            );

            if( did_action( 'elementor_pro/init' ) ) {
                $elements_manager->add_category(
                    'houzez-single-property',
                    [
                        'title' => esc_html__( 'Houzez Single Property', 'houzez-theme-functionality' ),
                        'icon' => 'fa fa-plug',
                    ]
                );
            }
        }

        /**
         * Widgets
         *
         * @since  1.0.0
         * @access public
         */
        public function elementor_widgets() {

            if( class_exists('houzez_data_source') ) {
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/section-title.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/space.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/search-builder.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/advanced-search.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/page-title.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/sort-by.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/listings-tabs.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-cards-v1.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-cards-v2.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-cards-v3.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-cards-v4.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-cards-v5.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-cards-v6.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/properties.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-carousel-v1.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-carousel-v2.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-carousel-v3.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-carousel-v5.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-carousel-v6.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-by-id.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-by-ids.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/grids.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/grid-builder.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/properties-grids.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/properties-slider.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/google-map.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/agents.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/contact-form.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/inquiry-form.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/testimonials.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/testimonials-v2.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/team-member.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/partners.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/icon-box.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/blog-posts.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/blog-posts-carousel.php';
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/price-table.php';

                if( did_action( 'elementor_pro/init' ) ) {
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/breadcrumb.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-title.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-price.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-address.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/item-tools.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/status-label.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/item-label.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/featured-label.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-content.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-excerpt.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/featured-image.php';
                    require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/section-overview.php';
                }

            }
        }

        public function register_tags( $dynamic_tags ) {
        
            // In our Dynamic Tag we use a group named request-variables so we need 
            // To register that group as well before the tag
            \Elementor\Plugin::$instance->dynamic_tags->register_group( self::HOUZEZ_GROUP, [
                'title' => 'Houzez' 
            ] );

            $files = [
                'property-title',
                'property-excerpt',
            ];

            foreach ( $files as $file ) {
                require_once HOUZEZ_PLUGIN_PATH . '/elementor/tags/'.$file.'.php';
            }


            $tags = [
                'Property_Title_Tag',
                'Property_Excerpt_Tag',
            ];

            foreach ( $tags as $tag ) {
                $dynamic_tags->register_tag( $tag );
            }

        }


        /**
         * Enqueue scripts
         *
         * @since  1.0.0
         * @access public
         */
        public function houzez_enqueue_scripts() {
            $js_path = 'assets/frontend/js/';
            wp_enqueue_script( 'houzez-elementor-scripts', HOUZEZ_PLUGIN_URL . $js_path . 'maps.min.js', array( 'jquery' ), '1.0.0' );
        }
    }
}

if ( did_action( 'elementor/loaded' ) ) {
    // Finally initialize code
    Houzez_Elementor_Extensions::instance();
}