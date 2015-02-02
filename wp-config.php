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
define('DB_NAME', 'mandy_real');

/** MySQL database username */
define('DB_USER', 'mandy');

/** MySQL database password */
define('DB_PASSWORD', '4674286');

/** MySQL hostname */
define('DB_HOST', 'localhost');
// define('DB_HOST', 'haoyummycom.ipagemysql.com');

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
define('AUTH_KEY',         'Zzgh9AfcTK+1[qLU}g;DM+Rw:o<s4k#M^yQ~We|i-E(`/psO$6xGbBZB9Bsl+ze+');
define('SECURE_AUTH_KEY',  ',9*7b;|M/~B6dnrMO87@Tv+hn-nVecx|edU|9z< VuelrnOG#J,b-]?=XvG@g<r)');
define('LOGGED_IN_KEY',    'trqR6fk<Jrt_h_Bx`[>v5.I[O[vhAdN%i^(D7um; Brty-s7rDN|@?vSxnN^:6z-');
define('NONCE_KEY',        '4JJ9wlgQb%`?-)B%1{bXggh^wts[*.n-(Mi]T/:fF-Mo,+G}:[Zw&y_R beUU#70');
define('AUTH_SALT',        '=fX&+C,XE6-%M3eMz!?CAv^mzC,E_?[||z$-|.ka`eI&O]ihGRb@|bUVd;iB8eaF');
define('SECURE_AUTH_SALT', 'f^hAlE9+Ejj`XBGP5-8pGVqqg}El#To|+//gU,X|lQMmJ?8Adzz+-|aFB.2-]AKS');
define('LOGGED_IN_SALT',   '`S|Tf.7h}0wB`_/R8a+%RO$2|x|mDiRm9yE:S8|-UoVSQtP.Sfa6ab`_Fki+2I 4');
define('NONCE_SALT',       '60;!Gj/0?V22;9oK_R#R<saR%JV-LT$|t+Ji|KpXbE7pE4irj6F:iBQy?3:y_8h6');

/**#@-*/
// define('WP_HOME','http://mandy.real.com');
// define('WP_SITEURL','http://mandy.real.com');
define('WP_HOME','http://mandyliang.com');
define('WP_SITEURL','http://mandyliang.com');
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to Canadian English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * en_CA.mo to wp-content/languages and set WPLANG to 'en_CA' to enable Canadian
 * English language support.
 */
define('WPLANG', 'en_CA');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
