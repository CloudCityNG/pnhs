<?php
include('db.php');
include('functions.php');

$words=strip(@$_GET["q"]); //get the q parameter from URL
$c=@$_GET['c'];
$param="";

//cross search
for($x=0;$x<sizeof($words);$x++)
{
	if($words[$x]=="")
	{
		continue;
	}
	else
	{
		@$rm .="(title like '%$words[$x]%' or ";
		@$rm .="subtitle like '%$words[$x]%') AND ";
		@$b .="description like '%$words[$x]%' or ";
		@$b .="ibn like '%$words[$x]%' or ";
		@$p .="label like '%$words[$x]%' or ";
		@$p .="issn like '%$words[$x]%' or ";
		@$a .="author_lname like '%$words[$x]%' or ";
		@$a .="author_fname like '%$words[$x]%' or ";
		@$s .="class like '%$words[$x]%' or ";
	}
}
$rm=substr($rm,0,(strlen($rm)-4));
$b=substr($b,0,(strlen($b)-3));
$p=substr($p,0,(strlen($p)-3));
$a=substr($a,0,(strlen($a)-3));
$s=substr($s,0,(strlen($s)-3));
$hint="";
switch($c)
{
	case 'title':
		include('s_rm.php');
		break;
	case 'book':
		include('subject.php');
		break;
	case 'author':
		include('s_author.php');
		break;
	case 'subject':
		include('subject.php');
		break;
	case 'all':
		include('s_rm.php');
		include('s_author.php');
		include('subject.php');
		break;
}


// Set output to "no suggestion" if no hint were found
// or to the correct values
if($hint=="")
{

	echo "<p style='width:auto' class='graphite-box'><strong><font color='#FF0000'>0</font></strong> results found.<br />
			Try other keyword(s).</p>";
}
else
{
 echo"  $hint ";
}
//output the response
//echo $response;
exit;
?>
