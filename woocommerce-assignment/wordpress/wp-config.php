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
define( 'DB_NAME', 'woocommerce-assignment' );

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
define( 'AUTH_KEY',         'SE<||5=J$IXQ;BJ88N,ZBswyBhF#meK7,Ro( 8lbGvsG6Syf6g^I+k0Sn4xRvtJq' );
define( 'SECURE_AUTH_KEY',  '`] !Ky!pPj$+*dbB=)Pdc ~QB:ls@yjcuBW!y,1{&(FU@W~ot/EnZI5R[s7^_)S?' );
define( 'LOGGED_IN_KEY',    '}%):2w@`,8fS x(nMvfUS9_juuiSai2Hk>GXKg/0PY0B`{no QkS-%JmG*G0G&=B' );
define( 'NONCE_KEY',        'Hb94?-6J:GGqFstyk*RS35W_Gqtr3I4XPNFT!hW??#]<KIPg|EBh{[_,g+/{6);N' );
define( 'AUTH_SALT',        '*$l_YqG{;PQ-HGOg@Dc28.e<su[>Xuem%PJYIg6{lEq5?HsQ3$i/EfBmFB1=XjK=' );
define( 'SECURE_AUTH_SALT', 's-C_a*Wh+#.u=kZw]T84r 8Ud^9UFq.I<@i:w L6rDpo*-dnqZdKb>@K8qu9G;p_' );
define( 'LOGGED_IN_SALT',   'a $0Zy!++d<w&o%yknkF_4W~u:uvX,H+-xRHi?3,esKckthWoRG=K(V&eF{4AN>o' );
define( 'NONCE_SALT',       'K.RrP5K${9sSL;^Ej)DQ:<6DSKj5}cv{4Nz}4x?dFg}M~K x#L!(|,l!}[5^xPot' );

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
