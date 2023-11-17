<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dự án 01</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/view.css">
    <style>
        #cart-icon-container {
            position: relative;
            display: inline-block;
        }

        #cart-icon {
            font-size: 24px;
            cursor: pointer;
        }

        #cart-count {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 4px 8px;
            font-size: 12px;
          
            margin-right: 70px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="top-header"></div>
        <div class="bottom-header">
            <a href="index.php"><img src="../image/logo1.png"></a>
            <div class="timkiem-header">
                <form class="search-box" method="post" action="index.php?act=danhmucsp">
                    <input type="text" name="keyword" placeholder="Nhập tên sản phẩm...">
                    <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
                </form>
                <div class="form-menu">
                    <div class="dn-header">
                        <?php if (isset($_SESSION['user'])) { ?>
                            <li class="nav-item"><a class="anhdaidien" href="#"> <img src="../upload/<?php echo $_SESSION['user']['img'] ?>" alt="Ảnh đại diện"> <?php echo $_SESSION['user']['user'] ?></a>
                                <ul class="submenu">
                                    <li class="header-tk"> <a href="index.php?act=taikhoan">Thông tin tài khoản </a></li>
                                    <li class="header-tk"> <a href="index.php?act=doimk">Đổi mật khẩu </a></li>
                                    <?php if ($_SESSION['user']['role'] == 1) { ?>
                                        <li class="header-tk"> <a href="../admin/index.php">Đăng nhập vào ADMIN</a></li>
                                    <?php } ?>
                                    <li class="header-tk"> <a href="index.php?act=dangxuat">Đăng xuất</a></li>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item"><a href="index.php?act=dangnhap"><i class="fa-solid fa-user" style="color: #000000; padding: 12px 12px;"></i> Đăng nhập </i></a></li>
                        <?php } ?>
                    </div>
                    <div class="giohang-icon" id="cart-icon-container">

                        <a href="index.php?act=addtocart"> <i id="cart-icon" class="fa-solid fa-cart-shopping" style="color: #000000; padding: 12px 12px;"></i> Giỏ hàng </a>
                        <div id="cart-count">0</div>
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
    </div>

</body>