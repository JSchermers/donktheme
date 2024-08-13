<?php
/*
Template Name: Teams Menu
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main content-width" role="main">
        <?php
        // Start the Loop
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'page');
            endwhile; // End of the loop.
        
        // Display the custom menu
        wp_nav_menu(array(
            'theme_location' => 'teams-menu',
            'walker' => new Thumbnail_Walker_Nav_Menu()
        ));

        ?>
        
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
