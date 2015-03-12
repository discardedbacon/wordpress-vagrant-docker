<?php get_header(); ?>

<!-- Contents -->			
	<div id="main">
		
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h1 class="title"><?php the_title(); ?></h1>
				
				<?php if(has_post_thumbnail()) { echo the_post_thumbnail(); } ?>
				
				<?php the_content(); ?>
			</div><!-- /.post -->
			
		<?php endwhile; ?>
		 
	<?php else : ?>
		 
			<h2>No articles found.</h2>
		    <p>Search:</p><br />
		    <?php get_search_form(); ?>
		 
	<?php endif; ?>
			
	</div><!-- /#main -->
				
<?php get_sidebar(); ?>
<?php get_footer(); ?>