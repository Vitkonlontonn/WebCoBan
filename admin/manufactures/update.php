<?php require '../check_super_admin.php'; ?>
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
    $id = $_GET ['id'];
    require('../connect.php');

    $sql = "SELECT * FROM manufactures WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);   
    $result = mysqli_fetch_array($result);
    

     ?>
    <form method = "POST" action="process_update.php">
        <input type="hidden" name="id" value="<?php echo $result['id']?>">
       Tên
       <input type="text" name="name" value="<?php echo $result['name']?>"> <br>
       Địa chỉ
       <textarea name="address" > <?php echo $result['address']?></textarea> <br>
       Số điện thoại
       <input type="text" name="phone" value =<?php echo $result['phone']?>> <br>
       Ảnh 
       <input type="text" name="image" value =<?php echo $result['image']?>> <br>
       <button>Sửa</button>

    </form>
    
</body>
</html>