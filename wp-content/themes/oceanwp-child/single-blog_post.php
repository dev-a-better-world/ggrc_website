
<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */
?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<style>
		.single .entry-title{
			display:none;
		}
		.wpulike-heart .wp_ulike_general_class{
			background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%) !important;
			box-shadow: 2px 3px 9px rgba(0, 0, 0, 0.2) !important;
			border-radius: 30px !important;
		}

		.wpulike-heart .count-box{
			color: #fff !important
		}

		.ess-all-networks-button, #ess-main-wrapper .ess-total-share{
			background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%) !important;
			box-shadow: 2px 3px 9px rgba(0, 0, 0, 0.2) !important;
			border-radius: 30px !important;
		}

		@media only screen and (min-width: 960px){
			.content-area, .content-left-sidebar .content-area{
				width:75%
			}
			.widget-area.sidebar-primary {
				width: 25%;
			}
		}
	</style>

		
</head>

<body <?php body_class(); ?> <?php oceanwp_schema_markup( 'html' ); ?>>

	<?php wp_body_open(); ?>

	<?php do_action( 'ocean_before_outer_wrap' ); ?>

	<div id="outer-wrap" class="site clr">

		<a class="skip-link screen-reader-text" href="#main"><?php oceanwp_theme_strings( 'owp-string-header-skip-link', 'oceanwp' ); ?></a>

		<?php do_action( 'ocean_before_wrap' ); ?>

		<div id="wrap" class="clr">

			<?php do_action( 'ocean_top_bar' ); ?>

			<?php do_action( 'ocean_header' ); ?>

			<?php do_action( 'ocean_before_main' ); ?>

			<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?> role="main">

				<?php //do_action( 'ocean_page_header' ); ?>

				<div class="blog-subheader"></div>

	<?php do_action( 'ocean_before_content_wrap' ); ?>
	<?php while ( have_posts() ) :
						the_post(); ?>

	<?php endwhile; ?>
	<div id="content-wrap" class="container clr">

		
		<?php do_action( 'ocean_before_primary' ); ?>

		
		<div id="primary" class="content-area clr" >

			<div class="blog-details">
				<div class="blog-details-border">
				
					<?php

						$blogcat = wp_get_post_terms(get_the_ID(), 'blog-category', ['']);

						if( empty($blogcat) || !is_array($blogcat) ) {
							echo "<p>No blog category</p>";
						} else {
							?>
								<p class="blog-category-title"><?php echo esc_html($blogcat[0]->name); ?></p>
							<?php
						} 
					?>
				</p>
				<h2><?php the_title(); ?></h2>
				</div>
				<hr/>
				<div>

					<p class="like-share">Published : <?php the_time('F j, Y'); ?></p> <p class="like-share"> <i class="ggrc-icon ggrc-icon-heart"></i> 2 Likes</p> <p class="like-share"><i class="ggrc-icon ggrc-icon-share-1"></i> 5 Shares</p>

				</div>
				<hr/>
			</div>
			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post();

						get_template_part( 'partials/single/layout', get_post_type() );

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
