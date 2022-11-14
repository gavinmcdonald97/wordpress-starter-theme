<?php
/**
 * Theme functions.
 *
 * @package gavin-standard-theme
 */

// Set up theme constants.

if ( !defined('GAVIN_STANDARD_THEME_PATH') ) {
	define('GAVIN_STANDARD_THEME_PATH', untrailingslashit(get_template_directory()));
}

if ( !defined('GAVIN_STANDARD_THEME_URL') ) {
	define('GAVIN_STANDARD_THEME_URL', untrailingslashit(get_template_directory_uri()));
}

if ( !defined('GAVIN_STANDARD_THEME_VERSION') ) {
	define('GAVIN_STANDARD_THEME_VERSION', wp_get_theme()->version);
}

// Autoload theme classes.

require_once GAVIN_STANDARD_THEME_PATH . '/includes/helpers/autoloader.php';

// Import theme classes.

use Gavin_Standard_Theme\Includes\Theme_Setup;

// Instantiate theme classes.

Theme_Setup::get_instance();