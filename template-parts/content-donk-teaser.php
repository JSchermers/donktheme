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

	<div class="post-wrapper">
	<a href="<?php the_permalink();?>">
		
		<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail();
		} else { ?>
		<img src="<?php bloginfo('template_directory'); ?>/assets/images/svdonk.jpg" alt="<?php the_title(); ?>" />
		<?php } ?>
	</a>
	<header class="entry-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;
		?>
		<?php funfun_entry_footer(); ?> <span class="news-seperator">-</span>
		<?php funfun_posted_on(); ?>

	</header><!-- .entry-header -->
	</div>



</article><!-- #post-<?php the_ID(); ?> -->