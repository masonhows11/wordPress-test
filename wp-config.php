<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpressdb' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '1289..//' );

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
define( 'AUTH_KEY',         '%-];QcQ^T9!`~R@&O:y<d~WlmNSJWU(?:Udx{ZZ._i]bp$?CZal`1-h_7#0`5|O{' );
define( 'SECURE_AUTH_KEY',  '.b-[CM-N,z~OB=/ G~:,`m >n&O>l:,SG9ShlVcJ=Y[R 9K)&fbJ$YTGp[ja5v=,' );
define( 'LOGGED_IN_KEY',    'esmAIQ]KE$vKxE#Uxen;X>kuzWRno)XSa^@$sZ+HmcQp/YH[}T}T@5pk9Jukg05{' );
define( 'NONCE_KEY',        'zLkL1E/F5Op/c?liFD7.ocCoKcF$&Zioy#68o5No-p:Fi~CqKk`^l3t;e`s32)4w' );
define( 'AUTH_SALT',        '>,KPQoG1ikQ+9ls.5XG Op;nwaNP^O.&8i;[lR4725`ctW]_=JQE%0goq_B[F~/4' );
define( 'SECURE_AUTH_SALT', '#<G*hTK1]ddF}1jz({f(cM;*GB}VN3#V#N8_a2eRP<@;/Q7?Pq}^v6 6hqR[?gyM' );
define( 'LOGGED_IN_SALT',   '5h@e@R90aw<2#7->exA6E}Mq B}HcI( BPCMMiwfsM)EW2?*tr},;=]q:qJx|sNP' );
define( 'NONCE_SALT',       '@-%VtxHl(i/q,Yb{*{o<E&lb|$>@;E+5b,nc+^n7B25}:~JVe[txqaruk8s#Qbto' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
