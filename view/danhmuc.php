<div>
    
</div>
<div class="row">
    <?php foreach ($dssp as $key => $sp) : ?>
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