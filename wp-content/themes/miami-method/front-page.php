<?php get_header(); ?>

	<section class="blog-posts">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article>
				<div class="date"><?php the_date('m.d.y'); ?></div>
				<div class="title"><?php the_title(); ?></div>
				<div class="author">by <?php the_author(); ?></div>
				<div class="content"><?php the_content(); ?></div>
				<div class="posted-in">Posted in <?php the_category(', '); ?></div>
				<div class="tags"><?php the_tags('Tagged '); ?></div>
			</article>
		<?php endwhile; endif; ?>
	</section>

<?php get_footer(); ?>