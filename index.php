<?php get_header(); ?>
<div id="content-body">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
<h2><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div class="comm_date"><span class="data"><span class="j"><?php the_time('j'); ?></span><br/><?php the_time('M'); ?><sup><?php the_time('y'); ?></sup></span><span class="nr_comm"><a class="nr_comm_spot" title="<?php comments_number(); ?>" href="<?php the_permalink(); ?>#respond"><?php comments_number('0', '1', '%' ); ?></a></span></div>
<?php the_content(''); ?>
<?php if ( is_single() ) : ?>
<?php if ($lw_enjoy_post == "true" && is_attachment() != TRUE) : ?>
<div class="promote">
<h3>Enjoy this article?</h3>
<p>Consider <a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe via RSS">subscribing to our RSS feed!</a></p>
</div>
<?php endif; ?>
<?php endif; ?>
<div class="cat_tags">
<div class="category"><?php $tag = get_the_tags(); if (!$tag) { ?><?php _e("Filed under:"); ?> <?php the_category(', '); }else the_tags('Tagged as: ',', '); ?></div>
<div class="continue"><?php $pos=strpos($post->post_content, '<!--more-->'); if(is_single() || $pos==''){ ?><a class="nr_comm_spot" title="<?php comments_number(); ?>" href="<?php the_permalink(); ?>#respond"><?php comments_number(); ?></a><?php }else{ ?><a title="Read more about <?php the_title(); ?>" href="<?php the_permalink() ?>#more-<?php echo $id; ?>">Continue reading</a><?php } ?></div>
<div class="clear"></div></div><div class="cat_tags_close"></div>

<?php wp_link_pages('before=<div class="nav_link">&after=</div>&next_or_number=number&pagelink=<span class="page_number">%</span>'); ?>
</div>
<?php if ( is_attachment() != TRUE ) : comments_template(); endif; ?>

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

<div class="newer_older"><?php posts_nav_link(' ', __('<span class="newer">&laquo; Newer Posts</span>'), __('<span class="older">Older Posts &raquo;</span>')); ?></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
