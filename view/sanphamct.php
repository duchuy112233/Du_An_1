<div class="chitietsp">
    <h3 class="title-sp"><?php echo $onesp['name'] ?></h3>
    <div class="boxctsp">
        <div class="box-left">
            <div class="">
                <img src="../upload/<?php echo $onesp['img'] ?>" alt="">
            </div>
            <div class="boxctsp-money">
                <h3 style="color: #009B48;"><?php echo number_format($onesp['price'] - $onesp['price'] * ($onesp['giamgia'] / 100)) ?> Đ</h3>
                <p>Giá gốc : <del><?php echo number_format($onesp['price']) ?> Đ</del></p>
                <p>Giảm giá: -<?php echo number_format($onesp['giamgia']) ?>%</p>
                <p>Lượt xem: <?php echo $onesp['luotxem'] ?></p>
                <input type="submit" value="Mua hàng" class="btn-mua">
            </div>
        </div>
        <div class="box-right">
            <div>
                <h4>Thông số kĩ thuật</h4>
                <div class="content-ctsp">
                    <p><span>CPU</span><span><?php echo $onesp['cpu'] ?></span></p>
                    <p><span>RAM</span><span><?php echo $onesp['ram'] ?></span></p>
                    <p><span>Ổ cứng</span><span><?php echo $onesp['ocung'] ?></span></p>
                    <p><span>Card</span><span><?php echo $onesp['card_do_hoa'] ?></span></p>
                    <p><span>M.Hình</span><span><?php echo $onesp['man_hinh'] ?></span></p>
                </div>
                <h4>Thông tin bảo hành</h4>
                <div class="content-ctsp">
                    <p>Bảo hành pin 12 tháng</p>
                    <p>Giá sản phẩm đã bao gồm VAT</p>
                    <p>1 đổi 1 trong 30 ngày nếu có lỗi</p>
                </div>
            </div>
        </div>
    </div>
    <h4>Mô tả</h4>
    <hr>
    <p><?php echo $onesp['mota'] ?></p>

    <div class="title">
        <h4 style="color: black;">SẢN CÙNG LOẠI</h4>
        <hr>
    </div>
    <div class="row">
        <?php foreach ($sp_cungloai as $key => $sp) : ?>
            <div class="boxsp">
                <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><img src="../upload/<?php echo $sp['img'] ?>" alt=""></a>
                <div class="card-body">
                    <div class="box-title">
                        <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><?php echo $sp['name'] ?></a>
                    </div>
                    <div class="boxsp-content">
                        <p>CPU <?php echo $sp['cpu'] ?></p>
                        <p>RAM <?php echo $sp['ram'] ?></p>
                        <p>Ổ cứng <?php echo $sp['ocung'] ?></p>
                        <p>Card <?php echo $sp['card_do_hoa'] ?></p>
                        <p>M.Hình <?php echo $sp['man_hinh'] ?></p>
                    </div>
                    <div class="money">
                        <del><?php echo number_format($sp['price']) ?> VND</del>
                        <span>-<?php echo number_format($sp['giamgia']) ?>%</span>
                        <p><?php echo number_format($sp['price'] - $sp['price'] * ($sp['giamgia'] / 100)) ?> Đ</p>
                    </div>
                    <div class="add">
                        <a href="" class="btn-shop"><input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="btn-shop-text">
                            <i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

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
                    <img src="../upload/<?php echo $bl['img'] ?>" alt="">
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