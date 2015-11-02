// JavaScript Document
//validate login
function f_Login() 
{
	var frm = document.frmLogin;
	chkd=true;
			
			if(!chk_id()){
						chkd=false; 
			}
			if(!chk_pass()){
					chkd=false; 
					
			}
			if(chkd)
			{	
				frm.submit();
			}
			else
			{
				return false;
			}
			
	
	
}

function chk_id(){

var username = document.getElementById("p_user").value;
		if(username==""||username=='Username'){
		document.getElementById('Nousername').style.display="block";
		return false;
		}else{
		document.getElementById('Nousername').style.display="none";	
		 return true;
		 }


}

function chk_pass(){

var pass = document.getElementById("p_pass").value;
		if(pass==""||pass=='Password'){
		document.getElementById('Nopassword').style.display="block";
		return false;
		}else{
		document.getElementById('Nopassword').style.display="none";	
		 return true;
		 }


}

//validate onclick add form
function submitenterSignup(myfield,e)
{
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return true;

if (keycode == 13)
   {
   sbmt_frm();
   return true;
   }
else
   return true;
}

function sbmt_frm(){
			var addfrm = document.addForm;
			flag=true;
			
			if(!chk_lname()){
				flag=false;
			}
			if(!chk_fname()){
				flag=false;
			}
			if(!chk_mname()){
				flag=false;
			}
			if(!chk_add1()){
				flag=false;
			}
			if(!chk_add2()){
				flag=false;
			}
			if(!chk_p_bdate()){
				flag=false;
			}
			if(!validate_email()){
				flag=false;
			}
			if(!chk_elem_grad()){
				flag=false;
			}
			if(!chk_second_grad()){
				flag=false;
			}
			if(!chk_voc_grad()){
				flag=false;
			}
			if(!chk_col1_grad()){
				flag=false;
			}
			if(!chk_col2_grad()){
				flag=false;
			}
			if(!chk_grad1_grad()){
				flag=false;
			}
			if(!chk_grad2_grad()){
				flag=false;
			}
			if(!chk_user()){
				flag=false;
			}
			if(!checkAvailabilityPwd()){
				 flag=false;
			}
			if(!checkConfrmPswd()){
				 flag=false;
			}			
			if(flag)
			{
				addfrm.submit();
			}
			else
			{
				return false;
			}
			
			
	}
	
function btn(){
	//var btn = document.getElementById("cancel_btn").value;
	window.location = '../admin/'

}
function btn1(){
	//var btn = document.getElementById("cancel_btn").value;
	window.location = '../admin/'

}
//validate add form
function chk_lname(){
	var lname = document.getElementById("p_lname").value;
	var alphabet = /^[A-Za-z]+$/;
	if(lname=="")
	{
		document.getElementById('lname_empty').style.display = "block";
		document.getElementById('required_lname').style.display = "block";						
		document.getElementById('p_lname').style.border= "1px #FF0000 solid";
		document.getElementById('lname_len').style.display = "none";
		document.getElementById('lname_char').style.display = "none";
		document.getElementById('lname_string').style.display= "none";	
		return false;
	}
	else if((lname.length<1)||(lname.length>25))
	{	document.getElementById('required_lname').style.display = "block";
		document.getElementById('lname_len').style.display = "block";											
		document.getElementById('p_lname').style.border= "1px #FF0000 solid";
		document.getElementById('lname_empty').style.display = "none";
		document.getElementById('lname_char').style.display = "none";
		document.getElementById('lname_string').style.display= "none";	
		return false;
	}
	else if(!alphabet.test(lname))
	{
		document.getElementById('required_lname').style.display = "block";
		document.getElementById('lname_string').style.display= "block";
		document.getElementById('p_lname').style.border= "1px #FF0000 solid";
		document.getElementById('lname_empty').style.display = "none";
		document.getElementById('lname_len').style.display = "none";
		document.getElementById('lname_char').style.display = "none";
		return false;
	}
	else if(!alphaNumCheck(lname))
	{
		document.getElementById('required_lname').style.display = "block";
		document.getElementById('lname_char').style.display = "block";
		document.getElementById('p_lname').style.border= "1px #FF0000 solid";
		 
		document.getElementById('lname_empty').style.display = "none";
		 
		
		document.getElementById('lname_len').style.display = "none";
		document.getElementById('lname_string').style.display= "none";	
		return false;
	}
	else
	{
		 document.getElementById('required_lname').style.display = "none";
		document.getElementById('lname_empty').style.display = "none";
		document.getElementById('p_lname').style.border= "1px #97b5cd solid";
		document.getElementById('lname_len').style.display = "none";
		document.getElementById('lname_char').style.display = "none";
		document.getElementById('lname_string').style.display= "none";	
							
	}
return true;	
}
function chk_fname(){
var fname = document.getElementById("p_fname").value;
	var alphabet = /^[A-Za-z]+$/;
	if(fname=="")
	{
		
		document.getElementById('required_fname').style.display = "block";
		document.getElementById('fname_empty').style.display = "block";						
		document.getElementById('p_fname').style.border= "1px #FF0000 solid";
		document.getElementById('fname_len').style.display = "none";
		document.getElementById('fname_char').style.display = "none";
		document.getElementById('fname_string').style.display= "none";	
		return false;
	}
	else if((fname.length<1)||(fname.length>25))
	{	
		document.getElementById('required_fname').style.display = "block";
		document.getElementById('fname_len').style.display = "block";											
		document.getElementById('p_fname').style.border= "1px #FF0000 solid";
		document.getElementById('fname_empty').style.display = "none";
		document.getElementById('fname_char').style.display = "none";
		document.getElementById('fname_string').style.display= "none";	
		return false;
	}
	else if(!alphabet.test(fname))
	{
		document.getElementById('required_fname').style.display = "block";
		 document.getElementById('fname_string').style.display= "block";
		document.getElementById('p_fname').style.border= "1px #FF0000 solid";
		document.getElementById('fname_empty').style.display = "none";
		document.getElementById('fname_len').style.display = "none";
		document.getElementById('fname_char').style.display = "none";
		return false;
	}
	else if(!alphaNumCheck(fname))
	{	
		document.getElementById('required_fname').style.display = "block";
		document.getElementById('fname_char').style.display = "block";
		document.getElementById('p_fname').style.border= "1px #FF0000 solid";
		document.getElementById('fname_empty').style.display = "none";
		document.getElementById('fname_len').style.display = "none";
		document.getElementById('fname_string').style.display= "none";	
		return false;
	}
	else
	{
		 document.getElementById('required_fname').style.display = "none";
		 document.getElementById('fname_empty').style.display = "none";
		document.getElementById('p_fname').style.border= "1px #97b5cd solid";
		document.getElementById('fname_len').style.display = "none";
		document.getElementById('fname_char').style.display = "none";
		document.getElementById('fname_string').style.display= "none";	
							
	}
	return true;
	
	
}
function chk_mname(){
var mname = document.getElementById("p_mname").value;
	var alphabet = /^[A-Za-z]+$/;
	if(mname=="")
	{
		
		document.getElementById('required_mname').style.display = "block";
		document.getElementById('mname_empty').style.display = "block";						
		document.getElementById('p_mname').style.border= "1px #FF0000 solid";
		document.getElementById('mname_len').style.display = "none";
		document.getElementById('mname_char').style.display = "none";
		document.getElementById('mname_string').style.display= "none";	
		return false;
	}
	else if((mname.length<1)||(mname.length>25))
	{	document.getElementById('required_mname').style.display = "block";
		document.getElementById('mname_len').style.display = "block";											
		document.getElementById('p_mname').style.border= "1px #FF0000 solid";
		document.getElementById('mname_empty').style.display = "none";
		document.getElementById('mname_char').style.display = "none";
		document.getElementById('mname_string').style.display= "none";	
		return false;
	}
	else if(!alphabet.test(mname))
	{
		document.getElementById('required_mname').style.display = "block";
		 document.getElementById('mname_string').style.display= "block";
		document.getElementById('p_mname').style.border= "1px #FF0000 solid";
		document.getElementById('mname_empty').style.display = "none";
		document.getElementById('mname_len').style.display = "none";
		document.getElementById('mname_char').style.display = "none";
		return false;
	}
	else if(!alphaNumCheck(mname))
	{
		document.getElementById('required_mname').style.display = "block";
		 document.getElementById('mname_char').style.display = "block";
		document.getElementById('p_mname').style.border= "1px #FF0000 solid";
		document.getElementById('mname_empty').style.display = "none";
		document.getElementById('mname_len').style.display = "none";
		document.getElementById('mname_string').style.display= "none";	
		return false;
	}
	else
	{
		 document.getElementById('required_mname').style.display = "none";
		 document.getElementById('mname_empty').style.display = "none";
		document.getElementById('p_mname').style.border= "1px #97b5cd solid";
		document.getElementById('mname_len').style.display = "none";
		document.getElementById('mname_char').style.display = "none";
		document.getElementById('mname_string').style.display= "none";	
							
	}
	return true;


}

function chk_add1(){

var add1 = document.getElementById("p_add1").value;
	
	if(add1=="")
	{
		document.getElementById('required_add1').style.display = "block";
		document.getElementById('add1_empty').style.display = "block";						
		document.getElementById('p_add1').style.border= "1px #FF0000 solid";
		document.getElementById('add1_len').style.display = "none";	
		return false;
	}
	else if((add1.length<1)||(add1.length>65))
	{	
	document.getElementById('required_add1').style.display = "block";
		document.getElementById('add1_len').style.display = "block";											
		document.getElementById('p_add1').style.border= "1px #FF0000 solid";
		document.getElementById('add1_empty').style.display = "none";
		return false;
	}
	
	else
	{
		 document.getElementById('required_add1').style.display = "none";
		 document.getElementById('add1_empty').style.display = "none";
		document.getElementById('p_add1').style.border= "1px #97b5cd solid";
		document.getElementById('add1_len').style.display = "none";
							
	}
	return true;
}
function chk_add2(){
var add2 = document.getElementById("p_add2").value;
	
	if(add2=="")
	{
		document.getElementById('required_add2').style.display = "block";
		document.getElementById('add2_empty').style.display = "block";						
		document.getElementById('p_add2').style.border= "1px #FF0000 solid";
		document.getElementById('add2_len').style.display = "none";	
		return false;
	}
	else if((add2.length<1)||(add2.length>65))
	{	
	document.getElementById('required_add2').style.display = "block";
		document.getElementById('add2_len').style.display = "block";											
		document.getElementById('p_add2').style.border= "1px #FF0000 solid";
		document.getElementById('add2_empty').style.display = "none";
		return false;
	}
	
	else
	{
		 document.getElementById('required_add2').style.display = "none";
		 document.getElementById('add2_empty').style.display = "none";
		document.getElementById('p_add2').style.border= "1px #97b5cd solid";
		document.getElementById('add2_len').style.display = "none";
							
	}
	return true;

}
function chk_p_bdate(){
var dt=document.getElementById('p_bdate');
	if (isDate(dt.value)==false){
		return false
	}
    return true


}

 
function validate_email(){

var email = document.getElementById("p_eadd").value;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 /*if(email ==""){
	 document.getElementById('required_eadd').style.display = "block";
	document.getElementById('email_empty').style.display = "block";											
	document.getElementById('p_eadd').style.border= "1px #FF0000 solid";
	document.getElementById('email_nvalid').style.display = "none";
	return false;
	
}*/
if(email ==""){
	document.getElementById('required_eadd').style.display = "none";
	document.getElementById('email_empty').style.display = "none";
	document.getElementById('p_eadd').style.border= "1px #97b5cd solid";
	document.getElementById('email_nvalid').style.display = "none";
	
	}
else if(!email.match(mailformat))
{	document.getElementById('required_eadd').style.display = "block";
	document.getElementById('email_empty').style.display = "none";											
	document.getElementById('p_eadd').style.border= "1px #FF0000 solid";
	document.getElementById('email_nvalid').style.display = "block";
	return false;
}

else
{
	 document.getElementById('required_eadd').style.display = "none";
	document.getElementById('email_empty').style.display = "none";
	document.getElementById('p_eadd').style.border= "1px #97b5cd solid";
	document.getElementById('email_nvalid').style.display = "none";

}
return true;
}

//chk graduated years
function chk_elem_grad(){
var minYear=1900;
var maxYear=2100;
 var year=document.getElementById("p_year_grad_elem").value;
	if (year ==""){
	document.getElementById('error_elemgrad_yr').style.display = "none";
	document.getElementById('grad_yr1').style.display = "none";									
	document.getElementById('p_year_grad_elem').style.border= "1px #97b5cd solid";
	return true;	
		
	}
	if (year.length != 4 || year==0 || year<minYear || year>maxYear){	 
	//if(year==""){
	document.getElementById('error_elemgrad_yr').style.display = "block";
	document.getElementById('grad_yr1').style.display = "block";									
	document.getElementById('p_year_grad_elem').style.border= "1px #FF0000 solid";
	 return false;
	}
	else{
	document.getElementById('error_elemgrad_yr').style.display = "none";
	document.getElementById('grad_yr1').style.display = "none";									
	document.getElementById('p_year_grad_elem').style.border= "1px #97b5cd solid";
	return true;	
	}
 }
 
function chk_second_grad(){
var minYear=1900;
	var maxYear=2100;
var year=document.getElementById("p_year_grad_second").value;
	if (year ==""){
	document.getElementById('error_secondgrad_yr').style.display = "none";
	document.getElementById('grad_yr2').style.display = "none";									
	document.getElementById('p_year_grad_second').style.border= "1px #97b5cd solid";
	return true;		
		
	}
	if (year.length != 4 || year==0 || year<minYear || year>maxYear){	 
	//if(year==""){
	document.getElementById('error_secondgrad_yr').style.display = "block";
	document.getElementById('grad_yr2').style.display = "block";									
	document.getElementById('p_year_grad_second').style.border= "1px #FF0000 solid";
	 return false;
	}
	else{
	document.getElementById('error_secondgrad_yr').style.display = "none";
	document.getElementById('grad_yr2').style.display = "none";									
	document.getElementById('p_year_grad_second').style.border= "1px #97b5cd solid";
		
	}
return true;
} 

function chk_voc_grad(){
var minYear=1900;
	var maxYear=2100;
var year=document.getElementById("p_year_grad_voc").value;
		if (year ==""){
	document.getElementById('error_vocgrad_yr').style.display = "none";
	document.getElementById('grad_yr3').style.display = "none";									
	document.getElementById('p_year_grad_voc').style.border= "1px #97b5cd solid";
	return true;
	}
	if (year.length != 4 || year==0 || year<minYear || year>maxYear){	 
	//if(year==""){
	document.getElementById('error_vocgrad_yr').style.display = "block";
	document.getElementById('grad_yr3').style.display = "block";									
	document.getElementById('p_year_grad_voc').style.border= "1px #FF0000 solid";
	 return false;
	}
	else{
		document.getElementById('error_vocgrad_yr').style.display = "none";
	document.getElementById('grad_yr3').style.display = "none";									
	document.getElementById('p_year_grad_voc').style.border= "1px #97b5cd solid";
	return true;	
	}
}

function chk_col1_grad(){
var minYear=1900;
	var maxYear=2100;
var year=document.getElementById("p_year_grad_col1").value;
		if (year ==""){
	document.getElementById('error_colgrad_yr').style.display = "none";
	document.getElementById('grad_yr4').style.display = "none";									
	document.getElementById('p_year_grad_col1').style.border= "1px #97b5cd solid";
	return true;	
	}
	if (year.length != 4 || year==0 || year<minYear || year>maxYear){	 
	//if(year==""){
	document.getElementById('error_colgrad_yr').style.display = "block";
	document.getElementById('grad_yr4').style.display = "block";									
	document.getElementById('p_year_grad_col1').style.border= "1px #FF0000 solid";
	 return false;
	}
	else{
		document.getElementById('error_colgrad_yr').style.display = "none";
	document.getElementById('grad_yr4').style.display = "none";									
	document.getElementById('p_year_grad_col1').style.border= "1px #97b5cd solid";
	return true;	
	}
}

function chk_col2_grad(){
var minYear=1900;
	var maxYear=2100;
var year=document.getElementById("p_year_grad_col2").value;
	if (year ==""){
		document.getElementById('error_colgrad_yr').style.display = "none";
	document.getElementById('grad_yr5').style.display = "none";									
	document.getElementById('p_year_grad_col2').style.border= "1px #97b5cd solid";
	return true;	
	}
	if (year.length != 4 || year==0 || year<minYear || year>maxYear){	 
	//if(year==""){
	document.getElementById('error_colgrad_yr').style.display = "block";
	document.getElementById('grad_yr5').style.display = "block";									
	document.getElementById('p_year_grad_col2').style.border= "1px #FF0000 solid";
	 return false;
	}
	else{
		document.getElementById('error_colgrad_yr').style.display = "none";
	document.getElementById('grad_yr5').style.display = "none";									
	document.getElementById('p_year_grad_col2').style.border= "1px #97b5cd solid";
	return true;	
	}
}

function chk_grad1_grad(){
var minYear=1900;
	var maxYear=2100;
var year=document.getElementById("p_year_grad_grad1").value;
	if (year ==""){
		document.getElementById('error_gradgrad_yr').style.display = "none";
	document.getElementById('grad_yr6').style.display = "none";									
	document.getElementById('p_year_grad_grad1').style.border= "1px #97b5cd solid";
	return true;
	}
	if (year.length != 4 || year==0 || year<minYear || year>maxYear){	 
	//if(year==""){
	document.getElementById('error_gradgrad_yr').style.display = "block";
	document.getElementById('grad_yr6').style.display = "block";									
	document.getElementById('p_year_grad_grad1').style.border= "1px #FF0000 solid";
	 return false;
	}
	else{
	document.getElementById('error_gradgrad_yr').style.display = "none";
	document.getElementById('grad_yr6').style.display = "none";									
	document.getElementById('p_year_grad_grad1').style.border= "1px #97b5cd solid";
	return true;	
	}
}

function chk_grad2_grad(){
var minYear=1900;
	var maxYear=2100;
var year=document.getElementById("p_year_grad_grad2").value;
	if (year ==""){
	document.getElementById('error_gradgrad_yr').style.display = "none";
	document.getElementById('grad_yr7').style.display = "none";									
	document.getElementById('p_year_grad_grad2').style.border= "1px #97b5cd solid";
	return true;
	}
	if (year.length != 4 || year==0 || year<minYear || year>maxYear){	 
	//if(year==""){
	document.getElementById('error_gradgrad_yr').style.display = "block";
	document.getElementById('grad_yr7').style.display = "block";									
	document.getElementById('p_year_grad_grad2').style.border= "1px #FF0000 solid";
	 return false;
	}
	else{
	document.getElementById('error_gradgrad_yr').style.display = "none";
	document.getElementById('grad_yr7').style.display = "none";									
	document.getElementById('p_year_grad_grad2').style.border= "1px #97b5cd solid";
	return true;	
	}
}

 
////function date////
var dtCh= "/";
var minYear=1800;
var maxYear=2999;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strMonth=dtStr.substring(0,pos1)
	var strDay=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		document.getElementById('required_bdate').style.display = "block";
		document.getElementById('bdate_format').style.display = "block";						
		document.getElementById('p_bdate').style.border= "1px #FF0000 solid";
		document.getElementById('bdate_month').style.display = "none";
		document.getElementById('bdate_year').style.display = "none";
		document.getElementById('bdate_day').style.display= "none";
		document.getElementById('bdate_date').style.display = "none";
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		document.getElementById('required_bdate').style.display = "block";
		document.getElementById('bdate_month').style.display = "block";						
		document.getElementById('p_bdate').style.border= "1px #FF0000 solid";
		document.getElementById('bdate_year').style.display = "none";
		document.getElementById('bdate_dar').style.display = "none";
		document.getElementById('bdate_format').style.display= "none";
		document.getElementById('bdate_date').style.display = "none";
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		document.getElementById('required_bdate').style.display = "block";
		document.getElementById('bdate_day').style.display = "block";						
		document.getElementById('p_bdate').style.border= "1px #FF0000 solid";
		document.getElementById('bdate_month').style.display = "none";
		document.getElementById('bdate_format').style.display = "none";
		document.getElementById('bdate_year').style.display= "none";
		document.getElementById('bdate_date').style.display = "none";
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		document.getElementById('required_bdate').style.display = "block";
		document.getElementById('bdate_year').style.display = "block";						
		document.getElementById('p_bdate').style.border= "1px #FF0000 solid";
		document.getElementById('bdate_month').style.display = "none";
		document.getElementById('bdate_day').style.display = "none";
		document.getElementById('bdate_format').style.display= "none";
		document.getElementById('bdate_date').style.display = "none";
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		document.getElementById('required_bdate').style.display = "block";
		document.getElementById('bdate_date').style.display = "block";						
		document.getElementById('p_bdate').style.border= "1px #FF0000 solid";
		document.getElementById('bdate_year').style.display = "none";
		document.getElementById('bdate_month').style.display = "none";
		document.getElementById('bdate_day').style.display= "none";
		document.getElementById('bdate_format').style.display= "none";
		return false
	}
	else{
		document.getElementById('required_bdate').style.display = "none";
		document.getElementById('bdate_format').style.display= "none";
		document.getElementById('p_bdate').style.border= "1px #97b5cd solid";
		document.getElementById('bdate_month').style.display = "none";
		document.getElementById('bdate_year').style.display = "none";
		document.getElementById('bdate_day').style.display= "none";
		document.getElementById('bdate_date').style.display = "none";	
	}
return true
}

//////
function alphabetCheck(pwd)
{
	var flag=false;
	for(i=0;i<pwd.length;i++)
	{
		if((pwd.charCodeAt(i)>96 && pwd.charCodeAt(i)<123) || (pwd.charCodeAt(i)>64 && pwd.charCodeAt(i)<91))
		{
			return true;
		}
	}
	return flag;
}
function alphaNumCheck(uname)
{
	var flag=false;
	for(i=0;i<uname.length;i++)
	{
		if(((uname.charCodeAt(i)>96) && (uname.charCodeAt(i)<123)) || ((uname.charCodeAt(i)>64) && (uname.charCodeAt(i)<91)) || ((uname.charCodeAt(i)>=48)&&(uname.charCodeAt(i)<=57)))
		{
			flag=true;
		}
		else
		{
			return false;
		}
	}
	return flag	
}

function digitCheck(pwd)
{
	var flag=false;
	for(i=0;i<pwd.length;i++)
	{
		if(pwd.charCodeAt(i)>=48 && pwd.charCodeAt(i)<=57)
		{
			return true;
		}
	}
	return flag;
}
function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
		// Internet Explorer
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}


//validate new user

function chk_user()
{
	var username = document.getElementById("p_user").value;
	if(username=="")
	{	
	
		document.getElementById('userPart').style.display = "block";						
		document.getElementById('p_user').style.border= "1px #FF0000 solid";
		document.getElementById('userNotAvail').style.display = "none";
		document.getElementById('userLPart').style.display = "none";
		document.getElementById('userChars').style.display = "none";
		document.getElementById('userAlpha').style.display= "none";	
		document.getElementById('error_user').style.display = "block";
		return false;
	}
	else if((username.length<6)||(username.length>15))
	{
	
		document.getElementById('userLPart').style.display = "block";											
		document.getElementById('p_user').style.border= "1px #FF0000 solid";
		document.getElementById('userPart').style.display = "none";
		document.getElementById('userNotAvail').style.display = "none";
		document.getElementById('userChars').style.display = "none";
		document.getElementById('userAlpha').style.display= "none";	
		document.getElementById('error_user').style.display = "block";
		return false;
	}
	else if(!alphabetCheck(username))
	{
	
		document.getElementById('userAlpha').style.display= "block";
		document.getElementById('p_user').style.border= "1px #FF0000 solid";
		document.getElementById('userPart').style.display = "none";
		document.getElementById('userNotAvail').style.display = "none";
		document.getElementById('userLPart').style.display = "none";
		document.getElementById('userChars').style.display = "none";
		document.getElementById('error_user').style.display = "block";
		return false;
	}
	else if(!alphaNumCheck(username))
	{	
	
		document.getElementById('userChars').style.display = "block";
		document.getElementById('p_user').style.border= "1px #FF0000 solid";
		document.getElementById('userPart').style.display = "none";
		document.getElementById('userNotAvail').style.display = "none";
		document.getElementById('userLPart').style.display = "none";
		document.getElementById('userAlpha').style.display= "none";	
		document.getElementById('error_user').style.display = "block";
		return false;
	}
	else
	{
		var url = "../admin/chk_user.php?username=" + encodeURIComponent(username);
		req=GetXmlHttpObject();	
		req.open("GET", url, true);
		req.onreadystatechange = callback_username;
		req.send(null);
		document.getElementById('error_user').style.display = "none";
		document.getElementById('userPart').style.display = "none";
		document.getElementById('p_user').style.border= "1px #97b5cd solid";
		document.getElementById('userNotAvail').style.display = "none";
		document.getElementById('userLPart').style.display = "none";
		document.getElementById('userChars').style.display = "none";
		document.getElementById('userAlpha').style.display= "none";	
		
	}
	return true;
	
	
}
function callback_username() 
{
	if (req.readyState == 4)
	{
		if (req.status == 200) 
		{
			var message = req.responseXML.getElementsByTagName("message")[0];
			mesUser=message.childNodes[0].nodeValue;
		
			if(mesUser == 'Available')
			{
				
				document.getElementById('userAlpha').style.display= "none";
				document.getElementById('p_user').style.border= "1px #66CC00 solid";
				document.getElementById('userPart').style.display = "none";
				document.getElementById('userNotAvail').style.display = "none";
				document.getElementById('userLPart').style.display = "none";
				document.getElementById('userChars').style.display = "none";
				document.getElementById('usernameok').style.visibility = "visible";	
				document.getElementById('error_user').style.display = "none";
			}  
			else
			{
			document.getElementById('error_user').style.display = "block";
				document.getElementById('userAlpha').style.display= "none";
				document.getElementById('p_user').style.border= "1px #FF0000 solid";
				document.getElementById('userPart').style.display = "none";
				document.getElementById('userNotAvail').style.display = "block";
				document.getElementById('userLPart').style.display = "none";
				document.getElementById('userChars').style.display = "none";
				document.getElementById('usernameok').style.visiblity = "hidden";		
				document.getElementById("p_user").focus();
			
			}
		}
	}
	else
	{
			//document.getElementById('userProgress').style.display = "block";
	}
}

function checkAvailabilityPwd(){
		
		var password = document.getElementById("p_pass").value;
			if(password=="")
			{	
			document.getElementById('error_pass').style.display = "block";
				document.getElementById('pwdPart').style.display = "block";				
				document.getElementById('p_pass').style.border= "1px #FF0000 solid";
				document.getElementById('pwdLPart').style.display = "none";	
				document.getElementById('pwdChars').style.display = "none";	
				document.getElementById('pwdAlpha').style.display= "none";	
				document.getElementById('pwdDigit').style.display= "none";	
				return false;
			}
			else if((password.length<6)||(password.length>15)){
			document.getElementById('error_pass').style.display = "block";
				document.getElementById('pwdLPart').style.display = "block";				
				document.getElementById('p_pass').style.border= "1px #FF0000 solid";							
				document.getElementById('pwdPart').style.display = "none";	
				document.getElementById('pwdChars').style.display = "none";	
				document.getElementById('pwdAlpha').style.display= "none";	
				document.getElementById('pwdDigit').style.display= "none";	
				return false;
			}
			else if (!alphaNumCheck(password)) {	
			document.getElementById('error_pass').style.display = "block";
				document.getElementById('pwdChars').style.display= "block";					
				document.getElementById('p_pass').style.border= "1px #FF0000 solid";
				document.getElementById('pwdLPart').style.display = "none";	
				document.getElementById('pwdPart').style.display = "none";	
				document.getElementById('pwdAlpha').style.display= "none";	
				document.getElementById('pwdDigit').style.display= "none";	
				return false;
			}
			else if(!alphabetCheck(password)){
			document.getElementById('error_pass').style.display = "block";
				document.getElementById('pwdAlpha').style.display= "block";				
				document.getElementById('p_pass').style.border= "1px #FF0000 solid";							
				document.getElementById('pwdChars').style.display= "none";	
				document.getElementById('pwdLPart').style.display = "none";	
				document.getElementById('pwdPart').style.display = "none";	
				document.getElementById('pwdDigit').style.display= "none";	
				return false;
			}
			else if(!digitCheck(password)){
			document.getElementById('error_pass').style.display = "block";
				document.getElementById('pwdDigit').style.display= "block";				
				document.getElementById('p_pass').style.border= "1px #FF0000 solid";											
				document.getElementById('pwdAlpha').style.display= "none";	
				document.getElementById('pwdChars').style.display= "none";	
				document.getElementById('pwdLPart').style.display = "none";	
				document.getElementById('pwdPart').style.display = "none";	
				return false;
			}
			else{		
document.getElementById('error_pass').style.display = "none";			
				document.getElementById('pwdDigit').style.display= "none";	
				document.getElementById('pwdPart').style.display= "none";	
				document.getElementById('pwdLPart').style.display = "none";	
				document.getElementById('pwdChars').style.display = "none";	
				document.getElementById('pwdAlpha').style.display= "none";
				document.getElementById('p_pass').style.border= "1px #66CC00 solid";
				
				
			}

			return true;
	}
	
function checkConfrmPswd(){
		var password = document.getElementById("p_pass").value;
		var confirm = document.getElementById("p_cpass").value;
			if(!checkAvailabilityPwd()){
			document.getElementById('error_cpass').style.display = "block";
				document.getElementById('confrmPart').style.display = "block";	
				document.getElementById('confrmNotEq').style.display = "none";	
				document.getElementById('p_cpass').style.border= "1px #FF0000 solid";
				document.getElementById("p_cpass").value = "";
				document.getElementById("p_pass").focus();
				return false;
			}			
			else if(password!=confirm)
			{	
				document.getElementById('error_cpass').style.display = "block";
				document.getElementById('confrmNotEq').style.display = "block";	
				document.getElementById('confrmPart').style.display = "none";	
				document.getElementById('p_cpass').style.border= "1px #FF0000 solid";
				document.getElementById("p_cpass").value = "";
				return false;
			}
		
			else{				
				document.getElementById('error_cpass').style.display = "none";			
				document.getElementById('confrmPart').style.display= "none";
				document.getElementById('confrmNotEq').style.display = "none";					
				document.getElementById('p_cpass').style.border= "1px #66CC00 solid";				
				
			}
			return true;
	}
