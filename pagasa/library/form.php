<?php include '../config.php'; ?>
<html>
<head><title>PNHS System</title>

<!-- The Scripts -->
	<!-- ----------- -->
	<link rel="stylesheet" href="../include/css/external/jquery-ui-1.8.21.custom.css">
	
	<link rel="stylesheet" href="../include/css/elements.css">
	
		<link rel="stylesheet" href="../include/css/external/jquery-ui-1.8.21.custom.css">

	<link rel="stylesheet" href="../include/css/icons.css">
	<script src="../include/js/main.js"></script>
	<!-- JavaScript at the top (will be cached by browser) -->
	

	<script src="../include/js/mylibs/jquery.ui.multiaccordion.js"></script>
	<script src="../include/js/mylibs/number-functions.js"></script>
	<script src="../include/js/libs/jquery-1.7.2.min.js"></script>
		<!-- Do the same with jQuery UI -->
	<script src="../include/js/libs/jquery-ui-1.8.21.min.js"></script>
	<script src="../include/js/mylibs/forms/jquery.ui.datetimepicker.js"></script>

	<!-- VALIDATION ENGINE --> 
	
	<script src="../include/js/validationEngine/jquery.validationEngine.js"></script>
	<script src="../include/js/validationEngine/languages/jquery.validationEngine-en.js"></script>
	<!-- end scripts -->
		<!-- VALIDATION ENGINE CSS-->
	<link rel="stylesheet" href="../include/css/validationEngine.jquery.css">
<script>
$(document).ready(function () {
    
var select=function(dateStr) {
      var d1 = $('#bdate').datepicker('getDate');
      var d2 = $('#end_date').datepicker('getDate');
      var diff = 0;
      if (d1 && d2) {
            diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
      }
      $('#duration').val(diff);
}

$("#bdate").datepicker({ 
	changeMonth: true,
	changeYear: true,
    onSelect: select
});
$('#end_date').datepicker({
changeMonth: true,
changeYear: true,
onSelect: select});
});

</script>
<script>
	jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		jQuery("#AddPersonnel").validationEngine({
					promptPosition : "topLeft", 
					relative: true,
					autoPositionUpdate : true,
					onValidationComplete: function(form, status){
					if (status == true) {
							window.onunload = refreshParent;
							function refreshParent() {
							window.opener.location.reload();
							}
							submit();
					}
					}

				});
		
		 
	});
	
  </script>
  <script>
	
	$(function() {
		$("#p_bdate, #p_elem_attendance_from,  #p_elem_attendance_to, #p_second_attendance_from,  #p_second_attendance_to, #p_voc_attendance_from,  #p_voc_attendance_to, #p_col1_attendance_from,  #p_col1_attendance_to, #p_col2_attendance_from,  #p_col2_attendance_to, #p_grad1_attendance_from,  #p_grad1_attendance_to, #p_grad2_attendance_from,  #p_grad2_attendance_to, #p_work_date_from1, #p_work_date_to1, #p_work_date_from2, #p_work_date_to2, #p_work_date_from3, #p_work_date_to3, #p_work_date_from4, #p_work_date_to4, #p_work_date_from5, #p_work_date_to5, #p_work_date_from6, #p_work_date_to6, #p_work_date_from7, #p_work_date_to7,#p_work_date_from8, #p_work_date_to8, #p_work_date_from9, #p_work_date_to9, #p_work_date_from10, #p_work_date_to10, #p_work_date_from11, #p_work_date_to11, #p_work_date_from12, #p_work_date_to12, #p_work_date_from13, #p_work_date_to13, #p_work_date_from14, #p_work_date_to14, #p_work_date_from15, #p_work_date_to15, #p_work_date_from16, #p_work_date_to16, #p_work_date_from17, #p_work_date_to17, #p_work_date_from18, #p_work_date_to18, #p_work_date_from19, #p_work_date_to19, #p_work_date_from20, #p_work_date_to20, #p_license_date_rel1, #p_license_date_rel2, #p_license_date_rel3, #p_license_date_rel4, #p_license_date_rel5, #p_license_date_rel6, #p_license_date_rel7, #p_license_date_rel8, #p_date_exam1, #p_date_exam2,  #p_date_exam3, #p_date_exam4, #p_date_exam5, #p_date_exam6, #p_date_exam7, #p_date_exam8, #p_child_bday1, #p_child_bday2, #p_child_bday3, #p_child_bday4, #p_child_bday5, #p_child_bday6, #p_child_bday7, #p_child_bday8, #p_child_bday9, #p_child_bday10, #p_child_bday11, #p_child_bday12, #p_voluntary_date_from1, #p_voluntary_date_to1, #p_voluntary_date_from2, #p_voluntary_date_to2, #p_voluntary_date_from3, #p_voluntary_date_to3, #p_voluntary_date_from4, #p_voluntary_date_to4, #p_voluntary_date_from5, #p_voluntary_date_to5,#p_training_date_from1, #p_training_date_to1, #p_training_date_from2, #p_training_date_to2, #p_training_date_from3, #p_training_date_to3, #p_training_date_from4, #p_training_date_to4, #p_training_date_from5, #p_training_date_to5, #p_training_date_from6, #p_training_date_to6, #p_training_date_from7, #p_training_date_to7, #p_training_date_from8, #p_training_date_to8, #p_training_date_from9, #p_training_date_to9, #p_training_date_from10, #p_training_date_to10, #p_training_date_from11, #p_training_date_to11, #p_training_date_from12, #p_training_date_to12, #p_training_date_from13, #p_training_date_to13, #p_training_date_from14, #p_training_date_to14, #p_training_date_from15, #p_training_date_to15").datepicker({
			yearRange: '1900:2100',
			changeMonth: true,
			changeYear: true
		});
	});
	
	
	</script>
<script>
function chocie_yes(id){
switch (id){
case 'choice1y':
var chk= document.getElementById('choice1y').value="YES";
var textbox = document.getElementById('details1');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;

case 'choice2y':
var chk= document.getElementById('choice2y').value="YES";
var textbox = document.getElementById('details2');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice3y':
var chk= document.getElementById('choice3y').value="YES";
var textbox = document.getElementById('details3');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice4y':
var chk= document.getElementById('choice4y').value="YES";
var textbox = document.getElementById('details4');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice5y':
var chk= document.getElementById('choice5y').value="YES";
var textbox = document.getElementById('details5');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice6y':
var chk= document.getElementById('choice6y').value="YES";
var textbox = document.getElementById('details6');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice7y':
var chk= document.getElementById('choice7y').value="YES";
var textbox = document.getElementById('details7');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice8y':
var chk= document.getElementById('choice8y').value="YES";
var textbox = document.getElementById('details8');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice9y':
var chk= document.getElementById('choice9y').value="YES";
var textbox = document.getElementById('details9');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice10y':
var chk= document.getElementById('choice10y').value="YES";
var textbox = document.getElementById('details10');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;

}
}

function choice_no(id){
switch (id){
case 'choice1n':
var chk= document.getElementById('choice1n').value="NO";
var textbox = document.getElementById('details1');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice2n':
var chk= document.getElementById('choice2n').value="NO";
var textbox = document.getElementById('details2');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice3n':
var chk= document.getElementById('choice3n').value="NO";
var textbox = document.getElementById('details3');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice4n':
var chk= document.getElementById('choice4n').value="NO";
var textbox = document.getElementById('details4');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;

break;
case 'choice5n':
var chk= document.getElementById('choice5n').value="NO";
var textbox = document.getElementById('details5');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
break;
case 'choice6n':
var chk= document.getElementById('choice6n').value="NO";
var textbox = document.getElementById('details6');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;

case 'choice7n':
var chk= document.getElementById('choice7n').value="NO";
var textbox = document.getElementById('details7');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice8n':
var chk= document.getElementById('choice8n').value="NO";
var textbox = document.getElementById('details8');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice9n':
var chk= document.getElementById('choice9n').value="NO";
var textbox = document.getElementById('details9');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice10n':
var chk= document.getElementById('choice10n').value="NO";
var textbox = document.getElementById('details10');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;


}
}
</script>
    <script type="text/javascript">
 function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#chng_dpic')
						
                        .attr('src', e.target.result)
                        .width(137)
                        .height(175);
                };
				
                reader.readAsDataURL(input.files[0]);
				//document.getElementById('dpic').style.visibility='visible';
				return true;
            }else{
			alert('Please Select Your Photo');
			return false;
			}
			
        }
		
</script>

<style>

.table{
	font-family: Calibri;
	font-size: 12px;
	
}
</style>
</head>


<body>

<form id="AddPersonnel" action="add_prof.php"  method="post" enctype="multipart/form-data" >

<div style="border:1px solid #000;width:816px;margin-left:auto;margin-right:auto;">


<table class="table" width="816" >
	<tr>
	<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>PERSONNAL BACKGROUND</strong></td>
	</tr>
	<tr>
                    <div class="form_row">
                    <label class="contact"><strong>Title:</strong></label>
                    	 <input type="text" name="title" class="form-poshytip" required title="Enter Title" />
                    <label class="contact"><strong>Subtitle:</strong></label>
                   		 <input type="text" name="subtitle" class="form-poshytip" title="Enter Subtitle"/>
                    <label class="contact"><strong>No. of pages:</strong></label>
                   		 <input type="text" name="pages" class="form-poshytip" placeholder="pages" required title="Enter No. of pages"/>
                    <label class="contact"><strong>Volume:</strong></label>
                    	 <input type="text" name="volume" class="form-poshytip" placeholder="e.g. vi"  title="Enter Volume" required/>
                    <label class="contact"><strong>Copyright:</strong></label>
                    	<select style="font-size:larger; height:auto; "  name="copyright" class="form-poshytip" title="Copyright">
                     <?php for($i=1800;$i<=date(Y);$i++){?>
						<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option><?php }?>
			  		 </select>
                    <label class="contact "><strong>Size:</strong></label>
                    	<input style="width:auto" type="text" name="size" class="form-poshytip"  required title="Enter Size"/>
                    	<select style="font-size:larger; height:auto; width:auto" name="unit" class="selec2" title="Select unit size">
						<option value="cm" selected="selected">cm</option>
						<option value="inches">inches</option>
						<option value="mm">mm</option>
                    	</select>
                    <label class="contact"><strong>Section:</strong></label>
                    </div>  
               
    
    
    
	<td colspan="2" style="background-color:#EAEAEA;">Call No:</td>
         		 <input type="text" name="callno" required class="form-poshytip"  title="Enter Call No."/></div>          
              
	<td colspan="2"><input class="validate[required,custom[onlyLetterSp]] text-input" type="text" name="lname" id="emp_lname" style="width:200px;height:20px;"  /></td>
						  </tr>
						</table>
                       
<div style="width:200px;margin-left:auto;margin-right:auto;">
					<a onClick="window.close();" class="button grey block left"><span class="icon i16-icon_bended-arrow-left"></span>Back</a>
					<button type="submit" name = "save" class="button grey block right"><span class="icon i16_disk-black"></span>Save</button>
					</div>					   
              </div>   
					
					
           </form>             
                        
 </body>
</html>	                       