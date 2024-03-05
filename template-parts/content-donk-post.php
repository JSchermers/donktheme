<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DonkTest
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php funfun_post_thumbnail(); ?>	

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>		
		<?php funfun_entry_footer(); ?> <span class="news-seperator">-</span>
		<?php funfun_posted_on(); ?>
		
	</header><!-- .entry-header -->

</article><!-- #post-<?php the_ID(); ?> -->
