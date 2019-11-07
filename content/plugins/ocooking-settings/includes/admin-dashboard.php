<?php

add_action( 'wp_dashboard_setup', 'ocooking_dashboard_widgets' );

function ocooking_dashboard_widgets()
{
    // @link
    wp_add_dashboard_widget(
        'dashboard_ocooking_author_message',
        __( 'Message de Nova', OCOOKING_PLUGIN_TEXT_DOMAIN ),
        'ocooking_admin_dashboard_author_message_widget'
    );
}

function ocooking_admin_dashboard_author_message_widget()
{
?>
    <p>Hello from Nova!</p>
<?php
}

add_action( 'admin_init', 'ocooking_dashboard_cleanup', 1000 );

function ocooking_dashboard_cleanup()
{
    // Suppression des widgets par défaut du dashboard
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}