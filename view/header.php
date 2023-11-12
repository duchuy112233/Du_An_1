<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dự án 01</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/view.css">
</head>

<body>
    <div class="container">
        <div class="top-header"></div>
        <div class="bottom-header">
            <a href="index.php"><img src="../image/logoweb.jpg"></a>
            <div class="timkiem-header">
                <form class="timkiem" method="post" action="index.php?act=sanpham">
                    <input type="text" name="kyw" class="form-control" placeholder="Nhập tên sản phẩm" />
                    <input type="submit" name="timkiem" value="Tìm Kiếm">
                    <style>
                        .nav-item {
                            list-style: none;
                        }
                        .header-tk a{
                            font-size: 16px;
                            color: black;
                        }
                        .header-tk a:hover{
                           
                            color: red;
                        }
                    </style>
                </form>
                <div class="form-menu">
                    <div>
                        <?php


                        if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                        } else {
                            if (isset($_SESSION['user'])) {
                                echo '<div>';
                                echo ' <li class="nav-item">
                                <a href="index.php?act=dn"><i class="fa-solid fa-user"></i>
                                <ul class = "submenu" >

                                    <li class="header-tk"> <a  href="#">Quên mật khẩu </a></li>
                                    <li class="header-tk"> <a  href="#">Cập nhật tài khoản </a></li>
                                    <li class="header-tk"> <a  href="../admin/index.php">Đăng nhập vào ADMIN</a></li>

                                </ul>
                                
                                
                                </a> </li>';
                                echo '</div>';
                            } else {
                                echo '<div >';
                                echo '<a href="index.php?act=dn"><i class="fa-solid fa-user" style="color: #000000;"></i> Đăng nhập </i></a>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                    <div class="giohang-icon">
                        <a href="index.php?act=addtocart"> <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu">
            <ul class="menu-row">
                <li class="nav-item">
                    <a href="index.php">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DANH MỤC</a>
                    <ul class="submenu">
                        <!-- Danh mục -->
                        <?php
                        $dsdm = loadall_danhmuc();
                        foreach ($dsdm as $dm) {
                            extract($dm);
                            $linkdm = "index.php?act=sanpham&iddm=" . $id;
                            echo '<li><a  href="' . $linkdm . '">' . $name . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=lienhe">LIÊN HỆ</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=gopy">GÓP Ý</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?act=hoidap">HỎI ĐÁP</a>
                </li>
            </ul>
        </div>