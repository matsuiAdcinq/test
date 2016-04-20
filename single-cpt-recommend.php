<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<div id="recommend-detail">
			<div class="contents">
				<div class="column-wrap">
					<div id="<?php echo esc_attr($post->post_name); ?>" class="left-column">
						<h1><?php the_title(); ?></h1>
						<div id="page-description">
							<?php the_content(); ?>
		
						</div>
						<?php if(have_rows('contents')): ?>
						<?php while(have_rows('contents')): the_row(); ?>
		
						<div class="content">
							<h2 class="title"><?php the_sub_field('title'); ?></h2>
							<?php if(get_sub_field('content')): ?>
		
							<div>
							<?php the_sub_field('content'); ?>
		
							</div>
							<?php endif; ?>
		
						</div><!-- /.content -->
						<?php endwhile; ?>
						<?php endif; ?>
	
					</div><!-- /.left-column -->
					<div class="right-column">
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
					</div><!-- /.right-column -->
				</div><!-- /.column-wrap -->
			</div><!-- /.contents -->	
		</div><!-- /#recommend -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>
