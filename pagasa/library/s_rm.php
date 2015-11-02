
<?php
		$rm_results=false;
		$s_hint="<p class='refresh-box'><b><td>READING MATERIAL</td></tr><br>";
		$q_rm=mysql_query("select * from cat_reading_material_t where $rm");
	
		while($q_r=mysql_fetch_array($q_rm))
		{
			$rm_results=true;
			if($q_r['subtitle'])$colon=":"; else $colon="";
			
			$s_hint.="<tr>
						<td align='left'>
							&bull;
						<a href='cataloging1.php?vt=books&callno=".$q_r['call_no']."'>
								<strong>".ucwords($q_r['title']).$colon."</strong><font color='#000099'> <b> "
								.ucwords($q_r['subtitle'])."
							</a>
						</td>
					</tr><br>";
		}
		?>
		<?php
		$s_hint.="</p>";
		if(!$rm_results) $s_hint="";
		$hint.=$s_hint;
		$header="READING MATERIAL";
?>