<!-- Flexibele content -->

<?php if( have_rows('flexibele_inhoud') ): ?>
    <div class="flexibele-inhoud">

        <?php while( have_rows('flexibele_inhoud') ): the_row(); ?>


            <!-- ========================================
                 TEASER BLOCK
                 ======================================== -->

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


            <!-- ========================================
                 CARD BLOCK
                 ======================================== -->

            <?php elseif( get_row_layout() == 'card' ): ?>

                <?php $cards = get_sub_field('cards'); ?>

                <?php if( $cards ) : ?>

                    <div class="card-grid">

                        <?php foreach( $cards as $card ): ?>

                            <?php
                            $afbeelding = $card['card-afbeelding'];
                            $titel      = $card['card-titel'];
                            $tekst      = $card['card-tekst'];
                            $link       = $card['card-link'];
                            ?>

                            <div class="content-card">

                                <?php if( $afbeelding ): ?>

                                    <div class="content-card-image">

                                        <?php
                                        echo wp_get_attachment_image(
                                            $afbeelding,
                                            'large',
                                            false,
                                            [
                                                'alt' => $titel
                                            ]
                                        );
                                        ?>

                                    </div>

                                <?php endif; ?>


                                <div class="content-card-content">

                                    <?php if( $titel ): ?>

                                        <h3 class="content-card-title">
                                            <?php echo esc_html($titel); ?>
                                        </h3>

                                    <?php endif; ?>


                                    <?php if( $tekst ): ?>

                                        <div class="content-card-text">
                                            <?php echo wp_kses_post($tekst); ?>
                                        </div>

                                    <?php endif; ?>

                                    <?php if( $link && !empty($link['url']) ): ?>

                                        <a
                                            class="content-card-link"
                                            href="<?php echo esc_url($link['url']); ?>"
                                            <?php if( !empty($link['target']) ): ?>
                                                target="<?php echo esc_attr($link['target']); ?>"
                                            <?php endif; ?>
                                        >
                                            <?php
                                            echo esc_html(
                                                !empty($link['title'])
                                                    ? $link['title']
                                                    : 'Lees meer'
                                            );
                                            ?>
                                        </a>



                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>


            <?php endif; ?>


        <?php endwhile; ?>

    </div>
<?php endif; ?>