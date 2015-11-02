
 <?php
 
			require_once('db.php');
			$id=$_GET['id'];
			if ( ! isset($_FILES['image']))
			{
				
			}
			
			else 
			{
			$image=addslashes($_FILES["image"]["tmp_name"]);
			$image_name = $_FILES["image"]["name"];
			$type = $_FILES["image"]["type"];
			$size = $_FILES["image"]["size"];
			$temp = $_FILES["image"]["tmp_name"];
			$error = $_FILES["image"]["error"];
			
			if($size == FALSE)
			echo "this is not an image"; 
			
			else
			{
			move_uploaded_file($temp,'../library/book/'.$image_name.$id);
							// *** Include the class
							include_once ("resize-class.php");
			
							// *** 1) Initialise / load image
							$resizeObj = new resize('../library/book/'.$image_name.$id);
			
							// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
							$resizeObj -> resizeImage(90, 90, 'crop');
			
							// *** 3) Save image
							$resizeObj -> saveImage('../library/book/dpic/'.$image_name.$id, 100);
			//query img to db
			
			$update = mysql_query("UPDATE cat_reading_material_t SET image='$image_name$id' WHERE call_no = '$id';") or die(mysql_error());
					}
			//echo $image_name;
			//echo "<img src='../-registration/include/dpic/$image_name' />";

			
			}
					
		header ("Location: bookinfo.php?call_no=$id");
			
			?>
            
        

