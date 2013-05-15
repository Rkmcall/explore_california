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
define('DB_NAME', 'explore_ca');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '>XK;z=s>VrvwQ2eumGS$Ecjf_N:1u:far(q_$>x}UQf8voH12ObO:^:#`|edLGw7');
define('SECURE_AUTH_KEY',  'f`#P}&Ok,OZme`g N@$BhqNQvU3&Fi&=<=^_;SXwb:Pu}WDe]qFf3[~MVx9&Ie}c');
define('LOGGED_IN_KEY',    'S3|NlmUF#mi1/vwm;W3fjGk/<YW`oP dcfE:la5h*Q-5{Grncn}< [N2IXW[VB5-');
define('NONCE_KEY',        '(.L2o8%L)csHvMw-fDXKKB;^E6d:6ZYJ}k#6Qfvejy+`-+e#u}.q(]gYv_Lx]{6Y');
define('AUTH_SALT',        '8oK1jo9N&uz9P0QNwJY[#91fJmu{>?LZ]h{z7V+(_SF!u$Jku!CR[Lf^swu#kg2B');
define('SECURE_AUTH_SALT', 'QCs/p{p:?eg&RhPjGpA4sVcN=):e3C9S>_}&7Zd6MveG%@_Yni0(t-p[AZca<CN)');
define('LOGGED_IN_SALT',   ',pSW/Ir=[IPJ,7w=/r=t$X%;A/d5)c+*McOU<GLQsWAw=<n6~jLOpK9K{kM;A=QZ');
define('NONCE_SALT',       '5n-=7^pt)7j1k]ye[I9<7{d#:;ia;12KCzGlt$`3PC!)u{NeZ7>eYKJ-r9+:U8y7');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

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
