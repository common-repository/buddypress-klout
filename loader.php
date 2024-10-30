<?php 
/**
Plugin Name: BuddyPress Klout
Plugin URI: http://buddypress.org/community/groups/buddypress-klout
Description: Let your members and groups show off their Klout.com scores. Using the klout.com/username widget, the plugin fetches your members and/or groups scores and displays them in the member's/group's header. 
Version: 1.1
Author: Charl Kruger
Author URI: Charlkruger.com
License:GPL2
**/

function bp_klout_init() {
	require( dirname( __FILE__ ) . '/buddypress-klout.php' );
}
add_action( 'bp_include', 'bp_klout_init' );

?>