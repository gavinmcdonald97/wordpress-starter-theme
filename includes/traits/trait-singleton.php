<?php

namespace Gavin_Standard_Theme\Includes\Traits;

trait Singleton {

	public function __clone() {
		// This empty method exists to prevent cloning.
	}

	final public static function get_instance() {
		static $instance = [];
		$called_class = get_called_class();
		if ( !isset($instance[$called_class]) ) {
			$instance[$called_class] = new $called_class;
			// Add init hook for each instantiated class.
			do_action( sprintf('gavin_standard_theme_singleton_init_%s', $called_class) );
		}
		return $instance[$called_class];
	}

}