<div class="mrlr">
    <div class="">
        <div class="chitiet-tong">
            <div class="chitiet-row">
                <div class="chitiet-img">
                    <img class="img-detail" src="image/sp2.jpg" />
                </div>
                <div class="chitiet-thongso">
                    <ul>
                        <h2><?php echo $onesp['name'] ?></h2>
                        <br>
                        <li>
                            Đơn giá:
                            <span class="line-through">18.000.000 VNĐ</span>
                            <del class="badge bg-danger">27.000.000 VNĐ</del>
                        </li>
                        <li>Nhà cung cấp: Apple</li>
                        <li>Hàng mới nhập</li>
                        <li>
                            Số lượng còn:
                            <span class="badge bg-warning">5</span> chiếc
                        </li>
                        <li>
                            Giảm giá:
                            <span class="badge bg-danger">5%</span>
                        </li>
                    </ul>
                    <div class="chitiet-muahang">
                        <a href="#"> Mua hàng </a>
                    </div>

                </div>
            </div>
            <div class="">
                <div class="chitiet-mota">
                    <h4 class="mota">MÔ TẢ SẢN PHẨM</h4>
                    <hr />
                    <br>
                    <span>
                        iPhone 14 Pro được trang bị viên pin cho thời lượng sử dụng
                        lên tới 29 giờ, tương đương 2 ngày sử dụng bình thường. Thời
                        lượng sử dụng đủ dài để bạn có thể sử dụng thoải mái mà không
                        lo hết pin. Ngoài ra, máy cũng hỗ trợ sạc nhanh 20W, nhờ vậy
                        máy có thể sạc tới 50% trong khoảng 30 phút.
                    </span>
                </div>
            </div>
        </div>


        <div class="title">
            <h4>SẢN PHẨM MỚI</h4><hr>
        </div>
        <div class="row">
            <?php foreach ($dm2 as $key => $sp) : ?>
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
        </div><hr>

        <h4 class="binhluan-name">BÌNH LUẬN</h4>


        <div class="binhluan">
            <form class="formbinhluan" action="" method="post">
                <input type="text" id="nhap">
                <input class="nut-gui" type="submit" name="guibinhluan" value="Gửi">

            </form>
        </div>
    </div>
</div>



</div>