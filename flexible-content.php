<!-- Flexibele content -->

<?php if( have_rows('flexibele_inhoud') ): ?>
    <div class="flexibele-inhoud">

        <?php while( have_rows('flexibele_inhoud') ): the_row(); ?>


            <!-- TEASER BLOCK (REPEATER GRID) -->
            <?php if( get_row_layout() == 'teaser-block' ): ?>

                <?php $teasers = get_sub_field('teaser'); ?>

                <?php if( $teasers ) : ?>

                    <?php
                    // 🔤 Sorteren op titel (A → Z)
                    usort($teasers, function($a, $b) {
                        return strcmp(
                            $a['teaser-block-titel'],
                            $b['teaser-block-titel']
                        );
                    });
                    ?>

                    <div class="teaser-grid">

                        <?php foreach( $teasers as $teaser ): ?>

                            <div class="teaser-block">

                                <a href="<?php echo esc_url($teaser['teaser-block-pagina-url']); ?>">

                                    <?php 
                                    $img = $teaser['teaser-block-img'];

                                    if( $img ) {
                                        echo wp_get_attachment_image(
                                            $img,
                                            'icon-size',
                                            false,
                                            ['alt' => $teaser['teaser-block-titel']]
                                        );
                                    } else {
                                        echo '<img src="' . get_template_directory_uri() . '/assets/icons/voetbal-sec.svg" alt="Standaard afbeelding" width="48" height="48" />';
                                    }
                                    ?>

                                    <h4 class="teaser-title">
                                        <?php echo esc_html($teaser['teaser-block-titel']); ?>
                                    </h4>

                                </a>

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>

            <?php endif; ?>



        <?php endwhile; ?>

    </div>
<?php endif; ?>