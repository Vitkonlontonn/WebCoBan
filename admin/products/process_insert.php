<?php
 require '../check_admin.php';
$name = $_POST['name'];
$image = $_FILES['image'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacture_id'];

$folder = "images/";

$file_extension = explode('.', $image['name']) [1]; //Lấy đuôi file

$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($image["tmp_name"], $path_file); //Upload file

require("../connect.php");
$sql = "insert into products(name, image, price, description, manufacture_id)
        value('$name', '$file_name','$price', '$description', '$manufacturer_id')";
mysqli_query($connect, $sql);

