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
    $id = $_GET["id"];
    require("../connect.php");
    $sql = "SELECT *FROM products WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_array($result);
    $sql1 = "SELECT * FROM manufactures ";
    $result1 = mysqli_query($connect, $sql1);
    ?>
    <form method="post" action="process_update.php">
        <input type="hidden" nama="id" value="<?php echo $id ?>">
        Tên sản phẩm
        <input type="text" name="name" value="<?php echo $result["name"] ?>"> <br>
        Ảnh
        <input type="file" name="image_new"> <br>
        Hoặc để ảnh cũ
        <img src="images/<?php echo $result['image'] ?>" height="100"> <br>
        Giá
        <input type="number" name="price" value="<?php echo $result["price"] ?>"> <br>
        Mô tả
        <textarea name="description" ><?php echo $result["description"] ?></textarea><br>
        Nhà sản xuất
        <select name="manufacture_id">
            <?php foreach ($result1 as $each) { ?>
                <?php if ($each['id'] != $result['manufacture_id']) { ?>
                    <option value=<?php echo $each['id'] ?>>
                        <?php echo $each['name'] ?>
                    </option>

                <?php } else { ?>
                    <option selected value=<?php echo $each['id'] ?>>
                        <?php echo $each['name'] ?>
                    </option>
                <?php } ?>

            <?php } ?>
        </select>
        <input type="hidden" nama="image_old" value="<?php echo $result['image'] ?>">
        
        <button> Sửa</button>
    </form>
</body>

</html>