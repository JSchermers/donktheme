<?php
/*
Template Name: Homepage
*/

get_header();
?>

<main id="primary" class="site-main">

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'posts_per_page' => 24, // Aantal posts per pagina
    'paged' => $paged,       // Paginering
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    $post_count = 0;

    // Open de begin div voor de eerste drie posts
    echo '<div class="header-footer-row">';
    echo '<div class="content-width grid">';
    echo '<div class="news-head">';

    while ($query->have_posts()) : $query->the_post();
        $post_count++;

        if ($post_count <= 3) {
            echo '<div class="item' . $post_count . '">';
            // Plaats de eerste drie posts in de begin div
            get_template_part('template-parts/content', 'donk-teaser');
            echo'</div>';
        } else {
            // Zodra de vierde post begint, sluit de begin div en voeg de nieuwe div toe
            if ($post_count == 4) {      

                echo '</div>'; // news-head

                echo'<div class="soccer-stats-head">
                <article class="item4">
                    <sportlink-wedstrijd teamCode="118838" single="true">
                    <span slot="next_game">Volgende wedstrijd</span>
                    </sportlink-wedstrijd>

                </article>
                <article class="item5">
                    <sportlink-wedstrijd teamCode="118838" type="uitslag" single="true">
                        <span slot="previous_game">Vorige wedstrijd</span>
                    </sportlink-wedstrijd>
                </article>
                <article class="item6"></article>
            </div>
        </div>';

                echo '</div>'; // content-width grid
                echo '</div>'; // header-footer-row
                 
                echo '<div class="content-row content-width grid">';    
                echo '<div class="news">'; // Open de nieuws div
            }

            // Plaats de rest van de posts in de nieuws div
            echo '<div class="item' . $post_count . '">';
            get_template_part('template-parts/content', 'donk-teaser');
            echo'</div>';
        }

    endwhile;

     // Paginering
    $pagination_args = array(
        'total' => $query->max_num_pages,
        'current' => $paged,
        'mid_size' => 1,
        'prev_text' => __('« Vorige'),
        'next_text' => __('Volgende »'),
    );
    echo '<div class="pagination">';
    echo paginate_links($pagination_args);
    echo '</div>';

    // Sluit de nieuws div na de loop
    echo '</div>'; //news

    echo'<div class="meta">';
    echo'<sportlink-stand teamCode="118838">';
    echo'<span slot="ally_title">Stand</span>';
    echo'</sportlink-stand>';
    echo get_sidebar();
    echo'</div>';        

    echo '</div>'; //content-row content-width grid

   

    wp_reset_postdata();
else :
    echo '<p>' . __('Geen berichten gevonden') . '</p>';
endif;
?>




</main>

<?php
get_footer();
?>
