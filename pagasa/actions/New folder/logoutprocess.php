<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pag-asa login</title>

<link rel="stylesheet" type="text/css" href="../css/form.css" />
<link type="text/css" rel="stylesheet" href="../css/basic.css">
</head>

<body>
  <div id="container" align="center">
      <div id="header">
          <center>
          <img src="../images/bnw.png" />
          </center>
      </div>
          
       <center>
       <img src="../images/pnhs title.png" />
       <center>
  </div>

<div class="container">
    <center>
    <div id="box">
        
        <img class="rounded glow" src="../images/box-login.png" />
        
    </div>
    </center>
	<div id="content">
		<?php

		session_start();

		session_destroy();

		echo "You have been logged out";

		?>
 		  <p align="center">&nbsp;</p>
 		  
          <form name="form1" method="post" action="../index.php">
 		    <label>
	        <div align="center">
	          <input name="login" type="submit" id="button" value="LOG IN">
	        </div>
 		    </label>
      	  </form>
	</div><!-- content -->
</div><!-- container -->
</body>
</html>








		