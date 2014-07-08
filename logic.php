<?php 
/*testing for inital value, if set then assign variable if not set set defaults*/
if (isset($_GET['word_count'])) 
{
	$word_count = $_GET['word_count'];
}
else {
	$word_count = 4;
}
if (isset($_GET['maximum_length']))
{
	$maximum_length = $_GET['maximum_length'];
}
else {
	$maximum_length = 50;
	
}
//if separators is initialized fill values and set counter
if (isset($_GET['separators'])) {
	if($_GET['separators'] = "yes"){
	$symbols = array('-','&','^','%','$','#','!',);
	$symbol_count = count($symbols);
	}
	elseif($_GET['separators'] = "no") {
		$symbols = array('',);
		$symbol_count = 1;
	}
}
/*if not default to no set -- probably could have figured out something more elegant but I was under the wire*/
else {
$symbols = array('',);
$symbol_count = 1;
}

//initializing variables and arrays
$redneck_names = file("data/redneck_names.php");
$redneck_items = count($redneck_names);
$words = array("");
$separator = array("",);
$initial_password = "";

//build password
for ($i = 0; $i < $word_count ; $i++) 
{
$words[$i] = $redneck_names[rand(0,$redneck_items - 1)];
$initial_password = $initial_password.$words[$i].$seperator[rand(0, $symbol_count - 1)];
}

if (strlen($final_password) < $maximum_length) {
	$limits = strlen($initial_password) - $maximum_length;
	$final_password = substr($initial_password, 0, -$limits);
}
else {
	$final_password = $initial_password;
}
