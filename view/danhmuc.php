
<div class="row">
    <?php foreach ($dssp as $key => $sp) : $hinh = $image_path . $sp['img']; ?>
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
                    <del><?php echo number_format($sp['price'], 0, ",", ".") ?> VND</del>
                    <span>-<?php echo $sp['giamgia'] ?>%</span>
                    <p><?php echo number_format($sp['price'] - $sp['price'] * ($sp['giamgia'] / 100), 0, ",", ".") ?> Đ</p>
                </div>
                <form action="index.php?act=addtocart" method="post">
                    <input type="hidden" name="id" value="<?php echo $sp['id'] ?>">
                    <input type="hidden" name="name" value="<?php echo $sp['name'] ?>">
                    <input type="hidden" name="hinh" value="<?php echo $hinh ?>">
                    <input type="hidden" name="price" value="<?php echo $sp['price'] - $sp['price'] * ($sp['giamgia'] / 100) ?>">
                    <div class="add">
                        <a href="" class="btn-shop"><input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="btn-shop-text">
                            <i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach ?>
</div>