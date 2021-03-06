<?php $related_work = get_field( 'related_work' ); ?>

<?php if ( $related_work ) : ?>

	<aside class="related-work">

		<header>

			<div class="related-work__header">

				<h2>Related<br>Work</h2>

			</div>
			<!-- // related-work header -->

		</header>

		<ul class="related-work__list">

			<?php foreach ( $related_work as $post ) : ?>

				<?php setup_postdata( $post ); ?>

				<li class="related-work__item">

					<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

						<?php if ( '' != get_post_thumbnail_id() ) : ?>

							<?php
							$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'related-work-thumbnail' );
							$thumbnail_2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'related-work-thumbnail-2x' );
							?>
							<img src="<?php echo esc_url( $thumbnail[0] ); ?>" srcset="<?php echo esc_url( $thumbnail[0] ); ?>, <?php echo esc_url( $thumbnail_2x[0] ); ?> 2x">

						<?php endif; ?>

						<div class="related-work__label">
							<h3 class="related-work__title"><?php the_title(); ?></h3>

							<?php if ( ( get_field( 'client' ) != get_the_title() ) && ( '' != get_field( 'client' ) ) ) : ?>

								<div class="related-work__client">for <strong><?php the_field( 'client' ); ?></strong></div>

							<?php endif; ?>
						</div>

					</a>

				</li>

			<?php endforeach; ?>
			
		</ul>

	</aside>
	<!-- // .related-work -->

<?php endif; wp_reset_postdata(); ?>
