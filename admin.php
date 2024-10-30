<?php



add_action('admin_menu', 'bp_klout_plugin_menu');

add_action( 'network_admin_menu', 'bp_klout_plugin_menu' );



function bp_klout_plugin_menu() {

	add_submenu_page( 'bp-general-settings', 'Bp Klout', 'BuddyPress Klout', 'manage_options', 'bp-klout', 'bpklout_plugin_options');

	
	//call register settings function

	add_action( 'admin_init', 'bpklout_register_settings' );

}



function bpklout_register_settings() {

	//register our settings

	register_setting( 'bpklout_plugin_options', 'members' );

	register_setting( 'bpklout_plugin_options', 'groups' );


	//name to cerrelate to the members profile field label
	register_setting( 'bpklout_plugin_options', 'klout_member_label' );


	//name to cerrelate to the gropus field label
	register_setting( 'bpklout_plugin_options', 'klout_group_label' );}



function bpklout_plugin_options() {

	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.') );

				
	}
	

?>



			<?php if ( !empty( $_GET['settings-updated'] ) ) : ?>
				<div id="message" class="updated">
					<p><strong><?php _e('Buddypress Klout Settings have been saved.' ); ?></strong></p>
				</div>
			<?php endif; ?>






<div class="wrap">

<h2>
<?php _e('BuddyPress Klout Settings', 'bpklout') ?>
</h2>


<h3><?php _e('Member and Group Components.', 'bpklout') ?></h3>


<p><?php _e('The plugin uses Buddypress XProfile Fields and requires you to name the "Mirror Profile Field Title" below the same as your custom Profile Field Title - Please read the plugin installation instructions if you are not sure what to do.', 'bpklout') ?></p>

<form method="post" action="<?php echo admin_url('options.php');?>">

<?php wp_nonce_field('update-options'); ?>


<table class="form-table">



<hr></hr>


































<?php // members admin options ?>



<table class="form-table">


	<tr valign="top">

		<th scope="row"><b>Members</b></th>

			<td>
				<input type="checkbox" name="members" value="1" <?php if (get_option('members')==1) echo 'checked="checked"'; ?>/>
				Let your members show of their Klout.com scores on their profile page.
			</td>

	</tr>

	<tr valign="top">
		<th scope="row"><colored-text style="color: red;">Mirror</colored-text> Profile Field Title</th>
            		<td>
				<input <?php if ( get_option('members') == '' ) {?>disabled="disabled"<?php }?> name="klout_member_label" value="<?php echo get_option('klout_member_label') ?>"/><?php if ( get_option('members') == '' ) {?><br /><i><colored-text style="color: orange;">Disabled</colored-text> - Tick the check-box above and save to enable this feature</i><?php }?>
                <p><colored-text style="color: green;">Quick links:</colored-text> Visit <a href="<?php echo home_url(); ?>/wp-admin/admin.php?page=bp-profile-setup&group_id=1&mode=add_field" target="_blank" title="opens in a new tab">Add Field</a> to set up a new XProfile field or <a href="<?php echo home_url(); ?>/wp-admin/admin.php?page=bp-profile-setup" target="_blank" title="opens in a new tab">Extended Profile Fields</a> to edit a existing field</p>
			</td>
		</tr>
</table>

<?php // groups admin options ?>

<table class="form-table">


	<tr valign="top">

		<th scope="row"><b>Groups</b></th>

			<td>
				<input type="checkbox" name="groups" value="1" <?php if (get_option('groups')==1) echo 'checked="checked"'; ?>/>
				Let your groups show of their Klout.com scores on the groups home page.
			</td>

	</tr>



	<tr valign="top">
		<th scope="row">Group Field Title</th>
            		<td>
				<input <?php if ( get_option('groups') == '' ) {?>disabled="disabled"<?php }?> name="klout_group_label" value="<?php echo get_option('klout_group_label') ?>"/><?php if ( get_option('groups') == '' ) {?><br /><i><colored-text style="color: orange;">Disabled</colored-text> - Tick the check-box above and save to enable this feature</i><?php }?>  
			</td>
		</tr>
</table>





<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="members,groups,klout_member_label,klout_group_label" />



<p class="submit">

	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />

</p>


</form>

<p>If you enjoy the plugin and would keep up to speed on future releases and updates, follow me on twitter or check out my blog - <a href="http://charlkruger.com" target="_blank">CharlKruger.com</a></p>
<p>Feel free to retweet the plugin to let your followers know by using the button below and <b>don't forget to give me a +K on <a href="http://klout.com/#/itsCharlkruger" target="_blank" title="Charl Kruger's Klout - opens in a new tab">Klout.com</a></b></p>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://charlkruger.com/2012/01/10/buddypress-klout-v1-0-initial-release/" data-text="Klout for #Buddypress members and groups" data-via="itsCharlKruger">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<a href="https://twitter.com/itsCharlKruger" class="twitter-follow-button" data-show-count="false">Follow @itsCharlKruger</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<iframe src="http://widgets.klout.com/badge/itsCharlkruger?size=s" style="margin-top:10px;border:0" scrolling="no" allowTransparency="true" frameBorder="0" width="120px" height="59px"></iframe>


<?php

}


?>