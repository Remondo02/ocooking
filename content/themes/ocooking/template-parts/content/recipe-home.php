<article class="post">
    <div class="post__title-author-container">
        <h2 class="post__title"><?php the_title(); ?></h2>
        <span class="post__author">Préparée par <?php the_author_posts_link();  ?></span>
    </div>
    <ul class="informations-list">
        <li class="informations-list__item"><span class="informations-list__item__name">Préparation</span> <?php the_field( 'preparation_time' ); ?> min.</li>
        <li class="informations-list__item"><span class="informations-list__item__name">Cuisson</span> <?php the_field( 'cooking_time' ); ?> min.</li>
        <li class="informations-list__item"><span class="informations-list__item__name">Prix</span> <?php the_field( 'cost_per_person' ); ?> € / pers</li>
    </ul>
    <figure class="post__thumbnail">
        <?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'post__thumbnail__image' ] ); ?>
    </figure>
    <div class="post__excerpt-container">
        <h3>La recette en résumé</h3>
        <p class="post__excerpt"><?= get_the_excerpt(); ?></p>
    </div>
    <?php the_ingredients(); ?>
    <div class="post__read-next-container">
        <a href="<?php the_permalink(); ?>" class="btn btn-outline-ocooking btn--icon-cutlery">Lire la recette</a>
    </div>
    <div class="post__type-container">
        <span class="post__footer__type-prefix">Recette visible dans</span> <a class="btn btn-outline-dark" href="#">En cas</a>
    </div>
</article>