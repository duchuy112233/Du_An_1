<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tttk:hover {
            color: #009B48;
            padding: 10px 10px;
        }

        .tttk-dangxuat a {
          font-size: 13px;
            color: white;

        }
        .mb-tk li{
             margin-bottom: 5px; 
        }
        .mb-tk li a{
            font-size: 17px;
        }
        .tttk-dangxuat {
            margin-right: 70px;
            margin-top: 200px;
            float: right;
        }

        .tttk-dangxuat:hover {

            background-color: red;
        }
    </style>
</head>

<body>
    <div class="body">
        <!-- Dang nhap -->
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);
        ?>
            <h2>Thông tin tài khoản</h2><br>
            <div class="container-sign" id="container-sign">

                <div style="font-size: 20px; padding: 30px 50px;">
                    Xin chào
                    <strong style="color: green;"><?= $user ?></strong> !
                    <img src="" alt="">
                </div>

                <div class="mb-tk" style="padding: 0px 30px;">
                    <li>
                        <a class="tttk" href="index.php?act=quenmk">Quên mật khẩu</a>
                    </li>
                    <li>
                        <a class="tttk" href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                    </li>
                    <?php
                    if ($role == 1) {
                    ?>
                        <li>
                            <a class="tttk" href="../admin/index.php">Đăng nhập vào ADMIN</a>
                        </li>
                    <?php } ?>

                    <div style="padding: 20px 0px; ">
                        <button class="tttk-dangxuat"><a href="index.php?act=thoat">Đăng xuất</a></button>

                    </div>

                </div>
            </div>

        <?php
        } else {
        ?>
            <div class="">
                <h2>Đăng nhập</h2><br>
                <div class="container-sign" id="container-sign">
                    <form action="index.php?act=dangnhap" method="post">

                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <span>Sử dụng phương thức đăng nhập khác</span>
                        <input name="email" type="text" placeholder="Email" />
                        <input name="pass" type="password" placeholder="Password" />
                        <div style="color: red; font-size: 12px; font-weight: 500;">
                            <?php
                            if (isset($thongbao) && ($thongbao != "")) {
                                echo $thongbao;
                            }
                            ?>
                        </div>
                        <br>
                        <a href="#">Quên mật khẩu</a>
                        <p>Bạn chưa có tài khoản? <a href="index.php?act=dk"><span class="dk">Đăng kí ngay</span></a></p>
                        <br>
                        <button type="submit" name="dangnhap" value="Đăng nhập">Đăng nhập</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
    </div>
</body>

</html>