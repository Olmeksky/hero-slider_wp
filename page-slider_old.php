<?php
/*
Template Name: Шаблон слайдера old

*/
?>
<?php get_header(); ?>
<main>

<section class="hero">
	<div class="container-fluid hero_container">
		<div id="carouselExampleCaptions" class="carousel slide hero_slider" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 0"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 2"></button>
			</div>
			<div class="carousel-inner hero_slider_inner">
				<div class="carousel-item active">
					<img class="hero_image" src="http://sidragen.ru/wp-content/uploads/2024/09/tristate-clinincs.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block hero_caption">
						<h5 class="hero_title">TELEHEALTH</h5>
						<p class="hero_opis">Have a visit in minutes take care of your medical needs…</p>
						<a class="hero_link btn btn btn-outline-secondary btn-lg">Click Here</a>
					</div>
				</div>
				<div class="carousel-item">
					<img class="hero_image" src="http://sidragen.ru/wp-content/uploads/2024/09/book_your_appointment_img.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block hero_caption">
						<h5 class="hero_title">TELEHEALTH 2</h5>
						<p class="hero_opis">Have a visit in minutes take care of your medical needs…</p>
						<a class="hero_link btn btn btn-outline-secondary btn-lg">Click Here</a>
					</div>
				</div>
				<div class="carousel-item">
					<div class="hero_image"><svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="100%" height="650px" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Третий слайд" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="650px" fill="#555"></rect><text x="50%" y="50%" fill="#333" dy=".3em">Третий слайд</text></svg></div>
					<div class="carousel-caption d-none d-md-block hero_caption">
						<h5 class="hero_title">TELEHEALTH 3</h5>
						<p class="hero_opis">Have a visit in minutes take care of your medical needs…</p>
						<a class="hero_link btn btn btn-outline-secondary btn-lg">Click Here</a>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Предыдущий</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Следующий</span>
			</button>
		</div>

	</div>
</section>


<section class="vozmozhno">
	<div class="container">
		<h2 class="section__title">Последние статьи</h2>
		<div class="row">
		<?php
			global $post;
			$query = new WP_Query( [
				'posts_per_page'	=> 6,
				'post_type'			=> 'post',
			] );
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
					<!-- Вывод Статей, функции цикла: the_title() и т.д. -->
					<div class="col-lg-4 col-sm-6 col-12">
						<h2 class="news_title"><a class="news_link" href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
						<a class="news_link" href="<?php the_permalink();?>"><img class="news_img" src="<?php echo get_the_post_thumbnail_url();?>" /></a>
						
						<p><?php the_truncated_post(200); ?></p>
						<a  href="<?php the_permalink();?>">Читать полностью</a>

					</div>
					<?php
				}
			} else {
				?>
					<p>Статей не найдено</p>
				<?php
			}
			wp_reset_postdata(); // Сбрасываем $post
		?>
		</div>
	</div>
</section>

</main>
<?php get_footer(); ?>