<footer id="main-footer">
	<div id="footer-contact">
		<?php
		$store_query = new WP_Query (
			array (
				'post_type' => 'page',
				'pagename' => 'store',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			)
		);
		if ( $store_query -> have_posts() ):
			while ( $store_query->have_posts() ) : $store_query->the_post();
		?>

		<div class="item">
			<div class="contact">
				<p class="title">お問い合わせ</p>
				<?php if(is_mobile()): ?>	<p class="tel"><a href="tel:<?php the_field('tel'); ?>"><i class="fa fa-phone-square"></i><?php the_field('tel'); ?></a></p>
				<?php else: ?><p class="tel"><i class="fa fa-phone-square"></i><?php the_field('tel'); ?></p>
				<?php endif; ?><p class="open-close">営業時間：<?php the_field('open_close'); ?><br>（最終受付時間：<?php the_field('last_hours'); ?>）</p>
			</div>
		</div>
		<div class="item">
			<?php if(have_rows('reservation')): ?>
			<?php while(have_rows('reservation')): the_row(); 
				$image = wp_get_attachment_image_src(get_sub_field('logo'),'full');
			?>

			<div class="contact">
				<p class="title">WEB予約</p>
				<a class="link" href="<?php the_sub_field('url'); ?>" target="_blank"><img src="<?php echo esc_url($image[0]); ?>" alt=""></a>
			</div>
			<?php endwhile; endif; ?>

		</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>

	</div>
</footer>
