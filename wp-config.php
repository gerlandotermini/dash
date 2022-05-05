<?php

/*
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

if ( !defined( 'ABSPATH' ) ) {
   define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}

require_once( dirname( ABSPATH ) . '/config.php' );

// Secure Admin
define( 'FORCE_SSL_ADMIN', true );

// Custom Content Directory
define( 'WP_CONTENT_DIR', dirname( ABSPATH ) . '/content' );

if ( !empty( $_SERVER[ 'HTTP_HOST' ] ) ) {
   define( 'WP_CONTENT_URL', 'https://' . $_SERVER[ 'HTTP_HOST' ] . '/content' );
}

// No automatic updates: our code is managed through version control
if ( !defined( 'AUTOMATIC_UPDATER_DISABLED' ) && ( !defined( 'WP_CLI' ) || !WP_CLI ) ) {
   define( 'AUTOMATIC_UPDATER_DISABLED', true );
}

// Disable file editing from within WordPress
define( 'DISALLOW_FILE_EDIT', true );

// Don't allow users to update core, plugins, or themes
define( 'DISALLOW_FILE_MODS', true );

// Load WordPress Settings
if ( empty( $table_prefix ) ) {
	$table_prefix  = 'wp_';
}

// Bootstrap WordPress
require_once( ABSPATH . 'wp-settings.php' );
