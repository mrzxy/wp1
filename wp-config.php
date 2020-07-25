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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', '10.10.10.195' );

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
define( 'AUTH_KEY',         '^K9&LIW~)K$g%.aw)rIWR/3tQpL-FK;r<M}c]>4@-br`Z>V~*`XvSX*LUMuuJnOc' );
define( 'SECURE_AUTH_KEY',  'tfFKXsKPP2SvhXTVe.%ii<gVTVMALYFB!j_t(Bbm!Q*&=WjV7ZEXFXU)NUR1k[Vp' );
define( 'LOGGED_IN_KEY',    '2,r):zZXND%M`+GKC>0b)zkC7)p6WJ0rh?M0;mT,c9&BiSB.tk0`BDwHU$#{pN2D' );
define( 'NONCE_KEY',        '~xGL6?G99!0*WGRMnC5)x6jB -#&YM,P-nNE}tWhTeBsA4L}cb@mqie/I|y~;b4n' );
define( 'AUTH_SALT',        '.D4.=yiD_TLLE[Uc`f5~KvP+TO+#/>_&CPy%f(yuh%9;s>yG[q!(j?KBx9o&/$nA' );
define( 'SECURE_AUTH_SALT', ')#W|`JIV3)BfS_o8.Y,.J.i|nbqAm;]YNW{u,gylON>qlq,H}N&|i7_W>HPQT#t|' );
define( 'LOGGED_IN_SALT',   'XG%t<>Vw?oG[W7XzISXC/3(y#MTj[%7Kyu(@cZS2<RuA/IOs$P&C[Pa-}S#/6K K' );
define( 'NONCE_SALT',       'SFv-w0{&meI.BKtc<E?4e;?2JUr{0#D$i<jnP>;*~`p.TP@C6Q-pq:CC!in<Dkvh' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
