<?php

/**
 * User Details
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_user_details' ); ?>

<style>

	#bbp-single-user-details{
		background: #fff;
		box-shadow: 2px 4px 17px 1px rgb(0 0 0 / 13%);
		border-radius: 3px;
		height: 100%;
	}

	#bbp-user-avatar{
		width: 100% !important;
	}

	.avatar-150{
		border: 3px solid #EF8607 !important;
		border-radius : 50%;
		display: block !important;
		margin: 20px auto !important;
		position: relative;
	}

	#bbpress-forums #bbp-single-user-details #bbp-user-navigation{
		margin-left:0px
	}

	#bbpress-forums #bbp-single-user-details #bbp-user-navigation li{
		width:100%;
		font-size:16px
	}
	
</style>

<div id="bbp-single-user-details">
	<div id="bbp-user-avatar">
		<span class='vcard'>
			<a class="url fn n" href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>" rel="me">
				<?php echo get_avatar( bbp_get_displayed_user_field( 'user_email', 'raw' ), apply_filters( 'bbp_single_user_details_avatar_size', 150 ) ); ?>
			</a>
		</span>
	</div>
	<h4 class="align-center">Hi <?php bbp_displayed_user_field( 'display_name' ); ?>!</h4>
	
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 align-center">
			
			<?php do_action( 'bbp_template_before_user_details_menu_items' ); ?>

			<div id="bbp-user-navigation">
				<ul>
					<li class="<?php if ( bbp_is_single_user_profile() ) :?>current<?php endif; ?>">
						<span class="vcard bbp-user-profile-link">
							<a class="url fn n" href="<?php bbp_user_profile_url(); ?>" title="<?php printf( esc_attr__( "%s's Profile", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>" rel="me"><?php esc_html_e( 'Profile', 'bbpress' ); ?></a>
						</span>
					</li>
					<?php if ( bbp_is_favorites_active() ) : ?>
						<li class="<?php if ( bbp_is_favorites() ) :?>current<?php endif; ?>">
							<span class="bbp-user-favorites-link">
								<a href="<?php bbp_favorites_permalink(); ?>" title="<?php printf( esc_attr__( "%s's Dashboard", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Dashboard', 'bbpress' ); ?></a>
							</span>
						</li>
					<?php endif; ?>

					<li class="<?php if ( bbp_is_single_user_replies() ) :?>current<?php endif; ?>">
						<span class='bbp-user-replies-created-link'>
							<a href="<?php bbp_user_replies_created_url(); ?>" title="<?php printf( esc_attr__( "%s's Discussion board", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Discussion board', 'bbpress' ); ?></a>
						</span>
					</li>
					<?php if ( bbp_is_engagements_active() ) : ?>
						<li class="<?php if ( bbp_is_single_user_engagements() ) :?>current<?php endif; ?>">
							<span class='bbp-user-engagements-created-link'>
								<a href="<?php bbp_user_engagements_url(); ?>" title="<?php printf( esc_attr__( "%s's Connect to people", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Connect to people', 'bbpress' ); ?></a>
							</span>
						</li>
					<?php endif; ?>

					<li class="<?php if ( bbp_is_user_home_edit() ) :?>current<?php endif; ?>">
						<span class="bbp-user-edit-link">
							<a href="" title="<?php printf( esc_attr__( "Events", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Events', 'bbpress' ); ?></a>
						</span>
					</li>
			
					<li class="<?php if ( bbp_is_single_user_topics() ) :?>current<?php endif; ?>">
						<span class='bbp-user-topics-created-link'>
							<a href="<?php bbp_user_topics_created_url(); ?>" title="<?php printf( esc_attr__( "%s's Messages", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Messages', 'bbpress' ); ?></a>
						</span>
					</li>

					<?php if ( bbp_is_user_home() || current_user_can( 'edit_user', bbp_get_displayed_user_id() ) ) : ?>

						<?php if ( bbp_is_subscriptions_active() ) : ?>
							<li class="<?php if ( bbp_is_subscriptions() ) :?>current<?php endif; ?>">
								<span class="bbp-user-subscriptions-link">
									<a href="<?php bbp_subscriptions_permalink(); ?>" title="<?php printf( esc_attr__( "%s's Advisor Information", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Advisor Information', 'bbpress' ); ?></a>
								</span>
							</li>
						<?php endif; ?>

						<li class="<?php if ( bbp_is_single_user_edit() ) :?>current<?php endif; ?>">
							<span class="bbp-user-edit-link">
								<a href="<?php bbp_user_profile_edit_url(); ?>" title="<?php printf( esc_attr__( "Edit %s's Profile", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'General member information', 'bbpress' ); ?></a>
							</span>
						</li>

					<?php endif; ?>
						
				</ul>

				<?php do_action( 'bbp_template_after_user_details_menu_items' ); ?>

			</div> 
		</div>
	</div>

</div>

<?php do_action( 'bbp_template_after_user_details' ); ?>
