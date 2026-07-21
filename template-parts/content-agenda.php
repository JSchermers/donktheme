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


    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'funfun' ),
                'after'  => '</div>',
            )
        );
        ?>

        
        <?php

        $vandaag = date('Ymd');

        $args = array(
            'post_type'      => 'agenda',
            'posts_per_page' => -1,
            'meta_key'       => 'startdatum',
            'orderby'        => 'meta_value_num',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => 'einddatum',
                    'value'   => $vandaag,
                    'compare' => '>=',
                    'type'    => 'NUMERIC'
                )
            )
        );

        $query = new WP_Query($args);

        $weekdagen = array(
            'Monday'    => 'ma',
            'Tuesday'   => 'di',
            'Wednesday' => 'wo',
            'Thursday'  => 'do',
            'Friday'    => 'vr',
            'Saturday'  => 'za',
            'Sunday'    => 'zo'
        );

        $maanden = array(
            1  => 'jan',
            2  => 'feb',
            3  => 'mrt',
            4  => 'apr',
            5  => 'mei',
            6  => 'jun',
            7  => 'jul',
            8  => 'aug',
            9  => 'sep',
            10 => 'okt',
            11 => 'nov',
            12 => 'dec'
        );

        if ($query->have_posts()) :

            while ($query->have_posts()) : $query->the_post();

                $start = get_field('startdatum');
                $einde = get_field('einddatum');

                $start_obj = DateTime::createFromFormat('Ymd', $start);

                if (!empty($einde)) {
                    $einde_obj = DateTime::createFromFormat('Ymd', $einde);
                }

                // Kalenderbadge
                $dag   = $start_obj->format('j');
                $jaar  = $start_obj->format('Y');
                $maand = strtoupper($maanden[(int)$start_obj->format('n')]);

                // Datumregel
                $start_weekdag = $weekdagen[$start_obj->format('l')];
                $start_maand   = $maanden[(int)$start_obj->format('n')];

        ?>

        <div class="agenda-item">

            <div class="agenda-kalender">
                <span class="agenda-maand"><?php echo esc_html($maand); ?></span>
                <span class="agenda-dag"><?php echo esc_html($dag); ?></span>
                <span class="agenda-jaar"><?php echo esc_html($jaar); ?></span>
            </div>

            <div class="agenda-content">

                <div class="agenda-datum-tekst">

                    <?php

                    if (empty($einde) || $start == $einde) {

                        echo sprintf(
                            '%s %s %s %s',
                            $start_weekdag,
                            $start_obj->format('j'),
                            $start_maand,
                            $start_obj->format('Y')
                        );

                    } else {

                        $einde_weekdag = $weekdagen[$einde_obj->format('l')];
                        $einde_maand   = $maanden[(int)$einde_obj->format('n')];

                        echo sprintf(
                            '%s %s %s %s t/m %s %s %s %s',
                            $start_weekdag,
                            $start_obj->format('j'),
                            $start_maand,
                            $start_obj->format('Y'),
                            $einde_weekdag,
                            $einde_obj->format('j'),
                            $einde_maand,
                            $einde_obj->format('Y')
                        );

                    }

                    ?>

                </div>

                <h4><?php the_title(); ?></h4>

                <div class="agenda-omschrijving">
                    <?php the_field('beschrijving'); ?>
                </div>

            </div>

        </div>

        <?php

            endwhile;

            wp_reset_postdata();

        endif;

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
