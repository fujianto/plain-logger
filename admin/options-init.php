<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    function plainLoggerReduxRemoveDemo() {
        if ( class_exists('ReduxFrameworkPlugin') ) :
            remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
        endif;
    }

    add_action( 'admin_menu', 'remove_redux_menu',12 );

    function remove_redux_menu() {
        remove_submenu_page('tools.php','redux-about');
    }

    // Remove Redux Ads
    function plainLoggerReduxAds() {
        ?>
        <style type="text/css">
            .rAds {
                display: none !important;
            }
        </style>
        <?php
    }

    add_action('admin_head' , 'plainLoggerReduxAds');
    add_action('init'       , 'plainLoggerReduxRemoveDemo');

    // This is your option name where all the Redux data is stored.
    $opt_name = "plainLogger";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'plainLogger',
        'display_name' => __('Plain Logger' , 'plainLogger'),
        'display_version' => '0.1',
        'page_slug' => 'plainLogger',
        'page_title' => __('Plain Logger' , 'plainLogger'),
        'update_notice' => TRUE,
        'admin_bar' => TRUE,
        'disable_tracking' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => __('Plain Logger' , 'plainLogger'),
        'allow_sub_menu' => TRUE,
        'dev_mode' => FALSE,
        'page_parent_post_type' => 'your_post_type',
        'default_mark' => '*',
        'page_type' => 'submenu',
        'page_parent' => 'options-general.php',
        'class' => 'plainLoggerWrapper',
        'hints' => array(
            'icon' => 'el el-address-book',
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
                ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
                ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                    ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                    ),
                ),
            ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => FALSE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    /*$args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
        );*/

        Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

   /* $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
    Redux::setHelpSidebar( $opt_name, $content );*/


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title'             => __( 'Log', 'plainLogger' ),
        'id'                => 'log',
        'customizer_width'  => '400px',
        'icon'              => 'el el-glasses',
        'desc'              => __('Your website log can be found below.' , 'plainLogger'),
        'fields'            => array(
            array(
                'id'        => 'plainLoggerArea-log',
                'type'      => 'plainLoggerArea',
                'title'     => '',
                'default'   => '',
                'full_width'=> true,
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Documentation', 'plainLogger' ),
        'id'     => 'docs',
        'icon'   => 'el el-list-alt',
        'fields' => array(
            array(
                'id'       => 'opt-text',
                'type'     => 'textarea',
                'title'    => __( 'Example Text', 'plainLogger' ),
                'desc'     => __( 'Example description.', 'plainLogger' ),
                'subtitle' => __( 'Example subtitle.', 'plainLogger' ),
                )
            )
    ) );

    Redux::setExtensions( 'plainLogger', PLAIN_LOGGER_DIR .'admin/redux-extensions/extensions/plainLoggerArea/extension_plainLoggerArea.php' );
    /*
     * <--- END SECTIONS
     */
