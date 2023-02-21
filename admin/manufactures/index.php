<?php require '../check_super_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quản lý nhà sản xuất</title>
</head>

<body>
    <?php require "../menu.php" ?>
    <h1>Đây là khu vực quản lý nhà sản xuất</h1>
    <?php
    include('../connect.php');
    $sql = 'SELECT * FROM manufactures';
    $result = mysqli_query($connect,$sql);
    
    ?>
    <a href="form_insert.php">Thêm nhà sản xuất</a>
    <?php if (isset($_GET['success'])) { ?>
        <span style="color:green">
            <?php echo $_GET['success']; ?>
        </span>

    <?php }?>
    <table border="1">
        <tr>
            <th> Mã</th>
            <th>Tên nhà sản xuất</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ảnh</th>
            <th>    </th>
            <th>    </th>

        </tr>
        <?php foreach ($result as $each){?>
            <tr>
                <th><?php echo $each['id']; ?></th>
                <th><?php echo $each['name']; ?></th>
                <th><?php echo $each['address']; ?></th>
                <th><?php echo $each['phone']; ?></th>
                <th><img src="<?php echo $each['image']; ?>" height=100px></img></th>
                <th><a href="update.php?id=<?php echo $each['id']?>">Sửa</a></th>
                <th><a href="delete.php?id=<?php echo $each['id']?>">Xóa</a></th>
                
            </tr>

        <?php } ?> 

        
    </table>
    
</body>

</html>