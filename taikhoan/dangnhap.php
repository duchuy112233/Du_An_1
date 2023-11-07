<div class="">
    <div class="">
        <div style="margin-left: 350px; height: 700px;">
            <!-- Dang nhap -->
            <div class="card mt-5" style="width: 50rem" >
                <div class="card-header">Tài khoản</div>
                <?php
                if (isset($_SESSION['user'])) {
                    extract($_SESSION['user']);
                ?>
                    <div style="font-size: 20px; padding: 10px 20px;">
                        Xin chào
                        <strong style="color: green;"><?= $user ?></strong> !

                    </div>
                    <div style="padding: 0px 20px;">
                        <li>
                            <a href="index.php?act=quenmk">Quên mật khẩu</a>
                        </li>
                        <li>
                            <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                        </li>
                        <?php
                        if ($role == 1) {
                        ?>
                            <li>
                                <a href="admin/index.php">Đăng nhập vào ADMIN</a>
                            </li>
                        <?php } ?>
                        <div style="padding: 20px 0px;">
                            <a style="float: right; margin-bottom: 20px;" class="btn btn-primary" href="index.php?act=thoat">Đăng xuất</a>
                        </div>

                    </div>


                <?php

                } else {
                ?>
                    <form style="padding: 10px 20px;" action="index.php?act=dangnhap" method="post">

                        <div>
                            Tên đăng nhập<br>
                            <input class="form-control" type="text" name="user">
                        </div>
                        <div>
                            Mật khẩu<br>
                            <input class="form-control" type="password" name="pass">
                        </div>
                        <div style="color: red; font-size: 12px; font-weight: 500;">
                            <?php
                            if (isset($thongbao) && ($thongbao != "")) {
                                echo $thongbao;
                            }
                            ?>
                        </div>
                        <br>
                        <div>
                            <input type="checkbox"> Ghi nhớ tài khoản
                        </div>
                        <div style="padding: 10px 0px;">
                            <input class="btn btn-primary" type="submit" name="dangnhap" value="Đăng nhập">
                        </div>
                        <br>
                        <a href="index.php?act=quenmk">Quên mật khẩu?</a> <br>
                        <a href="index.php?act=dangky">Đăng ký thành viên</a>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>