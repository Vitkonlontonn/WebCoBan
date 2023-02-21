<?php require '../check_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require "../menu.php";
    require "../connect.php";
    $sql = "SELECT * FROM manufactures ";
    $result = mysqli_query($connect, $sql);

    ?>
    <form method="post" action="process_insert.php" enctype="multipart/form-data">
        Tên sản phẩm
        <input type="text" name ="name" > <br>
        Ảnh
        <input type="file" name ="image"> <br>
        Giá
        <input type="number" name="price" > <br>
        Mô tả
        <textarea name="description" ></textarea><br>
        Nhà sản xuất
        <select name="manufacture_id">
            <?php foreach ($result as $each) {?>
                <option value =<?php echo $each['id']?>> 
                <?php echo $each['name']?></option>

            <?php } ?>
        </select>
        <button> Thêm</button>
    </form>
</body>
</html>