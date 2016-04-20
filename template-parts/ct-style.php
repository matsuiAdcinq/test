<nav id="style-style" class="style-nav">
	<h2 class="open">STYLE</h2>
	<ul>
		<?php wp_list_categories(
			array(
				'taxonomy' => 'ct-style',
				'title_li' => "",
			)
		);
		?>
	
	</ul>
</nav>
<nav id="style-stylist" class="style-nav">
	<h2>STYLIST</h2>
	<ul>
		<?php wp_list_categories(
			array(
				'taxonomy' => 'ct-stylist',
				'title_li' => "",
			)
		);
		?>
	
	</ul>
</nav>
<script>
    jQuery(function($){
        $("h2").on("click", function() {
            $(this).next().slideToggle();
			$(this).toggleClass("open");
        });
    });
</script>