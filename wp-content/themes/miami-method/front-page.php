<?php get_header(); ?>

	<section class="blog-posts">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('includes/article'); ?>
		<?php endwhile; endif; ?>
	</section>

<?php get_footer(); ?>