<?php

/* Template Name: InitiativeTemplate */ 


?>

<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */

get_header("initiatives");
?>
				<div class="small_header">
					<div class="row">
						<div class="col-lg-7 col-md-7 col-sm-12">
							<h3>Suggest Initiatives</h5>
							<p>Do you know of any interesting action around you promoting green recovery? Are you involved with an intervention? We want to know</p>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12">
							
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12">
							<a href="../suggest-an-initiative" target="_blank"><button>Suggest an initiative</button></a>
						</div>
					</div>
				
				</div>


	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">
		<div class="widget-area sidebar-primary">
		<?php echo do_shortcode( '[searchandfilter fields="search,initiative_type,initiative_tags" types=" 
		,checkbox,checkbox" headings=" ,Types,Related Tags"]' ); ?>
		</div>

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr" class="initiative-listarea">

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php

				$args = array (
					'post_type'=> 'initiative'
				);

				$the_query = new WP_Query($args);

			?>

		<div class="row">
			<?php if($the_query->have_posts()){
				 while($the_query->have_posts()) {
					 $the_query->the_post(); ?>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="initiative-list">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" width="100%" class="ini-cover"/>
							
						<div style="padding:8px;line-height:150%">
						<?php 
							
							$the_post_id = get_the_ID();
							$action = wp_get_post_terms($the_post_id, 'initiative_type', ['']);
							// $tags = wp_get_post_terms($the_post_id, 'post_tag', ['']);
							
							if(empty($action) || ! is_array($action)){
								echo "";
							}else{
								
								foreach($action as $key => $takeaction){
									
									?>
									<p class="action-type"> 
									<i class="fa-solid fa-circle-exclamation"></i>	<?php echo esc_html($takeaction->name); ?></p>
								<?php 
									
								}
							}?>
							<p class="ini-supporters"><b>30 Supporters</b></p>
								<a href="<?php the_permalink(); ?>"><h4 style="margin-bottom:10px"><b><?php the_title(); ?></b></h4></a>
								<?php the_excerpt(); ?>
								<hr style="margin:0px"/>
								<i class="fa-solid fa-map-location-dot"></i> <?php the_field('venue') ?><br>
								<i class="fa-solid fa-anchor"></i> <?php the_field('region') ?><br>
								
							</div>
					</div>
				</div>
			<?php } ?>
			<?php } ?>

			</div>

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

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer(); ?>
