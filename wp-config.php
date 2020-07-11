<?php

define('FS_METHOD', 'direct');
define('FORCE_SSL_ADMIN', true);






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
define( 'DB_NAME', 'dbs598689' );

/** MySQL database username */
define( 'DB_USER', 'dbu430332' );

/** MySQL database password */
define( 'DB_PASSWORD', '10Riquelme@' );

/** MySQL hostname */
define( 'DB_HOST', 'db5000642066.hosting-data.io' );

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
define( 'AUTH_KEY',          'D]T9V]T<d{ji1S)ay+z%sA17p<i>z)e@}1}{#n*&E1JEonJY7lF^lXmg6>SBE%W-' );
define( 'SECURE_AUTH_KEY',   'EMF=Z[.(0$Hi?sFZID Cd7dp[&bl{NuJl8fXh(_L(C@Nc+JaotEWHl;H8|ch5!.O' );
define( 'LOGGED_IN_KEY',     'JZ5p>y9J^6f/r>r2Zvj :K2x$_wgo1Lr2Rrw_vQ3Rl{rsC1o]/m|U1R{c+4,/ ;;' );
define( 'NONCE_KEY',         'ZnPa@hx)B1OocS 9sq%w;&jsRqg$E4byDSA0u=.4lU2e<11<D@A^0<lnw3$,[=v+' );
define( 'AUTH_SALT',         'Hx.9teg^uRBzJRDZo-Obh!9yBTek@5$ejX RRi %!9i7>;Gq.tZ6?N2/yj.X#Efb' );
define( 'SECURE_AUTH_SALT',  '7Bu*Y>r46!?{@4t|cqhldphw1qqj#rFC[RsD1(A4+bX$BR-by,52Mji{9W{F_m??' );
define( 'LOGGED_IN_SALT',    'i*wuSbY[za+A;;RoBo&6`d_7cv(X(V4ag^eR{_0.u@P~,$Y0/jWfdjLD@sXQ{~D3' );
define( 'NONCE_SALT',        'I?&oe`]]([,b/*7&cch+O5o 2pxcn?h1R)F#19}u`E:5L^/fk{{-9nf~N.5M c|A' );
define( 'WP_CACHE_KEY_SALT', 'VoNqDf/J-Lr|dl}tVp}%ihD$#b9a#] 4J*>MhxG>4/R%$a@^]6%|N-;1_:bBWA-[' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ogk88ywgot';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
