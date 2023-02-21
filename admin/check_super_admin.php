<?php
session_start();

//Kiểm tra level admin kiểm tra trống hoặc =0
if (empty($_SESSION['level']))

{
    header('location:../index.php');
}