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
require OCOOKING_PLUGIN_DIR_PATH . '/includes/class-role-cooker.php';
require OCOOKING_PLUGIN_DIR_PATH . '/includes/admin-menu.php';
require OCOOKING_PLUGIN_DIR_PATH . '/includes/admin-dashboard.php';
require OCOOKING_PLUGIN_DIR_PATH . '/includes/enqueue-scripts.php';
//require OCOOKING_PLUGIN_DIR_PATH . '/includes/admin-cleanup.php';
register_activation_hook(
    OCOOKING_PLUGIN_PATH,
    function () use ( $cpt_recipe ) {
        $role_cooker = new Role_Cooker;
        $role_cooker->add_role();
        $role_cooker->add_capabilities();
        $cpt_recipe->add_administrator_capabilities();
        $cpt_recipe->register_post_type();
        $cpt_recipe->register_taxonomies();
        flush_rewrite_rules();
    }
);
register_deactivation_hook(
    OCOOKING_PLUGIN_PATH,
    function () use ( $cpt_recipe ) {
        flush_rewrite_rules();
    }
);
register_uninstall_hook(
    OCOOKING_PLUGIN_PATH,
    'ocooking_uninstall'
);
function ocooking_uninstall()
{
    $role_cooker = new Role_Cooker;
    $role_cooker->remove_role();
}