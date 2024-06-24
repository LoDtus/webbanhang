<?php
//echo "xin chao";

require ('../db/conn.php');

//lay du lieu tu form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$address = $_POST['address'];
$type = $_POST['type'];



//cau lenh them vao bang
$sql_str = "INSERT INTO `admins` (`name`,`email`, `password`,`phone`,`address`, `type`
,`status`,`created_at`,`updated_at`) VALUES 
    ('$name', 
    '$email',
    '$password', 
    '$phone',
    '$address', 
    '$type',
     'Active',now(), now() );";
// echo $sql_str;
// exit;

// thuc thi cau lenh
$result = mysqli_query($con, $sql_str);
//tro ve trang
header("location: ./listusers.php");

?>