<?php

/**
 * Single User Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<style>

	.page-header {
		display:none;
	}

	#main{
		background:url('../../../wp-content/uploads/2022/03/UserProfileBg.svg'); 
		height:auto;
		padding-top:50px;
		padding-bottom:30px;
		background-size:cover;
	}

	.content-area{
		padding-right: 0px;
		border-right-width: 0px;
	}

	#bbp-single-user-details{
		background: #fff;
		box-shadow: 2px 4px 17px 1px rgb(0 0 0 / 13%);
		border-radius: 3px;
		height: 100%;
	}

	#initiative-contact{
		padding :0px;
	}

	#bbp-user-body, #connect-people{
		background-color :#fff;
		border-radius :3px;
		padding :10px;
	}

	#initiative-list > div:first-of-type{
		background: #FFF3D7;
		border-radius: 10px;
		margin-right: 0px;
		margin-left: 0px
	}

	.initiative-list-detail > p:first-of-type{
		margin-bottom:10px;
	}

	
</style>

<div id="bbpress-forums" class="bbpress-wrapper">

	<?php do_action( 'bbp_template_notices' ); ?>

	<?php do_action( 'bbp_template_before_user_wrapper' ); ?>

	<div id="bbp-user-wrapper">

		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12">
				<?php bbp_get_template_part( 'user', 'details' ); ?>
				
			</div>
			<div class="col-lg-9 col-md-8 col-sm-12">
				<div class="row suggest-content mb-10">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h4 class="mb-10">Suggest content</h4>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<p>We are always happy to hear from our members about things that interest them! </p>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<a href="<?php echo site_url( '/suggest-an-initiative/', null ) ?>"><button class="ggrc-btn-blue-sm mb-10">suggest initiative</button></a>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<a href="<?php echo site_url( '/suggest-event/', null ) ?>"><button class="ggrc-btn-blue-sm mb-10">suggest event</button></a>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<a href="<?php echo site_url( '/suggest-a-discussion-board/', null ) ?>"><button class="ggrc-btn-blue-sm mb-10">suggest discussion board</button></a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9 col-md-12 col-sm-12" id="bbp-user-body">
						<p class="no-margin-bottom"><b>Initiative updates</b></p>
						<hr/>

						<?php

							$args = array (
								'post_type'=> 'initiative'
							);

							$the_query = new WP_Query($args);

						?>

						<div id="initiative-list">
							<?php if($the_query->have_posts()){
								while($the_query->have_posts()) {
									$the_query->the_post(); ?>
									<div class="row">
										<div class="col-lg-8 col-md-12 col-sm-12">
											
											<!-- <img src="<?php //echo get_the_post_thumbnail_url(); ?>" class="initiative-cover"/> -->
												
											<div class="initiative-list-detail">
											
													<a href="<?php the_permalink(); ?>"><h4 class="mb-10"><?php the_title(); ?></h4></a>
													<?php the_excerpt(); ?>
													<p><?php the_time('j F, Y'); ?></p>
													
											</div>
											
										</div>
										<div class="col-lg-4 col-md-12 col-sm-12 center-element">
											<a href="<?php the_permalink(); ?>"><button class="ggrc-btn-white-sm mb-10">see initiative</button></a>
										</div>
									</div>
							<?php } ?>
							<?php } ?>

						</div>
												
					</div>

					<div class="col-lg-3 col-md-12 col-sm-12">
						
						<div class="row no-margin-left" id="connect-people">
							<p><b>Connect to people</b></p>
							<hr />
						
						<?php

						$roles = array('Member');

						$args = array(
							'role'    => $roles,
							'orderby' => 'user_nicename',
							'order'   => 'ASC'
						);
						$users = get_users( $args );

						foreach ( $users as $user ) { ?>
							<div class="col-md-12 col-lg-12 col-sm-12" id="initiative-contact">
								<?php										
										echo get_avatar($user->ID, 60);										
								?>
							
								<div class="initiative-contact-details">
									<p class="no-margin-bottom"><b><?php echo $user->display_name ?></b></p>
									<p class="no-margin-bottom">title</p>
									<p class="no-margin-bottom">organisation</p>
								</div>
								
							</div>
							<?php
						}

						?>
						</div>
						
					</div>
				</div>
			</div>
			
			
		</div>
	</div>

	<?php do_action( 'bbp_template_after_user_wrapper' ); ?>

</div>
