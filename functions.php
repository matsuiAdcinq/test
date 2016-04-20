<?php
//ナビゲーション
register_nav_menus(
	array(
		'place_global' => 'グローバル',
		'place_group' => 'グループ',
		'place_utility' => 'ユーティリティ',
	)
);

//アイキャッチ
add_theme_support('post-thumbnails');

//wp_nav_menuにslugのクラス属性を追加する。
function apt_slug_nav($css, $item) {
	if ($item->object == 'page') {
		$page = get_post($item->object_id);
		$css[] = 'menu-item-slug-' . esc_attr($page->post_name);
	}
	return $css;
}

// マルチサイトでスラッグを付加する
function add_multisite_class( $classes ) {
    global $current_blog, $current_site;
    if ( is_multisite() ) {
        if ( is_main_site() ) {
            $classes[] = 'main-site';
        } else {
            if ( is_subdomain_install() ) {
                $slug = substr( $current_blog->domain, 0, strpos( $current_blog->domain, '.' ) );
            } else {
                $slug = trim( $current_blog->path, '/' );
            }
            $classes[] = 'site-' . $slug;
        }
    }
 
    return $classes;
}
add_filter( 'body_class', 'add_multisite_class' );

//is_mobile関数をスマホだけにする
function is_mobile(){
$useragents = array(
'iPhone', // iPhone
'iPod', // iPod touch
'Android.*Mobile', // 1.5+ Android *** Only mobile
'Windows.*Phone', // *** Windows Phone
'dream', // Pre 1.5 Android
'CUPCAKE', // 1.5+ Android
'blackberry9500', // Storm
'blackberry9530', // Storm
'blackberry9520', // Storm v2
'blackberry9550', // Storm v2
'blackberry9800', // Torch
'webOS', // Palm Pre Experimental
'incognito', // Other iPhone browser
'webmate' // Other iPhone browser
);
$pattern = '/'.implode('|', $useragents).'/i';
return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// ACFにスタイルを定義する
function add_acf_stylesheet() {
	wp_register_style( 'acf-style', get_stylesheet_directory_uri() . '/css/acf.css' );
	wp_enqueue_style( 'acf-style' );
}
add_action( 'acf/input/admin_enqueue_scripts', 'add_acf_stylesheet' );

//不要なナビメニューのクラス属性を削除する。
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
//add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);//
function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array( 'current-menu-item', 'current-page-ancestor', 'hair', 'esthe', 'nail', 'restaurant-bar', 'rental-space', 'corp', 'catalog', 'ec', 'original-brand' )) : '';
}
