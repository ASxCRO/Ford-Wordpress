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
define( 'DB_NAME', 'ford' );

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
define( 'AUTH_KEY',         '0~Zj@a:uby @Cbib06nlSt5Yh*Vo%R4_[Y$gucposU*~~fcmbKxucZoS[Qc]+WVc' );
define( 'SECURE_AUTH_KEY',  'J?}M1jU{/D&&5|+t.Se/#X7U0Qt-TZ$o]ygVOy&X?A^GYJgG ,loh X{GvIUX`Ol' );
define( 'LOGGED_IN_KEY',    '5Pds3:-hJ16==<>M0p<!#pzah}eZFBe.+`!5IC/.NSH>KMfd}7fLdu;+cj:[vtS>' );
define( 'NONCE_KEY',        'A|gJK>UPY<uCYx`J-V^bL={kdQST!xmBM;9v]*JoTw5@glc1F0;iI7Liqzvds%QM' );
define( 'AUTH_SALT',        'T[!mJCP%JOB<&*PC5Q5?`:ekV<^&[[ofMabEr5oW8d,H?ZJhR)at=z_>j8!$K>=^' );
define( 'SECURE_AUTH_SALT', '^3O,@OaM9y9^.}qF` yXow|$6&Q~#e:XDo}hE=R)5t1Y1|+$fnX/)-Ot*>r?8)Hz' );
define( 'LOGGED_IN_SALT',   'roP6K,fR~]?2O(%SJ9U3.f&dh6|r_!UunO,H7jO?q~?Lj?Jqj:wK;lNE+g1 Hdf|' );
define( 'NONCE_SALT',       '&HY=0$T#pd]U^>I~Xgy19d98G|,T%T)G$L)IS_:enO80}B?M,&O<E(U<vCtukTaP' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ford_';

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
