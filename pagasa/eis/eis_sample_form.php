<!DOCTYPE html>
<?php 
 @session_start();
 


?>

<html lang="en"><!-- InstanceBegin template="/Templates/eis_admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../css/custom.css" rel="stylesheet" />

  <link>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">

  </style>
  <style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
  </style>
<!-- InstanceBeginEditable name="head" -->


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
			
			<a class="brand" href="../home.php">
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
    <div class="hide">
    <img src="../images/banner.jpg">
    </div>
	<div class="subnavbar-inner" >
	
		<div class="container" >
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
                
                
			</a><!-- InstanceBeginEditable name="navbar" -->
			<div class="subnav-collapse collapse">
			  <ul class="mainnav">
			    <li class="active"> <a href="file:///C|/xampp/htdocs/eis/eis_home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
			    <li> <a href="file:///C|/xampp/htdocs/eis/eis_home.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Approve Leave</span></a></li>
			    <li> <a href="file:///C|/xampp/htdocs/eis/eis_home.php" > <i class="shortcut-icon icon-plus-sign"></i> <span class="shortcut-label">Add PDS</span></a></li>
			    <li> <a href="file:///C|/xampp/htdocs/eis/eis_home.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Edit PDS</span></a></li>
			    <li> <a href="file:///C|/xampp/htdocs/eis/eis_home.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">View PDS</span></a></li>
		      </ul>
		    </div>
			<!-- InstanceEndEditable -->
            
            
            <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
 
<!-- smaller navbar-->

<div id="small-head" class="navbar navbar-inverse hidden">
	
  <div class="navbar-inner" style="padding:0; padding-left:100px;background-color:#0C0; color:#000;">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>
			</a>
			
				
			
		  <div class="nav-collapse collapse">
		    <ul class="nav pull-left blck">
					<li class="active">
						
						<a href="#" >
							<i class="icon-lock"></i>
							Security
						</a>
						
						
					</li>
                    <li >
						
						<a href="#">
							<i class="icon-picture"></i>View</a>
						
						
					</li>
                    
                    <li >
						
						<a href="#" style="color:#000000;">
							<i class="icon-cog"></i>
							Settings
						</a>
						
						
					</li>
			  </ul>
		    </form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div>

<!--/smaller navbar-->

<div class="main">



  <div class="container" style="width:1000px; margin-top:20px;">
    <div class="">
	
	
	<!-- InstanceBeginEditable name="main" -->
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Dashboard</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
           
<form id="AddPersonnel" action="add_prof.php"  method="post" enctype="multipart/form-data" >

<table class="table" width="816" >
						  <tr>
							<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>PERSONNAL BACKGROUND</strong></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SURNAME</td>
							<td colspan="2"><input class="validate[required,custom[onlyLetterSp]] text-input" type="text" name="lname" id="emp_lname" style="width:200px;height:20px;"  /></td>
							<td colspan="4" rowspan="2" style="display:none;">&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2"><input class="validate[required,custom[onlyLetterSp]] text-input" type="text"  name="fname" id="fname"  style="width:200px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2" ><input type="text" class="validate[required,custom[onlyLetterSp]]" name="mname"  id="mname" style="width:200px;height:20px;" /></td>
							<td colspan="2" style="background-color:#EAEAEA;">NAME EXTENSION(e.g. Jr., Sr.,)</td>
							<td width="203" colspan="2"><input type="text" name="name_extension" style="width:200px;height:20px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">DATE OF BIRTH(yyyy/mm/dd)</td>
							<td colspan="2"><input type="text" name="bdate" id="bdate" style="width:200px;height:20px;"  class="validate[required],custom[dateFormat]"/></td>
							<td colspan="2" style="background-color:#EAEAEA;">RESIDENTIAL ADDRESS</td>
							<td colspan="2"><input type="text" name="residential_address" id="add1" style="width:200px;height:20px;" class="validate[required] text-input"/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">PLACE OF BIRTH</td>
							<td colspan="2"><input type="text" name="place_of_birth" id="place_birth" style="width:200px;height:20px;" class="validate[required] text-input"/></td>
							<td colspan="2" style="background-color:#EAEAEA;">ZIP </td>
							<td colspan="2"><input type="text" name="zipcode1" id="p_zip1"   style="width:200px;height:20px;" class="validate[required],custom[num],minSize[4],maxSize[6]"/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SEX</td>
							<td colspan="2"><input type="radio" name="p_sex" id="p_sex1" value="Male"  class="validate[required] radio"/>
														  Male
														  <input type="radio" name="p_sex" value="Female" id="p_sex2"  class="validate[required] radio"/>
														Female</td>
							<td colspan="2" style="background-color:#EAEAEA;">CONTACT NO.</td>
							<td colspan="2"><input type="text" name="contact_no"id="tel1" style="width:200px;height:20px;" class="validate[required],custom[num],minSize[8],maxSize[8]"/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">CIVIL STATUS</td>
							<td colspan="2"><select class="validate[required]" name="civil_status" style="width:150px;font-size:11px" >
							  <option ></option>
							  <option value="Single">Single</option>
							  <option value="Married">Married</option>
							  <option value="Annulled">Annulled</option>
							  <option value="Widowed">Widowed</option>
							  <option value="Separated">Separated</option>
							</select></td>
							<td colspan="2" style="background-color:#EAEAEA;">PERMANENT ADDRESS</td>
							<td colspan="2"><input type="text" name="permanent_address" id="permanent_address" style="width:200px;height:20px;" class="validate[required] text-input"/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">CITIZENSHIP</td>
							<td colspan="2"><input type="text" name="citizenship"  id="citizen" style="width:200px;height:20px;" class="validate[required] text-input"/></td>
							<td colspan="2" style="background-color:#EAEAEA;">ZIP</td>
							<td colspan="2"><input type="text" name="zipcode2"id="zipcode2"  style="width:200px;height:20px;" class="validate[custom[num],minSize[4],maxSize[6]"/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">HEIGHT</td>
							<td colspan="2"><input type="text" name="height" id="height" style="width:200px;height:20px;" class="validate[required],custom[number]"/></td>
							<td colspan="2" style="background-color:#EAEAEA;">TELEPHONE NO.</td>
							<td colspan="2"><input type="text" name="tel_no2"id="tel_no2" style="width:200px;height:20px;" class="validate[required],custom[num],minSize[8],maxSize[8]"/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">WEIGHT</td>
							<td colspan="2"><input type="text" name="weight" id="weight"  style="width:200px;height:20px;" class="validate[required] text-input"/></td>
							<td colspan="2" style="background-color:#EAEAEA;">EMAIL ADDRESS(if any)</td>
							<td colspan="2"><input type="text" name="email" id="eadd"  style="width:200px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">BLOOD TYPE</td>
							<td colspan="2"><input type="text" name="bloodtype"  id="bloodtype" style="width:200px;height:20px;" class="validate[required] text-input"/></td>
							<td colspan="2" style="background-color:#EAEAEA;">CELLPHONE NO.</td>
							<td colspan="2"><input type="text" name="cp" id="cp" style="width:200px;height:20px;" class="validate[custom[num],minSize[11],maxSize[11]" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">GSIS ID NO.</td>
							<td colspan="2"><input type="text" name="gsis_id_no"  id="gsis_id_no" style="width:200px;height:20px;" class="validate[required],custom[num]"/></td>
							<td colspan="2" style="background-color:#EAEAEA;">AGENCY EMPLOYEE NO.</td>
							<td colspan="2"><input type="text" name="agency_employee_no" id="agency_employee_no" style="width:200px;height:20px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">PAG-IBIG ID NO.</td>
							<td colspan="2"><input type="text" name="pagibig_id_no" id="pagibig_id_no" style="width:200px;height:20px;" class="validate[required],custom[num]"/></td>
							<td colspan="2" style="background-color:#EAEAEA;">TIN</td>
							<td colspan="2"><input type="text" name="tin"  id="tin" style="width:200px;height:20px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">PHILHEALTH NO.</td>
							<td colspan="2"><input type="text" name="philhealth_no" id="philhealth_no" style="width:200px;height:20px;" class="validate[required],custom[num]"/></td>
							<td colspan="4" rowspan="2" style="display:none;">&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SSS NO.</td>
							<td colspan="2"><input type="text" name="sss_no"  id="sss_no" style="width:200px;height:20px;" class="validate[required],custom[num]"/></td>
						  </tr>
						  <tr>
							<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>FAMILY BACKGROUND</strong></td>
						  </tr>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SPOUSE'S NAME</td>
							<td colspan="2"><input type="text" name="spouse_lname"  id="spouse_lname"style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2" style="background-color:#EAEAEA;text-align:center;">NAME OF CHILD(Write full name)</td>
							<td colspan="2" style="background-color:#EAEAEA;text-align:center;">DATE OF BIRTH(mm/dd/yyyy)</td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2"><input type="text" name="spouse_fname" id="spouse_fname" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child1_name" id="child1_name"  style="width:200px;height:20px;"class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" class="validate[custom[dateFormat]]" name="child_bday1" id="child_bday1"  style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2"><input type="text" name="spouse_mname" id="spouse_mname" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child2_name" id="child2_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday2" id="child_bday2" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">OCCUPATION</td>
							<td colspan="2"><input type="text" name="spouse_occupation" id="spouse_occupation" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child3_name" id="child3_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday3" id="child_bday3" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">EMPLOYER/BUS. NAME</td>
							<td colspan="2"><input type="text" name="spouse_bus_name" id="spouse_bus_name" style="width:200px;height:20px;"/></td>
							<td colspan="2"><input type="text" name="child4_name" id="child4_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday4" id="child_bday4" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">BUSINNESS ADDRESS</td>
							<td colspan="2"><input type="text" name="spouse_bus_add" id="spouse_bus_add" style="width:200px;height:20px;"/></td>
							<td colspan="2"><input type="text" name="child5_name" id="child5_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday5" id="child_bday5" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">TELEPHONE NO.</td>
							<td colspan="2"><input type="text" name="spouse_bus_telno" id="spouse_bus_telno" style="width:200px;height:20px;" class="validate[custom[num],minSize[8],maxSize[8]"/></td>
							<td colspan="2"><input type="text" name="child6_name" id="child6_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday6" id="child_bday6" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">FATHER'S SURNAME</td>
							<td colspan="2"><input type="text" name="father_lname" id="father_lname" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child7_name" id="child7_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday7" id="child_bday7" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2"><input type="text" name="father_fname" id="father_fname" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child8_name" id="child8_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday8" id="child_bday8" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2"><input type="text" name="father_mname" id="father_mname" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child9_name" id="child9_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday9" id="child_bday9" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">MOTHER'S MAIDEN NAME</td>
							<td colspan="2"><input type="text" name="mother_maiden_name" id="mother_maiden_name" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child10_name" id="child10_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday10" id="child_bday10" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SURNAME</td>
							<td colspan="2"><input type="text" name="mother_lname" id="mother_lname" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child11_name" id="child11_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday11" id="child_bday11"class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2"><input type="text" name="mother_fname" id="mother_fname" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child12_name" id="child12_name"  style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="2"><input type="text" name="child_bday12" id="child_bday12" class="validate[custom[dateFormat]]" style="width:185px;height:20px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2"><input type="text" name="mother_mname" id="mother_mname" style="width:200px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td colspan="4" style="display:none;">&nbsp;</td>
						  </tr>
                          </table>
                          <table class="table" width="816">
						  <tr>
							<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>EDUCATIONAL BACKGROUND</strong></td>
						  </tr>
						  <tr>
							<td width="100" rowspan="2" style="background-color:#EAEAEA;"><div align="center">LEVEL</div></td>
							<td width="120" rowspan="2" style="background-color:#EAEAEA;"><div align="center">NAME OF SCHOOL<br />(Write in full)</div></td>
							<td width="130" rowspan="2" style="background-color:#EAEAEA;"><div align="center">DEGREE COURSE<br  />
							(Write in full)</div></td>
							<td width="66" rowspan="2" style="background-color:#EAEAEA;"><div align="center"><span style="font-size:10px">YEAR <br  />
							  GRADUATED<br  />
							(If Graduated)</span></div></td>
							<td rowspan="2" style="background-color:#EAEAEA;"><div align="center"><span style="font-size:10px">HIGHEST GRADE/<br />
							  LEVEL/ <br  />
							  UNITS EARNED<br  />
							(If not graduated)</span></div></td>
							<td colspan="2" style="background-color:#EAEAEA;"><div align="center">INCLUSIVE DATE OF ATTENDANCE</div></td>
							<td rowspan="2" style="background-color:#EAEAEA;"><div align="center">SCHOLARSHIP/<br />
							ACADEMIC HONORS RECEIVED</div></td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;"><div align="center">From</div></td>
							<td style="background-color:#EAEAEA;"><div align="center">To</div></td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;"> ELEMENTARY</td>
							<td> <div align="center">
							  <input type="text" name="elem_school_name" style="width:120px;height:20px;"/>
							</div></td>
							<td>    <div align="center">
							  <input type="text" name="elem_degree" style="width:90px;height:20px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input type="text" name="elem_year_grad"  id="emp_year_grad_elem"  style="width:50px;height:20px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" name="elem_highest_grade" style="width:80px;height:20px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" name="elem_attendance_from" id="emp_elem_attendance_from"  style="width:90px;height:20px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" name="elem_attendance_to" id="emp_elem_attendance_to"  style="width:90px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="elem_scholarship" style="width:80px;height:20px;"/>
							</div></td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;">SECONDARY</td>
							<td> <div align="center">
							  <input type="text" name="second_school_name" style="width:120px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="second_degree" style="width:90px;height:20px"/>
							</div></td>
							<td> <div align="center">
							  <input type="text"  name="second_year_grad" id="emp_year_grad_second"  style="width:50px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text"name="second_highest_grade" style="width:80px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text"   name="second_attendance_from" id="emp_second_attendance_from"  style="width:90px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="second_attendance_to" id="emp_second_attendance_to"  style="width:90px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="second_scholarship" style="width:80px;height:20px;"/>
							</div></td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;"><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
							<td>  <div align="center">
							  <input type="text" name="voc_school_name" style="width:120px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="voc_degree" style="width:90px;height:20px"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="voc_year_grad" id="emp_year_grad_voc"  style="width:50px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="voc_highest_grade" style="width:80px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="voc_attendance_from" id="emp_voc_attendance_from"  style="width:90px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="voc_attendance_to" id="emp_voc_attendance_to"  style="width:90px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="voc_scholarship" style="width:80px;height:20px;"/>
							</div></td>
						  </tr>
						  <tr>
							<td rowspan="2" style="background-color:#EAEAEA;">COLLEGE</td>
							<td>  <div align="center">
							  <input type="text" name="col1_school_name" style="width:120px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="col1_degree" style="width:90px;height:20px"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="col1_year_grad" id="emp_year_grad_col1"  style="width:50px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="col1_highest_grade" style="width:80px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="col1_attendance_from" id="emp_col1_attendance_from"  style="width:90px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="col1_attendance_to" id="emp_col1_attendance_to"   style="width:90px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="col1_scholarship" style="width:80px;height:20px;"/>
							</div></td>
						  </tr>
						  <tr>
							<td> <div align="center">
							  <input type="text" name="col2_school_name" style="width:120px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="col2_degree" style="width:90px;height:20px"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="col2_year_grad" id="emp_year_grad_col2"  style="width:50px;height:20px;"/>
							</div></td>
							<td>
							<div align="center">
								<input type="text" name="col2_highest_grade" style="width:80px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="col2_attendance_from" id="emp_col2_attendance_from"  style="width:90px;height:20px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" name="col2_attendance_to" id="emp_col2_attendance_to"  style="width:90px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="col2_scholarship" style="width:80px;height:20px;"/>
							</div></td>
						  </tr>
						  <tr>
							<td rowspan="2" style="background-color:#EAEAEA;">GRADUATE STUDIES</td>
							<td> <div align="center">
							  <input type="text" name="grad1_school_name" style="width:120px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="grad1_degree" style="width:90px;height:20px"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="grad1_year_grad" id="emp_year_grad_grad1"  style="width:50px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="grad1_highest_grade" style="width:80px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="grad1_attendance_from" id="emp_grad1_attendance_from"  style="width:90px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="grad1_attendance_to" id="emp_grad1_attendance_to"  style="width:90px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="grad1_scholarship" style="width:80px;height:20px;"/>
							</div></td>
						  </tr>
						  <tr>
							<td><div align="center">
							  <input type="text" name="grad2_school_name" style="width:120px;height:20px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" name="grad2_degree" style="width:90px;height:20px"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="grad2_year_grad"  id="emp_year_grad_grad2"  style="width:50px;height:20px;"  />
							</div></td>
							<td>  <div align="center">
							  <input type="text" name="grad2_highest_grade" style="width:80px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="grad2_attendance_from" id="emp_grad2_attendance_from"  style="width:90px;height:20px;"/>
							</div></td>
							<td> <div align="center">
							  <input type="text" name="grad2_attendance_to" id="emp_grad2_attendance_to"  style="width:90px;height:20px;"/>
							</div></td>
							<td><div align="center">
							  <input type="text" name="grad2_scholarship" style="width:80px;height:20px;"/>
							</div></td>
						  </tr>
						  <tr>
							<td colspan="8" style="display:none;">&nbsp;</td>
						  </tr>
						</table>



						
							 <table class="table" width="816">
							  <tr>
								<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>CIVIL SERVICE ELIGIBILITY</strong></td>
							  </tr>
							  <tr>
								<td colspan="2" rowspan="2" style="background-color:#EAEAEA;"><div align="center">CAREER SERVICE/ RA 1080 (BAORD/BAR)<BR  />
								UNDER SPECIAL LAW/CES/CSEE</div></td>
								<td width="66" rowspan="2" style="background-color:#EAEAEA;"><div align="center">RATING</div></td>
								<td rowspan="2" style="background-color:#EAEAEA;"><div align="center">DATE OF<BR />
								  EXAMINATION/<BR />
								CONFERMENT</div></td>
								<td colspan="2" rowspan="2" style="background-color:#EAEAEA;"><div align="center">PLACE OF EXAMINATION/<br />CONFERMENT</div></td>
								<td colspan="2" style="background-color:#EAEAEA;"><div align="center">LICENSE(if applicable)</div></td>
							  </tr>
							  <tr>
								<td width="88" style="background-color:#EAEAEA;"><div align="center">NUMBER</div></td>
								<td width="105" style="background-color:#EAEAEA;"><div align="center">DATE OF RELEASE</div></td>
							  </tr>
								<?php  for($x = 1;$x<=8;$x++){ ?>
							  <tr>
								<td colspan="2"><div align="center">
								  <input type="text" name="career_service_<?php echo $x; ?>" id="emp_career_service_<?php echo $x; ?>" style="width:200px;height:20px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="career_rating_<?php echo $x; ?>" id="emp_career_rating_<?php echo $x; ?>" style="width:56px;height:20px;"/>
								</div></td>
								<td width="120"><div align="center">
								  <input type="text" name="date_exam<?php echo $x; ?>" 	id="emp_date_exam<?php echo $x; ?>" style="width:120px;height:20px;"/>
								</div></td>
								<td colspan="2"><div align="center">
								  <input type="text" name="place_exam<?php echo $x; ?>" id="emp_place_exam<?php echo $x; ?>" style="width:200px;height:20px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="license_no<?php echo $x; ?>" id="emp_license_no<?php echo $x; ?>" style="width:80px;height:20px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="license_date_rel<?php echo $x; ?>" id="emp_license_date_rel<?php echo $x; ?>"  style="width:80px;height:20px;"/>
								</div></td>
							  </tr>
								<?php } ?>
							  </table>
							  
							<table class="table" width="816">  
							  <tr>
								<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>WORK EXPERIENCE</strong></td>
							  </tr>
							  <tr>
								<td colspan="2" style="background-color:#EAEAEA;"><div align="center">INCLUSIVE DATES<br />
								(mm/dd/yy)</div></td>
								<td width="105" rowspan="2" style="background-color:#EAEAEA;"><div align="center">POSITION TITLE<br />
								(Write in full)</div></td>
								<td width="200" rowspan="2" style="background-color:#EAEAEA;"><div align="center">DEPARTMENT/<br />AGENCY/OFFICE/<br />COMPANY<br />
								(Write in full)</div></td>
								<td width="82" rowspan="2" style="background-color:#EAEAEA;"><div align="center">MONTHLY<br />
								SALARY</div></td>
								<td width="75" rowspan="2" style="background-color:#EAEAEA;"><div align="center"><span style="font-size:10px;">SALARY GRADE<br  />
							  &amp; STEP <br />
								  INCREMENT<br />
								(format &quot;00-0&quot;)</span></div></td>
								<td width="145" rowspan="2" style="background-color:#EAEAEA;"><div align="center">STATUS OF <br />
								APPOINTMENT</div></td>
								<td width="62" rowspan="2" style="background-color:#EAEAEA;"><div align="center">GOV'T<br />
								  SERVICE<br />
								(Yes/No)</div></td>
							  </tr>
							  <tr>
								<td width="60" style="background-color:#EAEAEA;"><div align="center">FROM</div></td>
								<td width="60" style="background-color:#EAEAEA;"><div align="center">TO</div></td>
							  </tr>
							   <?php  
																				 $y = 7;
																				 for($x = 1;$x<=20;$x++){ 
																				 $y++;
																				 ?> 
							  <tr>
								<td><div align="center">
								  <input type="text" name="work_date_from<?php echo $x; ?>" id="emp_work_date_from<?php echo $x; ?>"  style="width:70px;height:20px;" />
								</div></td>
								<td><div align="center">
								  <input type="text" name="work_date_to<?php echo $x; ?>" id="work_date_to<?php echo $x; ?>"  style="width:70px;height:20px;" />
								</div></td>
								<td><div align="center">
								  <input type="text" name="work_pos_title<?php echo $x; ?>" id="work_pos_title<?php echo $x; ?>" style="width:100px;height:20px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="work_agency<?php echo $x; ?>"  id="work_agency<?php echo $x; ?>" style="width:200px;height:20px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="work_mon_salary<?php echo $x; ?>"  id="work_mon_salary<?php echo $x; ?>" style="width:80px;height:20px;" />
								</div></td>
								<td><div align="center">
								  <input type="text" name="work_salary_grade<?php echo $x; ?>" id="work_salary_grade<?php echo $x; ?>" style="width:80px;height:20px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="work_status_appoint<?php echo $x; ?>" id="work_status_appoint<?php echo $x; ?>" style="width:100px;height:20px;"/>
								</div></td>
								<td><div align="center">
								  <select name="gov_service<?php echo $x; ?>" id="gov_service<?php echo $x; ?>" style="width:50px;height:20px;">
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								  </select>
								</div></td>
							  </tr>
								<?php } ?>
							</table>

							<table class="table" width="816">
							 <tbody>
							  <tr>
								<td colspan="5"  style="background-color:#969696;font-size:17px;font-style:italic;"><strong>VOLUNTARY WORK OR INVOLVEMENT IN CIVIC/NON-GOVERNMENT/PEOPLE/VOLUNTARY ORGANIZATION/S</strong></td>
								</tr>
							 
							  <tr>
								<td width="308" rowspan="2" align="center" style="background-color:#EAEAEA;font-size:11.5;">NAME & ADDRESS OF ORGANIZATION<br />
								(Write in full)</td>
								<td colspan="2" align="center" style="background-color:#EAEAEA;">INCLUSEIVE DATES<br />(yyyy/mm/dd)</td>
								<td width="70" rowspan="2" align="center" style="background-color:#EAEAEA;">NUMBER OF<br /> HOURS</td>
								<td width="224" rowspan="2" align="center" style="background-color:#EAEAEA;">POSITION/NATURE OF WORK<br />(Write in full)</td>
							  </tr>
							  <tr>
								<td width="90" align="center" style="background-color:#EAEAEA;">FROM</td>
								<td width="90" align="center" style="background-color:#EAEAEA;">TO</td>
								</tr>
									<?php  
													$y=27;
													for($x = 1;$x<=5;$x++){
													$y++;
													?> 
								<tr>
								<td><input type="text" name="voluntary_name<?php echo $x; ?>"  id="voluntary_name<?php echo $x; ?>" style="width:300px;height:20px;"/></td>
								<td> <input type="text" name="voluntary_date_from<?php echo $x; ?>" id="voluntary_date_from<?php echo $x; ?>"  style="width:90px;height:20px;" /></td>
								<td><input type="text" name="voluntary_date_to<?php echo $x; ?>" id="voluntary_date_to<?php echo $x; ?>"  style="width:90px;height:20px;" /></td>
								<td><input type="text" name="voluntary_no_hrs<?php echo $x; ?>" id="voluntary_no_hrs<?php echo $x; ?>" style="width:90px;height:20px;" /></td>
								<td><input type="text" name="voluntary_position<?php echo $x; ?>"  id="voluntary_position<?php echo $x; ?>" style="width:225px;height:20px;"/></td>
							  </tr>
							 
							  <?php } ?> 
							   </tbody>
								</table>
								
								 <table class="table" width="816">
								 <tbody>
								  <tr>
									<td colspan="5"  style="background-color:#969696;font-size:17px;font-style:italic;"><strong>TRAINING PROGRAMS</strong></td>
									</tr>
								 
								  <tr>
									<td width="308" rowspan="2" align="center" style="background-color:#EAEAEA;font-size:11.5px;">TITLE OF SEMINARS/CONFERENCE/WORKSHOP/SHORT COURSE<br />
									(Write in full)</td>
									<td colspan="2" align="center" style="background-color:#EAEAEA;">INCLUSEIVE DATE OF ATTENDANCE<br />(yyyy/mm/dd)</td>
									<td width="70" rowspan="2" align="center" style="background-color:#EAEAEA;">NUMBER OF<br /> HOURS</td>
									<td width="224" rowspan="2" align="center" style="background-color:#EAEAEA;">CONDUCTED/SPONSORED BY<br />(Write in full)</td>
								  </tr>
								  <tr>
									<td width="90" align="center" style="background-color:#EAEAEA;">FROM</td>
									<td width="90" align="center" style="background-color:#EAEAEA;">TO</td>
									</tr>
								   <?php  
									$y=32;
									for($x = 1;$x<=15;$x++){
									$y++;
									?>  
								 <tr>
									<td><input type="text" name="training_title<?php echo $x; ?>" id="training_title<?php echo $x; ?>" style="width:290px;height:20px;"/></td>
									<td><input type="text" name="training_date_from<?php echo $x; ?>" id="training_date_from<?php echo $x; ?>"  style="width:90px;height:20px;" /></td>
									<td><input type="text" name="training_date_to<?php echo $x; ?>" id="training_date_to<?php echo $x; ?>"  style="width:90px;height:20px;" /></td> 
									<td><input type="text" name="training_no_hrs<?php echo $x; ?>" id="training_no_hrs<?php echo $x; ?>" style="width:120px;height:20px;" /> </td>
									<td><input type="text" name="training_sponsor<?php echo $x; ?>" id="training_sponsor<?php echo $x; ?>" style="width:200px;height:20px;"/></td>
								  </tr>
								  <?php } ?> 
								</tbody>
								  </table>
								  
								  <table class="table" width="816">
								<tbody>
								  <tr>
									<td colspan="3"  style="background-color:#969696;font-size:17px;font-style:italic;"><strong>OTHER INFORMATION</strong></td>
									</tr>
								  <TR>
								  <td width="272"  align="center" style="background-color:#EAEAEA;">SPECIAL SKILLS/HOBBIES</td>
								  <td width="272"  align="center" style="background-color:#EAEAEA;">NON-ACEDEMIC DISTICTIONS/RECOGNITION
								<br>(Write in full)</td>
								  <td width="272"  align="center" style="background-color:#EAEAEA;">MEMBERS IN ASSOCIATION/ORGANIZATION
								<br>(Write in full)</td>
								  </tr>
									<?php  for($x = 1;$x<=5;$x++){?>  
								   <tr>
									<td>  <input type="text" name="hobbies<?php echo $x; ?>" style="width:265px;height:20px;"/></td>
									<td> <input type="text" name="recognition<?php echo $x; ?>" style="width:265px;height:20px;" /></td>
									<td> <input type="text" name="organization<?php echo $x; ?>" style="width:265px;height:20px;" /></td>
									</tr>
									<?php } ?> 
									</tbody>
								  </table>
	
						
							<table class="table" width="816">
						  <tr>
							<td width="616" style="border:none" style="background-color:#EAEAEA;">36.Are you related by consanguinity or affinity to any of the following : </td>
							<td width="200" style="border:none" >&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none"></td>
							<td style="border:none">&nbsp; </td>
						  </tr>
						  <tr>
							<td rowspan="3" style="border:none" style="background-color:#EAEAEA;">a. Within the third degree (for National Government Employees):                                                      appointing authority, recommending authority, chief of office/bureau/department or person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed?</td>
							<td style="border:none">
							
							<input type="radio" name="q[0]" id="choice1y" onClick="chocie_yes(id)" value="YES" class="validate[required]" />YES
												<input type="radio" name="q[0]" id="choice1n" onClick="choice_no(id)" value="NO" class="validate[required]" />NO<br />
											
						  </tr>
							</td>
						  </tr>
						  <tr>
							<td style="border:none">If YES, give details:
							
						</td>
						  </tr>
						  <tr>
							<td style="border:none"><input type="text"  name="details1" id="details1" style="width:200px;height:20px;display:none;"></td>
							
						  <tr>
							<td style="border:none">&nbsp;</td>
							<td style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td rowspan="3" style="border:none" style="background-color:#EAEAEA;">b. Within the fourth degree (for Local Government Employees):                                                              appointing authority or recommending authority where you will be appointed?</td>
							<td style="border:none"><input type="radio" name="q[1]" id="choice2y" class="validate[required]" onClick="chocie_yes(id)" value="YES">YES
							<input type="radio" name="q[1]" id="choice2n" class="validate[required]" onClick="choice_no(id)" value="NO">NO</td>
						  </tr>
						  <tr>
							<td style="border:none">If YES, give details:</td>
						  </tr>
						  <tr>
							<td style="border:none"><input type="text"  name="details2" id="details2"  style="width:200px;height:20px;display:none;display:none;"> </td>
						  </tr>
						</table><!--close q36 -->

						<table class="table" width="816">
						  <tr>
							<td width="600" style="border:none" style="background-color:#EAEAEA;">37. a. Have you ever been formally charged?</td>
							<td width="200" style="border:none">
							<input type="radio" name="q[2]" id="choice3y" class="validate[required]" onClick="chocie_yes(id)" value="YES">YES
							<input type="radio" name="q[2]" id="choice3n" class="validate[required]" onClick="choice_no(id)" value="NO">NO</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none">If YES, give details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none">
							 <input type="text"  name="details3" id="details3" style="width:200px;height:20px;display:none;">
							</td>
						  </tr>
						  <tr>
							<td  style="border:none" style="background-color:#EAEAEA;">b. Have you ever been guilty of any administrative offense?</td>
							<td  style="border:none"><input type="radio" name="q[3]" id="choice4y" class="validate[required]" onClick="chocie_yes(id)" value="YES">YES
							<input type="radio" name="q[3]" id="choice4n" class="validate[required]" onClick="choice_no(id)" value="NO">NO</td></td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td style="border:none">If YES, give details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none">
							  <input type="text"  name="details4" id="details4" style="width:200px;height:20px;display:none;"> 
							</td>
						  </tr>
						</table><!--close q37 -->
						<table class="table" width="816">
						  <tr>
							<td width="600" rowspan="3" style="border:none" style="background-color:#EAEAEA;">38. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</td>
							<td width="200" style="border:none"> <input type="radio" name="q[4]" id="choice5y" class="validate[required]" onClick="chocie_yes(id)" value="YES">YES
												<input type="radio" name="q[4]" id="choice5n" class="validate[required]" onClick="choice_no(id)" value="NO">NO</td>
						  </tr>
						  <tr>
							<td style="border:none">If YES, give details:</td>
						  </tr>
						  <tr>
							<td style="border:none">
							 <input type="text"  name="details5" id="details5" style="width:200px;height:20px;display:none;">
							</td>
						  </tr>
						</table><!--close q38 -->
						<table class="table" width="816">
						  <tr>
							<td width="600" rowspan="3" style="border:none" style="background-color:#EAEAEA;">39. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?</td>
							<td width="200" style="border:none">   <input type="radio" name="q[5]" id="choice6y" class="validate[required]" onClick="chocie_yes(id)" value="YES">YES
												<input type="radio" name="q[5]" id="choice6n" class="validate[required]" onClick="choice_no(id)" value="NO">NO</td>
						  </tr>
						  <tr>
							<td style="border:none">If YES, give details:</td>
						  </tr>
						  <tr>
							<td style="border:none">
							 <input type="text"  name="details6" id="details6" style="width:200px;height:20px;display:none;">
							</td>
						  </tr>
						</table><!--close q39 -->
						<table class="table" width="816">
						  <tr>
							<td width="600" rowspan="3" style="border:none" style="background-color:#EAEAEA;">40. Have you ever been a candidate in a national or local election (except Barangay election)?</td>
							<td width="200" style="border:none"> 	<input type="radio" name="q[6]" id="choice7y" class="validate[required]" onClick="chocie_yes(id)" value="YES">YES
												<input type="radio" name="q[6]" id="choice7n" class="validate[required]" onClick="choice_no(id)" value="NO">NO</td>
						  </tr>
						  <tr>
							<td style="border:none"><span style="border:none">If YES, give details:</span></td>
						  </tr>
						  <tr>
							<td style="border:none">
							 <input type="text"  name="details7" id="details7" style="width:200px;height:20px;display:none;">
							</td>
						  </tr>
						</table><!--close q40 -->
						<table class="table" width="816">
						  <tr>
							<td width="600" rowspan="3" style="border:none" style="background-color:#EAEAEA;">41. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>
							<td width="200" style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none" style="background-color:#EAEAEA;">a. Are you a member of any indigenous group?</td>
							<td style="border:none"><input type="radio" name="q[7]" id="choice8y" class="validate[required]" onClick="chocie_yes(id)" value="YES">YES
												<input type="radio" name="q[7]" id="choice8n" class="validate[required]" onClick="choice_no(id)" value="NO">NO</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
							<td style="border:none">If YES, please specify:</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
							<td style="border:none">
							<input type="text"  name="details8" id="details8" style="width:200px;height:20px;display:none;">
							</td>
						  </tr>
						  <tr>
							<td style="border:none" style="background-color:#EAEAEA;">b. Are you differently abled?</td>
							<td style="border:none"><input type="radio" name="q[8]" id="choice9y" class="validate[required]" onClick="chocie_yes(id)" value="YES">YES
												<input type="radio" name="q[8]" id="choice9n" class="validate[required]" onClick="choice_no(id)" value="NO">NO</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
							<td style="border:none">If YES, please specify:</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
							<td style="border:none"><span style="border:none">
						   <input type="text"  name="details9" id="details9" style="width:200px;height:20px;display:none;">
							</span></td>
						  </tr>
						  <tr>
							<td style="border:none" style="background-color:#EAEAEA;">c. Are you a solo parent?</td>
							<td style="border:none"><input type="radio" name="q[9]" id="choice10y" class="validate[required]" onClick="chocie_yes(id)" value="YES">YES
												<input type="radio" name="q[9]" id="choice10n" class="validate[required]" onClick="choice_no(id)" value="NO">NO<br />
												</tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
							<td style="border:none">If YES, please specify:</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
							<td style="border:none"><span style="border:none">
							 <input type="text"  name="details10" id="details10" style="width:200px;height:20px;display:none;"> 
							</span></td>
						  </tr>
						</table><!--close q41 -->

						<table class="table" width="816">
						  <tr>
							<td colspan="4" style="border:none" style="background-color:#EAEAEA;">42. REFERENCES</td>
						  </tr>

						  <tr>
							<td style="text-align:center;" style="background-color:#EAEAEA;">NAME</td>
							<td style="text-align:center;" style="background-color:#EAEAEA;">ADDRESS</td>
							<td style="text-align:center;" style="background-color:#EAEAEA;">TEL NO.</td>
							<td rowspan="6"><div id="dpic"><center><img src="../include/dpic/default.jpg" id="chng_dpic" onBlur="chk_img()" id="d_pic"/><center><br />
												<input  type="file" class="validate[required]" name="dpic_usr" id="dpic_usr"   onchange="readURL(this);"  style="height:20px;width:90px;" /></div></td>
						
						 </tr>
						  <?php  for($x = 1;$x<=3;$x++){?>  
						  <tr>
							<td ><input type="text" name="ref_name<?php echo $x; ?>" style="width:250px;height:20px;" class="validate[custom[onlyLetterSp]]"/></td>
							<td ><input type="text" name="ref_add<?php echo $x; ?>" style="width:250px;height:20px;" /></td>
							<td ><input type="text" name="ref_tel<?php echo $x; ?>" style="width:150px;height:20px;" class="validate[custom[num],minSize[8],maxSize[8]"/></td>
						  </tr>
						<?php } ?> 
						  <tr>
							<td colspan="3" style="border:none" style="background-color:#EAEAEA;">43. I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines.</td>
						  </tr>
						  <tr>
							<td colspan="3" rowspan="2" style="border:none" style="background-color:#EAEAEA;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I also authorize the agency head / authorized representative to verify / validate the contents stated herein.  I trust that  this information shall remain confidential.</td>
						  </tr>
						  <tr>
							<td style="border:none" align="center"></td>

						  </tr>
						</table>
						
						<br />
						<table class="table" width="816">
						  <tr>
							<td colspan="6" style="display:none;">&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="6" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>ACCOUNT DETAILS</strong></td>
						  </tr>
						  <tr>
							<td width="162" style="background-color:#EAEAEA;">LOGIN ID</td>
							<td width="150"><input value=""  style="width:150px;height:20px;" class="validate[required,ajax[myTryCallHehe],custom[onlyLetterNumber]] text-input" type="text" name="user" id="user" /></td>
							<td width="91" style="background-color:#EAEAEA;">POSITION</td>
							<td width="109"> <select name="position" id="position" class="validate[required]" style="height:25px;font-size:12px;width:100px" >
																			<option> </option>
																			<option >Cashier</option>
																			<option>Librarian</option>
																			<option>Principal</option>
																			<option>Registrar</option>
																			<option>H. Teacher III</option>
																			<option>H. Teacher VI</option>
																			<option>M. Teacher I</option>
																			<option>M. Teacher II</option>
																			<option>M. Teacher III</option>
																			
																		</select>
																		<script>
																			var select = document.getElementById('position');
																			var input = document.getElementById('user_type');
																			select.onchange = function() {
																			 if(select.value == ''){
																			 document.getElementById('user_type').value='';
																			   document.getElementById('subject').style.display="none";
																				document.getElementById('if_teacher').style.display="none";
																			 
																			 }
																			else if(select.value == 'H. Teacher III' || select.value == 'H. Teacher VI' || select.value == 'M. Teacher I' || select.value == 'M. Teacher II' || select.value == 'M. Teacher III'){
																			   document.getElementById('user_type').value='Teaching';
																			   document.getElementById('subject').style.display="block";
																				document.getElementById('if_teacher').style.display="block";
																			return; 
																				
																			} else{
																			 document.getElementById('user_type').value='Non-Teaching';
																			   document.getElementById('subject').style.display="none";
																				document.getElementById('if_teacher').style.display="none";
																			
																			}
																		};
																		</script></td>
							<td width="119" style="background-color:#EAEAEA;">TYPE</td>
							<td width="157"><span style="border:none">
							  <input type="text" readonly name="user_type"  id="user_type"  style="font-size:12px;text-align:center" />
							</span></td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;">PASSWORD</td>
							<td><input type="password" name="pass" id="pass" style="width:150px;height:20px;" class="validate[required]" /></td>
							<td colspan="4" style="display:none;">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;">CONFIRM PASSWORD</td>
							<td><input type="password" name="cpass" class="validate[required, equals[pass]]" id="cpass" style="width:150px;height:20px;" /></td>
							
							<td id="if_teacher" style="display:none;" style="background-color:#EAEAEA;">TEACHING SUBJECT</td>
							<td id="subject" style="display:none;">
																		  <select name="subject" id="subject" style="height:25px;font-size:12px;" class="validate[required]">
																			<option></option> ";
																			<?php
																			
																			  $result12 = mysql_query('SELECT * FROM subject_t')  
																			or die (mysql_error());  
																		 
																			while ($row12 = mysql_fetch_assoc($result12)) { 
																			 echo  '<option value="'. $row12['subject_code'] . '" name="' . $row12['subject_code']. '">' . $row12['subject_title']. '</option>';
																			} 
																			?>
																		</select></td>
						  </tr>
						  <tr>
							<td colspan="6" style="display:none;">&nbsp;</td>
						  </tr>
						</table>
                       
<div style="width:200px;margin-left:auto;margin-right:auto;">
					<a onClick="window.close();" class="button grey block left"><span class="icon i16-icon_bended-arrow-left"></span>Back</a>
					<button type="submit" name = "save" class="button grey block right"><span class="icon i16_disk-black"></span>Save</button>
					</div>					   
              </form>
          </div>
          <a   class="btn" onClick="window.open('sample_form.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center');"><i class="icon-plus"></i>Add New Student</a></div>
        <!-- /widget-content -->
      </div>
      <!-- /span6 -->
    <!-- InstanceEndEditable -->
    
    
    
      
    <!-- /span6 -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
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

<!-- InstanceBeginEditable name="extra" -->
     
<!-- InstanceEndEditable -->


    

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

  </body>
<!-- InstanceEnd --></html>
