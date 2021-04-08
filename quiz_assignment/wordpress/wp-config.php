<?php
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
define( 'DB_NAME', 'quiz_assignment' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'U;;d`OHwEE[zeO,e}oW#BHX#CB;C+D~YM-/KD*guBDGK*cROR>`vd-+%RCU]9qvn' );
define( 'SECURE_AUTH_KEY',  'F5*q^/PT= $(NQsa98HQ)q?g]CHu5UD]4~*|6J8|P3;_8K.|F@-EzSD2OymT3>kr' );
define( 'LOGGED_IN_KEY',    'uq}jgyx45[;hoB]4T.uV%s_@fbVjobhdeB/7[*UG}&LV|MALj_y}z:fF0s61tWK*' );
define( 'NONCE_KEY',        'YuZW$%.C}e9}k_@PQ,WnI7^~m{&N95L9OZ]-a;SUX@_t`tDO`U,^<*IeplNZ)wP0' );
define( 'AUTH_SALT',        'n(o;&)^Y*@WfI$|hS1 _:Wf(i-k#M@gJ~{sISjk;St]=_eYM4Cx5J43]D.4AT4x2' );
define( 'SECURE_AUTH_SALT', '`=_#/I ^`BWEcn+MH|CM.h0NJby<e3g#Smi~?Ow6PSQN`=~B<<+oorj,b-q1EQO=' );
define( 'LOGGED_IN_SALT',   'W{M4$S|=eZ>kWo,ooEA6L5&q:>;9.,RXi2o tD?YQ:@94&?r6Eba/jgrIHo,*rbd' );
define( 'NONCE_SALT',       'HzCGZ20W x$V>Dop#4#)>Qs_.:jlgU>`{UtP/@}tPVQ^ng+pj[d7Co@njiEvWy>K' );

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
