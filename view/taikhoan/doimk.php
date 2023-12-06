<div id="wrapper-2">
<h3>Đổi mật khẩu</h3><br>
    <form action="index.php?act=doimk" method="post">
        <div class="form-group">
            <label for="">Mật khẩu cũ</label>
            <input type="password" name="pass" placeholder="Nhập mật khẩu cũ">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu mới</label>
            <input type="password" name="newpass" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="form-group">
            <label for="">Nhập lại mật khẩu mới</label>
            <input type="password" name="repass" placeholder="Nhập lại mật khẩu mới">
        </div>
        <p>Chưa có tài khoản? <a href="index.php?act=dangnhap"><span class="dk">Đăng ký!</span></a></p><br>
        <input type="hidden" name="idtk" value="<?php echo $_SESSION['user']['id'] ?>">
        <input type="submit" name="doimk" value="Đổi mật khẩu">
        </p><br>
        <p style="color:red;">
        <?php
            if(isset($thongbao4) && !empty($thongbao4)){
                echo $thongbao4;
                }
        ?>
        </p>
    </form>
</div>