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
            <p class="tieude1">Đơn hàng của tôi <i class="fa-solid fa-user-secret" style="color: #000000;"></i></p>
            <p class="tieude2">Quản lý thông tin về trạng thái đơn hàng bạn đã mua</p>
        </div>
        <div class="form-tk">
            <table border="1px">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Số lượng sp</th>
                    <th>Tổng giá tiền</th>
                    <th>Ngày đặt</th>
                    <th>Thanh toán</th>
                    <th>Tình trạng</th>
                    <th>Chức năng</th>
                </tr>
                <?php foreach ($listbill as $key => $bill) { ?>

                <?php } ?>
            </table>
        </div>
    </div>
</div>