<?php
session_start();
if (!empty($_SESSION['id']))
echo $_SESSION['id'] ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ </title>
    <style type="text/css">
        #tong {
            width: 100%;
            height: 700px;
            background: black;
        }
        #tren {
            width: 100%;
            height: 20%;
            background: pink;
        }
        #giua {
            width: 100%;
            height: 70%;
            background: yellow;
        }
        #duoi {
            width: 100%;
            height: 10%;
            background: green;
        }
    </style>
</head>
<body>
    <h1>Đây là giao diện khách hàng</h1>
    <div id ="tong">
       <?php include 'menu.php'?>
        <?php include 'products.php'?>
        <?php include 'footer.php'?>
    </div>
</body>
</html>