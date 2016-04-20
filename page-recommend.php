<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<div id="recommend">
			<div class="contents">
				<h1><span><?php echo esc_html(ucfirst($post->post_name)); ?></span><?php the_title(); ?></h1>
				<div id="page-description">
					<?php the_content(); ?>
	
				</div>
				<div id="recommend-list">
				<?php
				$recommend_query = new WP_Query (
					array (
						'post_type' => 'cpt-recommend',
						'post_status' => 'publish',
						'posts_per_page' => -1,
					)
				);
				if ( $recommend_query -> have_posts() ):
					while ( $recommend_query->have_posts() ) : $recommend_query->the_post();
				?>
				
					<div class="list">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					</div><!-- /.list -->
				<?php endwhile; endif; wp_reset_postdata(); ?>
	
				</div><!-- /#recommend-list -->
			</div><!-- /.contents -->
		</div><!-- /.inner -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>
