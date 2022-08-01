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
define( 'DB_NAME', 'cloudwp_db' );

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
define( 'AUTH_KEY',         ',f ,^z[_)xk8NZd(Z~yY(xZxqM|[]WZlUV,pj<)^`9%7>z=h:!kg%S-(0^sEWDz*' );
define( 'SECURE_AUTH_KEY',  '9~YK*^B}xh7a$79HC)(yYB_atm2Fld,m4mDF)M=<?mcGHrRkHF58Tl^bS1P;sf>z' );
define( 'LOGGED_IN_KEY',    'Z+(I3Yssru_ +H??ZOJ^!}Z~7@F.+$Inp6X6 46Op_lFPPj<I4/vFPZ+{j:6fSz0' );
define( 'NONCE_KEY',        '?)ESTr{,&czl^:.=c)eRYU:8<5eM_8MX$h9:zbG$IyHg([KT?|M23K:Iy<RmV$VP' );
define( 'AUTH_SALT',        'sP/_srRA8u0r@BFBJNtgjZqZTl@yR3Ng#_Y ,icC4^roIe9Nagc+M9F{p7|V#xr5' );
define( 'SECURE_AUTH_SALT', '_[VO6.5aA{4h?UU$JoRdsV8(cA3eZ4PX2}R-(5M<b@a!yc%N?ah-tvPnB$ozgNNv' );
define( 'LOGGED_IN_SALT',   'LB[zw*urYZ{j^YTeY~mYV09j%n_Q3XQp]U>y-|{0hC}hAvP!i act%|O0`:LG$b@' );
define( 'NONCE_SALT',       '(0s,v^d/HRy<Wfh64I_cDG=j3sD`?I/[(&~R ?5-86MP;K8Adm]OonX&M9toA5U5' );

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
