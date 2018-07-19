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
define('DB_NAME', 'geocontinuum_com_2');

/** MySQL database username */
define('DB_USER', 'geocontinuumcom2');

/** MySQL database password */
define('DB_PASSWORD', '2D?t?bBF');

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
define('AUTH_KEY',         'G"d$AcS*IN/!37F;)lo"a/QJB@jSnOPPVhbr`G8*a*Ef?ly"B?R$)mKzUI8J)G5?');
define('SECURE_AUTH_KEY',  'uDzW*@$/w_pinKqovNT?X|QY"qxycayBy;XyRUxdCzdK:@qe!E39WN9sKVrLDS^p');
define('LOGGED_IN_KEY',    'TUOf~m|FdyV#9`S%sYW5+8nkMK$?#s%w9O4oH64Xi*+7Z4f2seN;DMb$|cl4xc%q');
define('NONCE_KEY',        'x$cbSjiBe$CTSw+*y5w%kL~v)Dakw(U0O%Su^&:e30t_`fw$pj$o/&tRYd"hZ4*!');
define('AUTH_SALT',        '^SIi7vNqkzzI9vNfK/!r?5cm?+?**gbp0)L`vRHutr&B66#|B#FDG_3xQH)cpD|O');
define('SECURE_AUTH_SALT', 'bG3lv;emFD&!4quz?!NSR39_+c"vT2Wg`JrK4#:P?hOdaJ(%7y3keC~H2:yXBWm!');
define('LOGGED_IN_SALT',   '7NyqLUHP`mt#`&1n_TAmv*L$zSu")%;xJ+vG3H0t*Uc`N1qiHa+$i2|HA^F1CH:Y');
define('NONCE_SALT',       '$_atL@ILuWClZL|X**&EICH_/9pW&AhIkeiAcMTMeY&M)sTKUP7J?&9rBNT1q2*:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_vgkhfa';

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

