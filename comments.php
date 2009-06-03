<?php
if ( post_password_required() ) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php
return; endif;
$comments_nr = get_comment_type_count('comment');
$trackbacks_nr = get_comment_type_count('ping');
?>
<div id="tabsContainer">

<a href="#" class="tabs selected"><span>Comments (<?php echo $comments_nr; ?>)</span></a>
<a href="#" class="tabs"><span>Trackbacks (<?php echo $trackbacks_nr; ?>)</span></a>  <?php post_comments_feed_link(__('<span class="subscribe_comments">( subscribe to comments on this post )</span>')); ?>
<div class="clear_tab"></div>
<div class="tab-content selected">
<?php if ( $comments ) : ?>
<div id="comentarii">
<ol class="commentlist">

<?php foreach ($comments as $comment) : ?>
<?php $comment_type = get_comment_type(); ?>
<?php if($comment_type == 'comment') { ?>
<li class="alt <?php if ($comment->comment_author_email == get_the_author_email()) { echo 'author_comment'; } ?>" id="comment-<?php comment_ID() ?>">
<cite>
<?php echo get_avatar( $comment, 25 ); ?>
<span class="author"><?php comment_author_link() ?></span><br /><span class="time"><?php comment_time() ?></span> on <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?>
</cite>

<div class="commenttext"><?php comment_text() ?></div>

<?php if ($comment->comment_approved == '0') : ?>

<em>Your comment is awaiting moderation.</em>

<?php endif; ?>
</li>
<?php
/* Changes every other comment to a different class */
$oddcomment = ( empty( $oddcomment ) ) ? 'alt' : '';
?>
<?php } else { $trackback = true; } ?>
<?php endforeach; /* end for each comment */ ?>
</ol>
</div>

<?php else : // If there are no comments yet ?>
	<p><?php _e('No comments yet.'); ?></p>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
<h2 id="postcomment"><?php _e('Leave a comment'); ?></h2>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (will not be published)');?> <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo attribute_escape(__('Submit')); ?>" />

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>
<div class="tab-content">
<?php if($trackbacks_nr == "0") echo "No trackbacks.";?>
<?php if ($trackback == true) { ?>
<?php foreach ($comments as $comment) : ?>
<?php $comment_type = get_comment_type(); ?>
<?php if($comment_type != 'comment') { ?>
<div class="trackbacks"><?php comment_author_link() ?></div>
<?php } ?>
<?php endforeach; ?>
<?php } ?>


<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
<?php endif; ?>
</div>
</div>