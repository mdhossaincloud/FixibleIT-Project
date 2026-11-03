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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:10005' );

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
 */
define( 'AUTH_KEY',          'ShD5FhCA/,xeb*ySO9i69/478UrS61KhGpbZB)Ue3D}B{?,<5z2_KR| O3%{,Z$N' );
define( 'SECURE_AUTH_KEY',   'v.U@H5rQJ=fKf?7$fC-JoTY#@=lZxixtWZ~vWWC^I`cfa~evg0q0kXEa*Z@_!v]*' );
define( 'LOGGED_IN_KEY',     'R[! rw~4(oBqUp<dE+8t U!HTs$pY6m@dYoCvs+-56PzFWr+:Vy3o^`W8v-|20<]' );
define( 'NONCE_KEY',         'D`9d>Y~5Hd!fTx+W3HLLA+F@Wg@u%*.*%t-a9Q6QBQ{.SaflitaO`${oiL6~m|:O' );
define( 'AUTH_SALT',         'uR|.H@)wM!{FT[AYe5[06)!j~vamG>/5I-zERiAT/o&m<Y%LpZ,c|@xzx#m~+s$W' );
define( 'SECURE_AUTH_SALT',  'v48a=WJ$98w6:S5N|tv 2_kwVyFXvLbRhY-~_0r@)mSFrzBv8 TY~d#FgGn<V8Tu' );
define( 'LOGGED_IN_SALT',    'C.e/Q(0R|@T4%6~=X3`#C+kl|Ts7ZRIKwHn-$oAP*As4h^}UC.3bG[p: +l;`^EY' );
define( 'NONCE_SALT',        'A(A(Y%=(|;!}r_,ppIoo}1$Qt&t90sm%->zW4(WwLM6;Rxw()p6a^ZMflviKsg*g' );
define( 'WP_CACHE_KEY_SALT', '/;-/A:!?|JB!:*T >^)hRZk<g`jDLyQo]{o)V5~MG74KpbK):Swi+1f.@$&}q{Ym' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
