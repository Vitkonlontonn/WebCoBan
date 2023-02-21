<?php
require '../check_admin.php';
$id =$_POST['id'];
echo $id;
$name = $_POST['name'];
$image_new = $_FILES['image_new'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacture_id = $_POST['manufacture_id'];


if ($image_new['size'] > 0) {
   $folder = "images/";

$file_extension = explode('.', $image['name']) [1]; //Lấy đuôi file

$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($image["tmp_name"], $path_file); //Upload file 
}
else $file_name= $_POST['image_old'];


require("../connect.php");
$sql = "update product 
        set name ='$name', 
            image ='$file_name',
            price =$price,
            description ='$description',
            manufacture_id ='$manufacture_id'
        where id = '$id'";
mysqli_query($connect, $sql);

