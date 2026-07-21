<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DonkTest
 */

?>

<article class="content-width" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <?php funfun_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
            $terms = get_terms(array(
                'taxonomy' => 'team_category',
                'hide_empty' => true,
                'meta_key' => 'category_order',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ));

            if (!empty($terms) && !is_wp_error($terms)) :
                foreach ($terms as $term) :
                    echo '<h2 class="team-category-title">' . esc_html($term->name) . '</h2>';

                    $query = new WP_Query(array(
                        'post_type' => 'team',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'team_category',
                                'field'    => 'term_id',
                                'terms'    => $term->term_id,
                            ),
                        ),
                        'meta_key'   => 'sort_order',
                        'orderby'    => 'meta_value_num',
                        'order'      => 'ASC',
                        'posts_per_page' => -1,
                    ));

                    if ($query->have_posts()) :
                        echo '<div class="team-grid">';

                        while ($query->have_posts()) : $query->the_post(); ?>

                            <a class="team-card" href="<?php the_permalink(); ?>">
                                <div class="team-card-image">
                                    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail();
        } else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/donk-default-team.png" alt="<?php the_title(); ?>" />
        <?php } ?>
                                </div>
                                <div class="team-card-title">
                                    <?php the_title(); ?>
                                </div>
                            </a>

                        <?php endwhile;

                        echo '</div>';
                    endif;

                    wp_reset_postdata();
                endforeach;
            endif;
            ?>



        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'funfun' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer content-width">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Edit <span class="screen-reader-text">%s</span>', 'funfun' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>

    <?php 
    // ACF - Flexible Content fields.
            get_template_part('flexible-content');
    ?>

</article><!-- #post-<?php the_ID(); ?> -->
