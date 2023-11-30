<div class="boxtaikhoan">
    <div class="boxtrai">
        <div class="boxtrai-img">
            <?php $first_letter = strtoupper(substr($_SESSION['user']['email'], 0, 1)) ?>
            <?php if ($_SESSION['user']['img'] != "") : ?>
                <img src="../upload/<?php echo $_SESSION['user']['img'] ?>" alt="Ảnh đại diện">
            <?php else : ?>
                <div class="avatar"><?php echo $first_letter; ?></div>
            <?php endif ?>
            <div>
                <p><?php echo $_SESSION['user']['email'] ?></p>
                <a href="index.php?act=taikhoan"><i class="fa-solid fa-pencil" style="color: #575757;"></i> Sửa Hồ Sơ</a>
            </div>
        </div>
        <div class="boxdm">
            <p><a href="index.php?act=doimk"><i class="fa-solid fa-key" style="color: #575757;"></i> Đổi mật khẩu</a></p>
            <p><a href="index.php?act=quenmk"><i class="fa-solid fa-passport" style="color: #575757;"></i> Quên mật khẩu</a></p>
            <p><a href="index.php?act=mybill"><i class="fa-solid fa-calendar" style="color: #575757;"></i> Đơn hàng của tôi</a></p>
        </div>
    </div>
    <div class="boxphai">
        <div class="boxphai-title">
            <p class="tieude1">Chi tiết đơn hàng <i class="fa-solid fa-user-secret" style="color: #000000;"></i></p>
            <p class="tieude2">Hiện thông tin chi tiết về các sản phẩm trong đơn hàng</p>
        </div>
        <div class="contact-info">
            <p style="font-size: 20px;margin-bottom:10px">Thông tin người đặt</p>
            <p>Tên: <?php echo $bill['bill_name'] ?></p>
            <p>Email: <?php echo $bill['bill_email'] ?></p>
            <p>Địa chỉ: <?php echo $bill['bill_address'] ?></p>
            <p>Số điện thoại: <?php echo $bill['bill_tel'] ?></p>
        </div>
            <table class="content-table">
                <thead>
                <tr>
                <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Ram</th>
                        <th>Màu</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                    <?php $allmau = loadall_mau();
                    $allram = loadall_ram();
                    foreach ($ctdh as $key => $sp) { $img=$image_path . $sp['img']; ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><img src="<?php echo $img ?>" alt="" width="70px" height="50px"></td>
                            <td><?php echo $sp['name'] ?></td>
                            <td><?php foreach ($allram as $ram) : ?>
                                    <?php if ($ram['id'] == $sp['ram']) : ?>
                                        <span><?php echo $ram['ram_sp'] ?></span>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td><?php foreach ($allmau as $mau) : ?>
                                    <?php if ($mau['id'] == $sp['mau']) : ?>
                                        <span><?php echo $mau['mau_sp'] ?></span>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td><?php echo number_format($sp['price'], 0, ",", ".") ?> VNĐ</td>
                            <td><?php echo $sp['soluong'] ?></td>
                            <td><?php echo number_format($sp['thanhtien'], 0, ",", ".") ?> VNĐ</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
</div>