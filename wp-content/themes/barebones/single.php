<?php get_header(); ?>
<div id="main">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h1 class="title"><?php the_title(); ?></h1>
			<div class="blog_info">
			<ul>
				<li class="cal"><?php the_time('Y-m-d') ?></li>
				<li class="cat"><?php the_category(', ') ?></li>
				<li class="tag"><?php the_tags('', ', '); ?></li>
			</ul>
			<br class="clear" />
			</div>

			<?php if(has_post_thumbnail()) { echo the_post_thumbnail(); } ?>

			<?php the_content(); ?>
			</div><!-- /.post -->

		<?php endwhile; ?>

			<div class="nav-below">
				<span class="nav-previous"><?php previous_post_link('%link', 'Previous'); ?></span>
				<span class="nav-next"><?php next_post_link('%link', 'Next'); ?></span>
			</div><!-- /.nav-below -->

			<!-- Commetns -->					
			<?php comments_template(); ?>		

			<?php else : ?>

			<h2 class="title">No articles fould.</h2>
			<p>Search: </p>
			<?php get_search_form(); ?>
	<?php endif; ?>
</div><!-- /#main -->
<?php get_footer(); ?>