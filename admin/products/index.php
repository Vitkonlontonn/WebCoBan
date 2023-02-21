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
    require "../menu.php";
    require "../connect.php";
    $sql = "SELECT * FROM products ";
    $result = mysqli_query($connect, $sql);

    ?>
    <h2>Quản lý sản phẩm</h2>
    <a href="form_insert.php">Thêm sản phẩm</a>
    <table border="1", width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Nhà sản xuất</th>
            <th></th>
            <th></th>

        </tr>
        <tr>
            <?php foreach ($result as $each) { ?>
            <td><?php echo $each['id'] ?></td>
            <td><?php echo $each['name'] ?></td>
            <td><img src="images/<?php echo $each['image']?>" height="100"></td>
            <td><?php echo $each['price'] ?></td>
            <td><?php
                $manufacture_id = $each['manufacture_id'];
                 $sql1="SELECT * FROM manufactures where id = $manufacture_id ";
                 $result1 = mysqli_query($connect, $sql1);
                 $result1 = mysqli_fetch_array($result1); 
                 //result1 là để lưu kết quả chọn mã nhà sản xuất

                 echo $result1['name'] ?></td>
            <td><a href="update.php?id=<?php echo $each['id']?>">Sửa</a></td>
            <td><a href="delete.php?id=<?php echo $each['id']?>">Xóa</a></td>

        </tr>
            <?php } ?>
    </table>
    

</body>

</html>