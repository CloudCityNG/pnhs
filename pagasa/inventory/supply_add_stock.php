<!DOCTYPE html>

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

<?php
	  error_reporting(0);
	  include ('../db/db.php');
	  if ($_GET['stock_no']) {	  
	  $stock_no = $_GET['stock_no'];	  
	  ?>
        
		  	<?php
	  		$data = "SELECT * FROM inventory_stock_t, supply_category_t, inventory_item_t, supply_type_t, unit_t
				WHERE inventory_stock_t.stock_no = '$stock_no'
				AND inventory_stock_t.detail_no = supply_category_t.detail_no
				AND inventory_stock_t.unit_no = unit_t.unit_no
				AND supply_category_t.item_no = inventory_item_t.item_no
				AND inventory_stock_t.type_no=supply_type_t.type_no";
	  		
			$res = mysql_query($data);
			$row = mysql_fetch_array($res);
			?>

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
					<h3>ADD NEW STOCK</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<br />
			<div style="border:1px solid #000; width:auto; margin-left:auto; margin-right:auto;">

					<form method="post" action="actions/supply_add_stock_action.php" name="reg" id="validation-form" class="form-horizontal" />
						<fieldset>
						<table class="table1" width="908" >
                          <tr>
                            <td colspan="8" style="background-color:#969696;font-size:30px;font-style:italic;"><p><strong>&nbsp; SUPPLY DETAILS</strong></p></td>
                          	</tr>
                            	<td>&nbsp; &nbsp; <h5>Stock Number: <?php echo $stock_no; ?>
                           		    <input type="hidden" name="stock_no" value="<?php echo $stock_no; ?>"> 
                           		    </h4>
                            	</h5></td>
								<td>&nbsp; <h5>Item: <?php echo strtoupper($row["description"]." ".$row["category"]." ".$row["item_name"]); ?> </h5></td>
                          	</tr>
            				<tr>
                            	<td>&nbsp; &nbsp; <h5>Unit: <?php echo strtoupper($row["unit_type"]); ?> </h5></td>
                            	<td>&nbsp; <h5>Type: <?php echo strtoupper($row["type_name"]); ?> </h5></td>
                            </tr>
                          
                          
                        
                          <tr>
                            <td colspan="8" style="background-color:#969696;font-size:30px;font-style:italic;"><p><strong>&nbsp; ADDED DETAILS</strong></p></td>
                          </tr>
                          <tr>
                            <td><div class="control-group">
                                <label class="control-label" for="name">REQUISITION AND ISSUE SLIP</label>
                                <div class="controls"><br>
                                  <input type="text" name="ris_no" placeholder="Enter RIS No." >
                                </div>
                            </div></td>
                         
                            <td><div class="control-group">
                                <label class="control-label" for="email">RESPONSIBLITY CENTER CODE</label>
                                <div class="controls"><br>
                                  <input type="text" name="rcc" placeholder="Enter RCC">
                                </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div class="control-group">
                                <label class="control-label" for="email">UNIT COST</label>
                                <div class="controls">
                                  <input name="unit_amount" type="text" placeholder="Enter Unit Cost">
                                </div>
                            </div></td>
                            
                            <td><div class="control-group">
                                <label class="control-label" for="email">SUPPLIER</label>
                                <div class="controls">
                                  <select name="supplier">
				        			<?php
  										include('../db/db.php');
										$sql = "select * from inventory_supplier_t";
										$unit   = mysql_query($sql);
  										echo "<option value='' selected='selected' disabled='disabled'>Select Supplier</option>";
  										while($row = mysql_fetch_array($unit))
  										{
  										  echo "<option value='".$row['supplier_no']."'>".ucfirst($row['supplier_name'])."</option>";
										}
  									?>
		      	    			  </select>
                                </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div class="control-group">
                                <label class="control-label" for="email">QUANTITY</label>
                                <div class="controls">
                                  <input name="quantity" type="text" placeholder="Enter Quantity">
                                </div>
                            </div></td>
                          </tr>
                        </table>
						<table class="table" width="auto" ><tr></tr>
						</table>
                        <table class="table" width="auto" >
						<tr>
                            <div align="center">
                            &nbsp;
                				<input name="reset" type="reset" value="Reset All" class="btn">
               					<input name="submit" type="submit" value="Add New Stock" class="btn btn-success">
              				</div>
					    </tr>
                        </table>
                         
				    	</fieldset>
					</form>
					
                  </div>
				</div> <!-- /widget-content -->
					
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

<?php } ?>
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
