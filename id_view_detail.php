<style type="text/css">

</style>
<?php
$id= $_GET["id"];
require('admin/connect.php');
$sql ="select * from products where id = $id";
$result = mysqli_query($connect, $sql);
$each =mysqli_fetch_array($result);
?>
<div id = "giua">
    
            <div class="tung_san_pham">
                <h1>
                    <?php echo $each['name'];?>
                </h1>
                <img src="admin/products/images/<?php echo $each['image']?>" height="70px">
                <p><?php echo $each['price']?></p>
                <p> <?php echo $each['description']?></p>
                
            </div>
    

</div>