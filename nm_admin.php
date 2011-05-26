<?php
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

if( $_POST['nm_submitted'] == 1 ) {
	$nm_id = $_POST['nm_id'];
	$nm_page_tracking = isset($_POST['nm_page_tracking'])?1:0;
	$nm_user_tracking = isset($_POST['nm_user_tracking'])?1:0;
	update_option('nm_id',$nm_id);
	update_option('nm_page_tracking',$nm_page_tracking);
	update_option('nm_user_tracking',$nm_user_tracking);
?>  
	<div class="updated"><p><strong>Settings updated.</strong></p></div>  
<?php
} else {
	$nm_id = get_option('nm_id');
	$nm_page_tracking = get_option('nm_page_tracking');
	$nm_user_tracking = get_option('nm_user_tracking');
}
?>
<div class="wrap">
	<h2>Netmonitor Settings</h2>
	<form name="nm_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="nm_submitted" value="1" />
		<p>
				Site-id:
				<input type="text" name="nm_id" value="<?=$nm_id?>" />
		</p>
		<p>
			<input type="checkbox" name="nm_page_tracking" <?php echo ( $nm_page_tracking == 1 ) ? 'checked' : '' ?> />
			Use page name tracking
		</p>
		<p>
			<input type="checkbox" name="nm_user_tracking" <?php echo ( $nm_user_tracking == 1 ) ? 'checked' : '' ?> />
			Track signed in users
		</p>
		<p class="submit">  
			<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes">
		</p>
	</form>
</div>
