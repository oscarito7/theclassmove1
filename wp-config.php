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
define( 'DB_NAME', 'theclassmove' );

/** MySQL database username */
define( 'DB_USER', 'theclassmove' );

/** MySQL database password */
define( 'DB_PASSWORD', '2bWaGJQINv1kZsV' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'L)UyS[h1tVSC(JJs!tXVu~w2kR:@4dpv)j&R/-m7Q 7+Fq0XLn>}f!3slydQ&3dO' );
define( 'SECURE_AUTH_KEY',   'KYecoAoobcz7K;mTso&5Nj~/T{y31#y5C}2BS:hUB:9 a+%}N&wbz#GQu6>cO{+D' );
define( 'LOGGED_IN_KEY',     '/&@6/~5J$v*-<AwbHyuWIDP)m@L(]*o%ofMk[t_:7F|GoCt-S*eztSiU=LIt#V!C' );
define( 'NONCE_KEY',         '8T#qK>GvTpGf^m (4In^2)jG~v.eNsf`M{H(qCMj47Pb[,^qJb3M8M[8QCue-yCv' );
define( 'AUTH_SALT',         '!1 P)=&dbG[ts$!6_e6{JZ2w/^lE2Ww?)(|8<v}0x=C;0Fbt[J ks??cu|==9&`n' );
define( 'SECURE_AUTH_SALT',  's_pQ6+-b9yv39 x-:y,watczVEe;P^;{?1XQ6GD+)ve;^u_iktlXZT5.. cQ;j<c' );
define( 'LOGGED_IN_SALT',    '$XTN_hrU,!$7`Z#JbjZ82MfXW^M7dO420j?O2O7_}=RENY0w{G5IU1 94Lun$yNk' );
define( 'NONCE_SALT',        '&-u_-~H]{D(&oU*%kdhl4LS%&Y8[}V`b}/,a%#mv!3N)Oky7P@FW=i5|ec@1M^Bc' );
define( 'WP_CACHE_KEY_SALT', '67VlVoS>]F<rGj=v+6n, /b%[P!>E7N7[D<Q#o=yS;V:&C2g37g/ .3!r?GkJY(4' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
