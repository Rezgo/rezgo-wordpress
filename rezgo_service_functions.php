<?php

function rezgo_inlude_file($filePath = '', $additionalVars = array())
{
    extract($additionalVars);
    include_once(__DIR__ . DIRECTORY_SEPARATOR . $filePath);
}

function rezgo_include_settings_file($filePath = '')
{
    include_once(__DIR__ . DIRECTORY_SEPARATOR . 'settings' .DIRECTORY_SEPARATOR . $filePath);
}

function rezgo_render_settings_view($viewFile = '', $vars)
{
    extract($vars);
    include_once(__DIR__ . DIRECTORY_SEPARATOR . 'settings/views' .DIRECTORY_SEPARATOR . $viewFile);
}

function rezgo_embed_settings_image($imageName)
{
    return plugins_url('/settings/images/'. $imageName, __FILE__);
}

function rezgo_embed_settings_css($cssName)
{
    return plugins_url('/settings/css/'. $cssName, __FILE__);
}

function rezgo_embed_settings_js($jsName)
{
    return plugins_url('/settings/js/'. $jsName, __FILE__);
}

function rezgo_curl_get_page($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT,30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $file = curl_exec($ch);
    curl_close($ch);

    $result = simplexml_load_string(utf8_encode($file));

    return $result;
}