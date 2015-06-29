<article>
	<div class="date"><?php the_date('F j, Y'); ?></div>
	<div class="title"><?php the_title(); ?></div>
	<div class="author">by <?php the_author(); ?></div>
	<div class="content"><?php the_content(); ?></div>
	<div class="posted-in">Posted in <?php the_category(', '); ?></div>
	<div class="tags"><?php the_tags('Tagged '); ?></div>
</article>