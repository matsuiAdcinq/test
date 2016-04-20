<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<div id="menu">
		<div class="contents">
			<h1><span><?php echo esc_html(ucfirst($post->post_name)); ?></span><?php the_title(); ?></h1>
			<div id="page-description">
				<?php the_content(); ?>
	
			</div>
			<?php if(is_mobile()): ?>
			<?php get_template_part('content-menu-list-mobile'); ?>
			<?php else: ?>
			<?php get_template_part('content-menu-list-pc'); ?>
			<?php endif; ?>
			<?php if(have_rows('contents')): ?>

			<div id="notes">
			<? while(have_rows('contents')): the_row(); ?>
			
				<div class="content">
					<h2><?php the_sub_field('title'); ?></h2>
					<?php the_sub_field('content'); ?>
				
				</div><!-- /.content -->
			<?php endwhile; ?>
			
			</div><!-- /#notes -->
			<?php endif; ?>
		</div><!-- /.contents -->
	</div><!-- /.inner -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>
