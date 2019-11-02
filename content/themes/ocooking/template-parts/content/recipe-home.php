    <article <?php post_class( 'home-post' ); ?>>
      <div class="home-post__title-author-container">
        <h2 class="home-post__title"><?php the_title(); ?></h2>
        <span class="home-post__author">Préparée par <?php the_author_posts_link();  ?></span>
      </div>
      <ul class="home-post__informations-list">
        <li class="home-post__informations-list__item"><span class="home-post__informations-list__item__name">Préparation</span> <?php the_field( 'preparation_time' ); ?> min.</li>
        <li class="home-post__informations-list__item"><span class="home-post__informations-list__item__name">Cuisson</span> <?php the_field( 'cooking_time' ); ?> min.</li>
        <li class="home-post__informations-list__item"><span class="home-post__informations-list__item__name">Prix</span> <?php the_field( 'cost_per_person' ); ?> € / pers</li>
      </ul>
      <figure class="home-post__thumbnail">
        <?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'home-post__thumbnail__image' ] ); ?>
      </figure>
      <div class="home-post__excerpt-container">
        <h3>La recette en résumé</h3>
        <p class="home-post__excerpt"><?= get_the_excerpt(); ?></p>
      </div>
      <?php the_ingredients(); ?>
      <div class="home-post__read-next-container">
        <a href="<?php the_permalink(); ?>" class="btn btn-outline-green btn--icon-cutlery">Lire la recette</a>
      </div>
      <div class="home-post__type-container">
        <span class="home-post__footer__type-prefix">Recette visible dans</span> <a class="btn btn-outline-dark" href="#">En cas</a>
      </div>
    </article>