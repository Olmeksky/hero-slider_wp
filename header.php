<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
		<!-- шрифт -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<!-- Поля для SEO, подключенные через ACF (создать и раскомментировать, если будешь делать SEO) -->
	<meta name="title" content="<?php #echo get_field('title');?>" />
	<meta name="description" content="<?php #echo get_field('description');?>" />
	<meta name="keywords" content="<?php #echo get_field('keywords');?>" />

	<?php wp_head(); ?>
</head>
<body>
<div class="container-fluid top-nav">
	<div class="container">
		<div class="top-nav">
			<div class="row">
				<div class="col-xl-5 col-lg-4 col-md-8 col-sm-8 col-8">
					<div class="wrap-nav_menu">
						<?php wp_nav_menu( array(
							'menu'				=> 3,
							'container'			=> 'ul',
							'menu_class'		=> 'top-nav_menu',
							'menu_id'			=> '',
							'echo'				=> true,
							'fallback_cb'		=> 'wp_page_menu',
							'before'			=> '',
							'after'				=> '',
							'link_before'		=> '',
							'link_after'		=> '',
							'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'				=> 0,
							'walker'			=> '',
						) ); ?>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Container -->
</div> <!-- Container fluid -->


