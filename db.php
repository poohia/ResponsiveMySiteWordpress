<?php


function getTableName(){
    global $wpdb;
    return $wpdb->prefix . 'responsiveMySite';
}

function createDatabase(){
    global $charset_collate;
    $table_name = getTableName();
    $sql = "CREATE TABLE IF NOT EXISTS `wordpress`.`$table_name` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `url` VARCHAR(255) NOT NULL , `themeColor` VARCHAR(10) NULL , `icon` VARCHAR(255) NULL , `statusBarStyle` VARCHAR(10) NULL , `statusBarBackgroundColor` VARCHAR(10) NULL , `splashScreenBackgroundColor` VARCHAR(10) NULL , `splashScreenDelay` INT(10) NULL , `spinnerSize` VARCHAR(10) NULL , `spinnerColor` VARCHAR(10) NULL , `orientation` INT(10) NULL , `openExternalUrl` VARCHAR(20) NULL , `webAppId` VARCHAR(255) NULL DEFAULT NULL , `webAppCode` VARCHAR(255) NULL DEFAULT NULL , PRIMARY KEY (`id`)) $charset_collate;";
    dbDelta( $sql );
}

function dropTable(){
    global $wpdb;
    $table_name = getTableName();
    $sql        = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query( $sql );
}

function insertTable($name, $url, $color, $icon, $splashScreenDelay, $orientation, $openExternalUrl, $id, $code, $bddId = null){
    global $wpdb;
    $table_name = getTableName();
    
    $insertSql = "INSERT INTO `wordpress`.`$table_name` (`id`, `name`, `url`, `themeColor`, `icon`, `statusBarStyle`, `statusBarBackgroundColor`, `splashScreenBackgroundColor`, `splashScreenDelay`, `spinnerSize`, `spinnerColor`, `orientation`, `openExternalUrl`, `webAppId`, `webAppCode`)
    VALUES (NULL, '$name', '$url', '$color', '$icon', NULL, '$color', '$color',  $splashScreenDelay, NULL, '$color', $orientation, '$openExternalUrl', '$id', '$code')";
   $wpdb->query( $insertSql );
}

function editTable($webApp){
    global $wpdb;
    $table_name = getTableName();
    
    $updateSql = "UPDATE `wordpress`.`$table_name` SET name = '$webApp->name', icon = '$webApp->icon', statusBarStyle = '$webApp->statusBarStyle', statusBarBackgroundColor = '$webApp->statusBarBackgroundColor', splashScreenBackgroundColor = '$webApp->splashScreenBackgroundColor', splashScreenDelay = $webApp->splashScreenDelay, orientation = $webApp->orientation  where id = $webApp->id";
    $wpdb->query( $updateSql );
}

function getRow(){
    global $wpdb;
    $table_name = getTableName();
    $results = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table_name WHERE ID = 1" ));
    return $results[0];
}

function getCode(){
    $result = getRow();
    return $result->webAppCode;
}

function getId(){
    $result = getRow();
    return $result->webAppId;
}