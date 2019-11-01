<?php

 /*
 Plugin Name: oCooking Settings
 Author: Nova
 Version: 1.0
 */

 if ( ! defined( 'WPINC' ) ) {
     http_response_code( 404 );
     exit;
 }

require plugin_dir_path( __FILE__ ) . 'includes/class-custom-post-type-recipe.php';

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