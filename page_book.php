<?php
	// This is the main booking page

	require('rezgo/include/page_header.php');

    $_SERVER['REQUEST_URI'] = DIRECTORY_SEPARATOR . $_REQUEST['parent_url'] . DIRECTORY_SEPARATOR . 'book';
	// start a new instance of RezgoSite
	$site = new RezgoSite(true);

    if(isset($_REQUEST['parent_url'])) {
        $site->base = DIRECTORY_SEPARATOR . $_REQUEST['parent_url'] . DIRECTORY_SEPARATOR;
    }
?>

<?=$site->getTemplate('frame_header')?>

	<?=$site->getTemplate('book')?>

<?=$site->getTemplate('frame_footer')?>