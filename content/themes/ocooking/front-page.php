<?php

get_header();


?>
<main class="main">
<?php
$last_recipe_query = new WP_Query([
    'post_type'      => Custom_Post_Type_Recipe::POST_TYPE,
    'posts_per_page' => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if ( $last_recipe_query->have_posts() ) :
    $last_recipe_query->the_post();

    get_template_part(
        'template-parts/content/recipe',
        'home'
    );
endif;
?>
</main>
<?php

get_sidebar();

get_footer();