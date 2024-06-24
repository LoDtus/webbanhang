<?php

//lay id goi edit
$id = $_GET['id'];

//ket noi csdl
require ('../db/conn.php');

$sql_str = "SELECT * FROM orders WHERE id=$id";
$res = mysqli_query($con, $sql_str);
$row = mysqli_fetch_assoc($res);

if (isset($_POST['btnUpdate'])) {
    //lay du lieu tu form
    $status = $_POST['status'];
    // cau lenh them vao bang
    $sql_str = "UPDATE `orders` 
                SET status =  '$status'
                WHERE `id`=$id";
    //thuc thi cau lenh
    mysqli_query($con, $sql_str);
    //tro ve trang 
    header("location: ./listorders.php");
} else {
    require ('includes/header.php');
    ?>

    <div class="container my-5">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Xem và cập nhật trạng thái đơn hàng</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="user" method="post" action="#">
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Khách hàng:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-plaintext">
                                                    <?= $row['firstname'] . ' ' . $row['lastname'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Địa chỉ:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-plaintext"><?= $row['address'] ?></p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Số điện thoại:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-plaintext"><?= $row['phone'] ?></p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Email:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-plaintext"><?= $row['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label">Trạng thái đơn hàng:</label>
                                            <div class="col-md-9">
                                                <select name="status" class="form-select" style="max-width:200px">
                                                    <option <?= $row['status'] == 'Processing' ? 'selected' : '' ?>>Processing
                                                    </option>
                                                    <option <?= $row['status'] == 'Confirmed' ? 'selected' : '' ?>>Confirmed
                                                    </option>
                                                    <option <?= $row['status'] == 'Shipping' ? 'selected' : '' ?>>Shipping
                                                    </option>
                                                    <option <?= $row['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered
                                                    </option>
                                                    <option <?= $row['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">Chi tiết đơn hàng</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT *, products.name as pname, order_details.price as oprice FROM products, order_details WHERE products.id=order_details.product_id AND order_id=$id";
                                            $res = mysqli_query($con, $sql);
                                            $stt = 0;
                                            $tongtien = 0;
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $tongtien += $row['qty'] * $row['oprice'];
                                                ?>
                                                <tr>
                                                    <td><?= ++$stt ?></td>
                                                    <td><?= $row['pname'] ?></td>
                                                    <td><?= number_format($row['oprice'], 0, '', '.') . " VNĐ" ?></td>
                                                    <td><?= $row['qty'] ?></td>
                                                    <td><?= number_format($row['total'], 0, '', '.') . " VNĐ" ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="text-end">
                                        <h5 class="font-weight-bold">
                                            Tổng tiền: <?= number_format($tongtien, 0, '', '.') . " VNĐ" ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require ('includes/footer.php');
}
?>