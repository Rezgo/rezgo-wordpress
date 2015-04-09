<?php

$wpPage = $_REQUEST['wp_page'];
$rezgoPage = $_REQUEST['rezgo_page'];
define("REZGO_URL_BASE", $wpPage);
include_once(__DIR__ . '/rezgo-parser/' . $rezgoPage . '.php');