<?php

add_action( 'init', 'ocooking_register_menus' );

function ocooking_register_menus()
{
    register_nav_menus([
        'header-menu'  => 'Menu de l\'en-tête',
        'main-menu'    => 'Menu principal',
        'sidebar-menu' => 'Menu de la barre latérale'
    ]);
}

// @link https://codex.wordpress.org/Plugin_API/Filter_Reference/nav_menu_css_class
add_filter( 'nav_menu_css_class', 'ocooking_nav_menu_css_class' );

function ocooking_nav_menu_css_class( $classes )
{
    $classes[] = 'menu__list__list-item';

    return $classes;
}

// @link https://codex.wordpress.org/Plugin_API/Filter_Reference/nav_menu_link_attributes
add_filter(
    'nav_menu_link_attributes',
    'ocooking_nav_menu_link_attributes',
    10,
    1
);

function ocooking_nav_menu_link_attributes( $attributes )
{
    if ( ! isset( $attributes['class'] ) ) {
        $attributes['class'] = '';
    }

    $attributes['class'] .= ' menu__list__list-item__link';

    return $attributes;
}