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
define( 'DB_NAME', 'tatheer-noorani' );

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
define( 'AUTH_KEY',         'Wv^=Z|CUJxz`K(Tsv87J+94Q-8GN%=S8|~H:P6S|tF*;Cv^SBKrEoz,MW91{Dd5E' );
define( 'SECURE_AUTH_KEY',  'EayQOHp,a }v(02 n$W-*PgYiQ;fDDP$5wuHXD #i%@}NIc<<gKMAB}~ho!FjqB:' );
define( 'LOGGED_IN_KEY',    ')TsGSNid]Qc#ccm&b9P(`*J;!|xJ@_e@DqS+ukpjI-QZ^Aw!ws1|V#6N+ K]y],r' );
define( 'NONCE_KEY',        'v-Fs0W]*+!(Iz6O9}C?3*XNI0&?qBhmZ6|)|[!tx*b,HX#]90eYm?A%2Ni!i.VWj' );
define( 'AUTH_SALT',        'R`tG=LZqLdf,)/7kNH6mY!$ap(KU[@^3,EzQ`0(@DdD|z/-56D$vBz9QGcJKj]-r' );
define( 'SECURE_AUTH_SALT', 'uCwWOTe/j]L[S7sPtN~.?E]!75%c B#~W^K_!A^z;76K!mM*;&zH|u#U+1{*x$kw' );
define( 'LOGGED_IN_SALT',   'p^hISbz[mB{mP<McjV=M(FJXsFJ&|:?>Ur!j7vy 6LE]e+beN1s.bt`E!L..POie' );
define( 'NONCE_SALT',       '^MfHM/VW??eBan<w+&0H1<Q94dNGjj)~f^Y<.H!S7rl].`yZB|jL%;*.Anmv+4#=' );

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
