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
define( 'DB_NAME', 'wordpress5' );

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
define( 'AUTH_KEY',         'D6FHP9Vp]M91PB5}c.^Ml{1}/hVPk?hlg@]Nqcm@jl# m%W>|sLM)yi|rj0HlBE>' );
define( 'SECURE_AUTH_KEY',  'V6=Dy7hv|nZsmK=YANmgWiE4H)iOo$&|b(MN)y)~&;HD_){+ZDBQ{bD,|!O8!0CR' );
define( 'LOGGED_IN_KEY',    ' dY&c^7oA?(qMIidWj%Rb}+>^18d2jIvUk3c=yECypP&#0O3ju#&K?,w=JaH1P?`' );
define( 'NONCE_KEY',        '(mbhD9i.&k>g}~+gDW=luy+tX#uD#WLBeRlic2~EQ7N*#1NbzJg,#g,`ej)Q;!H(' );
define( 'AUTH_SALT',        'qh&S.hqkUo*;ydCUysq:n_orqzBedeqM3Lid 3, 5{NXh<_r=u{Ed8L#OX>oSHlQ' );
define( 'SECURE_AUTH_SALT', 'xk$b|z.PrE5}n@-o!P+*d]4AJJOdZ}*Kq-OBB3[h@nMqQ/t]nlKgD)BFe%=!K#Dz' );
define( 'LOGGED_IN_SALT',   '9Z<.j7/O.(YK=wd~1+2smrLU^=I~*gfFF!#&Ly<@)eL!_4xY7}k>B919jNqONal5' );
define( 'NONCE_SALT',       'uMm@.AH]xA1hv_TF;D:hKKgJ?LC)|W=2*z/O!nr{rq %[!FZ&)|Ao]^nJpJ-T$I ' );
define('FS_METHOD', 'direct');

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

