<?php

namespace WPMailSMTP;

/**
 * Class Conflicts
 *
 * @since 1.5.0
 */
class Conflicts {

	/**
	 * List of plugins WP Mail SMTP may be conflicting with.
	 *
	 * @since 1.5.0
	 * @since 2.8.0 Updated the format of the plugins array.
	 *
	 * @var array List of plugins WP Mail SMTP may be conflicting with.
	 */
	public static $plugins = [];

	/**
	 * Conflict information.
	 *
	 * @var array
	 */
	protected $conflict = [];

	/**
	 * Constructor.
	 *
	 * @since 2.9.0
	 */
	public function __construct() {

		self::$plugins = [

			/**
			 * Url: https://wordpress.org/plugins/easy-wp-smtp/
			 */
			[
				'name'  => 'Easy WP SMTP',
				'slug'  => 'easy-wp-smtp/easy-wp-smtp.php',
				'class' => 'EasyWPSMTP',
			],

			/**
			 * Closed.
			 *
			 * Url: https://wordpress.org/plugins/postman-smtp/
			 */
			[
				'name'     => 'Postman SMTP',
				'slug'     => 'postman-smtp/postman-smtp.php',
				'function' => 'postman_start',
			],

			/**
			 * Url: https://wordpress.org/plugins/post-smtp/
			 */
			[
				'name'     => 'Post SMTP',
				'slug'     => 'post-smtp/postman-smtp.php',
				'function' => 'post_smtp_start',
			],

			/**
			 * Url: https://wordpress.org/plugins/wp-mail-bank/
			 */
			[
				'name'     => 'Mail Bank',
				'slug'     => 'wp-mail-bank/wp-mail-bank.php',
				'function' => 'mail_bank',
			],

			/**
			 * Url: https://wordpress.org/plugins/smtp-mailer/
			 */
			[
				'name'  => 'SMTP Mailer',
				'slug'  => 'smtp-mailer/main.php',
				'class' => 'SMTP_MAILER',
			],

			/**
			 * Url: https://wordpress.org/plugins/gmail-smtp/
			 */
			[
				'name'  => 'Gmail SMTP',
				'slug'  => 'gmail-smtp/main.php',
				'class' => 'GMAIL_SMTP',
			],

			/**
			 * Url: https://wordpress.org/plugins/wp-email-smtp/
			 */
			[
				'name'  => 'WP Email SMTP',
				'class' => 'WP_Email_Smtp',
			],

			/**
			 * Url: https://wordpress.org/plugins/smtp-mail/
			 */
			[
				'name'     => 'SMTP Mail',
				'slug'     => 'smtp-mail/index.php',
				'function' => 'smtpmail_include',
			],

			/**
			 * Url: https://wordpress.org/plugins/bws-smtp/
			 */
			[
				'name'     => 'SMTP by BestWebSoft',
				'slug'     => 'bws-smtp/bws-smtp.php',
				'function' => 'bwssmtp_init',
			],

			/**
			 * Url: https://wordpress.org/plugins/wp-sendgrid-smtp/
			 */
			[
				'name'  => 'WP SendGrid SMTP',
				'slug'  => 'wp-sendgrid-smtp/wp-sendgrid-smtp.php',
				'class' => 'WPSendGrid_SMTP',
			],

			/**
			 * Url: https://wordpress.org/plugins/sar-friendly-smtp/
			 */
			[
				'name'     => 'SAR Friendly SMTP',
				'slug'     => 'sar-friendly-smtp/sar-friendly-smtp.php',
				'function' => 'sar_friendly_smtp',
			],

			/**
			 * Url: https://wordpress.org/plugins/wp-gmail-smtp/
			 */
			[
				'name'  => 'WP Gmail SMTP',
				'slug'  => 'wp-gmail-smtp/wp-gmail-smtp.php',
				'class' => 'WPGmail_SMTP',
			],

			/**
			 * Url: https://wordpress.org/plugins/cimy-swift-smtp/
			 */
			[
				'name'     => 'Cimy Swift SMTP',
				'slug'     => 'cimy-swift-smtp/cimy_swift_smtp.php',
				'function' => 'st_smtp_check_config',
			],

			/**
			 * Closed.
			 *
			 * Url: https://wordpress.org/plugins/wp-easy-smtp/
			 */
			[
				'name'  => 'WP Easy SMTP',
				'slug'  => 'wp-easy-smtp/wp-easy-smtp.php',
				'class' => 'WP_Easy_SMTP',
			],

			/**
			 * Url: https://wordpress.org/plugins/wp-mailgun-smtp/
			 */
			[
				'name'  => 'WP Mailgun SMTP',
				'slug'  => 'wp-mailgun-smtp/wp-mailgun-smtp.php',
				'class' => 'WPMailgun_SMTP',
			],

			/**
			 * Url: https://wordpress.org/plugins/my-smtp-wp/
			 */
			[
				'name'     => 'MY SMTP WP',
				'slug'     => 'my-smtp-wp/my-smtp-wp.php',
				'function' => 'my_smtp_wp',
			],

			/**
			 * Closed.
			 *
			 * Url: https://wordpress.org/plugins/wp-mail-booster/
			 */
			[
				'name'     => 'WP Mail Booster',
				'slug'     => 'wp-mail-booster/wp-mail-booster.php',
				'function' => 'mail_booster',
			],

			/**
			 * Url: https://wordpress.org/plugins/sendgrid-email-delivery-simplified/
			 */
			[
				'name'  => 'SendGrid',
				'slug'  => 'sendgrid-email-delivery-simplified/wpsendgrid.php',
				'class' => 'Sendgrid_Settings',
			],

			/**
			 * Url: https://wordpress.org/plugins/wp-mail-smtp-mailer/
			 */
			[
				'name'     => 'WP Mail Smtp Mailer',
				'slug'     => 'wp-mail-smtp-mailer/wp-mail-smtp-mailer.php',
				'function' => 'WPMS_php_mailer',
			],

			/**
			 * Closed.
			 *
			 * Url: https://wordpress.org/plugins/wp-amazon-ses-smtp/
			 */
			[
				'name'  => 'WP Amazon SES SMTP',
				'slug'  => 'wp-amazon-ses-smtp/wp-amazon-ses.php',
				'class' => 'WPAmazonSES_SMTP',
			],

			/**
			 * Url: https://wordpress.org/plugins/postmark-approved-wordpress-plugin/
			 */
			[
				'name'  => 'Postmark (Official)',
				'slug'  => 'postmark-approved-wordpress-plugin/postmark.php',
				'class' => 'Postmark_Mail',
			],

			/**
			 * Url: https://wordpress.org/plugins/mailgun/
			 */
			[
				'name'  => 'Mailgun',
				'slug'  => 'mailgun/mailgun.php',
				'class' => 'Mailgun',
			],

			/**
			 * Url: https://wordpress.org/plugins/sparkpost/
			 */
			[
				'name'  => 'SparkPost',
				'slug'  => 'sparkpost/wordpress-sparkpost.php',
				'class' => 'WPSparkPost\SparkPost',
			],

			/**
			 * Url: https://wordpress.org/plugins/wp-yahoo-smtp/
			 */
			[
				'name'  => 'WP Yahoo SMTP',
				'slug'  => 'wp-yahoo-smtp/wp-yahoo-smtp.php',
				'class' => 'WPYahoo_SMTP',
			],

			/**
			 * Url: https://wordpress.org/plugins/wp-ses/
			 */
			[
				'name'     => 'WP Offload SES Lite',
				'slug'     => 'wp-ses/wp-ses.php',
				'function' => 'wp_offload_ses_lite_init',
			],

			/**
			 * Url: https://deliciousbrains.com/wp-offload-ses/
			 */
			[
				'name' => 'WP Offload SES',
				'slug' => 'wp-offload-ses/wp-offload-ses.php',
			],

			/**
			 * Url: https://wordpress.org/plugins/turbosmtp/
			 */
			[
				'name'     => 'turboSMTP',
				'slug'     => 'turbosmtp/turbo-smtp-plugin.php',
				'function' => 'TSPHPMailer',
			],

			/**
			 * Url: https://wordpress.org/plugins/wp-smtp/
			 */
			[
				'name'  => 'WP SMTP',
				'slug'  => 'wp-smtp/wp-smtp.php',
				'class' => 'WP_SMTP',
			],

			/**
			 * This plugin can be used along with our plugin if disable next option
			 * WooCommerce -> Settings -> Sendinblue -> Email Options -> Enable Sendinblue to send WooCommerce emails.
			 *
			 * Url: https://wordpress.org/plugins/woocommerce-sendinblue-newsletter-subscription
			 */
			[
				'name'    => 'Sendinblue - WooCommerce Email Marketing',
				'slug'    => 'woocommerce-sendinblue-newsletter-subscription/woocommerce-sendinblue.php',
				'class'   => 'WC_Sendinblue_Integration',
				'test'    => 'test_wc_sendinblue_integration',
				'message' => esc_html__( 'Or disable the Sendinblue email sending setting in WooCommerce > Settings > Sendinblue (tab) > Email Options (tab) > Enable Sendinblue to send WooCommerce emails.', 'wp-mail-smtp' ),
			],

			/**
			 * Url: https://wordpress.org/plugins/disable-emails/
			 */
			[
				'name'  => 'Disable Emails',
				'slug'  => 'disable-emails/disable-emails.php',
				'class' => '\webaware\disable_emails\Plugin',
			],

			/**
			 * Url: https://wordpress.org/plugins/fluent-smtp/
			 */
			[
				'name'     => 'FluentSMTP',
				'slug'     => 'fluent-smtp/fluent-smtp.php',
				'function' => 'fluentSmtpInit',
			],

			/**
			 * This plugin can be used along with our plugin if enable next option
			 * Settings > Email template > Sender (tab) -> Do not change email sender by default.
			 *
			 * Url: https://wordpress.org/plugins/wp-html-mail/
			 */
			[
				'name'     => 'WP HTML Mail - Email Template Designer',
				'slug'     => 'wp-html-mail/wp-html-mail.php',
				'function' => 'Haet_Mail',
				'test'     => 'test_wp_html_mail_integration',
				'message'  => esc_html__( 'Or enable "Do not change email sender by default" setting in Settings > Email template > Sender (tab).', 'wp-mail-smtp' ),
			],
		];
	}

	/**
	 * Whether we have a conflict with predefined list of plugins.
	 *
	 * @since 1.5.0
	 *
	 * @return bool
	 */
	public function is_detected() {

		foreach ( self::$plugins as $plugin ) {
			if ( $this->is_conflicting_plugin( $plugin ) ) {
				$this->conflict = $plugin;
				break;
			}
		}

		return ! empty( $this->conflict );
	}

	/**
	 * Whether we have a conflict with plugin.
	 *
	 * @since 2.9.0
	 *
	 * @param array $plugin Plugin data.
	 *
	 * @return bool
	 */
	protected function is_conflicting_plugin( $plugin ) {

		$conflict = false;

		if ( isset( $plugin['slug'] ) && WP::is_plugin_activated( $plugin['slug'] ) ) {
			$conflict = true;
		} elseif ( isset( $plugin['class'] ) && class_exists( $plugin['class'], false ) ) {
			$conflict = true;
		} elseif ( isset( $plugin['function'] ) && function_exists( $plugin['function'] ) ) {
			$conflict = true;
		}

		if (
			$conflict &&
			isset( $plugin['test'] ) &&
			is_callable( [ $this, $plugin['test'] ] )
		) {
			$conflict = call_user_func( [ $this, $plugin['test'] ] );
		}

		/**
		 * Filters whether the plugin is conflicting.
		 *
		 * @since 2.9.0
		 *
		 * @param bool  $conflict Whether the plugin is conflicting.
		 * @param array $plugin {
		 *     Plugin data.
		 *
		 *     @type string $name Plugin name.
		 *     @type string $slug Plugin slug.
		 * }
		 */
		return apply_filters( 'wp_mail_smtp_conflicts_is_conflicting_plugin', $conflict, $plugin );
	}

	/**
	 * Add a warning admin message to a user about the conflicting plugin.
	 *
	 * @since 1.5.0
	 */
	public function notify() {

		if ( empty( $this->conflict ) ) {
			return;
		}

		WP::add_admin_notice( $this->get_conflict_message(), WP::ADMIN_NOTICE_WARNING );
	}

	/**
	 * Get the conflicting plugin name is any.
	 *
	 * @since 1.5.0
	 *
	 * @return null|string
	 */
	public function get_conflict_name() {

		$name = null;

		if ( ! empty( $this->conflict['name'] ) ) {
			$name = $this->conflict['name'];
		}

		return $name;
	}

	/**
	 * Get the conflicting plugin message.
	 *
	 * @since 2.9.0
	 *
	 * @return string
	 */
	public function get_conflict_message() {

		$message = sprintf( /* translators: %1$s - Plugin name causing conflict. */
			esc_html__( 'Heads up! WP Mail SMTP has detected %1$s is activated. Please deactivate %1$s to prevent conflicts.', 'wp-mail-smtp' ),
			$this->get_conflict_name()
		);

		if ( ! empty( $this->conflict['message'] ) ) {
			$message .= ' ' . $this->conflict['message'];
		}

		return $message;
	}

	/**
	 * Check whether we have conflict with "WooCommerce Sendinblue Newsletter Subscription" plugin.
	 *
	 * @since 2.9.0
	 *
	 * @return bool Returns true if we have conflict otherwise false.
	 */
	protected function test_wc_sendinblue_integration() {

		// Check requirements for test.
		if (
			! class_exists( 'WC_Sendinblue_Integration', false ) ||
			! property_exists( 'WC_Sendinblue_Integration', 'ws_smtp_enabled' )
		) {
			return true;
		}

		// Display or hide conflict message after toggle "Enable Sendinblue to send WooCommerce emails" option.
		// phpcs:disable WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
		if (
			! empty( $_POST ) &&
			( isset( $_GET['page'] ) && $_GET['page'] === 'wc-settings' ) &&
			( isset( $_GET['tab'] ) && $_GET['tab'] === 'sendinblue' ) &&
			( isset( $_GET['section'] ) && $_GET['section'] === 'email_options' )
		) {
			return isset( $_POST['ws_smtp_enable'] );
		}
		// phpcs:enable

		return \WC_Sendinblue_Integration::$ws_smtp_enabled === 'yes';
	}

	/**
	 * Check whether we have conflict with "WP HTML Mail - Email Template Designer" plugin.
	 *
	 * @since 3.3.0
	 *
	 * @return bool Returns true if we have conflict otherwise false.
	 */
	protected function test_wp_html_mail_integration() {

		// Check requirements for test.
		if (
			! function_exists( 'Haet_Mail' ) ||
			! is_object( Haet_Mail() ) ||
			! method_exists( Haet_Mail(), 'get_options' )
		) {
			return true;
		}

		$options = Haet_Mail()->get_options();

		return ! isset( $options['disable_sender'] ) || ! $options['disable_sender'];
	}
}
