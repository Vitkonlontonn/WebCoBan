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
    $sql ="SELECT 
    orders.*, 
    customers.name,
    customers.number,
    customers.address
    FROM orders
    join customers 
    on customers.id= orders.customer_id";
    $result = mysqli_query($connect, $sql);
 
    ?>
    <table border="1">
        <tr>
            <th>Mã</th>
            <th>Thời gian</th>
            <th>Thông tin người nhận</th>
            <th>Thông tin người đặt</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Xem chi tiết</th>
            <th>Duyệt</th>
            <th>Hủy</th>

        </tr>
        <?php foreach ($result as $each): ?>
        <tr>
            <td><?php echo $each['id']; ?></td>
            <td><?php echo $each['created_at']; ?></td>
            <td>
                <?php echo $each['name_receiver']; ?>
                <?php echo $each['number_receiver']; ?>
                <?php echo $each['address_receiver']; ?>
            </td>
            <td>
            <?php echo $each['name']; ?>
                <?php echo $each['number']; ?>
                <?php echo $each['address']; ?>
            </td>
            <td>
                <?php 
                    switch ($each['status']){
                        case '0':
                            echo "Mới đặt";
                            break;
                        case '1':
                            echo "Đã duyệt";
                            break;
                        case '2':
                            echo "Đã hủy";  
                            break; 
                    }
                 ?>
            </td>
            <td><?php echo $each['total_price']; ?></td>
            <td>
                <a href="detail.php?id=<?php echo $each['id']?>">xem</a>
            </td>
            <td>
                <a href="update.php?id=<?php echo $each['id']?>"&status=1></a>
            </td>
            <td>
                <a href="update.php?id=<?php echo $each['id']?>"&status=2></a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>