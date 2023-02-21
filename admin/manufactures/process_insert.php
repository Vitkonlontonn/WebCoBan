<?php
require '../check_super_admin.php';
//validate form 
if (empty ($_POST['name']) || empty ($_POST['address']) || empty ($_POST['phone']) || empty ($_POST['image'])) {
    header('Location:form_insert.php?error=Phải điền đầy đủ thông tin');
    //Nếu chưa điền quay lại trang form và in ra lỗi

}
 $name = $_POST['name'];
 $address = $_POST['address'];
 $phone = $_POST['phone'];
 $image = $_POST['image'];

 require('../connect.php');
 $sql ="insert into manufactures (name, address, phone, image) values('$name', '$address', '$phone', '$image')";
 mysqli_query($connect,$sql);
 mysqli_close($connect);

 header( 'location:index.php?success=Thêm thành công');
 //Nếu điền xong thì quay trở lại index 
