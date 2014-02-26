<?php
/*
 * script to remove unnecessary divs and style from LibGuides API call when all you are after is the html - js 15/01/2013
 *
*/

include_once('simple_html_dom.php');

	// set the header as javascript
header('Content-Type: text/javascript; charset=UTF-8');

	// pass in the bid and the iid of the api box
function libGStrip($bid, $iid){
	
		// construct the api call url based on the iid and bid values
	$url = 'http://api.libguides.com/api_box.php?iid='.$iid.'&bid='.$bid;

		// parse the api url
	$html = file_get_html($url);

		// get the inner elements of the api box 
	$clean = $html->getElementById("content".$bid)->innertext;
	
		// format the result into JavaScript
	echo 'document.writeln(\' '.$clean.' \');';

		// clean up when finished
	$html->clear(); 
	unset($html);
}

	// get the iid parameter value
$iid = $_GET['iid'];

	// get the bid parameter value
$bid = $_GET['bid'];

	// call the function based on the values
libGStrip($bid, $iid);

?>



