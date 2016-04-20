			<div id="menu-list">
			<?php
			$menu_query = new WP_Query (
				array (
					'post_type' => 'cpt-menu',
					'post_status' => 'publish',
					'posts_per_page' => -1,
				)
			);
			if ( $menu_query -> have_posts() ):
				while ( $menu_query->have_posts() ) : $menu_query->the_post();
			?>
	
				<div class="content">
					<h2><span><?php echo esc_html(ucfirst($post->post_name)); ?></span><?php the_title(); ?></h2>
					<table>
						<thead>
							<tr>
								<?php if(the_sub_field('coin')): ?>
	
								<td>バナナコイン</td>
								<?php endif; ?>
	
								<td>通常料金</td>
								<td>会員価格</td>
							</tr>
						</thead>
					<?php if(have_rows('menu')): ?>
	
						<tbody>
					<?php while(have_rows('menu')): the_row(); ?>
	
							<tr>
								<th colspan="2"><?php the_sub_field('title'); ?><?php if(get_sub_field('description')): ?><span><?php the_sub_field('description'); ?></span><?php endif; ?></th>
							</tr>
							<tr>
								<?php if(the_sub_field('coin')): ?>
	
								<td class="banana"><?php the_sub_field('coin'); ?> 枚</td>
								<?php endif; ?>
	
								<td>￥<?php echo esc_html(number_format(get_sub_field('price'))); ?> -<span>（税込￥<?php $price = get_sub_field('price'); $tax_price = $price*1.08; echo esc_html(number_format($tax_price)); ?>）</span></td>
								<td>￥<?php $off_price = $price*0.8; echo esc_html(number_format($off_price)); ?> -<span>（税込￥<?php $tax_off_price = $off_price*1.08; echo esc_html(number_format($tax_off_price)); ?>）</span></td>
							</tr>
					<?php endwhile; ?>
	
						</tbody>
					<?php endif; ?>
	
					</table>
				</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
	
			</div><!-- /#menu-list -->
