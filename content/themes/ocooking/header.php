<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="header">
    <div class="header__container header__container--start">
      <a class="logo" href="#"><?php bloginfo( 'name' ); ?></a>
      <?php
      wp_nav_menu([
          'theme_location'  => 'header-menu',
          'container'       => 'nav',
          'container_class' => 'menu',
          'menu_class'      => 'menu__list'
      ]);
      ?>
    </div>
    <div class="header__container header__container--end">
      <?php
      $social_networks = get_option( 'ocooking_social_networks' );
      if (
            ! empty ( $social_networks['facebook_url'] )
            || ! empty( $social_networks['twitter_url'] )
      ) :
      ?>
      <nav class="menu">
        <ul class="menu__list">
          <?php if ( ! empty ( $social_networks['facebook_url'] ) ) : ?>
          <li class="menu__list__list-item">
            <a class="menu__list__list-item__link" href="<?= $social_networks['facebook_url']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
          </li>
          <?php
          endif;
          if ( ! empty ( $social_networks['twitter_url'] ) ) :
          ?>
          <li class="menu__list__list-item">
            <a class="menu__list__list-item__link" href="<?= $social_networks['twitter_url']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
          </li>
          <?php
          endif;
          ?>
        </ul>
      </nav>
      <?php endif; ?>
      <a class="ui-button" href="#"><i class="fa fa-bars"></i></a>
    </div>
  </header>