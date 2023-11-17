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


        <?php

        include "binhluan/binhluan.php";
        ?>



    </div>
</div>



</div>
