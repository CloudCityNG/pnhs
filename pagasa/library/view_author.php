<?php
$author_id=$_GET['author'];
if($author_id!='')
{
	$get_au=mysql_fetch_array(mysql_query("SELECT * FROM tbl_author WHERE AuthorID='$author_id'"));
	?>
    Other Materials by:
    <table width="100%"><tr><td colspan="2" align="center">
	<h1 id="author_style"><?php
    echo ucfirst($get_au['l_name']).", ".ucfirst($get_au['f_name']);
	?>
    </h1></td></tr>
    <?php
	$q=mysql_query("SELECT * FROM tbl_writes WHERE AuthorID='$get_au[AuthorID]'");
    while($w=mysql_fetch_array($q))
    {
    	$n=mysql_fetch_array(mysql_query("SELECT * FROM  tbl_reading_material WHERE RMID='$w[RMID]'"));
		$id=$n['RMID'];
		if(mysql_fetch_array(mysql_query("SELECT * FROM tbl_book WHERE BID='$id'")))
		{
			$link="?vt=books&rm=".$id;
		}
		else if(mysql_fetch_array(mysql_query("SELECT * FROM tbl_periodicals WHERE PID='$id'")))
		{
			$link="?vt=periodicals&rm=".$id;
		}
		else
		{
			continue;
		}
		?>
        <tr align="center">
        <td>&bull; <a id="black_link" href="<?php echo $link; ?>"><?php echo ucfirst($n['Title']); ?></a></td>
        </tr>
        <?php
	}
	?>
	<?php
}
?></table>