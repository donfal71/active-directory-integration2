<?php
if (!defined('ABSPATH')) {
	die('Access denied.');
}

if (class_exists('NextADInt_Adi_Configuration_Ui_Layout')) {
	return;
}

/**
 * NextADInt_Adi_Configuration_Ui_Layout contains the structure of the setting pages.
 *
 * @author Tobias Hellmann <the@neos-it.de>
 * @access public
 */
class NextADInt_Adi_Configuration_Ui_Layout
{
	const DESCRIPTION = 'description';
	const OPTIONS = 'options';
	const ANGULAR_CONTROLLER = 'angular_controller';
	const MULTISITE_ONLY = 'multisite_only';

	private static $structure = null;

	private function __construct()
	{
	}

	private function __clone()
	{
	}

	/**
	 * Get the structure of the setting page
	 *
	 * @return array|null
	 */
	public static function get()
	{
		if (null === self::$structure) {
			self::$structure = self::create();
		}

		return self::$structure;
	}

	/**
	 * Generate the structure of the setting pages.
	 *
	 * @return array
	 */
	private static function create()
	{
		return array(
			__('Profile', NEXT_AD_INT_I18N) => array(
				self::ANGULAR_CONTROLLER => 'GeneralController',
				self::MULTISITE_ONLY => false,
				__('Profile Options', NEXT_AD_INT_I18N) => array(
					self::OPTIONS => array(
						NextADInt_Adi_Configuration_Options::PROFILE_NAME,
						NextADInt_Adi_Configuration_Options::SUPPORT_LICENSE_KEY,
						NextADInt_Adi_Configuration_Options::IS_ACTIVE,
					),
					self::DESCRIPTION => __(
						'On this page you can configure whether ADI should be enabled for a specific profile or not.',
						NEXT_AD_INT_I18N
					),
				),
				__('Menu', NEXT_AD_INT_I18N) => array(
					self::DESCRIPTION => __(
						'It is also possible to only disable certain ADI features.',
						NEXT_AD_INT_I18N
					),
					self::OPTIONS => array(
						NextADInt_Adi_Configuration_Options::SHOW_MENU_TEST_AUTHENTICATION,
						NextADInt_Adi_Configuration_Options::SHOW_MENU_SYNC_TO_AD,
						NextADInt_Adi_Configuration_Options::SHOW_MENU_SYNC_TO_WORDPRESS
					)
				),
			),
			// Tab name
			__('Environment', NEXT_AD_INT_I18N)  => array(
				// Group Name
				self::ANGULAR_CONTROLLER => 'EnvironmentController',
				self::MULTISITE_ONLY => false,
				__('Active Directory Environment', NEXT_AD_INT_I18N) => array(
					self::DESCRIPTION => __(
						'On this page you can configure the connection details for your Active Directory.',
						NEXT_AD_INT_I18N
					),
					// Option elements in group
					self::OPTIONS => array(
						NextADInt_Adi_Configuration_Options::DOMAIN_CONTROLLERS,
						NextADInt_Adi_Configuration_Options::PORT,
						NextADInt_Adi_Configuration_Options::ENCRYPTION,
						NextADInt_Adi_Configuration_Options::NETWORK_TIMEOUT,
						NextADInt_Adi_Configuration_Options::BASE_DN
					),
				),
				__('Verify Credentials', NEXT_AD_INT_I18N) => array(
					self::DESCRIPTION => __(
						'Connect your WordPress site or profile to a domain.',
						NEXT_AD_INT_I18N
					),
					self::OPTIONS => array(
						NextADInt_Adi_Configuration_Options::VERIFICATION_USERNAME,
						NextADInt_Adi_Configuration_Options::VERIFICATION_PASSWORD,
						NextADInt_Adi_Configuration_Options::DOMAIN_SID
					)
				),
			),
			// Tab name
			__('User', NEXT_AD_INT_I18N)             => array(
				// Group Name
				self::ANGULAR_CONTROLLER => 'UserController',
				self::MULTISITE_ONLY => false,
				__('User Settings', NEXT_AD_INT_I18N) => array(
					self::DESCRIPTION => __(
						'On this page you can configure how users should be created, updated and displayed. You can also prevent specific users from authenticating against the Active Directory. ',
						NEXT_AD_INT_I18N
					),
					// Option elements in group
					self::OPTIONS => array(
						NextADInt_Adi_Configuration_Options::EXCLUDE_USERNAMES_FROM_AUTHENTICATION,
						NextADInt_Adi_Configuration_Options::ACCOUNT_SUFFIX,
						NextADInt_Adi_Configuration_Options::USE_SAMACCOUNTNAME_FOR_NEW_USERS,
						NextADInt_Adi_Configuration_Options::AUTO_CREATE_USER,
						NextADInt_Adi_Configuration_Options::AUTO_UPDATE_USER,
						NextADInt_Adi_Configuration_Options::AUTO_UPDATE_DESCRIPTION,
						NextADInt_Adi_Configuration_Options::DEFAULT_EMAIL_DOMAIN,
						NextADInt_Adi_Configuration_Options::DUPLICATE_EMAIL_PREVENTION,
						NextADInt_Adi_Configuration_Options::PREVENT_EMAIL_CHANGE,
						NextADInt_Adi_Configuration_Options::NAME_PATTERN,
						NextADInt_Adi_Configuration_Options::SHOW_USER_STATUS,
                        NextADInt_Adi_Configuration_Options::ALLOW_DOWN_LEVEL_LOGON_NAME,
					),
				),
			),
			// Tab name
			__('Password', NEXT_AD_INT_I18N)        => array(
				self::ANGULAR_CONTROLLER => 'PasswordController',
				self::MULTISITE_ONLY => false,
				// Group name
				__('Password', NEXT_AD_INT_I18N) => array(
					self::DESCRIPTION => __(
						'The password configuration page allows you to configure if users should be able to change their password, how failed authentications should be handled and so on.',
						NEXT_AD_INT_I18N
					),
					// Option elements in group
					self::OPTIONS => array(
						NextADInt_Adi_Configuration_Options::NO_RANDOM_PASSWORD,
						NextADInt_Adi_Configuration_Options::ENABLE_PASSWORD_CHANGE,
						NextADInt_Adi_Configuration_Options::FALLBACK_TO_LOCAL_PASSWORD,
						NextADInt_Adi_Configuration_Options::AUTO_UPDATE_PASSWORD,
						NextADInt_Adi_Configuration_Options::ENABLE_LOST_PASSWORD_RECOVERY,
					),
				),
			),
			// Tab name
			__('Permissions', NEXT_AD_INT_I18N) => array(
				self::ANGULAR_CONTROLLER => 'PermissionController',
				self::MULTISITE_ONLY => false,
				// Group name
				__('Permissions', NEXT_AD_INT_I18N) => array(
					self::DESCRIPTION => __(
						'On this page you can configure whether only specific Active Directory Security groups should be granted access to WordPress. You can also define if certain Active Directory security groups should have WordPress role permissions by default.',
						NEXT_AD_INT_I18N
					),
					// Option elements in group
					self::OPTIONS => array(
						NextADInt_Adi_Configuration_Options::AUTHORIZE_BY_GROUP,
						NextADInt_Adi_Configuration_Options::AUTHORIZATION_GROUP,
						NextADInt_Adi_Configuration_Options::ROLE_EQUIVALENT_GROUPS,
					),
				),
			),
			// Tab name
			__('Security', NEXT_AD_INT_I18N) => array(
				self::ANGULAR_CONTROLLER => 'SecurityController',
				self::MULTISITE_ONLY => false,
				// Group name
				__('Single Sign On', NEXT_AD_INT_I18N) => array(
					self::DESCRIPTION => __(
						'Single Sign On Configuration',
						NEXT_AD_INT_I18N
					),
					// Option elements in group
					self::OPTIONS => array(
						NextADInt_Adi_Configuration_Options::SSO_ENABLED,
						NextADInt_Adi_Configuration_Options::SSO_USER,
						NextADInt_Adi_Configuration_Options::SSO_PASSWORD,
						NextADInt_Adi_Configuration_Options::SSO_ENVIRONMENT_VARIABLE,
					),
				),
				// Group name
				__('Brute-Force-Protection', NEXT_AD_INT_I18N) => array(
					// Group description
					self::DESCRIPTION => __(
						'For security reasons you can use the following options to prevent brute force attacks on your user accounts.',
						NEXT_AD_INT_I18N
					),
					// Group elements in group
					self::OPTIONS     => array(
						NextADInt_Adi_Configuration_Options::MAX_LOGIN_ATTEMPTS,
						NextADInt_Adi_Configuration_Options::BLOCK_TIME,
						NextADInt_Adi_Configuration_Options::USER_NOTIFICATION,
						NextADInt_Adi_Configuration_Options::ADMIN_NOTIFICATION,
						NextADInt_Adi_Configuration_Options::ADMIN_EMAIL,
						NextADInt_Adi_Configuration_Options::FROM_EMAIL,
						NextADInt_Adi_Configuration_Options::ALLOW_XMLRPC_LOGIN
					),
				),
			),
			// Tab name
			__('Attributes', NEXT_AD_INT_I18N) => array(
				self::ANGULAR_CONTROLLER => 'AttributesController',
				self::MULTISITE_ONLY => false,
				// Group description
				__('Attributes', NEXT_AD_INT_I18N) => array(
					// Group description
					self::DESCRIPTION => array(
						__(
							'User attributes from the Active Directory are stored as User Meta Data. These attributes can then be used in your themes and they can be shown on the profile page of your users.',
							NEXT_AD_INT_I18N
						),
						__(
							'The attributes are only stored in the WordPress database if you activate "Automatic User Creation" and are only updated if you activate "Automatic User Update" on tab "User".',
							NEXT_AD_INT_I18N
						),
						'',
						sprintf(__('The following WordPress attributes are reserved by ADI and cannot be used: %s', NEXT_AD_INT_I18N), implode(', ', NextADInt_Ldap_Attribute_Repository::getDefaultAttributeMetaKeys())),
					),
					// Group elements in group
					self::OPTIONS     => array(
						NextADInt_Adi_Configuration_Options::ADDITIONAL_USER_ATTRIBUTES,
					),
				),
			),
			// Tab name
			__('Sync to AD', NEXT_AD_INT_I18N)        => array(
				self::ANGULAR_CONTROLLER => 'SyncToAdController',
				self::MULTISITE_ONLY => false,
				// Group name
				__('Sync To Active Directory', NEXT_AD_INT_I18N) => array(
					self::DESCRIPTION => __(
						'Synchronize WordPress profiles back to Active Directory.',
						NEXT_AD_INT_I18N
					),
					// Group elements in group
					self::OPTIONS => array(
						NextADInt_Adi_Configuration_Options::SYNC_TO_AD_ENABLED,
						NextADInt_Adi_Configuration_Options::SYNC_TO_AD_USE_GLOBAL_USER,
						NextADInt_Adi_Configuration_Options::SYNC_TO_AD_GLOBAL_USER,
						NextADInt_Adi_Configuration_Options::SYNC_TO_AD_GLOBAL_PASSWORD,
						NextADInt_Adi_Configuration_Options::SYNC_TO_AD_AUTHCODE,
					),
				),
			),
			// Tab name
			__('Sync to WordPress', NEXT_AD_INT_I18N)      => array(
				self::ANGULAR_CONTROLLER => 'SyncToWordpressController',
				self::MULTISITE_ONLY => false,
				// Group name
				__('Sync To WordPress', NEXT_AD_INT_I18N) => array(
					// Group description
					self::DESCRIPTION => __(
						'You can import/update the users from Active Directory, for example by using a cron job.',
						NEXT_AD_INT_I18N
					),
					// Group elements in group
					self::OPTIONS     => array(
						NextADInt_Adi_Configuration_Options::SYNC_TO_WORDPRESS_ENABLED,
						NextADInt_Adi_Configuration_Options::SYNC_TO_WORDPRESS_SECURITY_GROUPS,
						NextADInt_Adi_Configuration_Options::SYNC_TO_WORDPRESS_USER,
						NextADInt_Adi_Configuration_Options::SYNC_TO_WORDPRESS_PASSWORD,
						NextADInt_Adi_Configuration_Options::SYNC_TO_WORDPRESS_DISABLE_USERS,
						NextADInt_Adi_Configuration_Options::SYNC_TO_WORDPRESS_AUTHCODE,
					),
				),
			),
			// Tab name
			__('Logging', NEXT_AD_INT_I18N)      => array(
				self::ANGULAR_CONTROLLER => 'LoggingController',
				self::MULTISITE_ONLY => false,
				// Group name
				__('Logging', NEXT_AD_INT_I18N) => array(
					// Group description
					self::DESCRIPTION => __(
						'On this tab you can configure the Next ADI event logger.',
						NEXT_AD_INT_I18N
					),
					// Group elements in group
					self::OPTIONS     => array(
						NextADInt_Adi_Configuration_Options::LOGGER_ENABLE_LOGGING,
						NextADInt_Adi_Configuration_Options::LOGGER_CUSTOM_PATH,
					),
				),
			),
		);
	}
}