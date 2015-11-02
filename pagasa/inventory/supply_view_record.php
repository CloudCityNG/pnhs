<!DOCTYPE html>
<?php
@session_start();
require ('../db/db.php');
if ($_GET['sd_id']) {
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
.style5 {font-size: 16px; color: #000000; }
.style6 {
	font-size: 24px;
	font-weight: bold;
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

      		
      		<p>&nbsp;</p>
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>VIEW RECORD</h3>
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
			$sd_id = $_GET['sd_id'];
				  $query = mysql_query("SELECT *
										FROM inventory_stock_t, supply_category_t, inventory_item_t, unit_t, supply_distribution_t, employee_t, supply_record_t, inventory_supplier_t, supply_type_t
										WHERE inventory_stock_t.unit_no = unit_t.unit_no
										AND inventory_stock_t.detail_no = supply_category_t.detail_no
										AND supply_category_t.item_no = inventory_item_t.item_no
										AND supply_record_t.stock_no = inventory_stock_t.stock_no
										AND supply_type_t.type_no = inventory_stock_t.type_no
										AND inventory_supplier_t.supplier_no = supply_record_t.supplier_no
										AND supply_distribution_t.emp_id = employee_t.emp_id
										AND supply_distribution_t.sd_id='$sd_id' 
										AND supply_record_t.record_id = supply_distribution_t.record_id ");
			  	    while($row = mysql_fetch_array($query)){
					   
			  ?>
              
              <p><table width="354" border="1" bordercolor="white" align="center">
               <tr bgcolor="#B1F3B4">
               <p class="style6">EMPLOYEE RECORD OF SUPPLY</p>
                <p>&nbsp;</p>
              <tr bgcolor="#B1F3B4">
                    <td width="170"><h5 align="left">Employee Name</h5></td><td width="220"><span class="style5"><?php echo ucfirst($row['f_name'])." ".ucfirst($row['m_name'])." ".ucfirst($row['l_name']);  ?></span></td>
              </tr>
              <tr bgcolor="#B1F3B4">
                    <td width="170"><h5 align="left">Stock no</h5></td><td width="220"><span class="style5"><?php echo $row['stock_no']; ?></span></td>
              </tr>
              <tr bgcolor="#B1F3B4">
                    <td><h5 align="left">Supplier</h5></td><td><span class="style5"><?php echo ucfirst($row['supplier_name']); ?></span></td>
              </tr>
                   <tr bgcolor="#B1F3B4">
                     <td><h5 align="left">Item</h5></td><td><span class="style5"><?php echo ucfirst($row['item_name']);; ?></span></td>
                  </tr>
                  
                  <tr bgcolor="#B1F3B4">
                    <td> <h5 align="left">Category</h5></td><td><span class="style5"><?php echo ucfirst($row['category']); ?></span></td>
                </tr>
                <tr bgcolor="#B1F3B4">
                    <td> <h5 align="left">Description</h5></td><td><span class="style5"><?php echo ucfirst($row['description']); ?></span></td>
                </tr>
                <tr bgcolor="#B1F3B4">
                    <td> <h5 align="left">Supply Type</h5></td><td><span class="style5"><?php echo ucfirst($row['type_name']); ?></span></td>
                </tr>
          		<tr bgcolor="#B1F3B4">
                    <td>  <h5 align="left">Amount</h5></td><td><span class="style5"><?php echo "Php ".$row['unit_amount'].".00";?></span></td>
                </tr>
                  <tr bgcolor="#B1F3B4">
                    <td> <h5>Quantity Received</h5></td><td><span class="style5"><?php echo $row['quantity'].ucfirst($row['unit_type']);;?></span></td>
                  </tr>
                  <tr bgcolor="#B1F3B4">
                    <td> <h5>Date Released</h5></td>
                    <td><span class="style5"><?php echo $row['date_recieved'];?></span></td>
                  </tr>
                
                <?php } ?> 
              </tr>
            </table>
				<p>&nbsp;</p>
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
<?php } ?>