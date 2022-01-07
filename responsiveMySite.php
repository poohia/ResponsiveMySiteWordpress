<?php
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
/*
Plugin Name: Mon premier plugin
Plugin URI: https://joazco.com/
Description: Ceci est mon premier plugin
Author: Mon nom et prénom ou celui de ma société
Version: 1.0
Author URI: http://joazco.com
*/
define( 'RESPONSIVEMYSITE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

add_action('admin_menu', 'joazco_plugin_responsiveMySite');
register_activation_hook(__FILE__,'responsiveMySite_plugin_table_install');
register_deactivation_hook(__FILE__, 'joazco_plugin_responsiveMySiteUninstall');
register_uninstall_hook(__FILE__, 'joazco_plugin_responsiveMySiteUninstall');


function joazco_plugin_responsiveMySite(){
    add_menu_page( 'ResponsiveMySite', 'ResponsiveMySite', 'manage_options', 'joazco-plugin-responsiveMySite', 'init_responsiveMySite', 'dashicons-schedule');
}
 
function init_responsiveMySite(){
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ){
        $success = "Bien enregistré";
    } 
    echo "<br />";
    echo "<br />";
    // echo get_bloginfo("siteurl");
    // echo "<br />";
    // echo "<br />";
    // echo get_bloginfo("name");
    // echo "<br />";
    // echo "<br />";
    // echo get_bloginfo("admin_email");
    // echo "<br />";
    // echo "<br />";
    // echo get_background_color();
    // echo "<br />";
    // echo "<br />";
    // echo get_theme_mod("primary_color", '#'.get_background_color());
    $url =  get_bloginfo("siteurl");
    $name = get_bloginfo("name");
    $color = gettype(get_background_color()) === "string"? get_theme_mod("primary_color", '#'.get_background_color()) : get_theme_mod("primary_color", '#32485e');
    echo $url;
    echo "<br />";
    echo "<br />";
    echo $name;
    echo "<br />";
    echo "<br />";
    echo $color;
    echo "<br />";
    echo "<br />";
    echo gettype(get_background_color());
    echo "<br />";
    echo "<br />";
    echo get_site_icon_url();
    
    include_once( RESPONSIVEMYSITE__PLUGIN_DIR . '/views/settings.php' );
}
 
function responsiveMySite_plugin_table_install() {
    $url =  get_bloginfo("siteurl");
    $name = get_bloginfo("name");
    $color = gettype(get_background_color()) === "string"? get_theme_mod("primary_color", '#'.get_background_color()) : get_theme_mod("primary_color", '#32485e');
    if(strpos($url, "localhost") !== false){
        echo "This plugin can't work's with <i>". $url ."</i> url";
        die;
    }
    global $wpdb;
    global $charset_collate;
    $table_name = $wpdb->prefix . 'responsiveMySite';
    $sql = "CREATE TABLE IF NOT EXISTS `wordpress`.`$table_name` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `url` VARCHAR(255) NOT NULL , `themeColor` VARCHAR(10) NULL , `icon` VARCHAR(255) NULL , `statusBarStyle` VARCHAR(10) NULL , `statusBarBackgroundColor` VARCHAR(10) NULL , `splashScreenBackgroundColor` VARCHAR(10) NULL , `splashScreenDelay` INT(10) NULL , `spinnerSize` VARCHAR(10) NULL , `spinnerColor` VARCHAR(10) NULL , `orientation` INT(10) NULL , `openExternalUrl` VARCHAR(20) NULL , `webAppId` VARCHAR(255) NULL DEFAULT NULL , `webAppCode` INT NULL DEFAULT NULL , PRIMARY KEY (`id`)) $charset_collate;";
    dbDelta( $sql );
    $insertSql = "INSERT INTO `wordpress`.`$table_name` (`id`, `name`, `url`, `themeColor`, `icon`, `statusBarStyle`, `statusBarBackgroundColor`, `splashScreenBackgroundColor`, `splashScreenDelay`, `spinnerSize`, `spinnerColor`, `orientation`, `openExternalUrl`, `webAppId`, `webAppCode`)
     VALUES (NULL, '$name', '$url', '$color', '', NULL, '$color', '$color', 1.5, NULL, '$color', 2, 'sameDomain', NULL, NULL)";
    $wpdb->query( $insertSql );
}

function joazco_plugin_responsiveMySiteUninstall(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'responsiveMySite';
    $sql        = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query( $sql );
    delete_option( 'wp_install_uninstall_config' );
}


