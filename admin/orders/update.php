<?php 
$id = $_GET['id'];
$status = $_GET['status'];
require '../connect.php';
$sql ="UPDATE orders set status =$status WHERE id = '$id'";
mysqli_query($connect, $sql);