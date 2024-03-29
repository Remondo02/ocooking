<?php
function get_the_ingredients()
{
    $recipe_id = get_the_ID();
    $ingredient_list = get_the_terms(
        $recipe_id,
        Custom_Post_Type_Recipe::INGREDIENT_TAXONOMY
    );
    return $ingredient_list;
}
function the_ingredients()
{
    $ingredient_list = get_the_ingredients();
    $ingredients_count = count($ingredient_list);
    if ( ! empty( $ingredient_list ) ) :
    ?>
    <ul class="home-post__ingredients">
        <li><?= _n( 'Ingrédient :', 'Ingrédients :', $ingredients_count, OCOOKING_TEXT_DOMAIN ); ?></li>
        <?php foreach ( $ingredient_list as $ingredient ) : ?>
        <li class="home-post__ingredients__item"><a href="<?= get_term_link( $ingredient ); ?>" class="badget badge-pill badge-dark"><?= $ingredient->name; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php
    endif;
}