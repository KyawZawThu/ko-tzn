<?php 

require("dbconnect.php");

$id=$_GET['bdid'];
// var_dump($id);

$sql="DELETE FROM brands WHERE id=:value1";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':value1',$id);
$stmt->execute();

header("location:brand.php");

 ?>