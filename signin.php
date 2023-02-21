<?php
session_start();

    if (isset ($_COOKIE['remember']))
    {
        $token = $_COOKIE['remember'];
        require 'admin/connect.php';
        $sql = "SELECT * FROM customers 
               WHERE token = '$token'
               limit 1";
        //die ($sql);
        $result =mysqli_query($connect,$sql);
        $number_rows = mysqli_num_rows($result);
        if ($number_rows==1)
        {
          $each = mysqli_fetch_array($result);
        $_SESSION['id']= $each['id'];
        $_SESSION['name'] = $each['name'];
        //echo "1";
        //Lấy thông tin người dùng dựa vào cookie
        //rồi đưa vào trong session
        //Tức là sau khi thoát khỏi trang web,
        //rồi mở lại, nếu vẫ có cookie thì đăng nhập luôn bằng session  
        }

        
 
    }
    
    // if (isset($_SESSION['id'])){
    //     header('Location:user.php ');
    //     exit();
    //Nếu có session thì nhảy sang bên người dùng luôn
    //}
    

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <?php
    //$error = $_GET['error'];
    //echo $error;
     ?>
    <form method="post" action="process_signin.php">
        email:
        <input type="email" name ="email"> <br>
        Mật khẩu:
        <input type="password" name ="password"> <br>
        Ghi nhớ đăng nhập
        <input type="checkbox" name ="remember">
        <button>Đăng nhập</button>
        <a href="forgot_password.php">
            Quen mat khau</a>
    </form>
</body>
</html>
<!-- Session để lưu phiên đăng nhập
    Cookie để lưu ghi nhớ đăng nhập -->