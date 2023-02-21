<?php
require '../check_super_admin.php';
$id= $_POST ['id'];
$name= $_POST ['name'];
$address= $_POST ['address'];
$phone= $_POST ['phone'];
$image= $_POST ['image'];

require ('../connect.php');
$sql ="UPDATE  manufactures
       SET 
           name ='$name',
           address = '$address',
           phone = '$phone',
           image = '$image'
        WHERE id = '$id'";
mysqli_query($connect,$sql);

mysqli_close ($connect);?>
<a href="index.php"> Trang chủ</a>