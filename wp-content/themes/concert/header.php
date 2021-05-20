<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title><?php bloginfo('name') ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="author" content="Les Amandettes">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180"
      href="<?php bloginfo( 'template_directory' ); ?>/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32"
      href="<?php bloginfo( 'template_directory' ); ?>/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16"
      href="<?php bloginfo( 'template_directory' ); ?>/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php bloginfo( 'template_directory' ); ?>/assets/favicon/site.webmanifest">

  <!-- Style -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dist/css/styles.css" media="screen">

  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <header class="header">
    <nav class="header__nav content-wrapper">
        <a href="<?php echo home_url( '/' ); ?>">
          <h2>Concert 2.0</h2>
        </a>  
        <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
    </nav>
  </header>
  