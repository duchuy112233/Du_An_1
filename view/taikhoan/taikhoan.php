<div class="boxtaikhoan">
    <div class="boxtrai">
        <div class="boxtrai-img">
        <?php $first_letter = strtoupper(substr($_SESSION['user']['email'], 0, 1)) ?>
            <?php if($_SESSION['user']['img'] != "") : ?>
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
            <p class="tieude1">Hồ Sơ Của Tôi <i class="fa-solid fa-user-secret" style="color: #000000;"></i></p>
            <p class="tieude2">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        </div>
        <div class="form-tk">
            <form action="index.php?act=taikhoan" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" name="user" value="<?php echo $_SESSION['user']['user'] ?>">
                </div><br><br>
                <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <input type="file" name="img">
                </div>
                <?php if($_SESSION['user']['img'] != "") : ?>
                    <img src="../upload/<?php echo $_SESSION['user']['img'] ?>" alt="Ảnh đại diện" width="70px" height="50px">
                <?php else : ?>
                    <span style="color: red; font-size: 14px;">Chưa có ảnh!</span>
                <?php endif ?><br><br>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" value="<?php echo $_SESSION['user']['address'] ?>">
                </div><br><br>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="tel" value="<?php echo $_SESSION['user']['tel'] ?>">
                </div><br><br>
                <input type="hidden" name="pass" value="<?php echo $_SESSION['user']['pass'] ?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
                <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>">
                <input type="submit" name="capnhat" value="Cập nhật"><br><br>
                <p style="color:red;">
                <?php if(isset($thongbao7) && !empty($thongbao7)){
                    echo $thongbao7;
                } ?>
                </p>
            </form>
        </div>
    </div>
</div>