<?php

// Klout Members Extension for Buddypress by Charl Kruger

// $show_klout_in_header - Display the klout widget using our xprofile data and return it in the members header

function show_klout_in_header() {

$klout_score= xprofile_get_field_data(get_option('klout_member_label')); //fetch the location field for the displayed user

	if ( $klout_score != "" ) { // check to see the klout field has data
?>
<iframe src="http://widgets.klout.com/badge/<?php echo $klout_score; ?>?size=s" style="border:0; display:block;" scrolling="no" allowTransparency="true" frameBorder="0" width="120px" height="61px">
</iframe>
<?php
	}

}
add_filter( 'bp_before_member_header_meta', 'show_klout_in_header' );


?>