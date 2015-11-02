
</style><?php
		$a_results=false;
		$s_hint="<p style='width:auto' class='green-box'><tr ><td>AUTHOR</td></tr><br>";
$author=mysql_query("SELECT call_no,GROUP_CONCAT(author_fname,' ',author_mname,' ',author_lname,' ',nameextention,'  ') as aut
  FROM (SELECT call_no,author_fname,author_mname,author_lname,nameextention,CONCAT(author_fname,' ',author_mname,' ',author_lname,nameextention,'+',COUNT(*)) as author_fname1
          FROM cat_author_t GROUP BY call_no,author_fname,author_mname,author_lname,nameextention) as x
where $a GROUP BY call_no");
		$numauthor=mysql_num_rows($author);
		for($r=0;$r<$numauthor;$r++)
			{
				$last=mysql_result($author, $r, "aut");
				$callno=mysql_result($author, $r, "call_no");
				//$mname=mysql_result($author, $r, "author_mname");
				//$given=mysql_result($author, $r, "author_lname");
				//$xname=mysql_result($author, $r, "nameextention");
				//$callno=mysql_result($author, $r, "call_no");
				$title=mysql_query("select * from cat_reading_material_t where call_no='$callno'");
				while($title1=mysql_fetch_array($title))
				{$tit=$title1['title'];
			$a_results=true;
				$s_hint.="<tr><td align='left'>&bull;<a href='cataloging1.php?vt=books&callno=$callno'>
	<strong>"
							.ucwords($last).
					"- &nbsp;<font color='#000099'>".ucwords($tit)."</font></td></tr><br>";
		
			}}
		
		$s_hint.="</p>";
		if(!$a_results) $s_hint="";
		$hint.=$s_hint;
		$header="AUTHOR";
?>
