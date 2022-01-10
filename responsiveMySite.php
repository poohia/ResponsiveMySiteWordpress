<?php
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
require(__DIR__.'/api.php');
require(__DIR__.'/db.php');
/*
Plugin Name: ResponsiveMySite
Plugin URI: https://joazco.com/
Description: Ceci est mon premier plugin
Author: Mon nom et prénom ou celui de ma société
Version: 1.0
Author URI: http://joazco.com
*/
define( 'RESPONSIVEMYSITE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define('DEFAULT_IMAGE_URL', 'https://firebasestorage.googleapis.com/v0/b/responsivemysite-17b70.appspot.com/o/logonotfound.png?alt=media&token=7670638d-aa60-416c-b803-3497e9ed8d77');

add_action('admin_menu', 'joazco_plugin_responsiveMySite');
register_activation_hook(__FILE__,'responsiveMySite_plugin_table_install');
register_deactivation_hook(__FILE__, 'joazco_plugin_responsiveMySiteUninstall');
register_uninstall_hook(__FILE__, 'joazco_plugin_responsiveMySiteUninstall');


function joazco_plugin_responsiveMySite(){
    add_menu_page( 'ResponsiveMySite', 'ResponsiveMySite', 'manage_options', 'joazco-plugin-responsiveMySite', 'init_responsiveMySite', 'dashicons-schedule');
}
 
function init_responsiveMySite(){
    $webApp = getRow();
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ){
        $webApp->name = $_POST['name'];
        $webApp->icon = $_POST['icon'];
        $webApp->statusBarStyle = $_POST['statusBarStyle'] ?? null;
        $webApp->statusBarBackgroundColor = $_POST['statusBarBackgroundColor'];
        $webApp->splashScreenBackgroundColor = $_POST['splashScreenBackgroundColor'];
        $webApp->splashScreenDelay = intval($_POST['splashScreenDelay']);
        $webApp->orientation = intval($_POST['orientation']);
        editTable($webApp);
        $success = "Bien enregistré";
    } 
    
    include_once( RESPONSIVEMYSITE__PLUGIN_DIR . '/views/settings.php' );
}
 
function responsiveMySite_plugin_table_install() {
    $url =  get_bloginfo("siteurl");
    $name = get_bloginfo("name");
    $color = gettype(get_background_color()) === "string"? get_theme_mod("primary_color", '#'.get_background_color()) : get_theme_mod("primary_color", '#32485e');
    $icon = get_site_icon_url(144, DEFAULT_IMAGE_URL);
    $orientation = 2;
    $openExternalUrl = "sameDomain";
    $splashScreenDelay = 1.5;
    if(strpos($url, "localhost") !== false){
        echo "This plugin can't work's with <i>". $url ."</i> url";
        die;
    }
    $response = sendFirstCreate($url, $name, $color, $icon, $orientation, $openExternalUrl);
    $id = $response['id'];
    $code = $response['code'];
    
    createDatabase();
    insertTable($name, $url, $color, $icon, $splashScreenDelay, $orientation, $openExternalUrl, $id, $code);
}

function joazco_plugin_responsiveMySiteUninstall(){
    $url =  get_bloginfo("siteurl");
    $code = getCode();
    $id = getId();
   
    sendRemove($url, $id, $code);
    dropTable();
    delete_option( 'wp_install_uninstall_config' );
}


