<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DonkTest
 */

?>

<footer id="colophon" class="site-footer">
	<div class="header-footer-row">
		<div class="content-width">
			<img src=<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="donk logo" class="logo">
			<!-- dit werkt niet, want het is local-->

			<div class="top-sponsored">
				<h2>Sponsors selectie</h2>

				<?php 
				$sponsors_selectie = get_field('sponsors_selectie','option');
				if( $sponsors_selectie ) {
				    echo '<div class="grid">';
				    foreach( $sponsors_selectie as $sponsor_selectie ) {
				        $logo = $sponsor_selectie['logo'];
				        $website_sponsor = $sponsor_selectie['website_sponsor'];
				        echo '<div>';
				        if ($website_sponsor) {
				            echo '<a href="' . esc_url($website_sponsor) . '">';
				        }
				        echo wp_get_attachment_image( $logo, 'full' );
				        if ($website_sponsor) {
				            echo '</a>';
				        }
				        echo '</div>';
				    }
				    echo '</div>';
				}
				?>

			</div>
			<div class="sponsors">
				<h2>Sponsors club</h2>

				<?php 
				$sponsors_club = get_field('sponsors_club','option');
				if( $sponsors_club ) {
				    echo '<div class="grid">';
				    foreach( $sponsors_club as $sponsor_club ) {
				        $logo = $sponsor_club['logo'];
				        $website_sponsor = $sponsor_club['website_sponsor'];
				        echo '<div>';
				        if ($website_sponsor) {
				            echo '<a href="' . esc_url($website_sponsor) . '">';
				        }
				        echo wp_get_attachment_image( $logo, 'full' );
				        if ($website_sponsor) {
				            echo '</a>';
				        }
				        echo '</div>';
				    }
				    echo '</div>';
				}
				?>

			</div>
		</div>
	</div>
	<!-- do do -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script defer src="<?php echo get_template_directory_uri() ?>/js/donk/standen-sportlink.js" ></script>
<script defer src="<?php echo get_template_directory_uri() ?>/js/donk/team-sportlink.js" ></script>
<script defer src="<?php echo get_template_directory_uri() ?>/js/donk/wedstrijd-sportlink.js" ></script>
</body>

</html>