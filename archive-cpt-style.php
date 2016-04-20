<?php get_header(); ?>

<div id="style-archive">
	<div class="contents">
		<h1><span class="title-en">Style</span>スタイルカタログ</h1>
		<?php get_template_part('template-parts/ct-style'); ?>
		
		<div id="style-type-list">
			<?php
					$categories = get_terms('ct-style', array('child_of'=>6,'hide_empty'=>0));
					foreach($categories as $category) :
					 
					$term_id = $category->term_id;
					$post_id = 'category_'.$cat_id; 
					   
					$catimg = get_field('image',$term_id);
					$img = wp_get_attachment_image_src($catimg, 'full');
					?>
			<div class="style-type"> <a href="<?php the_permalink(); ?>"> <img src="<?php echo $img[0]; ?>" alt="<?php echo $category->name; ?>" />
				<h2><?php echo $category->name; ?></h2>
				</a> </div>
			<?php endforeach; ?>
		</div>
		<!-- /#style-list --> 
	</div>
	<!-- /.contents --> 
</div>
<!-- /.inner -->
<?php get_footer(); ?>
