
<?php
		$s_results=false;
		$s_hint="<p class='right-box'><td><tr bgcolor='black' style='color:white;'> SUBJECT</tr></td><br>";
		$subject=mysql_query("select * from cat_ddc_t where $s");
		
		while($su=mysql_fetch_array($subject))
		{
			$class=mysql_query("SELECT * FROM cat_reading_material_t WHERE subject='$su[dec_no]'");
			if(mysql_num_rows($class)!=0)
			{
				$s_results=true;
				$s_hint.="<tr><td align='left'>&bull; <font color='#4189A5'> "
				.$su['class']."</td></tr><br>";
				while($cl=mysql_fetch_array($class))
				{
					$s_hint.="<tr><td align='left'>&bull;
					&nbsp;&nbsp;&nbsp;</font>- "	
					."<strong><a href='cataloging1.php?callno=".$cl['call_no']."'><font color='#000099'> <b>"
					.$cl['title']."</a></strong></font>"
					."</td></tr><br>";
				}
			}
			
			else
			{
				continue;
			}
		}
		$s_hint.="</p>";
		if(!$s_results) $s_hint="";
		$hint.=$s_hint;
		$header="SUBJECT";
?>