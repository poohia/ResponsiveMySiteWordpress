<?php

define("ResponsiveMySiteEndpointAPI", "https://us-central1-responsivemysite-17b70.cloudfunctions.net/");
define("ResponsiveMySiteCreateWebApp", "createWebApp/");
define("ResponsiveMySiteUpdateWebApp", "updateWebApp/");
define("ResponsiveMySiteDeleteWebApp", "deleteWebApp/");
define("ResponsiveMySiteSendMail", "sendMail/");

function formatUrl($datas){
    $d = "?";
    $i = 0;
    foreach($datas as $key => $data){
        if($i === 0){
            $i++;
        }else{
            $d .= "&";
        }
       $d .= $key."=".$data;
    }

    return $d;
}

function sendFirstCreate($url, $name, $color, $icon, $orientation, $openExternalUrl){
    $dataFormatted = formatUrl([
        'url' => $url,
        'name' => $name,
        'themeColor' => urlencode($color),
        'icon' => urlencode($icon),
        'orientation' => $orientation,
        'openExternalUrl' => $openExternalUrl,
        'statusBar' => 'true',
        'statusBarBackgroundColor' => urlencode($color),
        'splashScreen' => 'true',
        'splashScreenBackgroundColor' => urlencode($color),
        'splashScreenDelay' => 2,
        'geolocation' => 0,
        'notificationPush' => 0
    ]);
    $finalAPI = ResponsiveMySiteEndpointAPI . ResponsiveMySiteCreateWebApp . $dataFormatted;
    $args = array(
        'headers' => array(
            'Authorization' => 'rZEs56L3paRpRvZ8y558',
            'Origin' => $url
        )
    );
    $response = json_decode(wp_remote_retrieve_body(wp_remote_get($finalAPI, $args)), true);
    return $response;
}

function editApi($webApp){
    $dataFormatted = formatUrl([
        'url' => $webApp->url,
        'name' => $webApp->name,
        'themeColor' => urlencode($webApp->themeColor),
        'icon' => urlencode($webApp->icon),
        'orientation' => $webApp->orientation,
        'openExternalUrl' => $webApp->openExternalUrl,
        'statusBar' => 'true',
        'statusBarBackgroundColor' => urlencode($webApp->statusBarBackgroundColor),
        'splashScreen' => 'true',
        'splashScreenBackgroundColor' => urlencode($webApp->splashScreenBackgroundColor),
        'splashScreenDelay' => $webApp->splashScreenDelay,
        'id' => $webApp->webAppId,
        'code' => $webApp->webAppCode,
        'geolocation' => $webApp->geolocation,
        'notificationPush' => $webApp->notificationPush
    ]);
   
    if($webApp->statusBarStyle !== null && $webApp->statusBarStyle !== "auto"){
        $dataFormatted .= "&statusBarStyle=$webApp->statusBarStyle";
    }
    $finalAPI = ResponsiveMySiteEndpointAPI . ResponsiveMySiteUpdateWebApp . $dataFormatted;
    $args = array(
        'headers' => array(
            'Authorization' => 'rZEs56L3paRpRvZ8y558',
            'Origin' => $webApp->url
        )
    );
    $response = json_decode(wp_remote_retrieve_body(wp_remote_get($finalAPI, $args)), true);
    return $response;
}



function sendRemove($url, $id, $code){
    $args = array(
        'headers' => array(
            'Authorization' => 'rZEs56L3paRpRvZ8y558',
            'Origin' => $url
        )
    );
    $finalAPI = ResponsiveMySiteEndpointAPI . ResponsiveMySiteDeleteWebApp . "?id=$id&code=$code";
    $response = json_decode(wp_remote_retrieve_body(wp_remote_get($finalAPI, $args)), true);
    return $response;
}

function sendMail($email, $code, $name){
    $finalAPI = ResponsiveMySiteEndpointAPI . ResponsiveMySiteSendMail . "?appName=$name&appCode=$code&email=$email&phoneNumber=wordpress&choiceContact=email&message=wordpress&informationTest=wordpress";
    $response = json_decode(wp_remote_retrieve_body(wp_remote_get($finalAPI)), true);
    return $response;
}