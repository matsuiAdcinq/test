<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

<div id="kiji" class="inner">
	<div class="contents">
		<div class="column-wrap">
			<div class="left-column">
				 <?php if (have_posts()) : // WordPress ループ
while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
<p class="post-meta">
<span class="post-date"><?php echo get_the_date(); ?></span>
<span class="category">Category - <?php the_category(', ') ?></span>
<span class="comment-num"><?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></span>
</p>
<?php the_content(); ?>
</div>
<?php endwhile; // 繰り返し処理終了
else : // ここから記事が見つからなかった場合の処理 ?>
<div class="post">
<h2>記事はありません</h2>
<p>お探しの記事は見つかりませんでした。</p>
</div>
<?php endif; // WordPress ループ終了 ?>
				<br>
			</div>
		</div>
	</div>
</div>
<!-- / -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>
