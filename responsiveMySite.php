<?php
// include("./admin-post.php");
/*
Plugin Name: Mon premier plugin
Plugin URI: https://joazco.com/
Description: Ceci est mon premier plugin
Author: Mon nom et prénom ou celui de ma société
Version: 1.0
Author URI: http://joazco.com
*/
add_action('admin_menu', 'joazco_plugin_responsiveMySite');

define( 'RESPONSIVEMYSITE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

function joazco_plugin_responsiveMySite(){
    add_menu_page( 'ResponsiveMySite', 'ResponsiveMySite', 'manage_options', 'joazco-plugin-responsiveMySite', 'init_responsiveMySite', 'dashicons-schedule');
}
 
function init_responsiveMySite(){
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ){
        $success = "Bien enregistré";
    } 
    include_once( RESPONSIVEMYSITE__PLUGIN_DIR . '/views/settings.php' );
}
 
function responsiveMySite_plugin_table_install() {
    global $wpdb;
    global $charset_collate;
    $table_name = $wpdb->prefix . 'responsiveMySite';
     $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      `id`  INT NOT NULL AUTO_INCREMENT,
       PRIMARY KEY (`id`)
    )$charset_collate;";

     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     dbDelta( $sql );
}

register_activation_hook(__FILE__,'responsiveMySite_plugin_table_install');