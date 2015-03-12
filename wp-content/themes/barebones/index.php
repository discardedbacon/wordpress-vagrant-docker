<?php
get_header(); ?>
  <div id="main">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <div class="post">
          <h2 class="title">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
              <?php the_title(); ?>
            </a>
          </h2>
          <div class="blog_info">
            <ul>
              <li class="cal"><?php the_time('Y-m-d') ?></li>
              <li class="cat"><?php the_category(', ') ?></li>
              <li class="tag"><?php the_tags('', ', '); ?></li>
            </ul>
            <br class="clear" />
          </div>
          
          <?php if(has_post_thumbnail()) { echo the_post_thumbnail(); } ?>
          
          <?php the_content('Continue'); ?>
        </div><!-- /.post -->
        
      <?php endwhile; ?>
          
          <div class="nav-below">
          <span class="nav-previous"><?php next_posts_link('Previous') ?></span>
          <span class="nav-next"><?php previous_posts_link('Next') ?></span>
        </div><!-- /.nav-below -->
       
      <?php else : ?>
       
          <h2>No article found.</h2>
          <p>Search</p>
          <?php get_search_form(); ?>
       
      <?php endif; ?>
          
        </div><!-- /#main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>