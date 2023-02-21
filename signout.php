<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
//session_destroy();
//Nếu cần bỏ hết các thông tin đăng nhập thì dùng cái destroy
//Nếu ko thì chỉ loại bỏ name với id vì còn giỏ hàng

setcookie('remember',null, -1);
//Xóa cookie khi đăng xuất
header('location: index.php');