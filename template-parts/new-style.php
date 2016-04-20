<div id="style-list">
	<h2><span class="title-en">New Style</span>新着スタイルで見る</h2>
	<ul>
		<?php
		$style_query = new WP_Query (
			array (
				'post_type' => 'cpt-style',
				'post_status' => 'publish',
				'posts_per_page' => 15,
			)
		);
		if ( $style_query -> have_posts() ):
			while ( $style_query->have_posts() ) : $style_query->the_post();
		?>
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
		<?php endwhile; ?>
		<?php endif; wp_reset_postdata(); ?>

	</ul>
</div>
