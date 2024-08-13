<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DonkTest
 */

get_header();
?>

	<main id="primary" class="site-main">	
			<?php if ( have_posts() ) : ?>
	<div class="content-row content-width grid">
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
			<div class="news">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'donk-teaser' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
			<div class="meta">
				<sportlink-stand teamCode="118838">
	      			<span slot="ally_title">Stand</span>
				</sportlink-stand>
				<?php
				get_sidebar();
				?>
			</div>	
	</div>
	</main><!-- #main -->

<?php

get_footer();
