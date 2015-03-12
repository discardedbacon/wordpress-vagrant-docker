<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    if(!is_home() && !is_front_page()){
        $titleStr = get_the_title($post->ID)." | ".get_bloginfo('name');
    }else{
        $titleStr = get_bloginfo('name')." | ".get_bloginfo('description');
    }
    ?>
    <title><?php echo $titleStr;?></title>
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->
    <?php wp_head();?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-XXXXXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
  </head>
  <body>
    <div class="container">
        <div class="header">
            <nav class="" role="navigation">
                <?php wp_nav_menu( array('menu_id' => 'nav' )); ?>
            </nav>
        </div>
        