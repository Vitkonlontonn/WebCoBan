<style type="text/css">
    .tung_san_pham {
        width: 33%;
        border: 1px solid black;
        float: left;
        height:200px;
    }
</style>
<?php
require('admin/connect.php');
$sql ="select * from products";
$result = mysqli_query($connect, $sql);
?>
<div id = "giua">
    <?php foreach($result as $each) {?>
            <div class="tung_san_pham">
                <h3>
                    <?php echo $each['name'];?>
                </h3>
                <img src="admin/products/images/<?php echo $each['image']?>" height="70px">
                <p><?php echo  + $each['price']?></p>
                <a href="product_view_detail.php?id=<?php echo $each['id']?>">
                Xem chi tiết >> </a>
            
                <?php if (!empty($_SESSION['id'])) { ?>
                    <a href="add_to_cart.php?id=<?php echo $each['id']?>">
                    Thêm vào giỏ hàng</a>

                <?php } ?>

                
            </div>
    <?php } ?>

</div>