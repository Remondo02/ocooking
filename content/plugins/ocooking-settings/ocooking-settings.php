<?php
/*
Plugin Name: oCooking Settings
Author: Nova
Version: 1.0
Text Domain: ocooking-settings
*/
if ( ! defined( 'WPINC' ) ) {
    http_response_code( 404 );
    exit;
}
define( 'OCOOKING_PLUGIN_PATH', __FILE__ );
define( 'OCOOKING_PLUGIN_DIR_PATH', __DIR__ );
define( 'OCOOKING_PLUGIN_TEXT_DOMAIN', 'ocooking-settings' );
require OCOOKING_PLUGIN_DIR_PATH . '/includes/load-textdomain.php';
require OCOOKING_PLUGIN_DIR_PATH . '/includes/class-custom-post-type-recipe.php';
$cpt_recipe = new Custom_Post_Type_Recipe;
register_activation_hook(
    __FILE__,
    function () use ( $cpt_recipe ) {
        $cpt_recipe->register_post_type();
        $cpt_recipe->register_taxonomies();
        flush_rewrite_rules();
    }
);
register_deactivation_hook(
    __FILE__,
    function () use ( $cpt_recipe ) {
        flush_rewrite_rules();
    }
);