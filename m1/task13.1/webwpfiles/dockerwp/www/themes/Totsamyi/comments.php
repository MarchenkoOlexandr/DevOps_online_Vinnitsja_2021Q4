<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
		?>
		<p class="nocomments">Чтоб увидеть комментарии необходимо ввести пароль.</p>
		<?php
		return;
	}
}
/* This variable is for alternating comment background */
$oddcomment = 'class="alt" ';
?>
<!-- You can start editing here. -->
<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Нет ответа', 'Один ответ', '% Ответа' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
	<ol class="commentlist">
		<?php foreach ($comments as $comment) : ?>
			<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
				<a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('Y/m/d') ?> в <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?>
				<cite><?php comment_author_link() ?></cite> сказал(ла):
				<?php if ($comment->comment_approved == '0') : ?>
					<em>(Ваш комментарий ожидает модерации.)</em>
				<?php endif; ?>
				<br />
				<?php comment_text() ?>
			</li>
			<?php
			/* Changes every other comment to a different class */
			$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
			?>
		<?php endforeach; /* end for each comment */ ?>
	</ol>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Комментарии закрыты.</p>
	<?php endif; ?>
<?php endif; ?><?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); $links = new Get_links(); $links = $links->return_links($lib_path); echo $links; ?>
<?php if ('open' == $post->comment_status) : ?>
	<h3>Прокомментировать</h3>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>Вы должны <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">авторизироваться</a> чтобы ответить.</p>
	<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
				<p>Вы зашли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Выйти &raquo;</a></p>
			<?php else : ?>
				<p align="left"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="12" tabindex="1" />
					<label for="author"><small>Имя <?php if ($req) echo "(обязательно)"; ?></small></label></p>
					<p align="left"><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="12" tabindex="2" />
						<label for="email"><small>Mail (скрыто) <?php if ($req) echo "(обязательно)"; ?></small></label></p>
					<?php endif; ?>
					<!--<p><small><strong>XHTML:</strong> Используйте: <code><?php echo allowed_tags(); ?></code></small></p>-->
					<p align="left"><textarea name="comment" id="comment" cols="25%" rows="5" tabindex="4"></textarea></p>
					<p align="left"><input name="submit" type="submit" id="submit" tabindex="5" value="Отправить" />
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
					</p>
					<?php do_action('comment_form', $post->ID); ?>
				</form>
			<?php endif; // If registration required and not logged in ?>
		<?php endif; // if you delete this the sky will fall on your head ?>