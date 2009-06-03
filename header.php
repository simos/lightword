<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<?php cufon(header); ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php // wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php comment_tabs(); ?>
</head>

<body>
<div id="body">
<div id="header">
<div id="top"><h1 id="logo"><a name="top" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> <small><?php bloginfo('description'); ?></small></h1></div>
<div id="rss-feed"><a title="<?php _e('Syndicate this site using RSS'); ?>" href="<?php bloginfo('rss2_url'); ?>">Subscribe via RSS</a></div><div class="clear"></div>

<ul id="front_menu">
<?php if(is_front_page()) $selected="s"; ?><li><a class="<?php echo $selected; ?>" href="<?php bloginfo('url'); ?>"><span>Home</span></a></li>
<?php echo wp_list_pages_new();  ?>
</ul>

<div id="header-search"> 
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>"> 
<input type="text" value="" name="s" id="s" /> 
<input type="image" src="<?php bloginfo('template_directory'); ?>/images/search.gif" id="go" alt="Search" title="Search" /> 
</form></div><div class="clear"></div></div>

<div id="content">