<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */

if ( $paged == 0 ) {
	$paged = 1;
}

$posts_per_page = 6 * $paged;

$blog = new WP_Query( array(
	'post_type'			=> 'post',
	'category_name'		=> 'blog',
	'posts_per_page'	=> $posts_per_page
) );
?>

<script type="text/template" id="blog-template">
<% _.each( posts, function( post ) { %>
	<div class="blog-listing__article">
		<a href="<%= post.get( 'link' ) %>" class="block">
			<h1 class="blog-listing__headline"><%= post.get( 'title' ) %></h1>
			<div class="blog-listing__byline">By <%= post.get( 'author' ).first_name %> <%= post.get( 'author' ).last_name %> on <%= post.get( 'date' ) %></div>

			<% if ( post.get( 'featured_image' ) ) { %>
				<div class="blog__thumbnail">
					<img src="<%= post.get( 'featured_image' ).source %>" class="attachment-post-thumbnail wp-post-image">
				</div>
			<% } %>

			<div class="blog-listing__excerpt equal-heights">
				<%= post.get( 'excerpt' ) %>
			</div>

			<p class="link continue">Continue reading</p>

		</a>
	</div>
<% }) %>
</script>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div class="entry-content__container">

			<?php the_content(); ?>

		</div>

	</div>
	<!-- .entry-content -->



	<?php /*
	<!-- Search form -->
	<section class="search-form">

		<?php get_search_form( true ); ?>

	</section>
	<!-- // .search-form -->
	*/ ?>




	<!-- Blog Posts -->

	<?php if ( $blog->have_posts() ) : ?>

	<section id="blog-listing" class="blog-listing" data-paged="<?php echo esc_attr( $paged ); ?>">

		<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>

			<div class="blog-listing__article">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

					<h1 class="blog-listing__headline"><?php the_title(); ?></h1>

					<div class="blog-listing__byline"><?php echo rp3_byline(); ?></div>

					<?php if ( '' != get_the_post_thumbnail() ) : ?>

						<div class="blog__thumbnail">

							<?php echo get_the_post_thumbnail( get_the_ID(), 'news-blog-thumbnail' ); ?>

						</div>

					<?php endif; ?>

					<div class="blog-listing__excerpt equal-heights">

						<?php the_excerpt(); ?>

					</div>

					<p class="link continue">Continue reading</p>

				</a>

			</div>


		<?php endwhile; ?>

	</section>
	<!-- // #blog-listing -->

	<?php endif; wp_reset_query(); ?>


	<div class="all-news-link">
		<a href="<?php echo esc_url( home_url( 'category/blog' ) ); ?>" id="view-more">View More Posts</a>
	</div>



	<!-- Hero Image -->
	<?php if ( '' != get_field( 'hero_image_2' ) ) :
		echo rp3_full_bleed_hero_image( get_field( 'hero_image_2' ), array(
			'image_size'	=> 'sub-page-hero',
		) );
	endif; ?>



	<!-- Related Content -->

	<?php if ( is_active_sidebar( 'blog-archive' ) ) : ?>

	<div id="blog-archive-widget-area" class="widget-area blog-archive-widget-area" role="complementary">

		<?php dynamic_sidebar( 'blog-archive' ); ?>

	</div>

	<?php endif; ?>

</article>
<!-- #post-## -->
