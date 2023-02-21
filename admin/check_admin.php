<?php
session_start();
if (!isset($_SESSION['level'])){
    header('location:../index.php'); //nếu vào những thư mục con như manufactures, products thì mới cần out ra
}