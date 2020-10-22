<?php 

require("dbconnect.php");

$id=$_POST['id'];
$name=$_POST['name'];
$photo=$_POST['photo1'];
$newphoto=$_FILES['photo'];
$price=$_POST['uprice'];
$discount=$_POST['dprice'];
$description=$_POST['desc'];
$brandid=$_POST['brand2'];
$codeno=$_POST['codeno'];
$subcatid=$_POST['subcat'];

// var_dump($brandid);

if($newphoto['size']>0){
	$source_dir="image/item/";
	$filename=mt_rand(100000,999999);
	$file_exe_array=explode('.',$newphoto['name']);
	$file_exe=$file_exe_array[1];

	$fullpath=$source_dir.$filename.'.'.$file_exe;
	move_uploaded_file($newphoto['tmp_name'], $fullpath);
}
else{
	$fullpath=$photo;
}

$sql="UPDATE items SET name=:value1, codeno=:value2, photo=:value3, price=:value4, discount=:value5, description=:value6, brand_id=:value7, subcategory_id=:value8 WHERE id=:value9";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':value1',$name);
$stmt->bindParam(':value3',$fullpath);
$stmt->bindParam(':value2',$codeno);
$stmt->bindParam(':value4',$price);
$stmt->bindParam(':value5',$discount);
$stmt->bindParam(':value6',$description);
$stmt->bindParam(':value7',$brandid);
$stmt->bindParam(':value8',$subcatid);
$stmt->bindParam(':value9',$id);
$stmt->execute();

header('location:item.php');

 ?>