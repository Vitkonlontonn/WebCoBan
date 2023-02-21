<?php
$email = $_POST['email'];
require 'admin/connect.php';
$sql = "SELECT id, name  from customers
where email ='$email'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result)===1)

{
   $each = mysqli_fetch_array($result);
   $id= $each['id'];
   $name = $each['name'];
   $sql = "delete from forgot_pasword
   where customer_id= $id";
   mysqli_query($connect, $sql);
   $token = uniqid();
   //die ($token);
   $sql = "insert into forgot_password (customer_id, token)
   values('$id', '$token')";

   mysqli_query($connect, $sql);
   

   //----------------------------------------------------------------
   //function chuyển đến địa chỉ trang web
   function current_url()
   {
    $url ="http://" . $_SERVER['HTTP_HOST'];
    return $url;
   }
   $link = current_url() . '/j2team/WebCoBan/change_new_password.php?token='.$token;

   require 'mail.php';
   $title='Đặt lại mật khẩu';
   $content ="Bấm vào link này đặt lại mật khẩu
   <a href ='$link'>mai dzooo</a>";
   sendMail($email, $name, $title,$content);
}
