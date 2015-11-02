<!DOCTYPE html>
<?php
@session_start();
require ('../db/db.php');

		date_default_timezone_set("Asia/Manila");
		if(isset($_POST['Enroll'])){
			$fname =$_POST['f_name'];
			$mname=$_POST['m_name'];
			$lname=$_POST['l_name'];
			$birthdate =$_POST['birthdate'];
			$city=$_POST['city'];
			$prov=$_POST['province'];
			$zipcode=$_POST['zipcode'];
			$brgy=$_POST['barangay'];
			$street=$_POST['street'];
		if(isset($_POST['gender'])){
			$gender=$_POST['gender'];
		}
		else{
			$gender=NULL;
		}
			$name_of_parent=$_POST['name_of_parent_guardian'];
		if(isset($_POST['Relation'])){
			$relation=$_POST['Relation'];}
		else{
			$relation=NULL;
			}
			$scholarship=$_POST['scholarship'];
			$last_sch_attended=$_POST['name_of_last_sch_attended'];
			$exam_result=$_POST['exam_result'];
			$dateEnrolled= date("Y-m-d");
		}
		
		if(isset($_POST['Enroll'])) {

		    $query_stud = mysql_query("INSERT into student_t VALUES('', 'new', '$fname', '$mname', '$lname', '$birthdate', '$city', '$prov', '$zipcode', '$brgy', '$street',  '$name_of_parent', '$relation', '$gender', '$scholarship', '$last_sch_attended', null, '$exam_result')") or die("error");
			$query_student=mysql_query("SELECT * from student_t");
			$query_sy=mysql_query("SELECT * from school_year_t where SY_status=1");
				while($row_student=mysql_fetch_assoc($query_student)) {
					$s_id=$row_student['student_id'];
				while ($row_sy=mysql_fetch_assoc($query_sy)) {
					$sy_id=$row_sy['sy_id'];
			}

			//$query1 = mysql_query("INSERT into student_t VALUES('', null, '$type', '$fname', '$mname', '$lname', '$birthdate', '$city', '$zipcode', '$brgy', '$street',  '$name_of_parent', '$relation', '$gender', '$scholarship', '$last_sch_attended', '$syg', null, '$id', '$exam_result')");
			//$query3=mysql_query("INSERT into student_t(student_id,f_name, birthdate, account_no) VALUES ('','$fname', '$birthdate', '$id')");
			
		
			$query_YL=mysql_query("SELECT * FROM year_level_t WHERE year_lvl=7 ");
				$row_YL=mysql_fetch_assoc($query_YL);
				$lvl_name=$row_YL['lvl_name'];

			$query5=mysql_query("INSERT into registration_t VALUES('', null, '$s_id', null, '$dateEnrolled', '$sy_id', '$lvl_name')");
			$queryfg=mysql_query("INSERT into final_grade_t VAlUES('','$s_id','$sy_id', null)");
			
				}
			//$query1 = mysql_query("INSERT into student_t VALUES('', null, '$type', '$fname', '$mname', '$lname', '$birthdate', '$city', '$zipcode', '$brgy', '$street',  '$name_of_parent', '$relation', '$gender', '$scholarship', '$last_sch_attended', '$syg', null, '$id', '$exam_result')");
			//$query3=mysql_query("INSERT into student_t(student_id,f_name, birthdate, account_no) VALUES ('','$fname', '$birthdate', '$id')");
			
		//header("Location: ../-registration/reg_home.php");
		}

		
//$type = $_SESSION['account_type'];
//$query = mysql_query("SELECT * FROM account WHERE type='$type'");
	
	
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
<title>Pagasa National Highschool:: Base Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
  
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../css/custom.css" rel="stylesheet" />

  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"></style>
<style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
		</style>
        
<style>

.table{
	font-family: Calibri;
	font-size: 12px;
	
}
.table1 {	font-family: Calibri;
	font-size: 12px;
}
</style>
</head>



<body>

<div class="main">


    <div class=""><div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="span12">
      	 <div class="main">

      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>VIEW ITEM</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #B1F3B4}
-->
</style>
<div align="center">
        </p>
 
        <?php
		
                          
				  error_reporting(0);
				  include ('../db/db.php');
	  			  if ($_GET['stock_no']) {	  
	  			  $stock_no = $_GET['stock_no'];
				  mysql_query("START Transaction");
					mysql_query("Auto-Commit = 'OFF'");
				  $query = mysql_query("SELECT * FROM equipment_record_t WHERE stock_no='$stock_no'");
			  	    while($row = mysql_fetch_array($query)){
					    $stock_no = $row['stock_no'];
						$unit=$row['unit'];
						$supplier_no = $row['supplier_no'];
						
						
					    $query =mysql_fetch_array( mysql_query("SELECT * FROM equipment_item_t WHERE stock_no='$stock_no'"));
				        $em_id = $query['item_id'];
						$category_id = $query['category_id'];
						$brand_id = $query['brand_id'];
						$color_id = $query['color_id'];
					      
						$query1 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_category_t WHERE category_id='$category_id'"));
				  		$item_name=$query1['item_name'];
						
						$query2 = mysql_fetch_array(mysql_query("SELECT * FROM inventory_supplier_t WHERE supplier_no='$supplier_no'"));
				  		$supplier_name=$query2['supplier_name'];
					
						
						$query3 =mysql_fetch_array(mysql_query("SELECT * FROM unit_t WHERE unit_no='$unit'"));
				   	    $unit_type = $query3['unit_type'];
						
						$query4 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_category_detail WHERE category_id='$category_id'"));
				  		$category=$query4['category'];
						
						$query5 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_color_t WHERE color_id='$color_id'"));
				  		$color_name=$query5['color_name'];
						
						$query6 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_item_t WHERE stock_no='$stock_no'"));
				  		$specs=$query6['specs'];
						
						$query7 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_record_t WHERE stock_no='$stock_no'"));
				  		$amount=$query7['amount'];
						
						$query8 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_record_t WHERE stock_no='$stock_no'"));
						$life_span=$query8['life_span'];
						
						$query9 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_record_t WHERE stock_no='$stock_no'"));
				  		$status=$query9['status'];
						
						 $date=$row["date_delivered"];
						$date_del = mysql_query("SELECT Year(date_delivered) As Year FROM equipment_record_t WHERE stock_no = '$stock_no'");
						$r_date = mysql_fetch_assoc($date_del);
						 mysql_query("Commit");
				  }
			  ?>
              
        <h1 class="style2"><?php echo strtoupper("$item_name"); ?></h1>
              <p><table width="354" border="1" bordercolor="white" align="center">
               <tr bgcolor="#B1F3B4">
                <p>&nbsp;</p>
              <p>&nbsp;</p>
               
              <tr bgcolor="#B1F3B4">
                    <td width="170"><div align="center">
                      <h5>Stock no</h5>
                    </div></td>
                    <td width="220"><?php echo "$stock_no";?></td>
                  </tr>
              <tr bgcolor="#B1F3B4">
                    <td><div align="center">
                      <h5>Supplier</h5>
                    </div></td>
                    <td><?php echo ucfirst("$supplier_name"); ?></td>
                  </tr>
                   <tr bgcolor="#B1F3B4">
                    <td><div align="center">
                      <h5>Item</h5>
                    </div></td>
                    <td><?php echo ucfirst("$item_name"); ?></td>
                  </tr>
                  <tr bgcolor="#B1F3B4">
                    <td><div align="center">
                      <h5>Brand</h5>
                    </div></td>
                    <td><?php echo ucfirst("$category"); ?></td>
                </tr>
                <tr bgcolor="#B1F3B4">
                    <td><div align="center">
                      <h5>Color</h5>
                    </div></td>
                    <td><?php echo ucfirst("$color_name"); ?></td>
                </tr>
              <tr bgcolor="#B1F3B4">
                    <td><div align="center">
                      <h5>Unit</h5>
                    </div></td>
                    <td><?php echo "$unit_type";?></td>
                  </tr>
          <tr bgcolor="#B1F3B4">
                    <td><div align="center">
                      <h5>Amount</h5>
                    </div></td>
                    <td><?php echo "$amount";?></td>
                </tr>
                  <tr bgcolor="#B1F3B4">
                    <td><div align="center">
                      <h5>Life span</h5>
                    </div></td>
                    <td><?php echo "$life_span";?></td>
                  </tr>
                  <tr bgcolor="#B1F3B4">
                    <td><div align="center">
                      <h5>Status</h5>
                    </div></td>
                    
                    <td><?php if(date('Y') <= ("$life_span"+$date)){ echo "Useful";} else {echo "Depreciated"; }?></td>

                  </tr>
                
                <?php } ?> 
              </tr>
                     <tr bgcolor="#B1F3B4">
                    <td><div align="center">
                      <h5>Specification</h5>
                    </div></td>
                    <td><?php echo "$specs";?></td>
                </tr>
            </table>
				</div>
				<!-- /widget-content -->
					
			</div> <!-- /widget -->					
			
	    </div> <!-- /span12 -->     	
      	
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
    
</div>
      	  <!-- /widget -->					
			
	    </div> 
      	<!-- /span12 -->     	
      	
      	
      </div> 
      <!-- /row -->

    </div> <!-- /container -->
    
</div>
<!-- /widget-content --><!-- /span6 -->
  <!-- /span6 -->
</div>
<!-- /row --></div>
<!-- /span6 -->
      <!-- /span6 -->
    </div>
    <!-- /row -->

<!-- /main --><!-- /extra -->


    
    
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


    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/libs/jquery-1.8.3.min.js"></script>
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
<script src="js/validation.js"></script>

</body>
</html>
