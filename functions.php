<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('before_widget' => '<div class="sidebar-box">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));

function unregister_problem_widgets() {
unregister_sidebar_widget('Search');
}
add_action('widgets_init','unregister_problem_widgets');

$themename = "LightWord";
$shortname = "lw";

$options = array (

	array(	"name" => "Welcome Message",
			"type" => "title"),

	array(	"type" => "open"),

	array(  "name" => "Disable Cufon",
			"desc" => "Check this box if you would like to DISABLE <em>Cuf&oacute;n&sup1;</em>",
            "id" => $shortname."_cufon",
            "type" => "checkbox",
            "std" => "false"),

	array(  "name" => "Activate Extra Cufon",
			"desc" => "Check this box if you would like to ENABLE <em>Extra Cuf&oacute;n&sup2;</em> feature",
            "id" => $shortname."_cufon_extra",
            "type" => "checkbox",
            "std" => "false"),

    array(  "name" => "Enjoy this post",
			"desc" => "Check this box if you would like to ACTIVATE <em>Enjoy this post</em> feature",
            "id" => $shortname."_enjoy_post",
            "type" => "checkbox",
            "std" => "false"),

    array(  "name" => "Show categories on top",
			"desc" => "Check this box if you would like to SHOW CATEGORIES instead pages on top bar",
            "id" => $shortname."_show_categories",
            "type" => "checkbox",
            "std" => "false"),

    array(  "name" => "Disable comments on pages",
			"desc" => "Check this box if you would like to DISABLE COMMENTS on pages",
            "id" => $shortname."_disable_comments",
            "type" => "checkbox",
            "std" => "false"),

	array(	"type" => "close")

);

function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {

if ( 'save' == $_REQUEST['action'] ) {

foreach ($options as $value) {
update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

header("Location: themes.php?page=functions.php&saved=true");
die;

} else if( 'reset' == $_REQUEST['action'] ) {
foreach ($options as $value) {
delete_option( $value['id'] ); }
header("Location: themes.php?page=functions.php&reset=true");
die;
}
}
add_theme_page("LightWord Settings", "LightWord Settings", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
global $themename, $shortname, $options;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap">

<h2><?php echo $themename; ?> settings</h2>
<form method="post">
<div id="poststuff" class="metabox-holder">
<div class="stuffbox">
<h3><label for="link_url">Support the developer</label></h3>
<div class="inside">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="5545477">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</div></div>
<div class="stuffbox">
<h3><label for="link_url">General settings</label></h3>
<div class="inside">
<?php foreach ($options as $value) { switch ( $value['type'] ) { case "open": ?>
<table width="100%" border="0" style="padding:10px;">
<?php break; case "close": ?>
</table><br />
<?php break; case "checkbox": ?>
<tr>
<td width="25%" rowspan="2" valign="middle"><strong style="font-size:11px;"><?php echo $value['name']; ?></strong></td>
<td width="75%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />   <small><?php echo $value['desc']; ?></small>
</td>
</tr>
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #E1E1E1;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
<?php break; } } ?>
</div></div>
<p class="submit" style="margin-top:-2em;">
<input name="save" type="submit" value="Save changes" class="button-primary" />
<input type="hidden" name="action" value="save" />
</p>
</form>

<div class="stuffbox">
<h3><label for="link_url">Search for help (<a href="http://students.info.uaic.ro/~andrei.luca/blog/">blog</a> or <a href="http://twitter.com/andreiluca">twitter</a>)</label></h3>
<div class="inside">
<?php
require_once(ABSPATH . WPINC . '/rss.php');
$rss_blog = fetch_rss('http://feeds2.feedburner.com/lightword');
if ($rss_blog) {
$items_blog = array_slice($rss_blog->items, 0, 4);
foreach( $items_blog as $item_blog ) {
$pubdate = substr($item_blog['pubdate'], 0, 16);
echo '<p><a href="'.$item_blog['guid'].'" title="'.$item_blog['title'].'">'.$item_blog['title'].'</a> / <em>'.$pubdate.'</em></p>';
}
}else {
echo '<p>No updates from my blog.</p>';
}
$rss_wp = fetch_rss('http://wordpress.org/support/rss/tags/lightword');
if ($rss_wp) {
$items_wp = array_slice($rss_wp->items, 0, 1);
foreach( $items_wp as $item_wp ) {
$pubdate = substr($item_wp['pubdate'], 0, 16);
$title = explode(' "',$item_wp['title']);
$title = str_replace('"','',$title[1]);
echo '<p><a href="'.$item_wp['link'].'" title="'.$title.'">'.$title.'</a> / <em>'.$pubdate.'</em></p>';
}
}else {
echo '<p>No updates from wordpress.</p>';
}

?>
</div></div>

<div class="stuffbox">
<h3><label for="link_url">What is Cuf&oacute;n? (<a href="http://cufon.shoqolate.com/generate/">website</a>)</label></h3>
<div class="inside">
<p>&sup1;Cuf&oacute;n is a Javascript Dynamic Text Replacement, like sIFR without flash plugin, just javascript.<br/>
<br/>&sup2;Extra Cuf&oacute;n contains (~<b>300kb js file</b>): Basic latin, uppercase, lowercase, numerals, punctuation, <br/>Latin-1 Supplement, Latin Extended-A, Cyrillic Alphabet, Russian Alphabet, Greek and Coptic; usefull for some accents and special characters.
<br/><br/>Korean characters are not supported (11000+ glyps is a bit too much - enormous file -> slow loading).</p>
</div></div>


<form method="post" style="float:right;">
<input name="reset" type="submit" value="Click here to reset all settings" style="cursor:pointer;" />
<input type="hidden" name="action" value="reset" />
</form>
</div>
<?php
}
add_action('admin_menu', 'mytheme_add_admin');

/*
Ping/Track/Comment Count
Source URI: http://txfx.net/code/wordpress/ping-track-comment-count/
Description: Provides functions that return or display the number of trackbacks, pingbacks, comments or combined pings recieved by a given post.
Other Authors: Mark Jaquith, Chris J. Davis, Scott "Skippy" Merrill
*/

function get_comment_type_count($type='all', $post_id = 0) {
	global $cjd_comment_count_cache, $id, $post;
	if ( !$post_id )
		$post_id = $post->ID;
	if ( !$post_id )
		return;

	if ( !isset($cjd_comment_count_cache[$post_id]) ) {
		$p = get_post($post_id);
		$p = array($p);
		update_comment_type_cache($p);
	}

	if ( $type == 'pingback' || $type == 'trackback' || $type == 'comment' )
		return $cjd_comment_count_cache[$post_id][$type];
	elseif ( $type == 'ping' )
		return $cjd_comment_count_cache[$post_id]['pingback'] + $cjd_comment_count_cache[$post_id]['trackback'];
	else
		return array_sum((array) $cjd_comment_count_cache[$post_id]);

}

function comment_type_count($type = 'all', $post_id = 0) {
		echo get_comment_type_count($type, $post_id);
}


function update_comment_type_cache(&$queried_posts) {
	global $cjd_comment_count_cache, $wpdb;

	if ( !$queried_posts )
		return $queried_posts;


	foreach ( (array) $queried_posts as $post )
		if ( !isset($cjd_comment_count_cache[$post->ID]) )
			$post_id_list[] = $post->ID;

	if ( $post_id_list ) {
		$post_id_list = implode(',', $post_id_list);

		foreach ( array('', 'pingback', 'trackback') as $type ) {
			$counts = $wpdb->get_results("SELECT ID, COUNT( comment_ID ) AS ccount
			FROM $wpdb->posts
			LEFT JOIN $wpdb->comments ON ( comment_post_ID = ID AND comment_approved = '1' AND comment_type='$type' )
			WHERE post_status = 'publish' AND ID IN ($post_id_list)
			GROUP BY ID");

			if ( $counts ) {
				if ( '' == $type )
					$type = 'comment';
				foreach ( $counts as $count )
					$cjd_comment_count_cache[$count->ID][$type] = $count->ccount;
			}
		}
	}
	return $queried_posts;
}

global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}

function wp_list_pages_new(){
global $lw_show_categories;
if ($lw_show_categories == "true") {
$top_list = wp_list_categories('echo=0&title_li=');
$top_list = str_replace(array('">','</a>','<span><a','current-cat"><a'),array('"><span>','</span></a>','<a','"><a class="s"'), $top_list);
return $top_list;
}else{
$top_list = wp_list_pages('echo=0&title_li=');
$top_list = str_replace(array('">','</a>','<span><a','current_page_item"><a'),array('"><span>','</span></a>','<a','"><a class="s"'), $top_list);
return $top_list;
}
}


function comment_tabs(){
if(is_single()||is_page()){
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tabs.js"></script>
<script type="text/javascript">$(document).ready(function(){$('tabs').tabs({linkClass : 'tabs',containerClass : 'tab-content',linkSelectedClass : 'selected',containerSelectedClass : 'selected',onComplete : function(){}});});</script>
<?php
}
}

if ($lw_cufon == "false") { $cufon_enabled=1; $cufon_extra=1;}
if ($lw_cufon_extra == "true") { $cufon_enabled=2; $cufon_extra=1;}

function cufon($cufon, $cufon_enabled=1){
global $cufon_enabled,$cufon_extra;
if($cufon_enabled==1){
if($cufon=="header"){
?>
<script src="<?php bloginfo('template_directory'); ?>/js/cufon.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/mp.font.js" type="text/javascript"></script>
<?php }}elseif($cufon_enabled==2){ if($cufon=="header"){ ?>
<script src="<?php bloginfo('template_directory'); ?>/js/cufon.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/extra_mp.font.js" type="text/javascript"></script>
<?php }} if($cufon=="footer" && $cufon_extra==1){ ?>
<script type="text/javascript">/* <![CDATA[ */ Cufon.now(); /* ]]> */ </script>
<?php } } ?>