<?php
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
require(__DIR__.'/api.php');
require(__DIR__.'/db.php');
require(__DIR__.'/icons.php');
require(__DIR__.'/languages/fr.php');
require(__DIR__.'/languages/en.php');
/*
* Plugin Name: ResponsiveMySite
* Plugin URI: https://responsivemysite.app/
* Author: JORDAN AZOULAY
* Version: 1.0
* Description: You want to convert your website into a mobile application while saving time and money? This is it! 
*/
define( 'RESPONSIVEMYSITE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define('DEFAULT_IMAGE_URL', 'https://firebasestorage.googleapis.com/v0/b/responsivemysite-17b70.appspot.com/o/logonotfound.png?alt=media&token=7670638d-aa60-416c-b803-3497e9ed8d77');
define('RESPONSIVE_MY_SITE__LOCALE', get_bloginfo("language"));

add_action('admin_menu', 'joazco_plugin_responsiveMySite');
add_action('init', 'register_script');
add_action('admin_enqueue_scripts', 'enqueue_style');
register_activation_hook(__FILE__,'responsiveMySite_plugin_table_install');
register_deactivation_hook(__FILE__, 'joazco_plugin_responsiveMySiteUninstall');
register_uninstall_hook(__FILE__, 'joazco_plugin_responsiveMySiteUninstall');


function joazco_plugin_responsiveMySite(){
    add_menu_page( 'ResponsiveMySite', 'ResponsiveMySite', 'manage_options', 'joazco-plugin-responsiveMySite', 'init_responsiveMySite', RESPONSIVEMYSITE__ICON);
}
 
function init_responsiveMySite(){
    try{
        $webApp = getRow();
        if ( $_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['sentMail']){
            $webApp->name = $_POST['name'];
            $webApp->icon = $_POST['icon'];
            $webApp->statusBarStyle = $_POST['statusBarStyle'] ?? null;
            $webApp->statusBarBackgroundColor = $_POST['statusBarBackgroundColor'];
            $webApp->splashScreenBackgroundColor = $_POST['splashScreenBackgroundColor'];
            $webApp->splashScreenDelay = intval($_POST['splashScreenDelay']);
            $webApp->orientation = intval($_POST['orientation']);
            $webApp->geolocation = intval($_POST['geolocation']);
            $webApp->notificationPush = intval($_POST['notificationPush']);
            editApi($webApp);
            editTable($webApp);
            $success = true;
        }else if($_SERVER["REQUEST_METHOD"] == "POST"){
            sendMail(get_bloginfo("admin_email"), $webApp->code, $webApp->name);
            updateSentEmail();
            $webApp->sentMail = 1;
        }
        include_once( RESPONSIVEMYSITE__PLUGIN_DIR . '/views/settings.php' );
    }
    catch(Exception $e){
        include_once( RESPONSIVEMYSITE__PLUGIN_DIR . '/views/errorView.php' );
    }
    
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

function register_script() {
    wp_register_style( 'new_style', plugins_url('/styles/index.css', __FILE__), false, '1.0.0', 'all');
}

function enqueue_style( $hook ){
    if(strpos($hook, "joazco-plugin-responsiveMySite") !== false){
        wp_enqueue_style( 'new_style');
    }
 }

function getTranslation($id){
    if(strpos(RESPONSIVE_MY_SITE__LOCALE, "fr") !== false){
        echo RESPONSIVE_MY_SITE__LOCALE_FR[$id] ?? "";
    }else{
        echo RESPONSIVE_MY_SITE__LOCALE_EN[$id] ?? "";
    }
}