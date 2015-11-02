<!DOCTYPE html>

<html lang="en"><!-- InstanceBegin template="/Templates/library_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
  <head>
 <?php
 require "db.php";
 
@session_start();	
if (!isset($_SESSION['username'])) {
	header("location: ../restrict.php"); // IMPORTANT!!!!
}
include_once "../actions/user_priviledges.php";

$developer = is_privileged($_SESSION['account_no'], 1);
$super_admin = is_privileged($_SESSION['account_no'], 2);
$librarian = is_privileged($_SESSION['account_no'], 8);

?>
    <meta charset="utf-8" />
    <!-- InstanceBeginEditable name="doctitle" -->
  <title>Pagasa National Highschool:: Base Admin</title>
  <!-- InstanceEndEditable -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
    
    <link href="../css/base-admin-2.css" rel="stylesheet" />
    <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
    <link href="../css/pages/dashboard.css" rel="stylesheet" />   

    <link href="../css/custom.css" rel="stylesheet" />
<link href="../js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="../js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	


<link rel="stylesheet" href="cs2/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="cs2/css/social-icons.css" type="text/css" media="screen" />
		
  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
  .navbar.navbar-inverse .navbar-inner .container .nav-collapse.collapse .blck .active a{
	color: #FFF;
	background-color: #063;
}
  .navbar.navbar-inverse .navbar-inner .container .nav-collapse.collapse .blck a{
	color: #000;
}
  </style> 
<style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
		
        
        </style>
<!-- InstanceBeginEditable name="head" --><link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
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
							<?php echo $_SESSION['username'];?>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">My Profile</a></li>
							<li><a href="javascript:;">My Groups</a></li>
							<li class="divider"></li>
							<li><a href="../actions/logoutprocess.php">Logout</a></li>
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

	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse">
			  
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
                    <li> <a href="../home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
        
            <li class="dropdown "><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
			<i class="shortcut-icon icon-signal"></i><span class="shortcut-label">Statistics</span></a>
           
						<ul class="dropdown-menu">
							<li><a href="statistic.php">Book</a></li>
							<li><a href="statistic_borrow.php">Borrower</a></li>
							<li><a href="statistic_logs.php">Logs</a></li>
						</ul> 
            </li>
  
         <?php if($developer || $super_admin || $librarian){?>
               <li class=""><a href="logs.php" ><i class="shortcut-icon icon-calendar"></i><span class="shortcut-label">Library Logs</span></a></li>
        <?php } ?>
        <?php if($developer || $super_admin || $librarian){?>
            <li ><a href="book_borrow.php" ><i class="shortcut-icon icon-book"></i><span class="shortcut-label">Reading Material</span></a></li>
        <?php } ?>
        <?php if($developer || $super_admin || $librarian){?>
            <li><a href="report.php" ><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Report</span></a></li>
        <?php } ?>
        <?php if(!$developer && !$super_admin && !$librarian){?>
            <li><a href="account.php" ><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Account</span></a></li>
        <?php } ?>
              <li class="active"><a href="status.php"><i class="shortcut-icon icon-pencil"></i><span class="shortcut-label">Status</font></span></a></li>
   
  <?php if($developer || $super_admin || $librarian){?>
  <li><a href="notification.php" ><i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Notification&nbsp;<?php if($count >= 1){ echo"<font color='#00FF00'> ($count)";} else{}?></font></span></a></li>
            <li ><a href="setting.php" ><i class="shortcut-icon icon-cog"></i><span class="shortcut-label">Setting</span></a></li>
  
    <?php } ?>
       <!-- InstanceEndEditable -->
  	        			 <?php include("livesearch.php");?>
   
   	<form class="navbar-search pull-right" method="post" name="form1" id="searchform" action="#"/>
	  <select style="width:auto; height:auto; background-color:#CCCCCC; border-color:#666666" id="text" type="select" name="category"   onBlur="clearInput(this)" >
                <option value="all"><center>ALL</center></option>
                <option value="title"><center>TITLE</center></option>
                <option value="author"><center>AUTHOR</center></option>
                <option value="subject">SUBJECT</option>
	        </select>
            	<input type="text" class="search-query" placeholder="Search"  name="s" id="s"  onBlur="clearInput(this)" onKeyUp="showHint(this.value)" />
								<input type="submit" id="searchsubmit" value=" " />
							
	</form>
   
    
				  
 	
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

<!-- MAIN -->
			<div id="main">
				<!-- wrapper-main -->
				<div class="wrapper">
					
					
					<!-- content -->
					<div id="content">
						
		
						<!-- page-content -->
						<div id="page-content">                 

                       <!-- title -->
          <div id="result"></div>
						<div id="page-title">
							<span class="title">Status</span>
							<span class="subtitle"><br>"From fire, water, the passage of time, neglectful readers,<br> and the hand of the censor,each of my books has escaped to tell me its story.” 
<br>― Alberto Manguel The Library at Night 
						</span>
						</div>
						<!-- ENDS title -->	
        <div class="widget stacked">
        <div class="widget-header" style="height:auto"> 
        <i ></i>
          <h3></a></h3>
        
        </div>
        <!-- /widget-header -->
  <div class="widget-content">
                
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" width="101%">
<thead>
		<tr align="center">
						 <th width="250">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Title</th>
                         <th width="30">&nbsp;&nbsp;&nbsp;&nbsp;Cover</th>
                        <th width="60">&nbsp;&nbsp;On Shelf</th>
                        <th width="60">&nbsp;&nbsp;&nbsp;&nbsp;Borrow</th>
						<th width="60">&nbsp;&nbsp;&nbsp;&nbsp;Lost</th>
                        <th width="60">&nbsp;&nbsp;&nbsp;&nbsp;Total</th>
                    	
              </tr>              	
	</thead>
    
    
  <?php 
 error_reporting(0);
require "db.php";
mysql_query("start transaction");
mysql_query("Auto-Commit='off'");

$qry=mysql_query(" SELECT *, count(*)  as count FROM cat_copies_t   GROUP BY call_no");
	$herf=status;
	while($q=mysql_fetch_array($qry))
	{
	$callno=$q['call_no'];
	$q2=mysql_fetch_array(mysql_query("select * from cat_reading_material_t where call_no='$q[call_no]'"));
	$ava=mysql_fetch_array(mysql_query("select count(*) as status from cat_copies_t where call_no='$q[call_no]' and status='On shelf'"));
	$borrow=mysql_fetch_array(mysql_query("select count(*) as status from cat_copies_t where call_no='$q[call_no]' and status='borrow'"));
	$lost=mysql_fetch_array(mysql_query("select count(*) as status from cat_copies_t where call_no='$q[call_no]' and status='lost'"));
	$count=$q[count];
	$title=$q2[title];
	$img=$q2['image'];
	$call_no=$q2['call_no'];
	$id=$call_no;
	$ava=$ava[status];
	$borrow=$borrow[status];
	$lost=$lost[status] ;
	$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$call_no'"));
	$book1 =$book2['book_id'];
	                                            
	mysql_query("Commit");
	  
	  echo" <tr>";
	   if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$call_no";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$call_no";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title; ?> </a></div></td>
			<?php }
		
	  echo"<td><div align='center'>"; if($img!=NULL){ ?>
 
							
								<a href="../library/book/<?php echo $img; ?>" class="ui-lightbox">
									<img  src="../library/book//<?php echo $img; ?>" width="50" height="50">
								</a>
								
											<a href="../library/book/dpic//<?php echo $img; ?>-large" class="preview"></a>
				
                           <?php } else {?>
                    <?php if($developer ||  $super_admin ||  $librarian){?>
       				   
                     	<a class="btn btn-mini" data-toggle="modal" href="#add_image<?php echo $id;?>"><i class="icon-plus"></i>Add Image</a>
                       	</td>   
        				<div class="modal fade hide" id="add_image<?php echo $id?>">
                          	<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>ADD IMAGE for <?php echo $id;?></h3>
                          	</div> 
                          				<div class="modal-body">
                                             <form style="text-align:center" action="reg_image-action2.php<?php echo "?id=$id"; ?>"  method="post"   enctype="multipart/form-data">
											 <center><input  type="file" name="image" id="image" /></center><br />
                                             <center><input type="submit" name="upload" value ="Upload Now"> </center>      
                                			 </form>
                                		</div><!-- /modal-body-->
							 </div> 
				<?php }} ?>
   </td> 
  <td><div align='center'>
    			<a   data-toggle="modal"  href="#ava<?php echo "$call_no";?>"> <?php echo $ava;?></a>
     
                                                <div class="modal fade hide" id="ava<?php echo "$call_no";?>">
                          						<div class="modal-header">
                            					<button type="button" class="close" data-dismiss="modal">&times;</button>
                            					<h3>Available Book ID</h3>
                          						 </div> 
                  						        <div class="modal-body">
                                               <h6> <?php
												$qry1=mysql_query("SELECT * FROM cat_copies_t WHERE call_no='$call_no' AND status='On Shelf'");
												while($q1=mysql_fetch_array($qry1))
												{
												$t=$q1['access_no'];
												echo"$t <br>";
												}?>
                                     			</h6>
	</div></div><!-- /modal-body-->
    											</div>
				  </div></td>
				  <td><div align='center'>
    			<a   data-toggle="modal"  href="#borrow<?php echo "$call_no";?>"> <?php echo $borrow;?></a>
     
                                                <div class="modal fade hide" id="borrow<?php echo "$call_no";?>">
                          						<div class="modal-header">
                            					<button type="button" class="close" data-dismiss="modal">&times;</button>
                            					<h3>Borrowed Book ID</h3>
                          						 </div> 
                  						        <div class="modal-body">
                                               <h6> <?php
												$qry1=mysql_query("SELECT * FROM cat_copies_t WHERE call_no='$call_no' AND status='borrow'");
												while($q1=mysql_fetch_array($qry1))
												{
												$t=$q1['access_no'];
												echo"$t <br>";
												}?>
                                     			</h6>
	</div></div><!-- /modal-body-->
    											</div>
				  </div></td><td><div align='center'>
    			<a   data-toggle="modal"  href="#lost<?php echo "$call_no";?>"> <?php echo $lost;?></a>
     
                                                <div class="modal fade hide" id="lost<?php echo "$call_no";?>">
                          						<div class="modal-header">
                            					<button type="button" class="close" data-dismiss="modal">&times;</button>
                            					<h3>Lost Book ID</h3>
                          						 </div> 
                  						        <div class="modal-body">
                                               <h6> <?php
												$qry1=mysql_query("SELECT * FROM cat_copies_t WHERE call_no='$call_no' AND status='lost'");
												while($q1=mysql_fetch_array($qry1))
												{
												$t=$q1['access_no'];
												echo"$t <br>";}
												?>
                                     			</h6>
	</div></div><!-- /modal-body-->
    											</div>
				  </div></td>

	
				  </div></td><td><div align='center'>
    			<a   data-toggle="modal"  href="#total<?php echo "$call_no";?>"> <?php echo "$count";?></a>
     
                                                <div class="modal fade hide" id="total<?php echo "$call_no";?>">
                          						<div class="modal-header">
                            					<button type="button" class="close" data-dismiss="modal">&times;</button>
                            					<h3>Total Book ID</h3>
                          						 </div> 
                  						        <div class="modal-body">
                                               <h6> <?php
												$qry1=mysql_query("SELECT * FROM cat_copies_t WHERE call_no='$call_no'");
												while($q1=mysql_fetch_array($qry1))
												{
												$t=$q1['access_no'];
												$s=$q1['status'];
												if($s == 'borrow')
												{ echo"<font color='#0000FF'> $t </font><br>";}
												else if($s == 'lost')
												{echo"<font color='#FF0000'> $t </font><br>";}
												else{		echo" $t <br>";}
												}?>
                                     			</h6>
	</div></div><!-- /modal-body-->
    											</div>
				  </div></td>
      </tr>           
<?php }?> </table>
					</div>
						<!-- ENDS page-content -->
					</div>
					<!-- ENDS content -->
				</div>
				<!-- ENDS wrapper-main -->
			</div>
			<!-- ENDS MAIN -->
			
 	
					
					
					





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

<script src="../js/plugins/validate/jquery.validate.js"></script>

<script src="../js/Application.js"></script>
<script src="validation.js"></script>
<script src="../js/plugins/msgGrowl/js/msgGrowl.js"></script>
<script src="../js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="../js/plugins/msgbox/jquery.msgbox.min.js"></script>

<script src="../js/demo/notifications.js"></script>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->