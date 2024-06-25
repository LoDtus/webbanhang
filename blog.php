<?php
session_start();
$is_homepage = false;
require_once ('./db/conn.php');
require_once ('components/header.php');
// $idsp = $_GET['id'];
// $sql_str = "select * from news where id=$idsp";
// $result = mysqli_query($con, $sql_str);
// $row = mysqli_fetch_assoc($result);
// $anh = $row['avatar'];
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Tin tức</h2>
                    <div class="breadcrumb__option">
                        <a href="/index.php">Trang chủ</a>
                        <span>Tin tức</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Categories</h4>
                        <ul>
                            <li><a href="#">All</a></li>
                            <?php
                            $sql_str2 = "select * from newcategories order by id";
                            $result2 = mysqli_query($con, $sql_str2);
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                <li><a href="#"><?= $row2['name'] ?> (20)</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tin mới </h4>
                        <div class="blog__sidebar__recent">
                            <?php
                            $sql_str3 = "select * from news order by created_at desc limit 0,3";
                            $result3 = mysqli_query($con, $sql_str3);
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                ?>

                                <a href="tintuc.php?id=<?= $row3['id'] ?>" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="<?= 'quantri/' . $row3['avatar'] ?>" width="70px" alt="">
                                    </div>
                                    <div class=" blog__sidebar__recent__item__text">
                                        <h6><?= $row3['title'] ?></h6>
                                        <span><?= $row3['created_at'] ?></span>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tìm kiếm</h4>
                        <div class="blog__sidebar__item__tags">
                            <?php
                            $sql_str2 = "select * from newcategories order by id";
                            $result2 = mysqli_query($con, $sql_str2);
                            while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                                <a href="#"><?= $row2['name'] ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <?php
                    $sql_str3 = "select * from news order by created_at ";
                    $result3 = mysqli_query($con, $sql_str3);
                    while ($row = mysqli_fetch_assoc($result3)) {
                        ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?= 'quantri/' . $row['avatar'] ?>  " height='250px' alt="">
                                </div>
                                <div class=" blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i><?= $row['created_at'] ?> </li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#"><?= $row['title'] ?></a></h5>
                                    <p><?= $row['sumary'] ?></p>
                                    <a href="tintuc.php?id=<?= $row['id'] ?>" class="blog__btn">READ MORE <span
                                            class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
<?php
require_once ('components/footer.php');
?>