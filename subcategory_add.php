<?php 

require ("dbconnect.php");

$name=$_POST['name'];
$opt=$_POST['opt'];

$sql="INSERT INTO subcategories (name,category_id) VALUES(:value1, :value2)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':value1',$name);
$stmt->bindParam(':value2',$opt);
$stmt->execute();

header('location:subcategories.php');

 ?>