<?php

define("ResponsiveMySiteEndpointAPI", "https://us-central1-responsivemysite-17b70.cloudfunctions.net/");
define("ResponsiveMySiteCreateWebApp", "createWebApp/");
define("ResponsiveMySiteDeleteWebApp", "deleteWebApp/");

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