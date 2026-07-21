<article class="content-width" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <?php
$contactpersonen = get_field('contactpersoon', 'option');
?>

<?php if( $contactpersonen ): ?>

    <section class="bestuur-contactpersonen">

        <!-- Headings -->
        <div class="contactpersoon-row contactpersoon-headings">

            <div class="contactpersoon-col">
                Functie
            </div>

            <div class="contactpersoon-col">
                Foto
            </div>

            <div class="contactpersoon-col">
                Naam
            </div>

            <div class="contactpersoon-col">
                E-mailadres
            </div>

            <div class="contactpersoon-col">
                Telefoonnummer
            </div>

        </div>


        <?php foreach( $contactpersonen as $persoon ): ?>

            <div class="contactpersoon-row">

                <!-- Functie -->
                <div class="contactpersoon-col contactpersoon-functie">

                    <?php if( !empty($persoon['functie']) ): ?>

                        <strong>
                            <?php echo esc_html($persoon['functie']); ?>
                        </strong>

                    <?php endif; ?>

                </div>


                <!-- Afbeelding -->
                <div class="contactpersoon-col contactpersoon-image">

                    <?php
                    if( $persoon['afbeelding'] ) {

                        echo wp_get_attachment_image(
                            $persoon['afbeelding'],
                            'thumbnail',
                            false,
                            [
                                'alt' => $persoon['naam'],
                                'class' => 'contactpersoon-img'
                            ]
                        );

                    } else {
                        ?>

                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/player.png"
                            alt="<?php echo esc_attr($persoon['naam']); ?>"
                            class="contactpersoon-img"
                        />

                        <?php
                    }
                    ?>

                </div>


                <!-- Naam -->
                <div class="contactpersoon-col contactpersoon-naam">

                    <?php if( !empty($persoon['naam']) ): ?>

                        <?php echo esc_html($persoon['naam']); ?>

                    <?php endif; ?>

                </div>


                <!-- E-mail -->
                <div class="contactpersoon-col contactpersoon-email">

                    <?php if( !empty($persoon['e-mailadres']) ): ?>

                        <a href="mailto:<?php echo antispambot($persoon['e-mailadres']); ?>">

                            <?php echo antispambot($persoon['e-mailadres']); ?>

                        </a>

                    <?php endif; ?>

                </div>


                <!-- Telefoon -->
                <div class="contactpersoon-col contactpersoon-telefoon">

                    <?php if( !empty($persoon['telefoonnummer']) ): ?>

                        <?php
                        $tel_link = preg_replace(
                            '/[^0-9+]/',
                            '',
                            $persoon['telefoonnummer']
                        );
                        ?>

                        <a href="tel:<?php echo esc_attr($tel_link); ?>">

                            <?php echo esc_html($persoon['telefoonnummer']); ?>

                        </a>

                    <?php endif; ?>

                </div>

            </div>

        <?php endforeach; ?>

    </section>

<?php endif; ?>

    
</article><!-- #post-<?php the_ID(); ?> -->