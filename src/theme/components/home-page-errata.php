<?php
/**
 * Get latest blog post
 */
$args = array(
	'post_type'			=> 'post',
	'posts_per_page'	=> 1,
	'orderby'			=> 'date',
	'order'				=> 'DESC'
);

$blog = new WP_Query( array_merge( $args, array( 'category_name' => 'blog' ) ) );

/**
 * Get latest news post
 */

$news = new WP_Query( array_merge( $args, array( 'category_name' => 'news' ) ) );
?>

<div id="home-errata" class="home-errata">

	<div class="home-errata__row home-errata__row-1">

		<div class="home-errata__general-widget home-errata__block">

			<?php if ( '' != get_field( 'link' ) ) : ?>

				<a href="<?php echo esc_url( get_field( 'link' ) ); ?>" class="block">

			<?php else: ?>

				<div class="block">

			<?php endif; ?>

					<div class="home-errata__subhead"><?php the_field( 'label' ); ?></div>

					<?php echo get_field( 'content' ); ?>

					<?php if ( '' != get_field( 'date' ) ) : ?>

						<div class="home-errata__date">

							<?php the_field( 'date' ); ?>

						</div>

					<?php endif; ?>

			<?php if ( '' != get_field( 'link' ) ) : ?>

				</a>

			<?php else: ?>

				</div>

			<?php endif; ?>

		</div>
		<!-- // .home-errata__general-widget -->

		<!-- Twitter Widget -->
		<div class="home-errata__twitter home-errata__block">

			<div class="home-errata__subhead"><a href="https://twitter.com/RP3Agency">@RP3Agency</a></div>

			<?php dynamic_sidebar( 'home-errata__twitter-widget' ); ?>

		</div>
		<!-- // .home-errata__twitter -->

	</div>
	<!-- // .home-errata__row -->

	<?php /*
	<div class="home-errata__row">

		<div class="home-errata__sandbox home-errata__block">
			&nbsp;
		</div>


		<div class="home-errata__blog--gray home-errata__block">

			<a href="#!" class="block">

				<div class="home-errata__subhead">Recent Work</div>

				<h1 class="home-errata__header">Lorem ipsum dolar sit title theater.</h1>

				<div class="home-errata__date">August 14, 2014</div>

			</a>

		</div>

	</div>
	<!-- // .home-errata__row -->
	*/ ?>


	<div class="home-errata__row home-errata__row-2">

		<?php if ( $blog->have_posts() ) : ?>

			<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>

				<div class="home-errata__blog--green home-errata__block">

					<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

						<div class="home-errata__subhead">Blog</div>

						<h1 class="home-errata__header"><?php the_title(); ?></h1>

						<div class="home-errata__date"><?php echo get_the_date(); ?></div>

					</a>

				</div>

			<?php endwhile; wp_reset_query(); ?>

		<?php endif; ?>


		<?php if ( $news->have_posts() ) : ?>

			<?php while ( $news->have_posts() ) : $news->the_post(); ?>

				<div class="home-errata__news home-errata__block">

					<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

						<div class="home-errata__subhead">News</div>

						<h1 class="home-errata__header"><?php the_title(); ?></h1>

						<div class="home-errata__date"><?php echo get_the_date(); ?></div>

					</a>

				</div>

			<?php endwhile; wp_reset_query(); ?>

		<?php endif; ?>

	</div>
	<!-- // .home-errata__row -->

</div>
<!-- // .home-errata -->
