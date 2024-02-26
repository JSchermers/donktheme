<?php
/*
Template Name: Homepage
*/

get_header();
?>

<main id="primary" class="site-main">
	<div class="header-row">
		<div class="content-width grid">
			<div class="news-head">
				<?php
				// the query.
				// READ
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish'
				);
				$the_query = new WP_Query($args); ?>
				<?php
				while ($the_query->have_posts()) :
					$the_query->the_post();
				?>
					<?php
					$index = $the_query->current_post + 1;
					if ($index < 4) { ?>
						<div class="item<?php echo $index; ?>">
							<?php
							get_template_part('template-parts/content', 'donk-post');

							// If comments are open or we have at least one comment, load up the comment template.
							if (comments_open() || get_comments_number()) :
								comments_template();
							endif; ?>
						</div>
					<?php }
					?>


				<?php endwhile; ?>
			</div>
			<div class="soccer-stats-head">
				<article class="item4">item4</article>
				<article class="item5">item5</article>
				<article class="item6">item6</article>
			</div>
		</div>

	</div>
	<div class="content-row content-width">
		<?php
		// the query.
		// READ
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish'
		);
		$the_query = new WP_Query($args); ?>
		<?php
		while ($the_query->have_posts()) :
			$the_query->the_post();
		?>
			<?php
			$index = $the_query->current_post + 1;
			if ($index > 3) { ?>
				<div class="item<?php echo $index; ?>">
					<?php
					get_template_part('template-parts/content', 'donk-post');

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

</main><!-- #main -->
<?php
// the query.

// READ
$args = array(
	'post_type' => 'post',
	'post_status' => 'publish'
);
$the_query = new WP_Query($args); ?>

<?php if ($the_query->have_posts()) : ?>
	<!-- pagination here -->

	<!-- the loop -->
	<?php
	while ($the_query->have_posts()) :
		$the_query->the_post();

		the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');

	endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php
get_sidebar();
get_footer();
