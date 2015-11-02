<?php
require_once "../db/db.php";

$category_name = $_POST['e_category_name'];
$category_id = $_POST['category_id'];

mysql_query("UPDATE subject_category_t SET category_name='{$category_name}' WHERE category_id='{$category_id}'") or die(mysql_error());
header("location: category.php");

?>