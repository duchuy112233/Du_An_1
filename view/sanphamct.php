<div class="chitietsp">
    <h3 class="title"><?php echo $onesp['name'] ?></h3>
    <div class="boxctsp">
        <div class="box-left">
            <div class="">
                <img src="../upload/<?php echo $onesp['img'] ?>" alt="">
            </div>
            <div class="boxctsp-money">
                <h3 style="color: #009B48;"><?php echo number_format($onesp['price'] - $onesp['price'] * ($onesp['giamgia'] / 100)) ?> Đ</h3>
                <p>Giá gốc : <del><?php echo number_format($onesp['price']) ?> Đ</del></p>
                <p>Giảm giá: -<?php echo number_format($onesp['giamgia']) ?>%</p>
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
                <h4>Thông tin sản phẩm</h4>
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
        <h4>SẢN CÙNG LOẠI</h4>
        <hr>
    </div>
    <div class="row">
        <?php foreach ($sp_cungloai as $key => $sp) : ?>
            <div class="boxsp">
                <a href="index.php?act=sanphamct"><img src="../upload/<?php echo $sp['img'] ?>" alt=""></a>
                <div class="card-body">
                    <div class="box-title">
                        <a href="index.php?act=sanphamct"><?php echo $sp['name'] ?></a>
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
        <h4 class="binhluan-title">BÌNH LUẬN</h4>

        <div class="">
            <form class="formbinhluan" action="" method="post">
                <input type="text" id="nhap">
                <input class="nut-gui" type="submit" name="guibinhluan" value="Gửi">
            </form>
        </div>
    </div>
</div>