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
define( 'DB_NAME', 'friday' );

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
define( 'AUTH_KEY',         '25pBcstL*:^FS`H7CoD=~}e../|3a*6)JzR {XXiK[cta21FsD*$JG[U{qnExC+i' );
define( 'SECURE_AUTH_KEY',  'X-2a9zVO{>$ #@,JN,LkP=oF$/,KkTF?QP]&@:n ,fnjTrw492/0[)dwBuLG^>D2' );
define( 'LOGGED_IN_KEY',    ';EmLCW>G^z-r]R#8$ux0/J}%Le1G9r$qIE#f>OLia^&J,ZoNR2zEma :I<hw2,sw' );
define( 'NONCE_KEY',        '>z6@@J  Mi2V&g.#9E%6SC;$)yGU*^_3b{)u76GV{gI{jhsxbkXnCJA3!F1C3ewg' );
define( 'AUTH_SALT',        'Md%Qb?{8~I1cK.*wu#f:(6W&Q`QiNoSX?bnoJyX(]H{X:kgdi>|t2:{7I&dB7e+r' );
define( 'SECURE_AUTH_SALT', 'C8A1y#C#5b(YjRD8K}W2Vvj/6Rny15~-tztp<[sT![sNkj.Ew8->ju~^#jV>gD2n' );
define( 'LOGGED_IN_SALT',   '7C,^b !#av5LvD>:qXkR-E_pks9OE{hzC_-oWB$gHm<1] a:QHi0W3UK!;l1j00P' );
define( 'NONCE_SALT',       'K~HikhDqr*n56N!MVmw#,$/-fh)?5vO!pd}R|674v*HL-YOgdr_klBG&{2Ug{{@K' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'friday_';

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
