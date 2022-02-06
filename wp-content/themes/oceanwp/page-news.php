<?php

/* Template Name: NewsTemplate */ 


?>

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

				<?php do_action( 'ocean_page_header' ); ?>


	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr">

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php

				$args = array (
					'post_type'=> 'news'
				);

				$the_query = new WP_Query($args);

			?>

			<?php if($the_query->have_posts()){
				 while($the_query->have_posts()) {
					 $the_query->the_post(); ?>
					<div style="background-color:#fff;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-bottom:15px;border-radius:5px;padding:15px; width:48%; margin-left:10px; display:inline-block">
					<h2><?php the_title(); ?></h2> 
					<?php 
					$the_post_id = get_the_ID();
					$news_agency = wp_get_post_terms($the_post_id, 'news_agencies', ['']);
					$tags = wp_get_post_terms($the_post_id, 'post_tag', ['']);
					
					if(empty($news_agency) || ! is_array($news_agency)){
						echo "No news agency";
					}else{
						$count = 1;
						foreach($news_agency as $key => $newsagency){
							

							$link = "news_agency_link_" . $count;
							
							?>
							<a href="<?php echo the_field($link) ?>" target="_blank"><img src="<?php echo z_taxonomy_image_url($newsagency->term_id); ?>" width="10%" /></a>
							
						<?php 
							$count++;
						}
					} ?> <br><br> <?php

					if(empty($tags) || ! is_array($tags)){
						echo "No Tags";
					}else{
						
						foreach($tags as $key => $posttags){
							
							
							?>
							<b><a href="<?php echo get_term_link($posttags->term_id, 'post_tag'); ?>" target="_blank" style="border: 1px solid #ccc; border-radius: 8px; padding:8px; margin-left:5px; background-color:#5ba3bb94; color:#275f87"><?php echo esc_html($posttags->name); ?></a></b>
							
						<?php 
							
						}
					}
					?>
					
				</div>
			<?php } ?>
			<?php } ?>

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