<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DonkTest
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-width">
		<header class="entry-header">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		</header><!-- .entry-header -->
		<div class="team-page-img">
			<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
			} else { ?>
			<img src="<?php bloginfo('template_directory'); ?>/assets/images/donk-default-team.png" alt="<?php the_title(); ?>" />
		<?php } ?>
		</div>


		<?php
$spelers_blokken = get_field('spelers_blokken');
?>

<?php if ( $spelers_blokken ) : ?>

	<section class="team-spelers">

		<?php foreach ( $spelers_blokken as $blok ) : ?>

			<?php
			$titel   = $blok['titel'] ?? '';
			$spelers = $blok['spelers'] ?? array();
			?>

			<?php if ( $titel || $spelers ) : ?>

				<div class="team-spelers-blok">

					<?php if ( $titel ) : ?>
						<h2 class="team-spelers-titel">
							<?php echo esc_html( $titel ); ?>
						</h2>
					<?php endif; ?>


					<?php if ( $spelers ) : ?>

						<div class="team-spelers-grid">

							<?php foreach ( $spelers as $speler ) : ?>

								<?php
								$foto = $speler['foto'] ?? '';
								$naam = $speler['naam'] ?? '';

								$fallback_foto = get_template_directory_uri() . '/assets/images/player.png';
								?>

								<article class="team-speler">

									<div class="team-speler-foto">

										<?php if ( $foto ) : ?>

											<img
												src="<?php echo esc_url( $foto['url'] ); ?>"
												alt="<?php echo esc_attr( $foto['alt'] ?: $naam ); ?>"
												loading="lazy"
											>

										<?php else : ?>

											<img
												src="<?php echo esc_url( $fallback_foto ); ?>"
												alt="<?php echo esc_attr( $naam ); ?>"
												loading="lazy"
											>

										<?php endif; ?>

									</div>


									<?php if ( $naam ) : ?>

										<h3 class="team-speler-naam">
											<?php echo esc_html( $naam ); ?>
										</h3>

									<?php endif; ?>

								</article>

							<?php endforeach; ?>

						</div>

					<?php endif; ?>

				</div>

			<?php endif; ?>

		<?php endforeach; ?>

	</section>

<?php endif; ?>



		<?php if( get_field('toon_spelers') ):?>
		   <sportlink-team class="sportlink-team"></sportlink-team> 
		<?php endif;?>
	</div>
	<div class="team-stats">
		<div class="content-width">
			<div class="content-team-grid">
				<div class="content-team-grid__item">
					<div class="team-wedstrijden">
						<sportlink-wedstrijd>
							<span slot="next_game">Programma</span>
						</sportlink-wedstrijd>
						<sportlink-wedstrijd type="uitslag">
							<span slot="previous_game">Uitslagen</span>
						</sportlink-wedstrijd>
					</div>
				</div>
				<div class="content-team-grid__item">
					<sportlink-stand>
						<span slot="ally_title">Stand Donk 1</span>
					</sportlink-stand>
				</div>
			</div>
		</div>
	</div>
	<div class="content-width">
		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'funfun'),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php if (get_edit_post_link()) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__('Edit <span class="screen-reader-text">%s</span>', 'funfun'),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post(get_the_title())
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->