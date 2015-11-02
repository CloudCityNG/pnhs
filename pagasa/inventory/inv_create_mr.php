<!DOCTYPE html>
<?php
@session_start();

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
    
   <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.sheepItPlugin.js"></script>

<script type="text/javascript">

$(document).ready(function() {
     
    var sheepItForm = $('#sheepItForm').sheepIt({
        separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        allowRemoveAll: true,
        allowAdd: true,
        allowAddN: true,
        maxFormsCount: 100,
        minFormsCount: 0,
        iniFormsCount: 0
    });
 
});

</script>
<style>

a {
    text-decoration:underline;
    color:#00F;
    cursor:pointer;
}

#sheepItForm_controls div, #sheepItForm_controls div input {
    float:left;    
    margin-right: 10px;
}


</style>

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
					<h3>CREATE MEMORANDOM OF RECEIPT</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<br />
			<div style="border:1px solid #000; width:auto; margin-left:auto; margin-right:auto;">
				<!-- sheepIt Form -->
									<div id="sheepItForm">
					<form method="post" action="actions/equip_createMR_action.php" name="reg" id="validation-form" class="form-horizontal" />
						<fieldset>
						<table class="table1" width="908" >
                          <tr>
                            <td colspan="8" style="background-color:#969696;font-size:30px;font-style:italic;"><p><strong>&nbsp;MR DETAILS</strong></p></td>
                          </tr>
                          <tr>
                            <td><div class="control-group">
                                <label class="control-label" for="email">STOCK NO.</label>
                                <div class="controls">
                                  <h4>
                                    <?php $stock_no = $_GET['stock_no']; echo "$stock_no" . "<br>"; ?>
                                    <input type="hidden" name="stock_no" value="<?php echo  $stock_no;?>">
                                    </h4>
                                </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div class="control-group">
                                <label class="control-label" for="email">EMPLOYEE NAME</label>
                                <div class="controls">
                					<select name="emp_id">
                  					<?php
				      					require "../db/db.php";
				      					$query = mysql_query("SELECT * FROM employee_t");
				      					echo "<option value='' selected='selected' disabled='disabled'>Select Employee</option>"; 
                      					while($row = mysql_fetch_assoc($query)){
						  					echo "<option value='".$row['emp_id']."' > ".$row['f_name']." ".$row["m_name"]." ".$row["l_name"] ;
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
                                  <div id="sheepItForm_add_n">
    								<input name="quantity" id="sheepItForm_add_n_input" type="text" size="4" >
    								<div id="sheepItForm_add_n_button" class="btn-small btn"><a><span>Add</span></a></div></div>
                                </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div class="control-group">
                                <label class="control-label" for="email">SERIAL NO.</label>
                                <div class="controls">
                                
  									<!-- Form template-->
  									<div id="sheepItForm_template">
                                  <input name="serial_no[]" type="text">
                                  </div>
                                  
                                    <!-- No forms template -->
  <div id="sheepItForm_noforms_template">Enter Quantity First</div>
  <!-- /No forms template-->
   
  <!-- Controls -->
  <div id="sheepItForm_controls">
   <!--  <div id="sheepItForm_add"><a><span>Add Item</span></a></div>
   <!--  <div id="sheepItForm_remove_last"><a><span>Remove</span></a></div> -->
   <div id="sheepItForm_remove_all"><a><span>Remove all</span></a></div>
    
  </div>
  <!-- /Controls -->
   
</div>
<!-- /sheepIt Form -->
                                </div>
                            </div></td>
                          </tr>
                           
                        </table>
                        
						<table class="table" width="auto" >
                        	<tr> </tr>                            
						</table>
                        
                        <table class="table" width="auto" >
						<tr>
                            <div align="center">
                            &nbsp;
                				<input name="reset" type="reset" value="Reset All" class="btn">
               					<input name="submit" type="submit" value="Save" class="btn btn-success">
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

<script src="../js/Application.js"></script>
<script src="js/validation.js"></script>

</body>
</html>
