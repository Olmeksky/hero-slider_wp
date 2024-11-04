<?php
/*
Template Name: Шаблон слайдера
*/
?>
<?php get_header(); ?>
<main>

<section class="hero">
	<div class="container-fluid hero_container">

		<div id="carouselExampleCaptions" class="carousel slide carousel-fade hero_slider" data-bs-ride="carousel">
		<?php
			global $post;
			$query = new WP_Query( [
				'posts_per_page'	=> 17,
				'post_type'			=> 'sliders',
			] );
			$i_hero=0;
			#echo $i_hero;
			$i_to = $query->found_posts;
			$i = 0;
		?>
			<div class="carousel-indicators">
				<? while ($i < $i_to) { ?>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<? echo $i; ?>"<? if ($i == 0) { echo ' class="active" aria-current="true"'; } else { } ?> aria-label="Slide <? echo $i+1; ?>"></button>
				<?
				$i++;
				}
				?>
			</div>
			<div class="carousel-inner hero_slider_inner">
			<?
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
			?>
				<div class="carousel-item<? if ($i_hero == 0) { echo ' active'; } else {} ?>">
					<img class="hero_image" src="<?php echo get_the_post_thumbnail_url();?>" class="d-block w-100" alt="<?php the_title(); ?>">
					<div class="carousel-caption d-none d-md-block hero_caption">
						<h5 class="hero_title"><?php the_title(); ?></h5>
						<p class="hero_opis"><?php $ho=get_the_excerpt(); $ho2 = explode("|" , $ho); echo current($ho2); ?></p>
						<a class="hero_link btn btn btn-outline-secondary btn-lg" href="<?php the_permalink();?>">Click Here</a>
					</div>
				</div>
			<?php
					$i_hero++;
					}
				} else {
			?>
					<p>No Sliders</p>
			<?php
				}
				wp_reset_postdata(); // Сбрасываем $post
			?>
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
<hr />
<br />
<br /><br /><br /><br /><br /><br /><br />



</main>
<?php get_footer(); ?>