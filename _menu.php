<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="menu">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul id="center" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">TRANG CHỦ</a>
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
                        <a class="nav-link" href="index.php?act=lienhe">LIÊN HỆ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=gopy">GÓP Ý</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=hoidap">HỎI ĐÁP</a>
                    </li>

                </ul>

                <div>
                    <?php
                    if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];

                    } else {
                        if (isset($_SESSION['user'])) {
                            echo '<div >';
                            echo '<a href="index.php?act=dn"><i class="fa-solid fa-user"></i></a>';
                            echo '</div>';
                        } else {
                            echo '<div >';
                            echo ' <a href="index.php?act=dk">Đăng Ký</a>/ <a href="index.php?act=dn">Đăng Nhập</a>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <!-- <div style="width: 18rem">
                    <form class="tk" method="post" action="index.php?act=sanpham">
                        <input type="text" name="kyw" class="form-control" placeholder="Nhập tên sản phẩm" />

                        <input class="btn btn-primary" type="submit" name="timkiem" value="Tìm Kiếm">
                    </form>
                </div> -->
                <div class="gh">
                    <a href="index.php?act=addtocart"> <i class="fa-solid fa-cart-shopping"></i> </a>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>