<html>
<head>
<title> Uploading Images</title>
</head>
<body>
</br>
</br>
</br>
<form style="text-align:center" action="hmm.php"  method="post"   enctype="multipart/form-data">

Select Image: <input type="file"    name="image"  >
<input type="submit"    name="upload"  value ="Upload Now">       
</form>
</body>

</html>

<?php

mysql_connect("localhost","root")or die(mysql_errno());
mysql_select_db("pagasa")or die(mysql_errno());

if ( ! isset($_FILES['image']))
{
    echo 'Please select a file..';
}

else 
{
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name= addslashes($_FILES['image']['name']);
$image_size = getimagesize($_FILES['image']['tmp_name']);

if($image_size == FALSE)
echo "this is not an image"; 
else
{
if (!$insert = mysql_query("insert into student_t(photo) values('$image')"))
echo "problem uploading image";
else 
{
{ 
$last_id = mysql_insert_id();
echo "image uploaded. <p/> your image:<p/><img src=get_image.php?id=$last_id>";
}   
}
}
}
?>