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
define('DB_NAME', 'pwd-default-bootstrap');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '}rFm8wONe/sZkWl(34a7Ji6)%$jK1o*(,boLb[nf4E?R8J=rwa`>gFCp_HdIjAs4');
define('SECURE_AUTH_KEY',  'C #Y?@a#eJdX)[=jv0tM[EG8uH8 W3_&6`jxa!u/k(eq8K)m)yFP9mrmWv{uFL#_');
define('LOGGED_IN_KEY',    'DVEHe4=$gTh9hfTeI=^@lE c=ZhtcQj%}X0Dq,a@E r>~=aB`5j6AI#;8*cO!,G8');
define('NONCE_KEY',        'uPwce.i{;Hu WpY9V`Es3vgG3//jlM4ESUBfy<jp&x%Hqn]q?jLl LKTM@2/}4;F');
define('AUTH_SALT',        'U-d<D$F-mGQR69eTa7TKQ&qijOUO`qJW/D{oAsH7=?25tjgBSzyPQ)(1Le#BSMw=');
define('SECURE_AUTH_SALT', 'RFV:Q;:>[!3K#d]Ur+lp=DmMq3=7|c/LQ!>G@$4]_sD)|T}obB{hIVS:nL8Nc9~i');
define('LOGGED_IN_SALT',   '|/iw$sPh6@V=n;PyyxWW/O_Fl&y7 rRTJ?/y&I7obgtuosr/&Y% slECFi)Ss^ U');
define('NONCE_SALT',       '0=QjkQ8{-Tm1F&C466`25|YqnXkv7Kpm~#/K}]+7/IQ1~raKEV2Rn>{P.[s8~*C[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG',false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
