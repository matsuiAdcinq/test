<?php get_template_part('template-parts/footer-content'); ?>

</div><!-- /#sb-site -->
<div id="current-column" class="sb-slidebar sb-left">
	<?php
	wp_nav_menu(array(
		'container' => 'nav',
		'container_id' => 'global-nav',
		'theme_location' => 'place_global',
	));
	?>
	
</div><!-- /#current-column -->
<div id="group-column" class="sb-slidebar sb-right sb-style-overlay">
	<div id="group-contents">
		<div id="logo"><img src="<?php bloginfo('template_url'); ?>/images/be-wave-logo-01.png"></div>
		<nav>
			<ul>
				<li class="corp"><a href="http://www.be-wave.co.jp/">コーポレート</a></li>
				<li class="esthe"><a href="http://www.be-wave.co.jp/esthe/">エステサロン</a></li>
				<li class="hair current-menu"><a href="http://www.be-wave.co.jp/hair/">ヘアサロン</a></li>
				<li class="nail"><a href="http://www.be-wave.co.jp/nail/">ネイルサロン</a></li>
				<li class="restaurant-bar"><a href="http://www.be-wave.co.jp/restaurant-bar/">レストラン＆バー</a></li>
				<li class="rental-space"><a href="http://www.be-wave.co.jp/rental-space/">レンタルスペース</a></li>
			</ul>
		</nav>
		<p id="copyright">Copyright &copy; <?php echo esc_html(date('Y')); ?><br>BE-WAVE.corporation<br>All rights reserved.</p>
	</div>
</div><!-- /#group-column -->
<?php if(is_mobile()): ?>
<script>
	(function($) {
		$(document).ready(function() {
			$.slidebars();
		});
	}) (jQuery);
</script>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>
