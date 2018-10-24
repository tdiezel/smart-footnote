<?php
/*
Plugin name: Smart Footnote
Plugin URI:
Description: A plugin to insert and edit footnotes through tinyMCE.
Author: Thiago Diezel - Havas
Author URI: https://mtl.havas.com
Version: 1.0
*/

defined( 'ABSPATH' ) || die( 'Cheatin\' uh?' );

define( 'SMFN_VERSION',         '1.0' );
define( 'SMFN_FILE',            __FILE__ );
define( 'SMFN_PLUGIN_BASENAME', plugin_basename( SMFN_FILE ) );
define( 'SMFN_PLUGIN_DIR',      plugin_dir_path( SMFN_FILE ) );


add_action( 'plugins_loaded', 'smfn_init', 20 );

function smfn_init() {

    include( SMFN_PLUGIN_DIR . 'inc/shortcodes.php' );
    include( SMFN_PLUGIN_DIR . 'inc/tinymce.php' );

    /*
     * STYLES
     */

    //Add editor Styles
    add_filter( 'mce_css', 'smfn_editor_style' );
    function smfn_editor_style( $mce_css ){
        $mce_css .= ', ' . plugins_url( 'assets/css/smfn-admin.css', __FILE__ );
        return $mce_css;
    }
    //Add styles to the page
    add_action( 'wp_enqueue_scripts', 'add_scripts_to_front' );
    function add_scripts_to_front() {
        wp_enqueue_style( 'smfn-front-style', plugin_dir_url(SMFN_FILE) . 'assets/css/front.css');
        wp_enqueue_script('smfn-actions', plugin_dir_url(SMFN_FILE) . 'assets/js/smfnfunctions.js', array(), '1.0.0', true);
    }
}

?>