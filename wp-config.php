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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define('AUTH_KEY',         '+08rmOdWNMbaIUXasgu6buF+slLvkdxH50XCPvivPYykZVxP9PxrtG4dte5mCZ6PY9AJqdMOM9JJEAgpyW3a6Q==');
define('SECURE_AUTH_KEY',  'hsHIIlEgPX4Xdg1eE4KJDJNNzYTwpeHOEYGQaAJuRwpK5d64tCD1Ev7L5gAR8OBvUipLIqHHtepcRMQEGGBk4A==');
define('LOGGED_IN_KEY',    'WaCE1buehQ3Lht/4yuDIRff+ERb5kgv4TCqSw6xdhDxNvetQMbUXiJw7FBiCM7pB6qElG/HG7O5yXTqnYhlsmg==');
define('NONCE_KEY',        'KN6ZrFUOzY30vtFOyGQfP47gJkm9U1cmtYAxqMeIayXDAlSaympdMUXg8SiMIWo5cXi836TfgkJYVUoWy5u9PA==');
define('AUTH_SALT',        'MHAnfJU6Kcs3VSryQVTvRt3wpjs8lxFRjs6XWKbMgW3rk5KgacYUXedcwmHlSCzBtGTXvVm+OiCowHpk0GmsGQ==');
define('SECURE_AUTH_SALT', 'MAadHdabGdzEW5/WP6CA91CwnfcVJY9aa8Ogpa+m/L8Yz1Qlmkj6CM92CQqDL0rOAdezz3RcymIqS+C4B5fmpw==');
define('LOGGED_IN_SALT',   'dGm9F/kidyPOrhQseVBnLUPwTK/+X7v2mybbjNvJpfZmKak6d6PFjBB9g8cB9vOlrEx3OnTbNeD5LE9BekMtZQ==');
define('NONCE_SALT',       'lg82b1bips4VCrDzht/B090YdU44DqOW8bP3TOgYTkyTiUNhdOwiXjk+qoVbDhhRF5tbhAudlMtHUl6Z12BeQw==');

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
