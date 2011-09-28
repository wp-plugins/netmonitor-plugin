<?php
/*
Plugin Name: Netmonitor Wordpress Plugin
Plugin URI: http://www.getnetmonitor.com
Description: Automatically generates a Netmonitor tag for each page and optionally tracks page names and signed in users.
Version: 1.1
Author: Developer's Helsinki Ltd.
Author URI: http://www.developers.fi
License: GPL2
*/

/*  Copyright 2011  Developer's Helsinki Ltd.  (email : info@developers.fi)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function nm_generate_tag() {
	global $current_user,$wp_query;
	
	$nm_id = get_option('nm_id');
	$nm_page_tracking = get_option('nm_page_tracking');
	$nm_user_tracking = get_option('nm_user_tracking');
	
	$custom = array();
	$page = null;
	$user = null;
	
	if( $nm_page_tracking == 1 ){
		$post_obj = $wp_query->get_queried_object();
		$page = $post_obj->post_name;
	}
	
	if ( $nm_user_tracking == 1 && isset($current_user) )
	{
		$user = $current_user->user_login;
	}
		
	if ( $page ) {
		$custom[] = "page: '$page'";
	}
	
	if ( $user ) {
		$custom[] = "user: '$user'";
	}
	
	$custom = implode(',',$custom);
	
	$tag = sprintf('
		<script type="text/javascript" src="http://tracker5.netmonitor.fi/nmtracker.js"></script>
		<script type="text/javascript">
			try {
				var netmonitor = new nmTracker(%d);
				netmonitor.track(%s);
			} catch(error){}
		</script>
		',
		$nm_id,
		$custom?"{".$custom."}":''
	);

	return $tag;
}

function nm_tag() {
	if ( get_option('nm_id') && ! isset($_GET['preview']) ) {
		echo nm_generate_tag();
	}
}


add_action('wp_footer', 'nm_tag', 20);

// Admin

function nm_admin_actions() {
	add_options_page("Netmonitor Settings", "Netmonitor", 1, "Netmonitor_tracking", "nm_admin");
}

add_action('admin_menu', 'nm_admin_actions');

function nm_admin() {
	include('nm_admin.php');
}

?>
