<?php get_header(); ?>
	<div class="main">
		<h2>Error (404)</h2>
		<p>We cannot find the page you are looking for.</p>
		<p>Please use the links below, or head back to <a href="/">home</a>.</p>
		<?php 
		//$args1 = array('menu' => 'Main');
		//wp_nav_menu( $args1 );
		?>
		<p>Search:</p><br />
		<?php get_search_form(); ?>
	</div><!-- /#main -->
<?php get_footer(); ?>