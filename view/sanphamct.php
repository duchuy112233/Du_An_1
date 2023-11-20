<div class="mr-banner">
    <div class="">
        <div class="chitiet-tong">
            <?php
            extract($onesp);
            ?>
            <div class="chitiet-row">
                <div class="chitiet-img">

                    <?php
                    $img = $image_path  . $img;
                    echo '<img class="img-detail" src="' . $img . '" >';
                    ?>

                </div>
                <div class="chitiet-thongso">
                    <ul>
                        <h2><?= $name ?></h2>
                        <br>
                        <li>
                            Đơn giá:
                            <?php
                            $tt = $price  - (($price * $giamgia) / 100);
                            echo number_format($tt);
                            ?> VNĐ
                            <del class="badge bg-danger"><?= $price ?> VNĐ</del>
                        </li>
                        <li>Nhà cung cấp: <?= $tendm ?></li>
                        <li>Hàng mới nhập</li>
                        <li>
                            Số lượng còn:
                            <span class="badge bg-warning">5</span> chiếc
                        </li>
                        <li>
                            Giảm giá:
                            <span class="badge bg-danger"><?= $giamgia ?> % </span>
                        </li>
                        <li>
                            Lượt xem:
                            <span><?= $luotxem ?></span>
                        </li>
                    </ul>
                    <div class="">
                        <?php
                        echo '
                            <form style="margin-top: 20px;" action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="id" value="' . $id . '">
                                <input type="hidden" name="name" value="' . $name . '">
                                <input type="hidden" name="img" value="' . $img . '">
                                <input type="hidden" name="price" value="' .  $tt = $price  - (($price * $giamgia) / 100)  . '">          
                               <input style="background-color: green;" type="submit" name="addtocart" value="Mua hàng" class="chitiet-muahang1">               
                            </form>';
                        ?>
                    </div>

                </div>
            </div>
            <div class="">
                <div class="chitiet-mota">
                    <h4 class="mota">MÔ TẢ SẢN PHẨM</h4>
                    <hr />
                    <br>
                    <span>
                        <?php
                        echo $mota;
                        ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="title">
            <h4>SẢN PHẨM LIÊN QUAN</h4>
            <hr>
        </div>

        <?php
        include "sanphamlienquan.php";
        ?>


        <hr>

        <!-- FORM BÌNH LUẬN -->

        <div class="binhluan">
            <h4 class="binhluan-title">Bình Luận</h4>
            <div class="add-bl">
                <?php if (isset($_SESSION['user'])) : ?>
                    <form action="index.php?act=sanphamct&idsp=<?php echo $onesp['id'] ?>" method="post">
                        <input type="text" name="noidung">
                        <input type="hidden" name="idsp" value="<?php echo $onesp['id'] ?>">
                        <span><i class="fa-solid fa-paper-plane" style="color: #fff;"></i><input type="submit" name="guibinhluan" value="Gửi"></span><br><br>
                        <p style="color:red;">
                            <?php
                            if (isset($thongbao8) && !empty($thongbao8)) {
                                echo $thongbao8;
                            }
                            ?>
                        </p>
                    </form>
                <?php else : ?>
                    <p style="color: red;">Bạn cần đăng nhập để bình luận</p>
                <?php endif ?>
            </div>
            <div class="form-bl">
                <?php foreach ($binhluan as $key => $bl) : ?>
                    <div class="avatar-bl">
                        <?php if ($bl['img'] != "") : ?>
                            <img src="../upload/<?php echo $bl['img'] ?>" alt="Ảnh đại diện">
                        <?php else : ?>
                            <?php $first_letter = strtoupper(substr($_SESSION['user']['email'], 0, 1)) ?>
                            <div class="avatar-name"><?php echo $first_letter; ?></div>
                        <?php endif ?>
                        <p><?php echo $bl['user'] ?></p>
                    </div>
                    <div class="comment">
                        <div class="noidung"><?php echo $bl['noidung'] ?></div>
                        <div class="ngaybl"><?php echo date("d/m/Y", strtotime($bl['ngaybl'])) ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>
</div>