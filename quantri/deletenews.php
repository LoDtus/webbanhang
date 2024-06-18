<?php
//lay id goi den
$delid = $_GET['id'];
//ket noi csdl
require ('../db/conn.php');

//tim cac hinh anh cua san pham va xoa
$sql1 = "select avatar from news where id=$delid";
$rs = mysqli_query($con, $sql1);
$row = mysqli_fetch_assoc($rs);
// tim anh va xoa
$img = $row['avatar'];
unlink($img);
//print_r($images_arr);exit;
//xoa cac anh

$sql_str = "delete from news where id=$delid";
mysqli_query($con, $sql_str);
// tro ve trang liet ke brands
header("location: listnews.php");