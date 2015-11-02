	<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/library_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
  <meta charset="utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Pagasa National Highschool:: Base Admin</title>
  <!-- InstanceEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
  
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  	  
    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../css/custom.css" rel="stylesheet" />

<link rel="stylesheet" href="cs2/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="cs2/css/social-icons.css" type="text/css" media="screen" />
		
  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

  </style>
  
<style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
		
        
        </style>
<!-- InstanceBeginEditable name="head" -->
<link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

<!-- InstanceEndEditable -->
</head>
<body>

<div class="navbar navbar-inverse"  style="height:25px;">
<div id="overlay" >
</div>
    
    
    
  <div id="head" class="navbar-inner navbar-fixed-top" >
		
		<div class="container" >
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>
			</a>
			
			<a class="brand" href="../index.html">
				Pagasa National Highschool <sup>2.0.1</sup>
			</a>		
			
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Settings
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Account Settings</a></li>
							<li><a href="javascript:;">Privacy Settings</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li>
			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							Dick Dela Vega
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">My Profile</a></li>
							<li><a href="javascript:;">My Groups</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Logout</a></li>
						</ul>
						
					</li>
				</ul>
			    <!--
				<form class="navbar-search pull-right" />
					<input type="text" class="search-query" placeholder="Search" />
				</form>
				-->
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
<div class="subnavbar">
    <div class="hide">
    <img src="../images/banner.jpg">
    </div>
	<div class="subnavbar-inner" >
	
		<div class="container" >
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse" align="left">
			  
			 	<?php 
					require "db.php";
					
					$return_date =strtotime(date('Y-m-d'));
					$return_time = strtotime(gmdate('h:i:s',time()+28800));
					mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");

					$qry=mysql_query("SELECT * FROM `appraisal_t` WHERE return_time='0' and notification='not_seen'");
					$count=0;
					while($a=mysql_fetch_array($qry)){
					$b_time=strtotime($a['borrow_time']);
					$b_date=strtotime($a['borrow_date']);
					$access_no=$a['access_no'];
					$b=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
					$call_no=$b['call_no'];
					$c=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$call_no'"));
					$section_no=$c['section_no'];
					$d=mysql_fetch_array(mysql_query("SELECT * FROM `cat_section_t` WHERE section_no='$section_no'"));
					
					$time3=$d['time'];
					
					$time= $b_time+$b_date+$time3;
					$time2= $return_time+$return_date;
				
					if($time2 >= $time )
					{
					$count=$count+1; 
					}
					
				}
				
				

?>		
			<!-- InstanceBeginEditable name="navbar" -->

				<ul class="mainnav" >
               <li><a href="logs.php" ><i class="shortcut-icon icon-calendar"></i><span class="shortcut-label">Library Logs</span></a></li>
            <li class="active"><a href="book_borrow.php" ><i class="shortcut-icon icon-book"></i><span class="shortcut-label">Reading Material</span></a></li>
            <li><a href="report.php" ><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Report</span></a></li>
            <li><a href="statistic.php" ><i class="shortcut-icon icon-signal"></i><span class="shortcut-label">Statistic</span></a></li>
            <li><a href="notification.php" ><i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Notinifation</span></a></li>
            <li><a href="setting.php" ><i class="shortcut-icon icon-cog"></i><span class="shortcut-label">Setting</span></a></li>
 <!-- InstanceEndEditable -->
             
                        
			<div class="top-search">
						<form  method="get" id="searchform" action="search.php">
							<div>
								<input type="text" value="Search..." name="s" id="s" onFocus="defaultInput(this)" onBlur="clearInput(this)" />
								<input type="submit" id="searchsubmit" value=" " />
							</div>
						</form>
					</div>				
		
            
            
            	 </div> 
            <!-- /.subnav-collapse -->

		</div> <!-- /cont	ainer -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
 
<!-- smaller navbar-->

<div id="small-head" class="navbar navbar-inverse">
	
  <div class="navbar-inner" style="padding:0; padding-left:100px;background-color:#0C0; color:#000;">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>			</a>
			
				
		  <!--/.nav-collapse -->	
		</div> 
		<!-- /container -->
  </div> <!-- /navbar-inner -->
</div>

<!--/smaller navbar-->
<!-- InstanceBeginEditable name="content" -->
<?php
 error_reporting(0);
require "db.php";
$name = $_GET['s'];
$qry=mysql_query("SELECT * FROM cat_reading_material_t where title='$name' ");
while($q=mysql_fetch_array($qry))
{
$call_no=$q['call_no'];
}
@$b=mysql_fetch_array(mysql_query("SELECT * FROM cat_reading_material_t WHERE call_no='$call_no'"));
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

?>
	<?php
			
			if(@$_GET['vt']!='')
			{
				include('catalog.php');
			}
			if(@$_GET['author']!='')
			{
				include('view_author.php');
			}
		?>
    

    <!-- InstanceEndEditable -->
    
    
    				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p><br />
	      </p>
      </div> 
				<!-- /widget-content -->
					
	  </div><!-- /span6 --><!-- /span6 -->
    </div> 
      <!-- /row -->

  </div> 
    <!-- /container -->
    
</div> <!-- /main --><!-- /extra -->


    
    

<div class="footer">
		
	<div class="container">
		

	  <div class="row">
			
		<div id="footer-copyright" class="span6">
				&copy; 2012-13 BSIT-3C.
		</div> <!-- /span6 --><!-- /.span6 -->
			
	  </div> 
		<!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->

<br><br>
    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JS -->
		<script type="text/javascript" src="js1/js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js1/js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="js1/js/easing.js"></script>
		<script type="text/javascript" src="js1/js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="js1/js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="js1/js/custom.js"></script>
		
		<!-- Isotope -->
		<script src="js1/js/jquery.isotope.min.js"></script>
		
		<!--[if IE]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="js/DD_belatedPNG.js"></script>
			<script>
	      		/* EXAMPLE */
	      		//DD_belatedPNG.fix('*');
	    	</script>
		<![endif]-->
		<!-- ENDS JS -->
		
		
		<!-- Nivo slider -->
		<link rel="stylesheet" href="cs2/css/nivo-slider.css" type="text/css" media="screen" />
		<script src="js1/js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- ENDS Nivo slider -->
		
		<!-- tabs -->
		<link rel="stylesheet" href="cs2/css/tabs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js1/js/tabs.js"></script>
  		<!-- ENDS tabs -->
  		
  		<!-- prettyPhoto -->
		<script type="text/javascript" src="js1/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js1/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="cs2/css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="cs2/css/superfish-left.css" /> 
		<script type="text/javascript" src="js1/js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="js1/js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="js1/js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="js1/js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="js1/js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="js1/js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="cs2/css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="js1/js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
		<!-- Fancybox -->
		<link rel="stylesheet" href="js1/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js1/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<!-- ENDS Fancybox -->
		
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>

<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>

<script src="../js/Application.js"></script>

<script src="../js/charts/area.js"></script>
<script src="../js/charts/donut.js"></script>
<script type="text/javascript">
$(window).scroll(function() {

    //After scrolling 100px from the top...
    if ( $(window).scrollTop() >= 100 && false ) {
        //$('#head').css('display', 'none');
		//$('#small-head').css('position','fixed');

        //$('#menuheader').css('margin', '65px auto 0');

    //Otherwise remove inline styles and thereby revert to original stying
    } else {
        $('#head').attr('style', '');
		$('#small-head').attr('style', '');

    }
});

$(window).load(function(){
   
   // PAGE IS FULLY LOADED  
   // FADE OUT YOUR OVERLAYING DIV
   
   $('#overlay').fadeOut();

});
</script>
<!-- InstanceBeginEditable name="tail" -->
<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>

<!-- InstanceEndEditable -->
</body><!-- InstanceEnd -->