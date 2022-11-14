<?php
/**
 * Assets class.
 *
 * @package gavin-standard-theme
 */

namespace Gavin_Standard_Theme\Includes;

use Gavin_Standard_Theme\Includes\Traits\Singleton;

class Assets {

	use Singleton;

	protected function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'register_assets'), 10);
		add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'), 11);
	}

	public function register_assets() {
		// Register Bootstrap library assets
		wp_register_script('bootstrap', GAVIN_STANDARD_THEME_URL . '/assets/js/dist/bootstrap.bundle.min.js', array(), '5.2.2', true);
		wp_register_style('bootstrap', GAVIN_STANDARD_THEME_URL . '/assets/css/dist/bootstrap.min.css', array(), '5.2.2', 'all');
		// Register custom assets
		wp_register_script('gavin-standard-theme-main', GAVIN_STANDARD_THEME_URL . '/assets/js/dist/theme.js', array(), GAVIN_STANDARD_THEME_VERSION, true);
		wp_register_style('gavin-standard-theme-main', GAVIN_STANDARD_THEME_URL . '/assets/css/dist/theme.css', array(), GAVIN_STANDARD_THEME_VERSION, 'all');
	}

	public function enqueue_assets() {
		// Enqueue Bootstrap library assets
		wp_enqueue_script('bootstrap');
		wp_enqueue_style('bootstrap');
		// Enqueue custom assets
		wp_enqueue_script('gavin-standard-theme-main');
		wp_enqueue_style('gavin-standard-theme-main');
	}

}