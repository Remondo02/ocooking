<?php

add_action( 'wp_enqueue_scripts', 'ocooking_enqueue_scripts' );

function ocooking_enqueue_scripts()
{
    wp_enqueue_style(
        'ocooking-style',
        get_theme_file_uri( 'public/css/style.css' )
    );

    wp_enqueue_script(
        'ocooking-script',
        get_theme_file_uri( 'public/css/script.css' ),
        [],
        false,
        true
    );
}