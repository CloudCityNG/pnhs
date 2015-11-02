<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pag-asa login</title>

<link rel="stylesheet" type="text/css" href="css/form.css" />
<link type="text/css" rel="stylesheet" href="css/basic.css">

<link href="css/social-icons.css" rel="stylesheet" />
<link href="css/styled-elements.css" rel="stylesheet" />
</head>

<body>
  <div id="container" align="center">
      <div id="header">
          <center>
          <img src="images/pnhs_logo.png" />
          </center>
      </div>
          
       <center>
       <img src="images/pnhs title.png" />
       <center>
  </div>

<div class="container">

<?php
error_reporting(0);
session_start();

require "db/db.php";
if($_POST['submit']){
$username = $_POST['username'];
$password = $_POST['password'];

$response = NULL;
if($username && $password)
{
	$query = mysql_query("select * from account_t where username='$username'");
	
	$numrows = mysql_num_rows($query);
	
	if($numrows != 0){
		while($row = mysql_fetch_assoc($query)) {
		
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}
		if($username==$dbusername && $password==$dbpassword){ 
			//$enc_password==$dbpassword
			//echo "Login successful. <a href='3.php'>Click here</a>";
			$_SESSION['username']=$dbusername;
			$_SESSION['password']=$dbpassword;
			header ("location: actions/loginprocess.php");
		}
		else									
			$response = "<p class='warning-box'>Incorrect Password!<a href='index.php'><b>Try Again</a></p>" ;
	}

	else {
		$response = "<p class='warning-box'>Username does not exist.<a href='index.php'><b>Try Again</a></p>" ;
	}
}

else {
	$response = "<p class='warning-box'>All fields are required.<a href='index.php'><b>Try Again</a></p>" ;
	//echo"Please enter a username and password";
}

}
?>
    <center>
    <div id="box">
        
        <img class="rounded glow" src="images/box-login.png" />
        
    </div>
    </center>
	<div id="content">
		<form method="post" action="index.php".php">
			<h1><img src="images/login.png"></h1>
			<div>
                
				<input name="username" type="text" placeholder="Username" id="username" />
			</div>
			<div>
				<input name="password" type="password" placeholder="Password" id="password" />
			</div>
			<div id="submit-div">
                <center>
                 <?php if(!isset($response)){?>
				<input class="center" name="submit" type="submit" value="Log in" />
                <?php }else{?>
                  <?php echo $response;?>
                <?php } ?>
                </center>
			</div>
		</form><!-- form -->

	</div><!-- content -->
</div><!-- container -->
</body>
</html>