<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<div id="campaign">
			<div class="contents">
				<h1><span><?php echo esc_html(ucfirst($post->post_name)); ?></span><?php the_title(); ?></h1>
				<div id="page-description">
					<?php the_content(); ?>
	
				</div>
				<div id="monthly">
					<p class="monthly-title"><?php print(date('n')); ?>月のキャンペーン</p>
					<?php
					$campaign_query = new WP_Query (
						array (
							'post_type' => 'cpt-campaign',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'date_query' => array (
								array (
									'year' => date('Y'),
									'month' => date('m'),
								),
							),
						)
					);
					if ( $campaign_query -> have_posts() ):
						while ( $campaign_query->have_posts() ) : $campaign_query->the_post();
					?>
	
					<section>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</section>
	
					<?php endwhile; ?>
					<?php endif; wp_reset_postdata(); ?>
				
				</div>
			</div><!-- /.contents -->
		</div><!-- /.inner -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>
