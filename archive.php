<?php
/*
Template Name: Archives
*/
get_header(); ?>

<main>
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="section__title"><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
		<?php endwhile; // end of the loop. ?>
		<?php the_tags(); ?>
	</div>

</main>
<?php get_footer(); ?>
