<?php

/* Template Name: SuggestInitiative */ 

get_header("suggest-initiative");
?>


				

	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr no-border">
			<div >
					<div class="row suggest-titlearea">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h2>Suggest an Initiative</h2>
							<p><b>We encourage you to help us reach initiatives that we wouldn’t know of. We at the GGRC aim to connect as many people as we can and we need help with that. Feel free to suggest any initiative that follow our community guidelines, we’ll review it and be in touch.</b></p>
						</div>
						
					</div>
				
				</div>

			<?php do_action( 'ocean_before_content' ); ?>
		
			<div id="content" class="site-content clr initiative-form">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post();

						get_template_part( 'partials/page/layout' );

					endwhile;

				}
				?>

				<?php do_action( 'ocean_after_content_inner' ); ?>

			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

	

<?php get_footer(); ?>
