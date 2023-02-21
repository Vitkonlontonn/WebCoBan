<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<body>
<?php
if (isset($_GET['error'])) {
    echo $_GET['error'];
}?>
    <form method="post" action="process_signup.php">
        Tên <input type="text" name="name"> <br>
        Email <input type="email" name="email"> <br>
        Số điện thoại <input type="text" name="number"> <br>
        Địa chỉ <input type="text" name="address">  <br>
        Mật khẩu <input type="password" name="password"> <br>
        <button> Đăng ký</button>

    </form>
    
</body>
</html>
