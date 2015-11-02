<?php
include("connect.php");
$rm=@$_GET['rm'];
@$b=mysql_fetch_array(mysql_query("SELECT * FROM cat_reading_material_t WHERE rm_id='$rm'"));
@$title=ucwords(@$b['title']);
if(@$b['subtitle']!="") @$s_title=" - ".ucwords($b['subtitle']);
$cn=@$b['call_no'];
$pg=@$b['pages'];
$vol=@$b['volume'];
$cp=@$b['copyright'];
$size=@$b['size'];
$subj=@$b['subject'];
$au=@$b['author_id'];
$pi=@$b['publisher_id'];

@$a_n=mysql_fetch_array(mysql_query("SELECT author_fname, author_mname, author_lname FROM cat_reading_material_t WHERE author_id = '$au'"));
$a_l=@$a_n['author_lname'];
$a_f=@$a_n['author_fname'];
$a_m=@$a_n['author_mname'];


@$pu=mysql_fetch_array(mysql_query("SELECT * FROM cat_publisher_t WHERE publisher_id='$pi'"));
$p_cn=@$pu['pub_name'];
$p_s=@$pu['street'];
$p_c=@$pu['country'];
$p_ct=@$pu['city'];


if(@$_GET['vt']=="books")
{
	@$bo=mysql_fetch_array(mysql_query("SELECT * FROM cat_books_t WHERE book_id='$rm'"));
	$ed=@$bo['edition'];
	$isbn=@$bo['isbn'];
	$ill=@$bo['illustration'];
}

if(@$_GET['vt']=="periodicals")
{
	@$pe=mysql_fetch_array(mysql_query("SELECT * FROM cat_periodical_t WHERE p_id='$rm'"));
	$la=@$pe['label'];
	$d=@$pe['date_of_issue'];
	$issn=@$pe['issn'];
}
if(@$_GET['act']=='print')
{
	$w='100';
	echo "<br /><br /><br /><br /><br /><br /><br />";

}else $w='100%'
?>

<table border="2" bordercolor="#000000" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="480px" height="288px" style="color:#000; font-family:'Century Gothic'">
	<tr>
    	<td style="border-right:none; border-bottom:none">&nbsp;&nbsp;&nbsp;</td>
    	<td style="border-right:none; border-left:none; border-bottom:none" valign="top" align="left" width="20%">
			<strong style="font-size:20px"><strong><?php echo "   ".$subj; ?></strong><br />
<?php echo $cn; ?></strong>
        </td>
        <td style="border-left:none; border-bottom:none" width="80%"><strong><?php echo ucfirst($a_l).", ".ucfirst($a_f); ?></strong>
          <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $title.$s_title; ?> <!--/ by <?php echo ucfirst($a_f)." ".ucfirst($a_l); ?>.--> -- <?php echo $ed; ?> 
            ed. <br />
            <?php echo $p_c; ?>: <?php echo $p_cn; ?>,<br />
			c<?php echo $cp; ?>.
            <br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($vol!="") echo "vol. ".$vol.","?> <?php echo $pg; ?>p. : <?php if($ill!="") echo $ill." :"; ?> <?php echo $size; ?>.
            <br /><br /><br />
            Bibliography: p.470-494.<br />
            Includes index.
            <?php
            if($isbn!="")
			{
				if(strlen($isbn)==13)
				{
					?>
            	<br />ISBN <strong><?php echo substr($isbn,0,3)."-".substr($isbn,3,1)."-".substr($isbn,4,3)."-".substr($isbn,7,5)."-".substr($isbn,12,1); ?></strong>
				<?php
				}
				else if(strlen($isbn)==10)
				{
					?>
            	<br />ISBN <strong><?php echo substr($isbn,0,1)."-".substr($isbn,1,4)."-".substr($isbn,5,4)."-".substr($isbn,9,1); ?></strong>
				<?php
				}
            }
			else { ?><br />ISSN <strong><?php echo $issn; ?></strong> <?php } ?>
            <br />
    	</td>
	</tr>
    <tr><td style="border-top:none; border-bottom:none;" colspan="3" align="center"><strong>O</strong></td>
    <tr><td style="border-top:none; " colspan="3" align="center"><strong></strong></td>
    </tr>
</table>
<?php
$link='?vt='.@$_GET['vt'].'&rm='.@$_GET['rm'].'&action=more'.'#more';

if(@$_GET['act']!="print")
{
?>
<hr color="#0000FF" />
<?php 
if(@$_GET['action']!='more')
{
	?>
    <center>
    <!--
  <h4 style="font-weight:100">[<a id="blue_link" target="_new" href="<?php echo "imports/print.php?vt=".$_GET['vt']."&rm=".$_GET['rm']."&act=print"; ?>">PRINT CATALOG</a>][<a id="blue_link" href="<?php echo $link; ?>">MORE INFO...</a>]</h4></center>--<?php
}
if(@$_GET['action']=='report')
{
	echo 'now';
	include('lost.php');
	echo 'Now';
}
//more info

if(@$_GET['action']=='more')
{
	?>
    <a id="more"><h2>Other Information on this Material</h2></a>
<?php $r=@$_GET['rm']; ?>
<p align="left">

<table bgcolor="#CCCCCC" align="center" width="90%">
<tr><td colspan="8" align="center" bgcolor="#3399CC"><strong>Copies</strong><br /></td></tr>
<tr>
<td bgcolor="#FFFFFF">Borrowed:</td><td><strong><?php echo n_by_stat('OnLoan',$r); ?></strong></td>
<td bgcolor="#FFFFFF">Available:</td><td><strong><?php echo n_by_stat('OnShelf',$r); ?></strong></td>
<td bgcolor="#FFFFFF">Reserved:</td><td><strong><?php echo n_by_stat('Reserved-Periodical',$r); ?></strong></td>
<td bgcolor="#FFFFFF">Donated:</td><td><strong><?php echo n_by_stat('Donated',$r); ?></strong></td>
</tr>
</table>
<?php
}
}