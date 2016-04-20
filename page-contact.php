<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

			<div id="store" class="inner">
				<div class="contents">
					<h1><span><?php echo esc_html(ucfirst($post->post_name)); ?></span><?php the_title(); ?></h1>
					<?php the_content(); ?>

				</div>
			</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
