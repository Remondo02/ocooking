<?php

// Suppression du bouton d'aide de toutes les pages
add_filter( 'contextual_help', 'ocooking_remove_help', 999, 3 );

function ocooking_remove_help( $old_help, $screen_id, $screen ){
    $screen->remove_help_tabs();

return $old_help;
}

// Suppression du bouton Options de l'écran
add_filter('screen_options_show_screen', '__return_false');


// Suppression du message du footer
add_filter('admin_footer_text', 'ocooking_remove_footer_admin');

function ocooking_remove_footer_admin() {
return '';
}

// Suppression de de la version du footer
add_action( 'admin_menu', 'ocooking_remove_version_footer' );

function ocooking_remove_version_footer() {
remove_filter( 'update_footer', 'core_update_footer' );
}