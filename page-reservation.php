<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<div id="reservation">
			<div class="contents">
				<h1><span class="title-en"><?php echo esc_html(ucfirst($post->post_name)); ?></span><?php the_title(); ?></h1>
				<div id="page-description">
					<?php the_content(); ?>
	
				</div>
				<?php if(have_rows('contents')): ?>
				<?php while(have_rows('contents')): the_row(); ?>

				<div class="content">
					<div class="reservation-type">
					<?php the_sub_field('content'); ?>
					
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
				
			</div><!-- /.contents -->
		</div><!-- /.inner -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>
