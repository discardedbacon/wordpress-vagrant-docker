	<!-- Footer -->
	<footer>
    <div id="footer-nav" class="row">
			<?php
        wp_nav_menu( array('menu_id' => 'nav' ));
			?>
    </div><!-- /div#footer-nav .row -->
    <div id="footer-copyright" class="row">
      <p>&copy; <?php echo date('Y'); ?> . All rights reserved.</p>
    </div><!-- /div#footer-copyright .row -->
  </footer>
</div><!-- /container -->
<!-- JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php $templateDirectory = get_template_directory_uri(); ?>
<script src="<?php echo $templateDirectory; ?>/js/scripts.js"></script>
<?php wp_footer(); ?>
</body>
</html>