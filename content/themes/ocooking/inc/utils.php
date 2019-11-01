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

    if ( ! empty( $ingredient_list ) ) :
    ?>
    <ul class="ingredients">
        <?php foreach ( $ingredient_list as $ingredient ) : ?>
        <li class="ingredients__item"><a href="<?= get_term_link( $ingredient ); ?>" class="badget badge-pill badge-dark"><?= $ingredient->name; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php
    endif;
}