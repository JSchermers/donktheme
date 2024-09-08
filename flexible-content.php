<!-- Flexibele content -->

<?php if( have_rows('flexibele_inhoud') ): ?>
    <div class="teaser-blocks-container">
        <?php while( have_rows('flexibele_inhoud') ): the_row(); ?>
            <?php if( get_row_layout() == 'teaser-block' ): ?>
                <div class="teaser-block">
                    <a href="<?php the_sub_field('teaser-block-pagina-url'); ?>">
                        <?php 
                        $icon 		= get_sub_field('teaser-block-img');
	                    $icon_size	= 'icon-size';
                        if( $icon ) : 
                            // Weergeef de afbeelding met de grootte 'icon-size'
                            echo wp_get_attachment_image( $icon, $icon_size );  
                        else : 
                            // Weergeef een standaardafbeelding als er geen afbeelding is ingesteld
                            echo '<img src="' . get_template_directory_uri() . '/assets/icons/voetbal-sec.svg" alt="Standaard afbeelding" width="48" height="48" />';
                        endif; 
                        ?>
                        <h4 class="teaser-title"><?php the_sub_field('teaser-block-titel'); ?></h4>
                    </a>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>



