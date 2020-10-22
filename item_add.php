<?php 

require("dbconnect.php");

$name=$_POST['name'];
$photo=$_FILES['photo'];
$uprice=$_POST['uprice'];
$dprice=$_POST['dprice'];
$desc=$_POST['desc'];
$brand=$_POST['brand'];
$subcat=$_POST['subcat'];
$code=$_POST['codeno'];

$source_dir='image/item/';

// image/item/1.jpg
// image/item/933829.jpg

$filename=mt_rand(100000,999999);
$file_exe_array=explode('.',$photo['name']);
$file_exe=$file_exe_array[1];

$fullpath=$source_dir.$filename.'.'.$file_exe;
move_uploaded_file($photo['tmp_name'], $fullpath);

$sql="INSERT INTO items(codeno,name,photo,price,discount,description,brand_id,subcategory_id) VALUES(:value1,:value2,:value3,:value4,:value5,:value6,:value7,:value8)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':value1',$code);
$stmt->bindParam(':value2', $name);
$stmt->bindParam(':value3',$fullpath);
$stmt->bindParam(':value4',$uprice);
$stmt->bindParam(':value5',$dprice);
$stmt->bindParam(':value6',$desc);
$stmt->bindParam(':value7',$brand);
$stmt->bindParam(':value8',$subcat);
$stmt->execute();

header('location:item.php');

 ?>