<?php
//lay id goi den
$delid = $_GET['id'];
// ket noi csdl
require ('../db/conn.php');
$sql_str = "delete  from brands where id=$delid";
mysqli_query($con, $sql_str);
// tro ve trang liet ke brands
header("location: listbrands.php");