<?php
require '../check_super_admin.php';
$id =$_GET['id'];

require('../connect.php');
$sql ="DELETE from manufactures where id = '$id'";

mysqli_query($connect, $sql);

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php"> Trang chủ</a>
</body>
</html>