<?php get_header(); ?>

<div id="style-detail" class="inner">
	<div class="contents">
		<h1><?php the_title(); ?></h1>
		<div class="column-wrap">
			<div class="left-column">
				<div id="style-photo">
					<div class="image"><img src="<?php $image = wp_get_attachment_image_src(get_field('front'),'medium'); echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" id="photo"></div>
					<ul>
						<li><img src="<?php $image = wp_get_attachment_image_src(get_field('front'),'medium'); echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>：フロント" class="thumbnail"></li>
						<?php if(get_field('back')): ?>

						<li><img src="<?php $image = wp_get_attachment_image_src(get_field('back'),'medium'); echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>：バック" class="thumbnail"></li>
						<?php else: ?>

						<li></li>
						<?php endif; ?>
						<?php if(get_field('side')): ?>

						<li><img src="<?php $image = wp_get_attachment_image_src(get_field('side'),'medium'); echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>：サイド" class="thumbnail"></li>
						<?php else: ?>

						<li></li>
						<?php endif; ?>

					</ul>
<script>
jQuery(function(){
jQuery("img.thumbnail").click(function(){
	var ImgSrc = jQuery(this).attr("src");
	var ImgAlt = jQuery(this).attr("alt");
	jQuery("img#photo").attr({src:ImgSrc,alt:ImgAlt});
	return false;
});
});
</script>
				</div><!-- /#staff-photo -->
			</div><!-- /.left-column -->
			<div class="right-column">
				<div id="style-information">
					<div class="comment">
						<h2>スタイルコメント</h2>
						<?php the_content(); ?>

					</div>					
					<div id="style-data">
						<h2>スタイルデータ</h2>
						<table>
							<tr>
								<th>長さ</th>
								<td><?php the_field('length'); ?></td>
							</tr>
							<tr>
								<th>カラー</th>
								<td><?php the_field('color'); ?></td>
							</tr>
							<tr>
								<th>イメージ</th>
								<td><?php the_field('image'); ?></td>
							</tr>
							<tr>
								<th>メニュー内容</th>
								<td><?php the_field('menu'); ?></td>
							</tr>
							<tr>
								<th>スタイリスト</th>
								<td><?php echo (get_the_term_list( $post->ID,'ct-stylist' )); ?></td>
							</tr>
						</table>
					</div>
					<div id="recommend-type">
						<h2>おすすめタイプ</h2>
						<table>
							<tr>
								<th>髪量</th>
								<td><?php the_field('amount'); ?></td>
							</tr>
							<tr>
								<th>髪質</th>
								<td><?php the_field('type'); ?></td>
							</tr>
							<tr>
								<th>太さ</th>
								<td><?php the_field('thickness'); ?></td>
							</tr>
							<tr>
								<th>クセ</th>
								<td><?php the_field('habit'); ?></td>
							</tr>
							<tr>
								<th>顔型</th>
								<td><?php the_field('shape'); ?></td>
							</tr>
						</table>
					</div>
				</div><!-- /#style-information -->
			</div><!-- /.right-column -->
		</div>
	</div><!-- /.contents -->
	<div class="contents">
		<div id="style-list">
			<h2>その他ヘアカタログ</h2>
			<ul>
				<?php
				$terms = get_the_terms($post->ID, 'ct-style');
				foreach ( $terms as $term ) {
					$termname = $term -> name;
				}
				$other_query = new WP_Query (
					array (
						'post_type' => 'cpt-style',
						'post_status' => 'publish',
						'posts_per_page' => 15,
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'ct-style',
								'field' => 'name',
								'terms' => $termname,
								'operator' => 'IN'
							),
						)
					)
				);
				if ( $other_query -> have_posts() ):
					while ( $other_query->have_posts() ) : $other_query->the_post();
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
	</div>
</div><!-- / -->
<?php get_footer(); ?>
