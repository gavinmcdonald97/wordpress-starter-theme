<?php
/**
 * Theme support class.
 *
 * @package gavin-standard-theme
 */

namespace Gavin_Standard_Theme\Includes;

use Gavin_Standard_Theme\Includes\Traits\Singleton;

class Theme_Support {

	use Singleton;

	protected function __construct() {
		add_action('after_setup_theme', array($this, 'standard_features'));
		add_action('after_setup_theme', array($this, 'gutenberg_features'));
		add_action('after_setup_theme', array($this, 'content_width'));
	}

	public function standard_features() {
		add_theme_support('title-tag');
		add_theme_support('custom-logo', array(
			'height' => 100,
			'width' => 400,
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => array('site-title', 'site-description')
		));
		add_theme_support('custom-background', array(
			'default-color' => '#FFFFFF',
			'default-image' => ''
		));
		add_theme_support('post-thumbnails');
		add_theme_support('customize-selective-refresh-widgets');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		));
	}

	public function gutenberg_features() {
		add_theme_support('wp-block-styles');
		add_theme_support('align-wide');
	}

	public function content_width() {
		global $content_width;
		if ( !isset($content_width) ) {
			$content_width = 1240;
		}
	}
}