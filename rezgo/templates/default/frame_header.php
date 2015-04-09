<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="format-detection" content="telephone=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$_REQUEST['title']?></title>
  <style> body { overflow:hidden; } </style>
  
  <script src="<?= REZGO_URL_BASE ?>/js/iframeResizer.min.js"></script>
  <script src="<?= REZGO_URL_BASE ?>/js/iframeResizer.contentWindow.min.js"></script>
  
  <!-- Bootstrap CSS -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet">
  
  <!-- Font awesome --> 
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!--[if IE 7]>
    <link href="<?=$this->path?>/css/font-awesome-ie7.css" rel="stylesheet">
  <![endif]-->  
  
  <!-- Rezgo stylesheet -->
  <link href="<?=$this->path?>/css/rezgo.css" rel="stylesheet">
  <!--[if IE 9]>
    <link href="<?=$this->path?>/css/rezgo-ie9.css" rel="stylesheet">
  <![endif]--> 
  
  <!-- jQuery & Bootstrap JS -->
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="<?=$this->path?>/js/html5shiv.min.js"></script>
    <script src="<?=$this->path?>/js/respond.min.js"></script>
  <![endif]-->
  
  <? if($site->exists($site->getStyles())) { ?>
  <style>
    <?=$site->getStyles()?>
  </style>
  <? } ?>
  
  <base target="_<?=REZGO_FRAME_TARGET?>">

</head>

<body>

<? if($preview_mode) { ?>
	<div class="rezgo-preview-mode"><i class="fa fa-eye"></i>&nbsp;you are in preview mode</div>
<? } ?>