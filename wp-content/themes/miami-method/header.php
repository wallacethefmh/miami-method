<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<?= Rye::stylesheet() ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php require('assets/templates/article.js'); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="main-header">
  	<div class="sticky">
  		<div class="left">
  			<span class="icon"></span>
  			<span class="open-nav">Menu</span>
  		</div>
  		<div class="left">
  			<span class="icon"></span>
  			<span>Search</span>
  		</div>
  		<div class="right">
  			PUT LOGO HERE
  		</div>
  	</div>
  	<div class="big-header">
  		<div class="joe">Joseph Lamelas MD</div>
  		<div class="tagline">Dedicated to the advancement of minimally invasive cardiac surgery</div>
  	</div>
  </header>

  <nav class="side-nav">
  	<div class="padding">
	  	<a class="nav-item">Home</a>
	  	<a class="nav-item">About</a>
	  	<a class="nav-item">Videos</a>
	  	<a class="nav-item">Publications</a>
	  	<div class="nav-item">Subscribe</div>
	  	<div class="nav-item">Categories</div>
	  	<div class="nav-item">Archives</div>
	  	<div class="nav-item">Blogroll</div>
	  	<div class="nav-item">Meta</div>
	  	<div class="nav-item">Hours &amp Info</div>
  	</div>
  </nav>