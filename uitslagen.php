<?php
/*
Template Name: Uitslagen
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main content-width" role="main">
        <div class="content-medium">
        <?php
        // Start the Loop
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'page');
            endwhile; // End of the loop.
        
        ?>
        <div class="entry-content">
            <sportlink-wedstrijd teamCode="999999" allgames="true" type="uitslag"></sportlink-wedstrijd>
        </div>

        </div><!--content-medium-->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
