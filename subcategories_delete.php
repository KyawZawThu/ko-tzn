<?php 

require("dbconnect.php");
$id=$_GET['sdid'];

$sql="DELETE FROM subcategories WHERE id=:value1";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':value1',$id);
$stmt->execute();

header("location:subcategories.php");

 ?>