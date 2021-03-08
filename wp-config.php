<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
/** The name of the database for WordPress */
define( 'DB_NAME', 'gym' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'mCv`&x4T(E<Z.{9W+O3AWyz;~nlXU~$^T|1 >,V!5hYCMM$@ipOLGc0)r!x#>7nt' );
define( 'SECURE_AUTH_KEY',  '=UK!$0:*Qk8-@#%wAP)m>T6(7z4jT}ELMTn~NgGw-qP.7ZfI{1<&Vy[1=a<8g[VV' );
define( 'LOGGED_IN_KEY',    'wGt^yYvx?,?S@}D+3T0=)ae<@bkW!uq(SF:|Rr6:XkedZg7{3eBH cqZ9v},eGR~' );
define( 'NONCE_KEY',        'Jl.MrdJ,h/(n!X#X X/ ZE6V`e{S69L5)?#UB362V.nIVV@3H@5mE}f%UMCKiY7S' );
define( 'AUTH_SALT',        'Zt^<b>N<:xkuKJ]#+h9-}eyYnfqtSQ]rHwIuhQ-ipi@xQ Wb0uM04s6eWH#q`+d>' );
define( 'SECURE_AUTH_SALT', 'QIV%YC~h|l%r-B`;^Gz9JjlrKKfN2GO{ViKj)xJYU@YgT/W^D~_Y*]?,Q+:zNlz&' );
define( 'LOGGED_IN_SALT',   '^-Zv/8wM|!{]B%+p$@ Z8=dy#vEfu>PE8/8x@C|{9|3x)/U6jzt5{H08mJ5zBmt<' );
define( 'NONCE_SALT',       'g;ez5i..9`NY8O/9D|9CKmEEB/iWb]0!%WG5[gQQp2b%Woq;Bj/o2{D1sxtB<Pl%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
