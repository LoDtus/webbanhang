<?php
session_start();
//lay id goi den
$delid = $_GET['id'];
// ket noi csdl
require ('../db/conn.php');
if ($_SESSION['user']['type'] != 'Admin') {
    echo "<h2?>Bạn không có quyền truy cập nội dung này</h2>";

} else {
    $sql_str = "delete  from admins where id=$delid";
    mysqli_query($con, $sql_str);
    // tro ve trang liet ke brands
    header("location: listusers.php");
}