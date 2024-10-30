<?php

// Klout Group Extension for Buddypress by Charl Kruger

// Add the form

add_filter( 'groups_custom_group_fields_editable', 'group_header_klout_markup' );
add_action( 'groups_group_details_edited', 'group_header_klout_save' );
add_action( 'groups_created_group',  'group_header_klout_save' );

// Retrieve the meta specific to the group

function plus_field_one() {
	global $bp, $wpdb;
	$field_one = groups_get_groupmeta( $bp->groups->current_group->id, 'group_plus_header_field-one' );
	return $field_one;
}

// Create the form to save the meta for the group

function group_header_klout_markup() {
global $bp, $wpdb;

 ?>
	<label for="group-field-one"><?php echo get_option('klout_group_label'); ?></label>
	<input type="text" name="group-field-one" id="group-field-one" value="<?php echo plus_field_one(); ?>" />
    <?php

}

// show the group klout score in group header
function show_field_in_header( $plus_field_meta ) {
	if ( plus_field_one() != '') { // check to see the klout field has data
		$plus_field_meta .= '<iframe src="http://widgets.klout.com/badge/'. plus_field_one() .'?size=s" style="border:0; display:block;" scrolling="no" allowTransparency="true" frameBorder="0" width="120px" height="61px"></iframe>'; }
	
	return $plus_field_meta;
}
add_filter( 'bp_get_group_description', 'show_field_in_header' );

// save the group header meta
function group_header_klout_save( $group_id ) {
	global $bp, $wpdb;

	$plain_fields = array(
		'field-one'
	);
	foreach( $plain_fields as $field ) {
		$key = 'group-' . $field;
		if ( isset( $_POST[$key] ) ) {
			$value = $_POST[$key];
			groups_update_groupmeta( $group_id, 'group_plus_header_' . $field, $value );
		}
	}
}



?>