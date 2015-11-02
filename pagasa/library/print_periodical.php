<!DOCTYPE html>
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
    

<html lang="en">
<head>
  <meta charset="utf-8" />
<title>Pagasa National Highschool:: Base Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
  <link rel="stylesheet" href="cs2/css/style.css" type="text/css" media="screen" />

  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    <link href="../js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="../js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

  <link href="../css/base-admin-2.css" rel="stylesheet" />
  
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../css/custom.css" rel="stylesheet" />

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
<style>

body {
	line-height: 1;
	color: #51565b;
	background: #ffffff;
}

</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden"; 
window.print();
document.getElementById('printButton').style.visibility="visible";  
}

</script>
<link rel="stylesheet" href="cs2/css/social-icons.css" type="text/css" media="screen" />
<link rel="stylesheet" href="cs2/css/tabs.css" type="text/css" media="screen" />
		
</head>



<body>
    <a class="btn btn-mini" type="submit" value="Print" id="printButton" onClick="printpage()"> <img src="img/mono-icons/printer32.png" /><br>Print</a>

     
<?php    
	  error_reporting(0);
	  include ('db.php');
	 $call_no1 = $_GET['call_no'];
	$id=$call_no1;
	  $query=mysql_query("select * from cat_reading_material_t where call_no='$call_no1'");
	  while($q=mysql_fetch_array($query))
	  {
	  $pages=$q['pages'];
	  $size=$q['size'];
	  $unit=$q['unit'];
	  $subtitle=$q['subtitle'];	
	  $volume=$q['volume'];
	  $copyright=$q['copyright'];
	  $title=$q['title'];
	  $sec=$q['section_no'];
	  $pu_id=$q['publisher_id'];
	  $a_id=$q['author_id'];
	  $subject=$q['subject'];
	  $img=$q['image'];}
	  
	  $query1=mysql_query("select * from cat_section_t where section_no='$sec'");
	  while($qry=mysql_fetch_array($query1)){
	  $section_name= $qry['section_name'];
	  }
	  $qry1=mysql_query("select * from cat_publisher_t where publisher_id='$pu_id'");
	  while($qry2=mysql_fetch_array($qry1))
	  {
	  $pub_name= $qry2['pub_name'];
	  $street= $qry2['street'];
	  $city= $qry2['city'];
	  $country= $qry2['country'];
	  }
	  
	  $qry3=mysql_query("select * from cat_ddc_t where dec_no='$subject'");
	  while($qry4=mysql_fetch_array($qry3))
	  {
	  $class= $qry4['class'];
	  }
	 
	  $a=mysql_query("select * from cat_periodical_t where p_id='$call_no1'");
	  while($b=mysql_fetch_array($a))
	  {
	  $label= $b['label'];
	  $isbn= $b['issn'];
	  }
	  $c1=mysql_query("select * from cat_supplies_t where call_no='$call_no1'");
	  while($d=mysql_fetch_array($c1))
	  {
	  $supplier_name=$d['supplier_name'];
	  $datereceived= $d['date_received'];
	  $price= $d['unit_price'];
	  $quantity= $d['quantity'];
	  }
	  $unitprice=number_format($price, 2, '.', ',');
						
	 $author=mysql_query("SELECT call_no,GROUP_CONCAT(author_fname,' ',author_mname,' ',author_lname,' ',nameextention,'  ') as aut
  FROM (SELECT call_no,author_fname,author_mname,author_lname,nameextention,CONCAT(author_fname,' ',author_mname,' ',author_lname,nameextention,'+',COUNT(*)) as author_fname1
          FROM cat_author_t GROUP BY call_no,author_fname,author_mname,author_lname,nameextention) as x WHERE call_no='$call_no1' GROUP BY call_no");
while($d=mysql_fetch_array($author)){
		$author1=$d['aut'];
		}
		

	  ?><br><br>
    			
					<div class="main">
  <div  class="container">
     <img src="img/pnhs_logo.png" style="position:absolute;top:40px;right:700px">
<h4 align="center"> 	 
  PAG-ASA NATIONAL HIGH SCHOOL<br />Rawis, Legazpi, Albay</h4>
<h1 align="center" class="style16">Periodical<br><br></h1>    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"  width="50%" align="center" style="font-size:17px">
<thead>
		<tr align="center">
							<th width="150px">
                        
                            <?php if($img!=NULL){ ?>
 
							
								<a  href="../library/book/<?php echo $img; ?>" class="ui-lightbox" >
											<img src="../library/book//<?php echo $img; ?>">
                                            <img src="img/shadow-1-3.png">
																    
                                </a>
								
												<a href="../library/book/dpic//<?php echo $img; ?>-large" class="preview"></a>
                            
					       <?php } else {?>
                         		<img src="book/lol.jpg">;
							<?php } ?>
                       
                        
                          </div><!-- / modal -->
                  
                           
                            
                            
                            <th ><b style="font-size:25px; font-family:Courier New, "Courier",monospace"></b>
                           <div id="page-title">
							<span class="title"><?php echo $title; ?></span>
						 <br>	<span class="subtitle">"<?php echo"$subtitle"; ?>"
                          </th>
                           </span>
              </div>
            
              </tr>
              
                            	
	</thead>
    <tr>
<td>Call No.</td>
<td><?php echo"$call_no1"; ?></td></tr> 
<tr><td>Accession No:</td>
<td><?php
			  $acc=mysql_query("select * from cat_copies_t where call_no='$call_no1' and status='On Shelf'");
	  		 while($acce=mysql_fetch_array($acc)){
	 		 $access_no= $acce['access_no'];
	 		 echo"$access_no, "; }?>
             <?php
			  $acc=mysql_query("select * from cat_copies_t where call_no='$call_no1' and status='borrow'");
	  		 while($acce=mysql_fetch_array($acc)){
	 		 $access_no= $acce['access_no'];
	 		 echo"<font color='#0000FF'> $access_no, </font>"; }
			 $acc=mysql_query("select * from cat_copies_t where call_no='$call_no1' and status='lost'");
	  		 while($acce=mysql_fetch_array($acc)){
	 		 $access_no= $acce['access_no'];
	 		 echo"<font color='#FF0000'> $access_no, </font>"; }?>
	</td></tr>
    <tr><td>Title</td>
 <td><?php echo $title; ?></td></tr>
<tr><td>Subtitle</td>
<td><?php echo"$subtitle"; ?></td>       
 </tr>
 <tr><td>Label</td>
 <td><?php echo"$label"; ?></td></tr>
 <tr><td>Classification</td>
 <td><?php echo"$class"; ?></td></tr>
 <tr><td>Section:</td>
 <td><?php echo"$section_name"; ?> </td></tr>
 <tr><td>Author </td>
 <td><?php echo"$author1";?></td></tr>
 <tr><td>Publisher</td>
 <td><?php echo"$pub_name";?><br><?php  echo"$street"?>, <?php  echo"$city"; ?> ,<?php  echo"$country"; ?></td></tr>
 <tr><td>Copyright</td>
 <td><?php echo $copyright; ?></td></tr>
 <tr><td>Volume</td>
 <td>
			<?php if($volume!="") echo ''.$volume.","?> p. <?php echo $pages; ?> : <?php if($illustration!="") echo $illustration." :"; ?> <?php echo $size; ?>.</td></tr>
 <tr><td>ISBN</td>
 <td> <?php echo"$isbn;"?></td></tr>
 <tr><td>Supplier</td>
 <td> <?php echo $supplier_name; ?></td></tr>
 <tr><td>Date received</td>
 <td><?php echo $datereceived; ?></td></tr>
 <tr><td>Copies</td>
 <td><?php echo $quantity; ?></td></tr>
 <tr><td>Unit Price:</td>
 <td><?php 
 echo "Php.&nbsp;$unitprice"; ?></td></tr>
 </table>
   <div align="center">
     <br><br><p>Prepared by:</p>
     <br>
 <p> Mrs. Mary Ann O. Taduran<br>Librarian</p>
    <p align="right">&nbsp; 
                    
</p>
</div>

</div></div> </div></div>  </div>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
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

<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
			
		
	} );
	</script>

<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>


<script src="../js/plugins/validate/jquery.validate.js"></script>

<script src="../js/Application.js"></script>
<script src="validation.js"></script>
<script src="../js/plugins/msgGrowl/js/msgGrowl.js"></script>
<script src="../js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="../js/plugins/msgbox/jquery.msgbox.min.js"></script>

<script src="../js/demo/notifications.js"></script>
	
	</body>
</html>
