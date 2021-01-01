<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ford | Hrvatska</title>
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
    <?php wp_head(); ?>
  </head>
  <body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-ford">
  <a class="navbar-brand" href="<?php echo get_site_url() ?>">
    <img src="<?php echo get_template_directory_uri() . '/images/ford-logo.png'; ?>" alt="Ford Hrvatska" width="150">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <?php
        $args = array(
          'theme_location'  => 'glavni-menu',
          'menu_id'       =>  'ford-glavni-menu',
            'depth'	          => 2,
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'navbarTogglerDemo01',
            'menu_class'      => 'navbar-nav ml-auto mr-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker()
        );
        wp_nav_menu( $args );
      ?>   
</nav>
