<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'miami-method');

/** MySQL database username */
define('DB_USER', 'miami-method');

/** MySQL database password */
define('DB_PASSWORD', 'Wu9KZ7xKhtmvK2D2');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         ':GiI%bDIVI=2jvkc*/;Ru(2*,Dsrq_;XYd00*)f2o |`XG0jk)*{u%ji9g%,?|]V');
define('SECURE_AUTH_KEY',  'r=4Q1|B2y|?Y2LK;!3iyk)uz|ZvnI9gOm|6<Akjh6$([UI%~`b|1a b;!pQ}oE*D');
define('LOGGED_IN_KEY',    'y?RSMBhL+|ns3,ik+L<(Mp=U|cuua2,68YS8[P{2JM~Og_`CKg{2Iot*C+]C},#y');
define('NONCE_KEY',        'H9oN56~fDcQ|WO5sFyRE;-K{4-WnyU/;qVF-c4-5v;K`i1dDzYj*YBd*9Z?!}pzq');
define('AUTH_SALT',        '$oO]}|5-1eJTbW[WAbO0irm[?H!cmqgunEz-T_Go@jSgjJ<8a@src6[Zvc[~[JN%');
define('SECURE_AUTH_SALT', 'B>;ucD7uC#dE!cb,3-A4Cd8/5g|=&adZ#+n=D|wE+i{qeJ)2KHw Qs@+$^u7SwSb');
define('LOGGED_IN_SALT',   '@ro+J1J4#6_bf[H?4:#ha.x#l_ n-$:Z}+2>}6bVCF:3gkcI)wH;Tml5j/#w}uQq');
define('NONCE_SALT',       'pj? -r^uPtrM+@)]-YMq&JKE*-#dVQ&|hn@y@Cp7[G(T>j6|JWebgJlP/Rqa?e@6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
