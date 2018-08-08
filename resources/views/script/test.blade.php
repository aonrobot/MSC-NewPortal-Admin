@inject('menu', 'App\Http\Controllers\FrontMenuController')
{{-- */$menus = $menu->index()['menus']/* --}}
{{-- */$meeting_menus = $menu->index()['meeting_menus']/* --}}

<?php

$main_cat_list = [];

foreach ($meeting_menus as $menu) {
	$cat_name = $menu->item_description;
	if (strpos($cat_name, '~') > -1) {
		$cat_name = explode('~', $cat_name)[0];
	}
	if (!in_array($cat_name, $main_cat_list)) {
		array_push($main_cat_list, $cat_name);
	}

}

echo '<ul>';
foreach ($main_cat_list as $main_cat) {
	echo '<li>' . $main_cat . '</li>';
	echo '<ul>';
	foreach ($meeting_menus as $menu) {
		if (strpos($menu->item_description, $main_cat) > -1) {
			echo '<li>' . $menu->item_name . '</li>';
		}
	}
	echo '</ul>';

}
echo '</ul>';

?>