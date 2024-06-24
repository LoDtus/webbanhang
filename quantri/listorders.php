<?php
require ('includes/header.php');

?>
<style>
    .Processing,
    .Confirmed,
    .Shipping,
    .Delivered,
    .Cancelled {
        display: block;

    }

    .Processing {
        color: orange;
    }

    .Confirmed {
        color: yellowgreen;
    }

    .Shipping {
        color: lightblue;
    }

    .Delivered {
        color: green;
    }

    .Cancelled {
        color: red;
    }
</style>
<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Blog</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>Xem</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        require ('../db/conn.php');
                        $sql_str = "select  * from orders order by created_at";
                        $result = mysqli_query($con, $sql_str);
                        $stt = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $stt++;
                            ?>


                            <tr>
                                <td><?= $stt ?></td>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['created_at'] ?></td>
                                <td><span class='<?= $row['status'] ?>'><?= $row['status'] ?></span></td>
                                <td>
                                    <a class="btn btn-warning" href="vieworders2.php?id=<?= $row['id'] ?>">Xem</a>
                                    <a class="btn btn-danger" href="deleteorders2.php?id=<?= $row['id'] ?>"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này?');">
                                        Xóa
                                        <!-- xoa thông tin order thì phải xoa ca thông tin order_detail -->
                                    </a>
                                </td>

                            </tr>
                            <?php

                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require ('includes/footer.php');
?>