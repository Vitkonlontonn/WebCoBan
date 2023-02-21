<?php require '../check_admin.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require '../connect.php';
    $id_order = $_GET['id'];
    $sql = "SELECT 
    *
    FROM order_detail
    join products on products.id = order_detail.product_id
    where order_id= '$id_order'";
    $result = mysqli_query($connect, $sql);
    //die($sql);
    $sum = 0;
    ?>
    <table border="1">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>

        </tr>
        <?php foreach ($result as $each) : ?>

            <tr>
                <td><?php echo $each['name'] ?></td>
                <td><img src="../products/images/<?php echo $each['image'] ?>" height="100"></td>
                <td><?php echo $each['price'] ?></td>
                <td><?php echo $each['quantity'] ?></td>
                <td><?php
                    $result1 = $each['quantity'] * $each['price']; //Tổng tiền mỗi loại sản phẩm
                    $sum += $result1;
                    echo $result1;
                    ?></td>
            </tr>
            <?php endforeach; ?>
         
    </table>
    <h1>Tong tien don nay la <?php echo $sum ?></h1>

</body>

</html>