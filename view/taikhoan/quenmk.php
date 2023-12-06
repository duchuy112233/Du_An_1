<div id="wrapper-1">
<h3>Quên mật khẩu</h3><br>
    <form action="index.php?act=quenmk" method="post">
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Email">
        </div>
        <p>Đã có tài khoản? <a href="index.php?act=dangnhap"><span class="dk">Đăng nhập!</span></a></p><br>
        <input type="submit" name="quenmk" value="Gửi email">
        </p><br>
        <p style="color:red;">
        <?php
            if(isset($sendMail) && !empty($sendMail)){
                echo $sendMail;
                }
        ?>
        </p>
    </form>
</div>