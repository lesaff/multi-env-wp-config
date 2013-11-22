<?php
/**
 * WordPress configuration file
 *
 * This file is a custom version of the wp-config file to help
 * with setting it up for multiple environments. Inspired by
 * Leevi Grahams ExpressionEngine Config Bootstrap
 * (http://ee-garage.com/nsm-config-bootstrap). Based on Abban Dunne's WP Config file @abbandunne.
 *
 * @package WordPress
 * @author Rudy Affandi @168labs.com
 * @link 
 */


// Define Environments - may be a string or array of options for an environment
$environments = array(
	'local'       => array('.local', 'local.'),
	'development' => '.dev',
	'staging'     => 'staging.',
	'preview'     => 'preview.',
	'mobile'      => 'm.',
);

// Get Server name
$server_name = $_SERVER['SERVER_NAME'];

foreach($environments AS $key => $env){
	if(is_array($env)){
		foreach ($env as $option){
			if(stristr($server_name, $option)){
				define('ENVIRONMENT', $key);
				break 2;
			}
		}
	} else {
		if(strstr($server_name, $env)){
			define('ENVIRONMENT', $key);
			break;
		}
	}
}

// If no environment is set default to production
if(!defined('ENVIRONMENT')) define('ENVIRONMENT', 'production');

// Define different DB connection details depending on environment
switch(ENVIRONMENT){

	case 'local':

		define('DB_NAME', 'database_name');
		define('DB_USER', 'database_user');
		define('DB_PASSWORD', 'database_password');
		define('DB_HOST', 'localhost');
      define('WP_POST_REVISIONS', true );
		define('WP_SITEURL', 'http://yourdomain.local/');
		define('WP_HOME', 'http://yourdomain.local/');
		define('WP_DEBUG', true);
		break;

	case 'development':

		define('DB_NAME', 'database_name');
		define('DB_USER', 'database_user');
		define('DB_PASSWORD', 'database_password');
		define('DB_HOST', 'localhost');
      define('WP_POST_REVISIONS', true );
		define('WP_SITEURL', 'http://yourdomain.dev/');
		define('WP_HOME', 'http://yourdomain.dev/');
		define('WP_DEBUG', true);
		break;

	case 'staging':

		define('DB_NAME', 'database_name');
		define('DB_USER', 'database_user');
		define('DB_PASSWORD', 'database_password');
		define('DB_HOST', 'localhost');
      define('WP_POST_REVISIONS', true );
		define('WP_SITEURL', 'http://staging.yourdomain.com/');
		define('WP_HOME', 'http://staging.yourdomain.com/');
		define('WP_DEBUG', false);
		break;

	case 'preview':

		define('DB_NAME', 'database_name');
		define('DB_USER', 'database_user');
		define('DB_PASSWORD', 'database_password');
		define('DB_HOST', 'localhost');
      define('WP_POST_REVISIONS', true );
		define('WP_SITEURL', 'http://preview.yourdomain.com/');
		define('WP_HOME', 'http://preview.yourdomain.com/');
		define('WP_DEBUG', false);
		break;

	case 'mobile':

		define('DB_NAME', 'database_name');
		define('DB_USER', 'database_user');
		define('DB_PASSWORD', 'database_password');
		define('DB_HOST', 'localhost');
      define('WP_POST_REVISIONS', true );
		define('WP_SITEURL', 'http://m.yourdomain.com/');
		define('WP_HOME', 'http://m.yourdomain.com/');
		define('WP_DEBUG', false);
		break;

	case 'production':

		define('DB_NAME', 'database_name');
		define('DB_USER', 'database_user');
		define('DB_PASSWORD', 'database_password');
		define('DB_HOST', 'localhost');
      define('WP_POST_REVISIONS', true );
		define('WP_SITEURL', 'http://www.yourdomain.com/');
		define('WP_HOME', 'http://www.yourdomain.com/');
		define('WP_DEBUG', false);
		break;
}

// If database isn't defined then it will be defined here.
// Put the details for your production environment in here.
if(!defined('DB_NAME'))
	define('DB_NAME', 'database_name');

if(!defined('DB_USER'))
	define('DB_USER', 'database_user');

if(!defined('DB_PASSWORD'))
	define('DB_PASSWORD', 'database_password');

if(!defined('DB_HOST'))
	define('DB_HOST', 'localhost');

if(!defined('DB_CHARSET'))
	define('DB_CHARSET', 'utf8');

if(!defined('DB_COLLATE'))
	define('DB_COLLATE', '');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

if(!defined('AUTH_KEY'))
   define('AUTH_KEY', '');

if(!defined('SECURE_AUTH_KEY'))
   define('SECURE_AUTH_KEY', '');

if(!defined('LOGGED_IN_KEY'))
   define('LOGGED_IN_KEY', '');

if(!defined('NONCE_KEY'))
   define('NONCE_KEY', '');

if(!defined('AUTH_SALT'))
   define('AUTH_SALT', '');

if(!defined('SECURE_AUTH_SALT'))
   define('SECURE_AUTH_SALT', '');

if(!defined('LOGGED_IN_SALT'))
   define('LOGGED_IN_SALT', '');

if(!defined('NONCE_SALT'))
   define('NONCE_SALT', '');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
if(!isset($table_prefix)) $table_prefix  = 'wp_';

/**
 * Disable file editor
 */
define('DISALLOW_FILE_EDIT', true);

/**
 * Set memory limit
 */
define('WP_MEMORY_LIMIT', '64M');

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
if(!defined('WPLANG'))
	define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if(!defined('WP_DEBUG'))
	define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');