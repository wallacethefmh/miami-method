<?php get_header(); ?>
<?php if (have_posts()) : the_post(); ?>
	<section class="page-content">
		<div class="title"><?php the_title(); ?></div>
		<?php the_content(); ?>
	</section>
<?php endif; ?>
<?php get_footer(); ?>
