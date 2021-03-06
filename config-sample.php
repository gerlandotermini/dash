<?php

/** Please create a copy of this file named config.php. Do not edit this file. */

/** The name of the database for WordPress */
define( 'DB_NAME', 'VH_DB_NAME' );

/** MySQL database username */
define( 'DB_USER', 'VH_DB_USER' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. Don't change this if in doubt. */
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
define( 'AUTH_KEY',         'PLEASE VISIT https://api.wordpress.org/secret-key/1.1/salt/ TO GENERATE YOUR OWN KEY' );
define( 'SECURE_AUTH_KEY',  'PLEASE VISIT https://api.wordpress.org/secret-key/1.1/salt/ TO GENERATE YOUR OWN KEY' );
define( 'LOGGED_IN_KEY',    'PLEASE VISIT https://api.wordpress.org/secret-key/1.1/salt/ TO GENERATE YOUR OWN KEY' );
define( 'NONCE_KEY',        'PLEASE VISIT https://api.wordpress.org/secret-key/1.1/salt/ TO GENERATE YOUR OWN KEY' );
define( 'AUTH_SALT',        'PLEASE VISIT https://api.wordpress.org/secret-key/1.1/salt/ TO GENERATE YOUR OWN KEY' );
define( 'SECURE_AUTH_SALT', 'PLEASE VISIT https://api.wordpress.org/secret-key/1.1/salt/ TO GENERATE YOUR OWN KEY' );
define( 'LOGGED_IN_SALT',   'PLEASE VISIT https://api.wordpress.org/secret-key/1.1/salt/ TO GENERATE YOUR OWN KEY' );
define( 'NONCE_SALT',       'PLEASE VISIT https://api.wordpress.org/secret-key/1.1/salt/ TO GENERATE YOUR OWN KEY' );

/** Limit post revisions */
define( 'WP_POST_REVISIONS', 20 );

/** Define your custom variables here */
define( 'WP_LOCAL_DEV', true );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );
define( 'SCRIPT_DEBUG', true );
ini_set( 'display_errors', 1 );
error_reporting( E_ALL ^ E_DEPRECATED );
