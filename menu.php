<div id="tren">
    <ol>
        <li>
            <a href="index.php">Trang chủ</a>
        </li>
        <?php
        //session_start();
        if (empty($_SESSION['id'])) { ?>
            <li>
                <a href="signin.php">Đăng nhập</a>
            </li>
            <li>
                <a href="signup.php">Đăng ký</a>
            </li>
        <?php } else  { ?>
            <li>
                <a href="view_cart.php">Xem giỏ hàng</a>
            </li>
            <li>
                Xin chào <?php echo $_SESSION['name']; ?>, <br>
                <a href="signout.php">Đăng xuất</a>
            </li>
        <?php } ?>


    </ol>
</div>