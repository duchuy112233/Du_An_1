<div class="form-giohang">
    <div class="title-giohang">
        <h3>Giỏ Hàng</h3>
        <a href="index.php">
            <p><i class="fa-solid fa-chevron-left" style="color: #000000;"></i> Tiếp tục mua hàng</p>
        </a>
    </div>
    <table  class="content-table">
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
                            <span> <?php echo "Ram: " .$ram['ram_sp']. " ," ?></span>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php foreach ($allmau as $mau) : ?>
                        <?php if($mau['id'] == $cart[6]) : ?>
                            <span><?php echo "Màu: ". $mau['mau_sp'] ?></span>
                        <?php endif ?>
                    <?php endforeach ?>
                </td>
                <td><?php echo number_format($cart[3]) ?> VND</td>
                <td><?php echo $cart[4] ?></td>
                <td><?php echo number_format($tongtien) ?> VND</td>
                <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="index.php?act=deletecart&idcart=<?php echo $i ?>"><i class="fa-solid fa-trash-can" style="color: #f52424;"></i></a></td>
            </tr>
            <?php $i += 1; ?>
        <?php } ?>
        <tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td colspan="2"><?php echo number_format($tong) ?> VND</td>
        </tr>
        </tbody>
    </table>
    <p><?php if(isset($tb) && !empty($tb)) echo $tb ?></p>
    <div>
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="index.php?act=bill"><input type="button" name="dathang" value="Đặt hàng"></a>
        <?php else : ?>
            <p style="color:red;">Vui lòng đăng nhập để đặt hàng! <a class="login" href="index.php?act=dangnhap">Đăng nhập tại đây</a></p><br>
        <?php endif ?>
        <a onclick="return confirm('Bạn có chắc chắn muốn xóa hết')" href="index.php?act=deletecart"><input type="button" value="Xóa giỏ hàng"></a>
    </div>
</div>