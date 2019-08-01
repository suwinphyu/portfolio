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
define('DB_NAME', 'b6_18505725_phyu');

/** MySQL database username */
define('DB_USER', 'b6_18505725');

/** MySQL database password */
define('DB_PASSWORD', 'Tigress!@#');

/** MySQL hostname */
define('DB_HOST', 'sql105.byethost6.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T&@Rd,I0v3)O3W<-Itk!/Ce>K@_l}R6};5L$sMqG5@PP+_ueqrG<l%?QKi}2cO}3');
define('SECURE_AUTH_KEY',  'a~{`gZCz;k!UyAF$=9;K$eB@xsS<,C..[qUNoD:_EbiWv#a XO7r_^uegJ^n=]}>');
define('LOGGED_IN_KEY',    'y!?t1jyTgZR)k#SXQa?1E=25fFsv/xkT)b<1?!DS.Nu2+}Xz`+gW9k~Uz%%R,Hi,');
define('NONCE_KEY',        'M-t?F6^nxLZk!^e%TMTe@Ye@6Uim>:m*nU,VNJz|x6 r9]oqXGr2V|i,,%!O,7%p');
define('AUTH_SALT',        '}M=-~|,3C<PcJRh|V8H3TFh{fRd<xmUeGo`~C(Op4^|U(M&_I.x/_l4Kc+twYI0A');
define('SECURE_AUTH_SALT', '-<9GdW)< FhPTPHJJiseb_+jxFyl%)Ip/*_H!wJwx;i_4;Y44$dV% 1O+8Y:YiYK');
define('LOGGED_IN_SALT',   'B]9$,|O]?PB?ipu2v#QxY ahmsz^>nXQ+<9RkurLOW?:B>&}H|-pnu/c)o|W5#}p');
define('NONCE_SALT',       'A&HE%fk%&m,{HR ~s:[a=T{Y_i`.:+aMut~-wFGR:122Pw/I<]u&zMRIrpIlf;Wk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
