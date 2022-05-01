<?php

namespace WPMailSMTP\Providers;

use WPMailSMTP\Debug;
use WPMailSMTP\MailCatcherInterface;
use WPMailSMTP\Options;

/**
 * Class Loader.
 *
 * @since 1.0.0
 */
class Loader {

	/**
	 * Key is the mailer option, value is the path to its classes.
	 *
	 * @since 1.0.0
	 * @since 1.6.0 Added Sendinblue.
	 * @since 1.7.0 Added AmazonSES/Outlook as indication of the Pro mailers.
	 *
	 * @var array
	 */
	protected $providers = array(
		'mail'        => 'WPMailSMTP\Providers\Mail\\',
		'smtpcom'     => 'WPMailSMTP\Providers\SMTPcom\\',
		'sendinblue'  => 'WPMailSMTP\Providers\Sendinblue\\',
		'amazonses'   => 'WPMailSMTP\Providers\AmazonSES\\',
		'gmail'       => 'WPMailSMTP\Providers\Gmail\\',
		'mailgun'     => 'WPMailSMTP\Providers\Mailgun\\',
		'outlook'     => 'WPMailSMTP\Providers\Outlook\\',
		'pepipostapi' => 'WPMailSMTP\Providers\PepipostAPI\\',
		'postmark'    => 'WPMailSMTP\Providers\Postmark\\',
		'sendgrid'    => 'WPMailSMTP\Providers\Sendgrid\\',
		'sparkpost'   => 'WPMailSMTP\Providers\SparkPost\\',
		'zoho'        => 'WPMailSMTP\Providers\Zoho\\',
		'smtp'        => 'WPMailSMTP\Providers\SMTP\\',
		'pepipost'    => 'WPMailSMTP\Providers\Pepipost\\',
	);

	/**
	 * @since 1.0.0
	 *
	 * @var MailCatcherInterface
	 */
	private $phpmailer;

	/**
	 * Get all the supported providers.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_providers() {

		if ( ! Options::init()->is_mailer_active( 'pepipost' ) ) {
			unset( $this->providers['pepipost'] );
		}

		if ( ! Options::init()->is_mailer_active( 'pepipostapi' ) ) {
			unset( $this->providers['pepipostapi'] );
		}

		return apply_filters( 'wp_mail_smtp_providers_loader_get_providers', $this->providers );
	}

	/**
	 * Get a single provider FQN-path based on its name.
	 *
	 * @since 1.0.0
	 *
	 * @param string $provider
	 *
	 * @return string|null
	 */
	public function get_provider_path( $provider ) {

		$provider = sanitize_key( $provider );

		$providers = $this->get_providers();

		return apply_filters(
			'wp_mail_smtp_providers_loader_get_provider_path',
			isset( $providers[ $provider ] ) ? $providers[ $provider ] : null,
			$provider
		);
	}

	/**
	 * Get the provider options, if exists.
	 *
	 * @since 1.0.0
	 *
	 * @param string $provider
	 *
	 * @return OptionsAbstract|null
	 */
	public function get_options( $provider ) {

		return $this->get_entity( $provider, 'Options' );
	}

	/**
	 * Get all options of all providers.
	 *
	 * @since 1.0.0
	 *
	 * @return OptionsAbstract[]
	 */
	public function get_options_all() {

		$options = array();

		foreach ( $this->get_providers() as $provider => $path ) {

			$option = $this->get_options( $provider );

			if ( ! $option instanceof OptionsAbstract ) {
				continue;
			}

			$slug  = $option->get_slug();
			$title = $option->get_title();

			if ( empty( $title ) || empty( $slug ) ) {
				continue;
			}

			$options[] = $option;
		}

		return apply_filters( 'wp_mail_smtp_providers_loader_get_providers_all', $options );
	}

	/**
	 * Get the provider mailer, if exists.
	 *
	 * @since 1.0.0
	 *
	 * @param string               $provider  The provider name.
	 * @param MailCatcherInterface $phpmailer The MailCatcher object.
	 *
	 * @return MailerAbstract|null
	 */
	public function get_mailer( $provider, $phpmailer ) {

		if ( wp_mail_smtp()->is_valid_phpmailer( $phpmailer ) ) {
			$this->phpmailer = $phpmailer;
		}

		return $this->get_entity( $provider, 'Mailer' );
	}

	/**
	 * Get the provider auth, if exists.
	 *
	 * @param string $provider
	 *
	 * @return AuthAbstract|null
	 */
	public function get_auth( $provider ) {

		return $this->get_entity( $provider, 'Auth' );
	}

	/**
	 * Get a generic entity based on the request.
	 *
	 * @uses  \ReflectionClass
	 *
	 * @since 1.0.0
	 *
	 * @param string $provider
	 * @param string $request
	 *
	 * @return OptionsAbstract|MailerAbstract|AuthAbstract|null
	 */
	protected function get_entity( $provider, $request ) {

		$provider = sanitize_key( $provider );
		$request  = sanitize_text_field( $request );
		$path     = $this->get_provider_path( $provider );
		$entity   = null;

		if ( empty( $path ) ) {
			return $entity;
		}

		try {
			$reflection = new \ReflectionClass( $path . $request );

			if ( file_exists( $reflection->getFileName() ) ) {
				$class = $path . $request;
				if ( $this->phpmailer ) {
					$entity = new $class( $this->phpmailer );
				} else {
					$entity = new $class();
				}
			}
		}
		catch ( \Exception $e ) {
			Debug::set( "There was a problem while retrieving {$request} for {$provider}: {$e->getMessage()}" );
			$entity = null;
		}

		return apply_filters( 'wp_mail_smtp_providers_loader_get_entity', $entity, $provider, $request );
	}

	/**
	 * Get supports options for all mailers.
	 *
	 * @since 2.3.0
	 *
	 * @return array
	 */
	public function get_supports_all() {

		$supports = [];

		foreach ( $this->get_providers() as $provider => $path ) {
			$option = $this->get_options( $provider );

			if ( ! $option instanceof OptionsAbstract ) {
				continue;
			}

			$mailer_slug     = $option->get_slug();
			$mailer_supports = $option->get_supports();

			if ( empty( $mailer_slug ) || empty( $mailer_supports ) ) {
				continue;
			}

			$supports[ $mailer_slug ] = $mailer_supports;
		}

		return apply_filters( 'wp_mail_smtp_providers_loader_get_supports_all', $supports );
	}
}
