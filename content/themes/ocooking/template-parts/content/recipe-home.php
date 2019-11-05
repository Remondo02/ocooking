<article <?php post_class( 'home-post' ); ?>>
      <div class="home-post__title-author-container">
        <h2 class="home-post__title"><?php the_title(); ?></h2>
        <span class="home-post__author"><?php _e( 'Préparée par', OCOOKING_TEXT_DOMAIN ); ?> <?php the_author_posts_link();  ?></span>
      </div>
      <ul class="home-post__informations-list">
        <li class="home-post__informations-list__item"><span class="home-post__informations-list__item__name"><?php _e( 'Préparation', OCOOKING_TEXT_DOMAIN ); ?></span> <?php the_field( 'preparation_time' ); ?> <?php _e( 'min.', OCOOKING_TEXT_DOMAIN ); ?></li>
        <li class="home-post__informations-list__item"><span class="home-post__informations-list__item__name"><?php _e( 'Cuisson', OCOOKING_TEXT_DOMAIN ); ?></span> <?php the_field( 'cooking_time' ); ?> <?php _e( 'min.', OCOOKING_TEXT_DOMAIN ); ?></li>
        <li class="home-post__informations-list__item"><span class="home-post__informations-list__item__name"><?php _e( 'Prix', OCOOKING_TEXT_DOMAIN ); ?></span> <?php printf(
            __('%1$d € / pers.', OCOOKING_TEXT_DOMAIN ),
            get_field( 'cost_per_person' )
        ); ?></li>
      </ul>
      <figure class="home-post__thumbnail">
        <?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'home-post__thumbnail__image' ] ); ?>
      </figure>
      <div class="home-post__excerpt-container">
        <h3><?php _e( 'La recette en résumé', OCOOKING_TEXT_DOMAIN ); ?></h3>
        <p class="home-post__excerpt"><?= get_the_excerpt(); ?></p>
      </div>
      <?php the_ingredients(); ?>
      <div class="home-post__read-next-container">
        <a href="<?php the_permalink(); ?>" class="btn btn-outline-green btn--icon-cutlery"><?php _e( 'Lire la recette', OCOOKING_TEXT_DOMAIN ); ?></a>
      </div>
      <div class="home-post__type-container">
        <span class="home-post__footer__type-prefix"><?php echo  __( 'Recette visibile dans', OCOOKING_TEXT_DOMAIN ); ?></span> <a class="btn btn-outline-dark" href="#">En cas</a>
      </div>
    </article>