<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<!-- .entry-content -->

	<?php if ( '' != get_field( 'image_1' ) ) {
		echo rp3_full_bleed_hero_image( get_field( 'image_1' ), array(
			'image_size'	=> 'interstitial',
			'classes'		=> 'hero hero-image interstitial'
		) );
	} ?>

	<?php get_template_part( 'components/leadership' ); ?>

	<?php if ( '' != get_field( 'image_2' ) ) {
		echo rp3_full_bleed_hero_image( get_field( 'image_2' ), array(
			'image_size'	=> 'interstitial',
			'classes'		=> 'hero hero-image interstitial'
		) );
	} ?>

	<?php get_template_part( 'components/clients' ); ?>

	<?php // get_template_part( 'components/awards' ); ?>

</article>
<!-- #post-## -->
