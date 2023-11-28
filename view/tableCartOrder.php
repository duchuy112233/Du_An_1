<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/bienthe.php";
include "../model/cart.php";
include "../global.php";
?>
<thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <?php $tong = 0;
        $i = 0;
        $allmau=loadall_mau();
        $allram=loadall_ram();
        foreach ($_SESSION['mycart'] as $key => $cart) {
            $hinh = $image_path . $cart[2];
            $tongtien = intval($cart[3]) * intval($cart[4]);
            $tong += $tongtien; ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><img src="<?php echo $hinh ?>" alt="" width="70px" height="50px">
                    <p><?php echo $cart[1] ?></p>
                    <?php foreach ($allram as $ram) : ?>
                        <?php if($ram['id'] == $cart[5]) : ?>
                            <span><?php echo $ram['ram_sp'] ?></span>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php foreach ($allmau as $mau) : ?>
                        <?php if($mau['id'] == $cart[6]) : ?>
                            <span><?php echo $mau['mau_sp'] ?></span>
                        <?php endif ?>
                    <?php endforeach ?>
                </td>
                <td id="gia"><?php echo number_format($cart[3], 0, ",", ".") ?> VND</td>
                <td><a onclick="giam(this)">-</a> <span><?php echo $cart[4] ?></span> <a onclick="tang(this)">+</a> <span style="display:none;"><?php echo $i ?></span></td>
                <td id="tongtien"><?php echo number_format($tongtien, 0, ",", ".") ?> VND</td>
                <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="index.php?act=deletecart&idcart=<?php echo $i ?>"><i class="fa-solid fa-trash-can" style="color: #f52424;"></i></a></td>
            </tr>
            <?php $i += 1; ?>
        <?php } ?>
        <tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td colspan="2"><?php echo number_format($tong, 0, ",", ".") ?> VND</td>
        </tr>
        </tbody>