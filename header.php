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
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<?php comment_tabs(); ?>
</head>

<body>

<!-- Define the div tag where the gadget will be inserted. -->
<div id="div-428768660612026067"></div>
<!-- Render the gadget into a div. -->
<script type="text/javascript">
var skin = {};
skin['BORDER_COLOR'] = '#cccccc';
skin['ENDCAP_BG_COLOR'] = '#e0ecff';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#0000cc';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#0000cc';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
skin['POSITION'] = 'top';
skin['DEFAULT_COMMENT_TEXT'] = '- add your comment here -';
skin['HEADER_TEXT'] = 'Comments';
google.friendconnect.container.setParentUrl('/blog/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderSocialBar(
 { id: 'div-428768660612026067',
   site: '06288059086907762112',
   'view-params':{"scope":"SITE","features":"video,comment","showWall":"true"}
 },
  skin);
</script>

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
