<?php
//functions

function strip($k)
{
	//remove left spaces
	$k=ltrim($k);
	//remove right spaces
	$k=rtrim($k);
	@$words=split(' ',$k);
	
	return @$words;
}
?>