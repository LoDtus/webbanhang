<?php
//lay id goi den
$delid = $_GET['id'];
//ket noi csdl
require ('../db/conn.php');
//tim cac hinh anh cua san pham va xoa
$sql1 = "select images from products where id=$delid";
$rs = mysqli_query($con, $sql1);
$row = mysqli_fetch_assoc($rs);
// danh sach cac anh
$images_arr = explode(';', $row['images']);
//print_r($images_arr);exit;
//xoa cac anh
foreach ($images_arr as $img) {
    unlink($img);
}
$sql_str = "delete from products where id=$delid";
mysqli_query($con, $sql_str);
// tro ve trang liet ke brands
header("location: listsanpham.php");