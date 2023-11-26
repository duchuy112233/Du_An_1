<div class="bill">
    <div class="left">
        <form action="index.php?act=billcomfirm" method="post">
            <div class="order-form">
                <p>Thông tin người đặt hàng</p>
                <?php
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['user'];
                    $address = $_SESSION['user']['address'];
                    $email = $_SESSION['user']['email'];
                    $tel = $_SESSION['user']['tel'];
                } else {
                    $name = "";
                    $address = "";
                    $email = "";
                    $tel = "";
                }
                ?>
                <div>
                    <label>Người đặt hàng: </label>
                    <input type="text" name="name" value="<?php echo $name ?>" required>
                </div><br>
                <div>
                    <label>Địa chỉ:</label>
                    <input type="text" name="address" value="<?php echo $address ?>" required>
                </div><br>
                <div>
                    <label>Email:</label>
                    <input type="text" name="email" value="<?php echo $email ?>" required>
                </div><br>
                <div>
                    <label>Số điện thoại:</label>
                    <input type="text" name="tel" value="<?php echo $tel ?>" required>
                </div>
            </div>
            <div class="payment">
                <p>Phương thức thanh toán</p>
                <input type="radio" value="1" name="pttt" id="payment1" checked>
                <label for="payment1" style="margin-right: 30px;">Trả tiền khi nhận hàng</label>
                <input type="radio" value="2" name="pttt" id="payment2">
                <label for="payment2">Thanh toán online</label>
            </div><br>
            <a href="index.php?act=billcomfirm"><input type="submit" name="dathang" value="Đồng ý đặt hàng"></a>
        </form>
    </div>


    <div class="giohang">
        <p class="title-cart">Tóm tắt đơn hàng</p>
        <?php $tong = 0;
        $allmau = loadall_mau();
        $allram = loadall_ram();
        foreach ($_SESSION['mycart'] as $cart) {
            $hinh = $image_path . $cart[2];
            $tongtien = intval($cart[3]) * intval($cart[4]);
            $tong += $tongtien; ?>
            <div class="order">
                <img src="<?php echo $hinh ?>" alt="" width="120px" height="120px" style="border:1px solid #ccc">
                <div>
                    <div class="content-on">
                        <p><?php echo $cart[1] ?></p>
                        <?php foreach ($allram as $ram) : ?>
                            <?php if ($ram['id'] == $cart[5]) : ?>
                                <span><?php echo $ram['ram_sp'] ?></span>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php foreach ($allmau as $mau) : ?>
                            <?php if ($mau['id'] == $cart[6]) : ?>
                                <span><?php echo $mau['mau_sp'] ?></span>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="content-below">
                        <p>Đơn giá: <?php echo number_format($cart[3]) ?> VND</p>
                        <p>Số lượng: <?php echo $cart[4] ?></p>
                        <p>Thành tiền: <?php echo number_format($tongtien) ?> VND</p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div>
            <p class="total">Tổng đơn hàng: <?php echo number_format($tong) ?> VND</p>
        </div>
    </div>

</div>