<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DonkTest
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'team' );

			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'funfun' ) . '</span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'funfun' ) . '</span> <span class="nav-title">%title</span>',
			// 	)
			// );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

<!-------------- POSTS BY CATEGORY ----------------->

		<div class="content-row content-width">
			<div class="news">
				<?php
				//ACF output
				$term = get_field('categorie');
				// echo $term;
				// the query.
				// READ
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field' => 'term_id',
							'terms' => $term,
						),
					),
				);
				$the_query = new WP_Query($args); ?>
				<?php
				while ($the_query->have_posts()) :
					$the_query->the_post();
				?>
					<?php
					$index = $the_query->current_post + 1;
					if ($index) { ?>
						<div class="item<?php echo $index; ?>">
							<?php
							get_template_part('template-parts/content', 'donk-teaser');

							// If comments are open or we have at least one comment, load up the comment template.
							if (comments_open() || get_comments_number()) :
								comments_template();
							endif;
							?>
						</div>
					<?php }
					?>
				<?php endwhile; ?>
			</div>
			

		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();