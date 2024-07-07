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
	<div class="content-row content-width grid">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1>Teams</h1>
		</header><!-- .page-header -->
		<?php endif;?>
	<div class="news">
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				echo'<div class="team item">';
					funfun_post_thumbnail();
					the_title('<h3 class="page-title">', '</h3>');
				echo'</div>';

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>
	</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
