<div id="wrapper">
<h3>Đăng nhập</h3><br>
    <form action="index.php?act=dangnhap" method="post">
        <div class="form-group">
            <p><label for="">Email</label></p>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <p><label for="">Mật khẩu</label></p>
            <input type="password" name="pass" placeholder="Mật khẩu">
        </div>
        <a href=""><p class="mk">Quên mật khẩu?</p></a><br>
        <input type="submit" name="dangnhap" value="Đăng nhập"><br><br>
        <p style="color: red;">
        <?php 
            if (isset($thongbao3) && !empty($thongbao3)) {
            echo $thongbao3;
        }?>
        </p><br>
        <p>Bạn chưa có tài khoản? <a href="index.php?act=dangky"><span class="dk">Đăng kí ngay</span></a></p><br>
        <span class="span">Hoặc đăng nhập</span>
        <div class="social-container">
                <a href="#" class="social"><i class="fa-brands fa-facebook" style="color: #000000;"></i></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g" style="color: #000000;"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in" style="color: #000000;"></i></a>
        </div>
    </form>
</div>