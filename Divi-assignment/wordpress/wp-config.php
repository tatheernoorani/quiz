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
define( 'DB_NAME', 'Divi-assignment' );

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
define( 'AUTH_KEY',         'FnTgQ{[Ip,}Q~D724Ak2KgD|vwo;pI+~F:[gq{qZx#1-~]yy3ks(IF}XajWgp;z2' );
define( 'SECURE_AUTH_KEY',  'bqvqpRs$]MaNGOqM++>#m4MCcGaA@+8Cz;vX;jR1LHB!<+LL/C|cNd?VjMMHVYNd' );
define( 'LOGGED_IN_KEY',    'D8|9O_v*8CP3$J~ :!xKbX2fj%SLu9]e)8Yq[&`U4!cAsxPwr7ZA-6g-Z]o.ny>w' );
define( 'NONCE_KEY',        '#8@vp=)4@LcP#IIH>@KLkJ)ek4KW>w`}#Z,=E Sg`6~#HK>VM[1nw|E>/(B9Zq@u' );
define( 'AUTH_SALT',        '_Hl2ZS_~ U?H$30n#zzN<]n*EZ?#SOJMcwQ#dY{X *DeEB|2E+Kl@f%o=$;Q!oDr' );
define( 'SECURE_AUTH_SALT', ')6ZbFH /?HAJp>zvn$Rt8w[2}/ujY=>~~x8o2g|%qJJSj:+8tq#X31+w(5$AOA23' );
define( 'LOGGED_IN_SALT',   ';KjwO|N3^pOD<w&XSDMN,;{rr!=S0JtgXL0:UCR.SC>JRR>ESSu({TEwA0V2b)+$' );
define( 'NONCE_SALT',       '4,tmI0)23sojWo4G7{-Fh05o#/V7QNd9P:8BOQc~foV)EM5?}q-:ztAR~dK?4],_' );

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
