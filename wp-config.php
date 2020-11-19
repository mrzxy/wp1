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
define( 'DB_PASSWORD', 'yuenan@123' );

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
define( 'AUTH_KEY',         '5?LYLIbQL[=`3IsCV]sO6zeJA8f@io[$}7aC$N;gq|~2!455x*:rg-n=vJV%EtIH' );
define( 'SECURE_AUTH_KEY',  'RO-n%. [)^fK>L SmdqH?7>!;;-(x^OK]|F@/H%vKG{;|~yuZ_$qS&`mW_g ;Iv)' );
define( 'LOGGED_IN_KEY',    'PoF.orw1VQ5ls4oJ7,+,y:-kLU dk4 aKRP~mbJwkd:@P,8)*),h9@,D(CAOMbd(' );
define( 'NONCE_KEY',        'G.!$b!fD~`YzVgRQ]/iT0IKC&1</0]-I1]a39Z*s&RYMh`*uHl Y]C}{(*b+.ZWC' );
define( 'AUTH_SALT',        'dJ(7i7<o%;KWl1~P3XgH, ^I7+jUO`7)$1vacIthDtrv#uaeL:i0O_=VGze>?@v.' );
define( 'SECURE_AUTH_SALT', 'Auy1:0x{Ht=c)R.K6n>Y>1`8kR9//^U5qtGRm9,KE%?,w:^z-*wH;1=`])j% gP.' );
define( 'LOGGED_IN_SALT',   ']x@7|-$t5,;&&oqsr_QuO2|OiT*QBcS5,ZPAt*~.oY(KuW-uuTQU-?!&;SwX>i-*' );
define( 'NONCE_SALT',       'WUHs&+|7VW,a8}G;EN%:yvgVefD7]Y%][7vGXk(8B7K@tZ!OBE]aCJg7m[^R{tf2' );

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
