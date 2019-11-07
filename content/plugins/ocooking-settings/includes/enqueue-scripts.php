<?php

add_action( 'admin_enqueue_scripts', 'ocooking_admin_enqueue_scripts' );

function ocooking_admin_enqueue_scripts()
{
    $current_screen = get_current_screen();

    if ( 'ocooking_page_ocooking-settings-other-options' === $current_screen->id ) {
        wp_enqueue_style(
            'ocooking-admin-style',
            plugin_dir_url( OCOOKING_PLUGIN_PATH ) . 'public/css/style.css'
        );
    }
}