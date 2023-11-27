<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dự án 01</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/view.css">
    <script src="../ajax.js"></script>
</head>

<body>
    <div class="container">
        <div class="top-header"></div>
        <div class="bottom-header">
            <a href="index.php"><img src="../image/logo3.png"></a>
            <div class="timkiem-header">
                <form class="search-box" method="post" action="index.php?act=danhmucsp">
                    <input type="text" name="keyword" placeholder="Nhập tên sản phẩm..." required>
                    <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass icon" style="color: #000000;"></i></button>
                </form>
                <div class="form-menu">
                    <div class="dn-header">
                        <?php if (isset($_SESSION['user'])) { ?>
                            <?php $first_letter = strtoupper(substr($_SESSION['user']['email'], 0, 1)) ?>
                            <?php if ($_SESSION['user']['img'] != "") : ?>
                                <li class="nav-item"><a class="acc" href="#"><img class="avata-img" src="../upload/<?php echo $_SESSION['user']['img'] ?>" alt="Ảnh đại diện">
                                        <p><?php echo $_SESSION['user']['user'] ?></p>
                                    </a>
                                <?php else : ?>
                                <li class="nav-item"><a class="acc" href="#">
                                        <p class="avatar-header"><?php echo $first_letter; ?></p>
                                        <p><?php echo $_SESSION['user']['user'] ?></p>
                                    </a>
                                <?php endif ?>
                                <ul class="submenu">
                                    <li class="header-tk"> <a href="index.php?act=taikhoan">Thông tin tài khoản </a></li>
                                    <?php if ($_SESSION['user']['role'] == 1) { ?>
                                        <li class="header-tk"> <a href="../admin/index.php">Đăng nhập vào ADMIN</a></li>
                                    <?php } ?>
                                    <li class="header-tk"> <a href="index.php?act=dangxuat">Đăng xuất</a></li>
                                </ul>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item"><a href="index.php?act=dangnhap"><i class="fa-solid fa-user" style="color: #000000;"></i> Đăng nhập</a></li>
                            <?php } ?>
                    </div>
                    <div class="giohang-icon">
                        <a href="index.php?act=addtocart"> <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i> Giỏ hàng </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu">
            <ul class="menu-row">
                <li class="nav-item">
                    <a href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Danh mục</a>
                    <ul class="submenu">
                        <!-- Danh mục -->
                        <?php foreach ($listdm as $dm) : ?>
                            <li><a href="index.php?act=danhmucsp&iddm=<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a href="#">Góp ý</a>
                </li>
                <li class="nav-item">
                    <a href="#">Hỏi đáp</a>
                </li>
            </ul>
        </div>