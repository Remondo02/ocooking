<?php
get_header();
?>
<main class="main">
<?php
if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        if ( current_user_can( 'edit_posts' ) ) {
            edit_post_link();
        }
        the_title();
        the_content();
    endwhile;
endif;
?>
</main>
<?php
get_sidebar();
get_footer();