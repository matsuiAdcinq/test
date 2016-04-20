<?php get_header(); ?>

<div id="style-archive">
	<div class="contents">
		<h1><?php single_term_title(); ?></h1>
		<?php get_template_part('template-parts/ct-style'); ?>

		<div id="style-list">
			<ul>
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php 
					$attachment_id = get_field('front');
					if(is_mobile()) {
						$size = "thumbnail";
					}else{
						$size = "medium";
					}
					$image = wp_get_attachment_image_src( $attachment_id, $size );
				?>

				<li><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"><p><?php the_title(); ?></p></a></li>
				<?php endwhile; endif; ?>

			</ul>
		</div>
		<?php get_template_part('template-parts/ct-design'); ?>

	</div><!-- /.contents -->
</div>
<?php get_footer(); ?>
