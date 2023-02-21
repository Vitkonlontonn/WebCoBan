<?php
//File này để xử lý thông tin thanh toán
// insert vào 2 bảng orders(thông tin ng mua, ...) 
// và bảng order_detail (thông tin sản phẩm, số luownhj,)
//
// Khi đặt hàng xog cần xóa giỏ hàng
$name_receiver = $_POST['name_receiver'];
$number_receiver = $_POST['number_receiver'];
$address_receiver = $_POST['address_receiver'];

session_start();
require "admin/connect.php";

$customer_id = $_SESSION['id'];
$status = 0; // mới đặt hàng
$created_at; // cái này set trong db để default là thời gian hiện tại nên k cần truyền giá trị gì

$cart = $_SESSION['cart'];
$total_price = 0;
foreach ($cart as $each_cart) {
    $total_price += $each_cart['price'] * $each_cart['quantity'];
}

//insert vào ORDERS
$sql = "insert into orders(customer_id, name_receiver, number_receiver,address_receiver, status, total_price)
values ('$customer_id', '$name_receiver', '$number_receiver','$address_receiver', '$status', '$total_price')";
mysqli_query($connect, $sql);



$sql = "select max(id) from orders where customer_id = '$customer_id'";
$result = mysqli_query($connect, $sql);
$order_id = mysqli_fetch_array($result)['max(id)'];

//insert vaò order_detail
foreach ($cart as $product_id => $each) {
    $quantity = $each['quantity'];
    $sql = "insert into order_detail(order_id, product_id, quantity) values
    ('$order_id','$product_id',$quantity) ";
    mysqli_query($connect, $sql);
}
//die ($sql);
mysqli_close($connect);
unset($_SESSION['cart']); // xóa session giỏ hàng nếu ko nỗi lần tải lại trang nó sẽ thêm 1 hóa đơn

header('location:index.php');
