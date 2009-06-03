<?php get_header(); ?>
<div id="content-body">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
<h2><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php the_content(''); ?>
<?php wp_link_pages('before=<div class="nav_link">&after=</div>&next_or_number=number&pagelink=<span class="page_number">%</span>'); ?>
</div>
<?php if ( comments_open() && $lw_disable_comments == "false" ) : comments_template(); endif; ?>
<?php endwhile; else: ?>

<h2>Not found</h2>
<p>Welcome to the seedy underbelly of this otherwise upstanding Web site. Please choose from the following in order to get back on track:</p>
<ul>
<li>Try the old back button on your browser &#8212; it is the most used button on the Web, you know.</li>
<li>Head on back <a href="<?php bloginfo('url'); ?>">home</a>.</li>
<li>Try the navigation menu at the top &uarr; of the page.</li>
<li>Search or click on a link over in the sidebar.</li>
<li><a href="<?php bloginfo('rss2_url'); ?>">Subscribe to this site's feed</a> so you don't have to come here for updates.</li>
<li>Relive the glory days of high school football and punt, but please do not strain your groin.</li>
</ul>

<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>