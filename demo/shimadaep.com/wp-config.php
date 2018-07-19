<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'geocontinuum_com_1');

/** MySQL database username */
define('DB_USER', 'geocontinuumcom1');

/** MySQL database password */
define('DB_PASSWORD', 'M3zCZAgX');

/** MySQL hostname */
define('DB_HOST', 'mysql.geocontinuum.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
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
define('AUTH_KEY',         ')hkXo1aR59J;kdv+6psj0_#@+D^66UE??2kh|rF&0k;jOn:__(qi!WxFdWdHx~hz');
define('SECURE_AUTH_KEY',  'dCw$^nKfZ%NOmPBXXCuGk^h?:5m5hzGSoe(K3Pu@|/mvMUNGc8auQ2$DAx:;w%Z_');
define('LOGGED_IN_KEY',    'PvGPHK!(Vr|)f44kVfMWReZ/)NJJ6$YWNNZo"%4JfXLIN9&wLPNtvel3KVvk#Sqf');
define('NONCE_KEY',        'V5KOOfM!`8q~g:"U&9P2@?E`cIQDbOk?WPKKmo%II~gdOK6vWlj_d5B#F25u_Hp)');
define('AUTH_SALT',        'PdWGUEz*0AIiA8zLiJf1HBquw`@3Kx~xIx^ez27?vUSA9eRD8t73A|Do|!XqD;@4');
define('SECURE_AUTH_SALT', '/`^oxD!kxn2A_w*:@LN?WWQdJff9~yuDMasl@06w5;xf|/3k!whOlw"BwL:_RuJY');
define('LOGGED_IN_SALT',   'kNiMzZynhx!?V1O;W5y~nHrW&)L_X9f3DdFNf4xT"*`8xx7dR:ModduHTCFUp+iK');
define('NONCE_SALT',       'c(@Y31IA*|0PdBryQ@Bv@W&H9i3lLBcyBpyR~u^^dFHA00W;j7%4KM*%diTm:Kl6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_cjnt4f';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

