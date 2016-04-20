<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

<main id="style-archive">
	<div class="contents">
		<h1><span><?php echo esc_html(ucfirst($post->post_name)); ?></span><?php the_title(); ?></h1>
		<?php get_template_part('template-parts/ct-style'); ?>
		<?php get_template_part('template-parts/new-style'); ?>

	</div><!-- /.contents -->
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
