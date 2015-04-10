<?php 
	// This page is the calendar display, it is fetched via AJAX to display the calendar
	
	require('rezgo/include/page_header.php');
	
	// start a new instance of RezgoSite
	$site = new RezgoSite();

if(isset($_REQUEST['parent_url']))
    {
        $site->base = DIRECTORY_SEPARATOR . $_REQUEST['parent_url'];
    }
?>

<?=$site->getTemplate('calendar_day')?>