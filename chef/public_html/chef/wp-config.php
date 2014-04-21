<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'incurab2_wor1');

/** MySQL database username */
define('DB_USER', 'incurab2_wor1');

/** MySQL database password */
define('DB_PASSWORD', '09u5J4Mo');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ':+-x1||z1[N(0`1Z*V/<|b[@D,K+&.5*4(T}2-$v9d#F?m-RW)h^tCzH] +1sd=N');
define('SECURE_AUTH_KEY',  '$7qoR`6;/:t^|fV?=,uV-$%fb<Z.1 U?Oq ]0zTWc]$kg=4-nW-5C~<}u@KaSBg1');
define('LOGGED_IN_KEY',    '0^Zi3W<4/kSF{?g:HDBK7)_dFv0F[_Kyz)#<Lr$`?&s9EvWhN?A_s+tUv!%02(;|');
define('NONCE_KEY',        'Gb?Z?,CQ#>J9s=]PtIkO.BH{dH-x&Q}:Ty3[cO=+Z+x;y|*J/Bc$fQ@,^*C[v~% ');
define('AUTH_SALT',        's$ztFM0-mVMdT>f[?I7&&5<JS+I@TDVQ/-{B|s#sK^v.>UAULkLMW#a`:>G@9=(+');
define('SECURE_AUTH_SALT', 'IU|wiZm]A,/M*>H+Fq<c]?oRP];*-KMsXib)5-_/Z8/O,w9I.puOR$6Bc;)w57F%');
define('LOGGED_IN_SALT',   'tvG }@]*|R`W-r}R6dLkiiI=hUG+g=XE+TilYRot~ggf| +f*Zk//|[Y$a;QK&u&');
define('NONCE_SALT',       'rizD^i_)TMe3eNg3sz-I[QCbH`3{vV0Q8A-;07E+g|pQnF*+HX! |8xZ]-7xR=M[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fnf_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
