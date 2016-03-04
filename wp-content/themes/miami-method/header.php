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
<link rel="stylesheet" type="text/css" href="//cloud.typography.com/7183554/717926/css/fonts.css" />
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
  		<div class="padding">
        <div class="left open-nav">
    			<div class="icon">
            <div class="hb">
              <div class="top"></div>
              <div class="top hover"></div>
              <div class="mid"></div> 
              <div class="mid hover"></div>
              <div class="bot"></div> 
              <div class="bot hover"></div>
            </div>
          </div>
    			<div class="label">Menu</div>
    		</div>
    		<div class="left open-search">
    			<div class="icon search">
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/search.png" />   
          </div>
    			<div class="label">Search</div>
    		</div>
        <div class="left open-subscribe">
          <div class="icon subscribe">
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/subscribe.png" />   
          </div>
          <div class="label">Subscribe</div>
        </div>
    		<div class="right logo">
    			<a href="/"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" /></a>
    		</div>
    	</div>
    </div>
  	<div class="big-header">
  		<div class="blog-title">Miami Minimally Invasive Valves</div>
      <div class="joe">Joseph Lamelas, MD</div>
  		<div class="tagline">Dedicated to the Advancement of Minimally Invasive Cardiac Surgery</div>
  	</div>
  </header>

  <nav class="side-nav">
  	<div class="padding">
      <a class="nav-item open-subscribe" href="javascript:void(0);">Subscribe</a>
	  	<a class="nav-item first-desktop" href="/about">About</a>
	  	<a class="nav-item" href="/videos">Videos</a>
	  	<a class="nav-item" href="/published-articles">Publications</a>
      <div class="nav-item expand">Categories<span class="arrow dashicons dashicons-arrow-down"></span>
        <div class="nav-sub">

        <?php foreach (get_categories() as $category) : ?>
          <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name ?></a>
        <?php endforeach; ?>

        </div>
      </div>
      <a class="nav-item" href="https://www.youtube.com/channel/UCVJmJgqzPHqUixTHXX587qA">Joseph Lamelas MD Youtube Channel</a>

  	</div>
  </nav>

  <div class="overlay search">
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
      <div class="close-overlay">X</div>
      <img class="icon search" src="<?php bloginfo('template_directory'); ?>/assets/img/search-large.png" />
      <label>
        <input 
          type="search" 
          class="search-field" 
          placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" 
          value="<?php echo get_search_query() ?>" 
          name="s" 
          title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
        <div class="submit">Search</div>
      </label>
    </form>
  </div> 

  <div class="overlay subscribe">
    <form role="subscribe" method="post" class="subscribe-form" action="javascript:void(0)">
      <div class="close-overlay">X</div>
      <img class="icon subscribe" src="<?php bloginfo('template_directory'); ?>/assets/img/subscribe-large.png" />
      <label>
        <p>Enter your email address to subscribe for updates</p>
        <input 
          type="text" 
          class="subscribe-field" 
          placeholder="<?php echo esc_attr_x( 'Email Address', 'placeholder' ) ?>"
          name="s" />
        <div class="submit">Subscribe</div>
      </label>
    </form>
  </div>

  <?php if (!isset($_COOKIE['hideIntro']) ) : ?>
      <div class="entry-overlay loaded">
        <div class="pattern"></div>
        <div class="entry-img"></div>
        <div class="box">
          <div class="padding">
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/entry-logo.png" />
            <div class="button enter">Enter Blog</div>
          </div>
        </div>
      </div>
    <?php else : setcookie('hideIntro', 1, time() + (86400 * 30), "/"); endif; ?>  

  <script>
    var wp_query = <?php echo json_encode($GLOBALS['wp_query']->query); ?>
  </script>