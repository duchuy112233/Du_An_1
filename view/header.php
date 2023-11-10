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
                </form>
                <div class="form-menu">
                    <div class="dn">
                        <a href="index.php?act=signinup"><i class="fa-solid fa-user" style="color: #000000;"></i> Tài khoản </i></a>
                    </div>
                    <div class="giohang-icon">
                        <a href="index.php?act=addtocart"> <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i> Giỏ hàng</a>
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
                <a href="#">DANH MỤC</a>
                <ul class="submenu">
                    <!-- Danh mục -->
                    <li><a href="#">lap top</a></li>
                    <li><a href="#">lap top</a></li>
                    <li><a href="#">lap top</a></li>
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