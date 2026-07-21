<?php
/*
Template Name: Homepage
*/

get_header();
?>

<main id="primary" class="site-main">

<?php

$paged = max(1, get_query_var('paged'), get_query_var('page'));

$args = array(
    'posts_per_page' => 24, // Pas eventueel weer aan naar 24
    'paged'          => $paged,
);

$query = new WP_Query($args);

if ($query->have_posts()) :

    $post_count = 0;

    /*
    ======================================
    HOMEPAGE (pagina 1)
    ======================================
    */
    if ($paged == 1) {

        echo '<div class="header-footer-row">';
        echo '<div class="content-width grid">';
        echo '<div class="news-head">';

        while ($query->have_posts()) : $query->the_post();

            $post_count++;

            if ($post_count <= 3) {

                echo '<div class="item' . $post_count . '">';
                get_template_part('template-parts/content', 'donk-teaser');
                echo '</div>';

            } else {

                if ($post_count == 4) {

                    echo '</div>'; // news-head

                    echo '
                    <div class="soccer-stats-head">

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

                    </div>
                    </div>

                    <div class="content-row content-width grid">
                        <div class="news">';
                }

                echo '<div class="item">';
                get_template_part('template-parts/content', 'donk-teaser');
                echo '</div>';
            }

        endwhile;

    }

    /*
    ======================================
    PAGINA 2+
    ======================================
    */
    else {

        echo '<div class="content-row content-width grid">';
        echo '<div class="news">';

        while ($query->have_posts()) : $query->the_post();

            echo '<div class="item">';
            get_template_part('template-parts/content', 'donk-teaser');
            echo '</div>';

        endwhile;

    }

    /*
    ======================================
    PAGINERING (ONDER DE POSTS)
    ======================================
    */

    echo '<div class="pagination">';

    echo paginate_links(array(
        'total'      => $query->max_num_pages,
        'current'    => $paged,
        'mid_size'   => 1,
        'prev_text'  => __('« Vorige'),
        'next_text'  => __('Volgende »'),
    ));

    echo '</div>'; // .pagination

    echo '</div>'; // .news

    /*
    ======================================
    SIDEBAR
    ======================================
    */

    echo '<div class="meta">';

    echo '<sportlink-stand teamCode="118838">';
    echo '<span slot="ally_title">Stand</span>';
    echo '</sportlink-stand>';

    get_sidebar();

    echo '</div>'; // .meta

    echo '</div>'; // .content-row

    wp_reset_postdata();

else :

    echo '<p>' . __('Geen berichten gevonden') . '</p>';

endif;

?>

</main>

<?php
get_footer();
?>