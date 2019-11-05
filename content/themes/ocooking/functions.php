<?php

require get_theme_file_path( 'inc/configuration-constants.php' );

require get_theme_file_path( 'inc/utils.php' );

// Création du hook 'ocooking_theme_setup'
do_action( 'ocooking_theme_setup' );

require get_theme_file_path( 'inc/enqueue-scripts.php' );

require get_theme_file_path( 'inc/setup.php' );

require get_theme_file_path( 'inc/menus.php' );

require get_theme_file_path( 'inc/cleanup.php' );

// Création du hook 'ocooking_after_setup_theme'
do_action( 'ocooking_after_setup_theme' );