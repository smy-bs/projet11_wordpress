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
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '2):3y*1`3]r*BN]C5kNINrSDL#li0>R)njIZ C^oV|fR&fiq^{PJ8Gk&mcn`3.S&' );
define( 'SECURE_AUTH_KEY',   'VCUx,t]>g#$eHT.*C0jk-~i0(V#W`NG5YAy5)UXU&D,brwF{`vYo raC?N=]`9 x' );
define( 'LOGGED_IN_KEY',     '4<t&Rd/`z<%669hkC:fa?D>ocK5~5$,=9n1.@zxYvk]n+~F@?Ih^tu%%_9.DeZ9=' );
define( 'NONCE_KEY',         '):d}x,Yq$s1O3}MPr!xjIp+{SLpbIk[4A]+l523~W|%QQBJv:nzaRdw_%.#ASmF~' );
define( 'AUTH_SALT',         'xR?Pi^TpF2_Es?C%|~sSifNY3r}i:%aM)Wo5zs5EUpfM(H^6mN0l{a;SK7~N&7<R' );
define( 'SECURE_AUTH_SALT',  '8=wr6D0T6XHaKUpiJYxK(q5+M,b`O{6#Pz&ZSe3d?Y~J)dpn$h}(FA`hUG0I@Ab>' );
define( 'LOGGED_IN_SALT',    '+h]v,xDcxvvvY:5;E +fsx1U lu?7nrBdvkDha9!@^O[tGVu!/;m=}7{ftL8w-b1' );
define( 'NONCE_SALT',        '42=$a qAIKr<wfcw,#3Er_lu;RP>R?_WO|lB4MS_oXH!K!`Xy3&~1jyp^H?`a?uo' );
define( 'WP_CACHE_KEY_SALT', 'UvFGOox>BVz)C&dw+kbBeJh#R$MOQ:/=UpFO]*9FI<BRt[x`*JxE_={Kx[&BKqv]' );


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
