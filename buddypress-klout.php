<?php

/* include the buddypress klout admin extension */
require ( dirname( __FILE__ ) . '/admin.php' );

/* Only include the working extensions dependant on admin options ( 'members' and 'groups' ) */

/* only include the member extension if enabled */

	if ( !$klout_members_extension_check ) {
		if ( !$klout_members_extension_check = get_option('members') )
			$klout_members_extension_check = ''; // the default
	}
	if ( $klout_members_extension_check == '1' ) {

require( dirname( __FILE__ ) . '/includes/klout-members-extension.php' );
	}


/* only include the group extension if enabled */

	if ( !$klout_group_extension_check ) {
		if ( !$klout_group_extension_check = get_option('groups') )
			$klout_group_extension_check = ''; // the default
	}
	if ( $klout_group_extension_check == '1' ) {



require( dirname( __FILE__ ) . '/includes/klout-groups-extension.php' );
	}

?>