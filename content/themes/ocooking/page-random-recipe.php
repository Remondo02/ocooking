<?php

get_header();

?>
<main class="main">
<?php
$random_recipe_query = new WP_Query([
    'post_type'      => Custom_Post_Type_Recipe::POST_TYPE,
    'posts_per_page' => 1,
    'orderby' => 'RAND(' . date('Ymd') . ')'
]);

if ( $random_recipe_query->have_posts() ) :
    $random_recipe_query->the_post();

    the_title();
    the_post_thumbnail();
endif;
?>
</main>
<?php

get_footer();