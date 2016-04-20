<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<?php if(is_mobile()): ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php else: ?>
<meta name="viewport" content="width=1160">
<?php endif; ?>
<title><?php wp_title(); ?></title>
<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicons/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="/favicons/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicons/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/favicons/manifest.json">
<link rel="shortcut icon" href="/favicons/favicon.ico">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/favicons/mstile-144x144.png">
<meta name="msapplication-config" content="/favicons/browserconfig.xml">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400,400italic' rel='stylesheet' type='text/css'>
<?php if(is_mobile()): ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/js/slidebars/slidebars.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/mobile.css">
<?php else: ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/pc.css">
<?php endif; ?>
<?php wp_enqueue_script('jquery'); ?>
<?php wp_enqueue_script('jquery-ui-tabs'); ?>
<?php wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/ui-darkness/jquery-ui.css'); ?>
<?php wp_enqueue_style('sliderPro', get_template_directory_uri() . '/js/slider-pro/css/slider-pro.css'); ?>
<?php wp_enqueue_script('sliderPro', get_template_directory_uri() . '/js/slider-pro/jquery.sliderPro.min.js'); ?>
<?php if(is_mobile()): ?>
<?php wp_enqueue_script('slidebars', get_template_directory_uri() . '/js/slidebars/slidebars.min.js'); ?>
<?php else: ?>
<?php wp_enqueue_script('masonry', get_template_directory_uri() . '/js/masonry/masonry.pkgd.min.js'); ?>
<?php endif; ?>
<?php wp_head(); ?>
<!--▼▼追加▼▼-->
<?php if(is_archive()): ?>
<script>
jQuery(function($){
	$("h2").on("click", function() {
		$(this).next().slideToggle();
		$(this).toggleClass("open");
	});
});
</script>
<?php endif; ?>
<!--▲▲追加▲▲-->
</head>
<body <?php body_class(); ?>>

<div id="sb-site" class="<?php if(is_mobile()): ?>mobile<?php else: ?>pc<?php endif; ?>">
	<?php if(is_mobile()): ?>
	
	<header id="mobile-header">
		<div id="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/mobile-logo.png" alt="BE-WAVE"></a></div>
		<div class="sb-toggle-left navbar-left"><i class="fa fa-bars fa-3x"></i></div>
		<div class="sb-toggle-right navbar-right"><i class="fa fa-building-o fa-3x"></i></div>
	</header>
	<?php endif; ?>
