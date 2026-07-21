<article class="content-width" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <?php
    $titel = get_field('titel', 'option');
    $leden = get_field('leden', 'option');

    $ereleden = [];
    $leden_van_verdiensten = [];

    if( $leden ) {

        foreach( $leden as $lid ) {

            $persoon = [
                'voornaam'   => $lid['voornaam'],
                'achternaam' => $lid['achternaam'],
                'afbeelding' => $lid['afbeelding'],
            ];

            // Ereleden
            if( !empty($lid['erelid']) ) {
                $ereleden[] = $persoon;
            }

            // Leden van verdiensten
            if( !empty($lid['lid_van_verdiensten']) ) {
                $leden_van_verdiensten[] = $persoon;
            }
        }

        // Sorteren op achternaam
        usort($ereleden, function($a, $b) {
            return strcmp($a['achternaam'], $b['achternaam']);
        });

        usort($leden_van_verdiensten, function($a, $b) {
            return strcmp($a['achternaam'], $b['achternaam']);
        });
    }
    ?>

    <section class="ereleden-blok">

        <?php if( $titel ): ?>
            <h2 class="ereleden-titel">
                <?php echo esc_html($titel); ?>
            </h2>
        <?php endif; ?>


        <!-- Ereleden -->
        <?php if( !empty($ereleden) ): ?>

            <div class="ereleden-categorie">

                <h3 class="categorie-titel">
                    Ereleden
                </h3>

                <div class="leden-grid">

                    <?php foreach( $ereleden as $lid ): ?>

                        <div class="lid-card">

                            <div class="lid-afbeelding">

                                <?php 
                                if( $lid['afbeelding'] ) {

                                    echo wp_get_attachment_image(
                                        $lid['afbeelding'],
                                        'medium',
                                        false,
                                        [
                                            'alt' => $lid['voornaam'] . ' ' . $lid['achternaam']
                                        ]
                                    );

                                } else {
                                    ?>

                                    <img 
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/player.png" 
                                        alt="<?php echo esc_attr($lid['voornaam'] . ' ' . $lid['achternaam']); ?>" 
                                    />

                                    <?php
                                }
                                ?>

                            </div>

                            <div class="lid-naam">
                                <?php 
                                echo esc_html(
                                    $lid['voornaam'] . ' ' . $lid['achternaam']
                                ); 
                                ?>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        <?php endif; ?>


        <!-- Leden van verdiensten -->
        <?php if( !empty($leden_van_verdiensten) ): ?>

            <div class="ereleden-categorie">

                <h3 class="categorie-titel">
                    Leden van verdiensten
                </h3>

                <div class="leden-grid">

                    <?php foreach( $leden_van_verdiensten as $lid ): ?>

                        <div class="lid-card">

                            <div class="lid-afbeelding">

                                <?php 
                                if( $lid['afbeelding'] ) {

                                    echo wp_get_attachment_image(
                                        $lid['afbeelding'],
                                        'medium',
                                        false,
                                        [
                                            'alt' => $lid['voornaam'] . ' ' . $lid['achternaam']
                                        ]
                                    );

                                } else {
                                    ?>

                                    <img 
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/player.png" 
                                        alt="<?php echo esc_attr($lid['voornaam'] . ' ' . $lid['achternaam']); ?>" 
                                    />

                                    <?php
                                }
                                ?>

                            </div>

                            <div class="lid-naam">
                                <?php 
                                echo esc_html(
                                    $lid['voornaam'] . ' ' . $lid['achternaam']
                                ); 
                                ?>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        <?php endif; ?>

    </section>
</article><!-- #post-<?php the_ID(); ?> -->