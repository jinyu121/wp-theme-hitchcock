<?php
// Style the admin area
function hitchcock_admin_area_style() {
   echo '
<style type="text/css">

	#postimagediv #set-post-thumbnail img {
		max-width: 100%;
		height: auto;
	}

</style>';
}

add_action('admin_head', 'hitchcock_admin_area_style');
