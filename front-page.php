<?php get_header(); ?>

<div id="slider" class="slider-pro">
	<div class="sp-slides">
		<?php if(have_rows('slider')): ?>
		<?php while(have_rows('slider')): the_row();
					if(is_mobile()){
					$image = wp_get_attachment_image_src(get_sub_field('slide'),'medium');
					}else{
					$image = wp_get_attachment_image_src(get_sub_field('slide'),'full');
					};
				?>
		<div class="sp-slide"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"></div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<!-- /.sp-slides --> 
</div>
<!-- /#slider --> 
<script>
jQuery(document).ready(function($) {
	$('#slider').sliderPro({
		width: 960,
		height: 400,
		arrows: true,
		slideDistance: 0,
		visibleSize: '100%',
	});
});
</script>
<div id="description">
	<h1>
		<?php bloginfo('description'); ?>
	</h1>
</div>
<!-- /description -->
<div class="contents">
	<div id="news-fp">
		<?php
			$news_query = new WP_Query (
				array (
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => -1,
				)
			);
			if ( $news_query -> have_posts() ):
			?>
		<h2>News</h2>
		<dl>
			<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
			<dt>
				<?php the_time('Y.m.d'); ?>
			</dt>
			<dd><span class="news-title">
				<?php the_title(); ?>
				</span>
				<?php $news = get_the_content(); echo $news ?>
			</dd>
			<?php endwhile; ?>
		</dl>
		<?php endif; ?>
	</div>
	<!-- /#news-fp -->
		<div id="pickup-fp">
		<ul>
			<?php
				$pickup_query = new WP_Query (
					array (
						'post_type' => 'any',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'tax_query' => array (
							array (
								'taxonomy' => 'ct-display-position',
								'field' => 'slug',
								'terms' => 'pickup',
							),
						),
					)
				);
				if ( $pickup_query -> have_posts() ):
					while ( $pickup_query->have_posts() ) : $pickup_query->the_post();
				?>
			<?php
					if(is_mobile()){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumbnail');
					}else{
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
					};
				?>
			<li><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"><span>
				<?php the_title(); ?>
				</span></a></li>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			<?php
				$sns_query = new WP_Query (
					array (
						'post_type' => 'page',
						'name' => 'store',
						'post_status' => 'publish',
						'posts_per_page' => -1,
					)
				);
				if ( $sns_query -> have_posts() ):
					while ( $sns_query->have_posts() ) : $sns_query->the_post();
				?>
			<?php if(have_rows('sns')): ?>
			<?php while(have_rows('sns')): the_row();
					if(is_mobile()){
					$image = wp_get_attachment_image_src(get_sub_field('logo'),'medium');
					}else{
					$image = wp_get_attachment_image_src(get_sub_field('logo'),'full');
					};
				?>
			<li><a href="<?php the_sub_field('url'); ?>" target="_blank"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_sub_field('title'); ?>"><span><?php the_sub_field('title'); ?></span></a></li>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
	</div>
	<!-- /#pickup-fp -->
	<div id="sub-pickup-fp">
		<ul>
			<?php
				$pickup_query = new WP_Query (
					array (
						'post_type' => 'any',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'tax_query' => array (
							array (
								'taxonomy' => 'ct-display-position',
								'field' => 'slug',
								'terms' => 'sub-pickup',
							),
						),
					)
				);
				if ( $pickup_query -> have_posts() ):
					while ( $pickup_query->have_posts() ) : $pickup_query->the_post();
				?>
			<?php
					if(is_mobile()){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumbnail');
					}else{
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
					};
				?>
			<li><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"></a></li>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
	<!-- /#sub-pickup-fp -->
	<div id="style-fp">
		<ul>
			<?php
				$pickup_query = new WP_Query (
					array (
						'post_type' => 'cpt-style',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby' => 'rand',
						'tax_query' => array (
							array (
								'taxonomy' => 'ct-display-position',
								'field' => 'slug',
								'terms' => 'style-top',
							),
						),
					)
				);
				if ( $pickup_query -> have_posts() ):
					while ( $pickup_query->have_posts() ) : $pickup_query->the_post();
				?>
			<?php
					if(is_mobile()){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumbnail');
					}else{
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
					};
				?>
			<li><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"></a></li>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
	<!-- /#style-fp --> 
	<div id="store-fp">
		<?php get_template_part('template-parts/store'); ?>

	</div>
	<!-- /#store-fp --> 
</div>
<!-- /.contents -->
<?php get_footer(); ?>
