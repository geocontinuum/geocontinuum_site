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
define('WP_CACHE', true);
define('WPCACHEHOME', '/home/andarahawaii.com/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'andarahawaii_1');

/** MySQL database username */
define('DB_USER', 'admingeo');

/** MySQL database password */
define('DB_PASSWORD', 'Nalu1water');

/** MySQL hostname */
define('DB_HOST', 'mysql.andarahawaii.com');

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
define('AUTH_KEY',         'zJa"N%HCb*AcYe"_h3Mcq1KFDJ`x2RnY5RosN~Og/$LmHne`!g@&u|P8dyv9e@Uz');
define('SECURE_AUTH_KEY',  'YnFKcxFx5GQjEv20KPOb4g)861K`C)/1("JXViR7jeTOcphq`%w0lZ0|aRrO)3ZY');
define('LOGGED_IN_KEY',    'AoO94xV(:5t5"*M13)"(N|g&W4Viy&3OVSLR+MEC^8:cL8%W_34Y^PFJ3a(1:FEY');
define('NONCE_KEY',        ':@n~$q;&YDA0HELKD31OqXy4r)Nu^oEpmtl*Qf;F9QLGAMZYIDnK~UX+2z1`BYFi');
define('AUTH_SALT',        'wkr^zf^_xLUxPDgLZ_Ky$A7RiBaI&EGz#RKw;^#BnwC^$$c7`?3Jn?pPHyv&_v8f');
define('SECURE_AUTH_SALT', 'VdGJ0qFgZ|VC6tXQ)T9%l/yl@hb4@p$2K#;5w5RvD3Hf/G/7w:KgL28s5H+bAZih');
define('LOGGED_IN_SALT',   'rx|0UdZf8PqrUKu`nMeJzpZlwGn;5kIPHil0RAu|SAxdM(q+(LC6E^g!f~qH+Cvx');
define('NONCE_SALT',       '@_#mWaoI30q+Mf@Dsjb9^iwO(R2sX7%B(EhS_XTYo2tYc;3rp@cIGAcOllo*TTWV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_m6fnry_';

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

