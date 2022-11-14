<?php
/**
 * Header Navigation template.
 *
 * @package gavin-standard-theme
 */

$menu_class = Gavin_Standard_Theme\Includes\Menus::get_instance();
$header_menu = $menu_class->get_menu_html('gavin-standard-theme-header-menu');
?>
<nav class="navbar navbar-expand-lg bg-light">
	<div class="container-fluid">
        <?php
            if ( function_exists('the_custom_logo') ) {
                the_custom_logo();
            }
        ?>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php echo $header_menu; ?>
			<form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		</div>
	</div>
</nav>