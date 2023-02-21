<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$number = $_POST['number'];

require 'admin/connect.php';

$sql ="select count(*) from customers
       where email='$email'";//Đếm số email trùng với email

$result = mysqli_query($connect, $sql);
mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];//Check xem email đã dùng chưa


if ($number_rows == 1) {
        header('location:signup.php?error=Trùng email');
        //quay lại trang signup
        exit;
}

$sql = "insert into customers (name, email, password, number, address)
         values ('$name','$email','$password', '$number', '$address')";
mysqli_query($connect, $sql);
// Gửi mail khi đki thành công
require 'mail.php';
$title= "Đăng ký thành công";
$content='Bạn đã đăng ký tài khoản mua hàng thành công. Mua hàng đi bạn eiiiii';
sendMail($email, $name,$title, $content );

$sql = "select id from customers
       where email ='$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id']; //Lấy id ở cột id

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;


//Bắt đầu dùng Session
//Lưu lại trong session những gì hay truy vấn chứ ko nên lưu all
//Nên lưu lại id và name của ng dùng trong session

mysqli_close($connect);
