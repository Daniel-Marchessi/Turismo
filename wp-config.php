<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'testturismo');

/** Deshabilito WP_CRON */
define('DISABLE_WP_CRON', true);

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');


/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
define('AUTH_KEY',         '*Oj G*QSe+Nx4g~gQag3>C7t0+8#9,38ZC-y^4yh=.N#)h4ne6.iI`qM6^ .C]~.');
define('SECURE_AUTH_KEY',  'MIy=-Firs*|nV6ga.KZ&]7S6IV;J+>;cLu5800uR0e|kF}P/&Y2jJ9$wy:eSUID6');
define('LOGGED_IN_KEY',    '0m9zMAGbIqT-)|2[Y{p-Ei^{J-iq_73{(DqjbIM$<^RMx[KV9MQAEH,6DWM4.0Yr');
define('NONCE_KEY',        '+Dau=F_`]zto<MBl.>LhoW!>>!DkC&ZOw7W&QRN]6.:Iy^i2A`9JR`wk(,Ai+z4l');
define('AUTH_SALT',        '3utl7x+WG-S?itM7sFQ$enBR+MRvB<:,@;y<Ap<Y@(B1|f8J-+G]MSYP^$N7*w9{');
define('SECURE_AUTH_SALT', '0,HRism>JF?~v=X@]Y,Eob{DOlzS`wveEAc0<^3_Cxev&*7?J8=[PzCow#8peTQ]');
define('LOGGED_IN_SALT',   'fV,i#82|M/o@{RwwK@E5|Hq:3~WU,qy`258Ey|W=(q}-0O8#QdX@HNs}-QwW}uXI');
define('NONCE_SALT',       'SP @]r4{V^#o&@v<Wx|WMRw&*2=@H{2fEK-=/v)*slgwCG)x3TYvP8xt-zP?g|r&');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';