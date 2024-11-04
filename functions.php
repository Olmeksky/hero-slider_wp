<?php
/*
 * This is the child theme for Understrap theme.
 */
add_action( 'wp_enqueue_scripts', 'ustrb5_enqueue_styles' );
function ustrb5_enqueue_styles() {
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method');
function my_scripts_method() {
	// отменяем зарегистрированный jQuery
	// вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', get_stylesheet_directory_uri() . '/assets/js/jquery-3.7.1.min.js');
	wp_enqueue_script( 'jquery' );
	
	// подключим библиотеку для карусели бутстрап
	wp_register_script( 'bbundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
	wp_enqueue_script('bbundle');
	
	// подключаем свои скрипты
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main.js');
	
}

/* Дополнительные сущности (кастомные поля) */

// Регистрируеме новую тип для слайдера.
function register_events() {
	// Для Типа записи Слайдер
	register_post_type( 'sliders', [
		'labels'	=> [
			'name'					=> 'Hero Slider',
			'singular_name'			=> 'Hero Sliders',
			'name_admin_bar'		=> 'Hero Sliders',
			'menu_name'				=> 'Hero Sliders',
			'add_new'				=> 'Add Hero Slider',
			'add_new_item'			=> 'Add Hero Slider',
			'edit_item'				=> 'Edit Hero Slider',
			'new_item'				=> 'New Hero Slider',
			'view_item'				=> 'View Hero Slider',
			'search_items'			=> 'Search Hero Slider',
			'not_found'				=> 'Hero Slider Not Found',
			'not_found_in_trash'	=> 'Hero Slider Not Found In Trash',
			'featured_image'		=> 'Hero Slider Photo',
			'set_featured_image'	=> 'Set Hero Slider Photo',
			'title_placeholder'		=> 'Hero Slider Title',
			'first_menu_name'		=> 'Hero Slider List',
		],
		'public'				=> true,
		'publicly_queryable'	=> true,
		'rewrite'				=> array( 'slug' => 'sliders', 'hierarchical' => false, 'with_front' => false ),
		'capability_type'		=> 'post',
		'has_archive'			=> true,
		'hierarchical'			=> false,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes', 'post-formats' ),
		'menu_position'			=> 7,
		'menu_icon'				=> 'dashicons-slides',
		'posts_per_page'		=> 17,
		'show_in_rest'			=> true,
		'show_in_nav_menus'		=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
	] );
}
add_action( 'init', 'register_events' );


/* Ваш дополнительный код */
if (! function_exists('sidra_setup')) {
	function sidra_setup () {
		// Добавим возможность загрузки логотипа, через настройки сайта
		add_theme_support( 'custom-logo', [
			'height'		=> 70,
			'width'			=> 190,
			'flex-width'	=> true,
			'flex-height'	=> false,
			'header-text'	=> 'Здесь ЛОГО',
			'unlink-homepage-logo' => false,
		] );
		// Добавим динамический Тайтл
		add_theme_support('title-tag');
	}
	add_action('after_setup_theme','sidra_setup');
}

// функция вывода короккого содержимого
function the_truncated_post($symbol_amount) {
	$filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
	echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}




?>





