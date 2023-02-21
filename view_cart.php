<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem giỏ hàng </title>
</head>

<body>
    <h1>Đây là giỏ hàng</h1>
    <?php session_start();
    $cart = $_SESSION['cart'];
    $sum =0; // Tổng hóa đơn
     ?>

    
    <table border="1">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>+</th>
            <th>Số lượng</th>
            <th>-</th> 
            <th>Tổng tiền</th>
            <th>Xóa</th>
        </tr>

        <?php foreach ($cart as $id => $each) : ?>

            <tr>
                <td><?php echo $each['name'] ?></td>
                <td><img src="admin/products/images/<?php echo $each['image'] ?>" height="100"></td>
                <td><?php echo $each['price'] ?></td>
                <td><a href="update_quantity_cart.php?type=incre&id=<?php echo $id ?>" style="text-decoration:none">+</a></td>
                <td><?php echo $each['quantity'] ?></td>
                
                <td><a href="update_quantity_cart.php?type=decre&id=<?php echo $id ?>" style="text-decoration:none">-</a></td>
                <td><?php 
                $result1=$each['quantity']* $each['price']; //Tổng tiền mỗi loại sản phẩm
                $sum += $result1;
                echo $result1; 
                ?></td>
                <td><a href="delete_cart.php?id=<?php echo $each['id'] ?>">X</a></td>

                </tr>

            <?php endforeach; ?>
            


    </table>
    <h1>Tổng tiền hóa đơn: <?php echo $sum?></h1>

    <!---------Form điền để thanh toán -------->
    <!--- Lấy thông tin khách hàng dựa vào session
          => điền sẵn thông tin người nhận -->
    <?php
    $id = $_SESSION['id'];
    require "admin/connect.php";
    $sql = "SELECT * from customers where id = $id";
    $result =mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?> 
    <form action="process_checkout.php" method ="POST">
        Tên người nhận <input type="text" name="name_receiver" value="<?php echo $each['name'] ?>"> 
        <br>
        SĐT người nhận <input type="text" name="number_receiver" value="<?php echo $each['number'] ?>">
        <br>
        Địa chỉ người nhận <input type="text" name="address_receiver" value="<?php echo $each['address'] ?>">
        <br>
        <button>Đặt hàng</button>
    </form>
</body>

</html>