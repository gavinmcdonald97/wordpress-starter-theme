<?php
/**
 * Theme setup class.
 *
 * @package gavin-standard-theme
 */

namespace Gavin_Standard_Theme\Includes;

use Gavin_Standard_Theme\Includes\Traits\Singleton;

class Theme_Setup {

	use Singleton;

	protected function __construct() {
		Menus::get_instance();
		Assets::get_instance();
		Theme_Support::get_instance();
	}
}