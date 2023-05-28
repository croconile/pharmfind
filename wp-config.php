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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pharmafind' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
 */
define( 'AUTH_KEY',         ')B(CI&mIM%.H[D#PM?Dhe]toE$6UI3}$={u}!IEiuG+KZZ/>l_aMH/^kg.63Tc@D' );
define( 'SECURE_AUTH_KEY',  'SNdK2,^XLx7Z;nf|1%/bp2VFu<X674<Ts+VpMB6e%hmL!g0o4gBA5Bj AX}};UNR' );
define( 'LOGGED_IN_KEY',    'J.MA_UK10C$^G]CR)l]^0x]:.xO:(aOAZqo(<w8Sr3j$5t8n~q{~4NQ+$<TT.p.4' );
define( 'NONCE_KEY',        '&24|_Qy[wvS[Q?[GRMg,0LbKBK0#2ywF-jBe!]n-u+E43h!Qx17vNO@eB~(JXqA<' );
define( 'AUTH_SALT',        'rSn?WPN89q]@XeY:`m<uIu<K|82V0LI%CgBN]~.f(|a_9IvPk%owx![/{,CFxuMh' );
define( 'SECURE_AUTH_SALT', '/M>Kt1/R79#ypg0+U&}dgyA1h/*9*pO_@wJ<C%9RY:7$|7_P:cB)vJ--I$Z=77/[' );
define( 'LOGGED_IN_SALT',   'hx(v%cv;;j>,1fIN^3HfN}UN{taeF=u74*.niT &<ztvF:D1Dvsb5DX+8^&){w::' );
define( 'NONCE_SALT',       '-n%@Mx[6r?)1%5cWe!U_W4W<RV@5/+5<8Gg9XT4>uWr8QL?vEf)Y:I63+VYjDrQW' );

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
