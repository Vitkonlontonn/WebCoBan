
<?php
$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['remember'])) {
    $remember = true;
} else $remember = false;

require('admin/connect.php');
$sql = "select * from customers
       where email='$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);//đếm xem có bao nhiêu bản ghi mà email và mật khẩu mà đã đăng nhập

if ($number_rows == 1) {
    echo "Đăng nhập thành công";

    session_start();
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
    if ($remember) {
        $token = uniqid('user_', true); //sinh random token
        $sql = "update customers
               set
               token = $token
               where
               
                id = '$id'";
        mysqli_query($connect, $sql);
        setcookie('remember', $token, time() + 60 * 60 * 24 * 30);
    }
    //cookie sẽ lưu tính từ thời gian hiện tại
    //nên phải dùng hàm time() để lấy thgian hiện tại + số giây set cookie
    header('Location:index.php');
} else {
    echo "Sai thông tin đăng nhập";
    header('location:signin.php?error=Sai thông tin đăng nhập');
}


