<div class="boxtaikhoan">
    <div class="boxtrai">
        <div class="boxtrai-img">
            <img src="../upload/<?php echo $_SESSION['user']['img'] ?>" alt="Ảnh đại diện">
            <div>
                <p><?php echo $_SESSION['user']['email'] ?></p>
                <a href=""><i class="fa-solid fa-pencil" style="color: #000000;"></i> Sửa Hồ Sơ</a>
            </div>
        </div>
        <div class="boxdm">
            <p><a href="">Hồ sơ</a></p>
            <p><a href="">Đổi mật khẩu</a></p>
            <p><a href="">Quên mật khẩu</a></p>
            <p><a href="">Đơn hàng của tôi</a></p>
        </div>
    </div>
    <div class="boxphai">
        <div class="boxphai-title">
            <p class="tieude">Hồ Sơ Của Tôi</p>
            <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
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
                <img src="../upload/<?php echo $_SESSION['user']['img'] ?>" alt="Ảnh đại diện" width="70px" height="50px"><br><br>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" value="<?php echo $_SESSION['user']['address'] ?>">
                </div><br><br>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="tel" value="<?php echo $_SESSION['user']['tel'] ?>">
                </div><br><br>
                <input type="hidden" name="pass" value="<?php echo $_SESSION['user']['email'] ?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION['user']['pass'] ?>">
                <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>">
                <input type="submit" name="capnhat" value="Cập nhật">
                <p style="color:red;">
                <?php if(isset($thongbao7) && !empty($thongbao7)){
                    echo $thongbao7;
                } ?>
                </p>
            </form>
        </div>
    </div>
</div>