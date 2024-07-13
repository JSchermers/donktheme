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
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header><!-- .entry-header -->
	<div class="team-page-img">
		<?php funfun_post_thumbnail(); ?>
	</div>
	<sportlink-team></sportlink-team>
	<div class="content-team-grid">
		<div class="content-team-grid__item">
			<sportlink-wedstrijd>
				<span slot="next_game">Programma</span>
			</sportlink-wedstrijd>
			<sportlink-wedstrijd type="uitslag">
				<span slot="previous_game">Uitslagen</span>
			</sportlink-wedstrijd>
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
		</div>
		<div class="content-team-grid__item">
			<sportlink-stand>
				<span slot="ally_title">Stand Donk 1</span>
			</sportlink-stand>
		</div>
	</div>





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
</article><!-- #post-<?php the_ID(); ?> -->