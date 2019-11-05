<?php

add_action( 'after_setup_theme', 'ocooking_setup' );

function ocooking_setup()
{
    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'ocooking_load_theme_textdomain' );
function ocooking_load_theme_textdomain()
{
    load_theme_textdomain(
        OCOOKING_TEXT_DOMAIN,
        get_theme_file_path() . '/languages'
    );
}