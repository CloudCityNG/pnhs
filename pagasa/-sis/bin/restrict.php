<!DOCTYPE html>

<?php
if(isset($_GET['error'])) {echo $_GET['error']; echo "<br>" ;}
?>

<head>
<meta charset="utf-8">
<title>PNHS</title>
<link rel="stylesheet" type="text/css" href="../css/form.css" />
<link type="text/css" rel="stylesheet" href="../css/basic.css">
</head>

<body>
 <div id="container" align="center">
      <div id="header">
          <center>
          <img src="../images/pnhs_logo.png" />
          </center>
      </div>
          
       <center>
       <img src="../images/pnhs title.png" />
       <center>
  </div>
 <div id="header"> pagasa </div>
<div id="body">

<div id="content">
		<h1>Unauthorized Access.</h1>
        <h4>Please login to access the system.</h4>
        <?php if(isset($_SESSION['username'])){?>
        <h4><a href="index.php">LOGIN</a></h4>
        <?php } else {?>
        <h4><a href="home.php">HOME</a></h4>
        <?php } ?>
	</section><!-- content -->
</div><!-- container -->

</div>
</div>
</body>
</html>