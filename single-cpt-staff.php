<?php get_header(); ?>
<?php $post_id = $post->ID; ?>

		<div id="staff-detail" class="inner">
			<div class="contents">
				<h1><span><?php echo esc_html(ucfirst($post->post_name)); ?></span><?php the_title(); ?></h1>
				<div class="column-wrap">
					<div class="left-column">
						<div id="staff-photo">
							<?php the_post_thumbnail('medium'); ?>
						
						</div><!-- /#staff-photo -->
					</div><!-- /.left-column -->
					<div class="right-column">
						<div id="staff-comment">
							<?php the_content(); ?>
		
						</div>
						<div id="staff-information">
							<table>
								<tr>
									<th>スタイリスト歴</th>
									<td><?php $first_year = get_field('first_year'); $year = date('Y'); $year = $year - $first_year; echo esc_html($year); ?>年</td>
								</tr>
								<tr>
									<th>勤務時間</th>
									<td><?php the_field('working_hours'); ?></td>
								</tr>
								<tr>
									<th>得意なイメージ</th>
									<td><?php the_field('good_at_image'); ?></td>
								</tr>
								<tr>
									<th>得意な技術</th>
									<td><?php the_field('good_at_technique'); ?></td>
								</tr>
								<tr>
									<th>趣味・マイブーム</th>
									<td><?php the_field('hobby'); ?></td>
								</tr>
							</table>
						</div><!-- /#staff-information -->
					</div><!-- /.right-column -->
				</div><!-- /.column-wrap -->
				<div id="other-staff-list">
					<?php
					$staff_query = new WP_Query (
						array (
							'post_type' => 'cpt-staff',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'post__not_in' => array($post_id),
						)
					);
					if ( $staff_query -> have_posts() ):
						while ( $staff_query->have_posts() ) : $staff_query->the_post();
					?>
	
					<div class="staff">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
							<p class="name"><?php the_title(); ?></p>
						</a>
					</div><!-- /.staff -->
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div><!-- /.contents -->
		</div><!-- /#staff-detail -->
<?php get_footer(); ?>
