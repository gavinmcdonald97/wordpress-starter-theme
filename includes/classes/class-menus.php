<?php
/**
 * Menus class.
 *
 * @package gavin-standard-theme
 */

namespace Gavin_Standard_Theme\Includes;

use Gavin_Standard_Theme\Includes\Traits\Singleton;

class Menus {

	use Singleton;

	protected function __construct() {
		add_action('init', array($this, 'register_menus'));
	}

	public function register_menus() {
		register_nav_menus(array(
			'gavin-standard-theme-header-menu' => esc_html__('Header Menu', 'gavin-standard-theme'),
			'gavin-standard-theme-footer-menu' => esc_html__('Footer Menu', 'gavin-standard-theme')
		));
	}

	/**
	 * Get menu ID from menu location
	 *
	 * @param string $location Registered menu location
	 *
	 * @return int Menu ID
	 */
	public function get_menu_id(string $location = ''): int {
		// Get all registered menu locations
		$locations = get_nav_menu_locations();
		// Return valid menu location ID or 0
		return !empty($locations[$location])
			? $locations[$location]
			: 0;
	}

	public function get_child_menu_items($menu_array, $parent_id) {
		$child_menus = [];
		if ( !empty($menu_array) && is_array($menu_array) ) {
			foreach ( $menu_array as $menu ) {
				if ( intval($menu->menu_item_parent) === $parent_id ) {
					array_push($child_menus, $menu);
				}
			}
		}
		return $child_menus;
	}

	/**
	 * Get bootstrap markup for a menu
	 *
	 * @param string $location Registered menu location
	 *
	 * @return string Menu html
	 */
	public function get_menu_html(string $location = ''): string {
		$header_menus = wp_get_nav_menu_items($this->get_menu_id($location));
		if ( empty($header_menus) || !is_array($header_menus) ) {
			return '';
		}
		ob_start();
		?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php foreach ( $header_menus as $menu_item ): ?>
                    <?php if ( !$menu_item->menu_item_parent ): ?>
                        <?php $child_menu_items = $this->get_child_menu_items($header_menus, $menu_item->ID); ?>
                        <?php $has_children = !empty($child_menu_items) && is_array($child_menu_items); ?>
                        <?php if ( !$has_children ): ?>
                            <li class="nav-item">
                                <a href="<?php echo esc_url($menu_item->url); ?>" class="nav-link">
                                    <?php echo esc_html($menu_item->title); ?>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo esc_html($menu_item->title); ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($child_menu_items as $child_menu_item): ?>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url); ?>">
                                                <?php echo esc_html($child_menu_item->title); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
	                    <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php
		return ob_get_clean();
	}

}