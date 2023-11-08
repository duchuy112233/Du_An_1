<?php
session_start(); //Bắt đầu làm việc với (session) trong PHP
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
ob_start(); // bắt đầu bộ đệm đầu ra tạm thời
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dự án 01</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/admin.css" />
</head>

<body>
    <div class="">
        <!-- header -->
        <?php include "_header.php"; ?>
        <!-- MENU -->
        <?php include "_menu.php"; ?>
        <!-- ---- -->
        <?php
        include "global.php";
        $spnew = loadall_sanpham_home();
        $dsdm = loadall_danhmuc();
        $dstop10 = loadall_sanpham_top10();
        if (isset($_GET['act']) && ($_GET['act']) != "") {
            $act = ($_GET['act']);
            switch ($act) {
                    // SẢN PHẨM
                case 'sanpham':
                    if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                        $kyw  = $_POST['kyw'];
                    } else {
                        $kyw = "";
                    }
                    if (isset($_GET['iddm']) && ($_GET['iddm']) > 0) {
                        $iddm = $_GET['iddm'];
                    } else {
                        $iddm = 0;
                    }
                    $dssp = loadall_sanpham($kyw, $iddm);
                    $tendm = load_tendm($iddm);
                    include "sanpham.php";
                    break;
                    // SẢN PHẨM CHI TIẾT
                case 'sanphamct':
                    if (isset($_GET['idsp']) && ($_GET['idsp']) > 0) {

                        $id = $_GET['idsp'];
                        $onesp =  loadone_sanpham($id);
                        extract($onesp);
                        $sp_cungloai = load_sanpham_cungloai($id, $iddm);
                        $tendm = load_tendm($iddm);
                        tangluotxem($_GET['idsp']);

                        include "sanphamct.php";
                    } else {
                        include "home.php";
                    }

                    break;
                    //
                case 'dangky':
                    if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                        $email = $_POST['email'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        insert_taikhoan($email, $user, $pass);
                        $thongbao = "Đăng ký tài khoản thành công";
                    }
                    include "taikhoan/dangky.php";
                    break;
                    // FORM
                case 'dangnhap':
                    if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $check_user = check_user($user, $pass);

                        if (!empty($user) && !empty($pass)) {
                            if (is_array($check_user)) {
                                $_SESSION['user'] = $check_user;
                                header("Location: index.php");
                            } else {
                                $thongbao = "Tài khoản này không tồn tại / Vui lòng đăng ký tài khoản mới !";
                            }
                        } else {
                            $thongbao = "Tên đăng nhập và mật khẩu không được để trống !";
                        }
                    }
                    include "taikhoan/dangnhap.php";
                    break;
                    //
                case 'edit_taikhoan':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {

                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $id = $_POST['id'];

                        update_taikhoan($id, $user, $pass, $email, $address, $tel);
                        $_SESSION['user'] = check_user($user, $pass);

                        $thongbao = "Cập nhật thành công";
                    }
                    include "taikhoan/edit_taikhoan.php";
                    break;
                    //
                case 'quenmk':
                    if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                        $email = $_POST['email'];
                        $check_email =  check_email($email);
                        if (is_array($check_email)) {
                            $thongbao = "Mật khẩu của bạn là: " . $check_email['pass'];
                        } else {
                            $thongbao = "Email này không tồn tại!";
                        }
                    }
                    include "taikhoan/quenmk.php";
                    break;
                    // GIỞ HÀNG
                case 'addtocart':
                    if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $img = $_POST['img'];
                        $price = $_POST['price'];
                        $soluong = 1;
                        $tt = $soluong * $price;
                        $spadd = [$id, $name, $img, $price, $soluong, $tt];
                        array_push($_SESSION['mycart'], $spadd);
                    }
                    include "cart/viewcart.php";
                    break;
                    //
                case 'delcart':
                    if (isset($_GET['idcart'])) {
                        array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
                    } else {
                        $_SESSION['mycart'] = [];
                    }
                    header("LOCATION: index.php?act=addtocart");
                    break;
                    //
                case 'bill':
                    include "cart/bill.php";
                    break;
                    //
                case 'billcomfirm':
                    if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $ngaydathang = date('h:i:s A d/m/y');
                        $tongdonhang = tongdonhang();
                    }
                    include "cart/billcomfirm.php";
                    break;
                    //
                case 'mybill':
                    include "cart/mybill.php";
                    break;
                    //////////
                case 'thanhcong':
                    include "thanhcong.php";
                    break;
                case 'thoat':
                    session_unset();
                    header("LOCATION: index.php");
                    break;
                case 'dn':
                    include "taikhoan/dangnhap.php";
                    break;
                    case 'dk':
                        include "taikhoan/dangky.php";
                        break;
                case 'gioithieu':
                    include "gioithieu.php";
                    break;

                case 'lienhe':
                    include "lienhe.php";
                    break;

                default:
                    include "home.php";
                    break;
            }
        } else {
            include "home.php";
        }
      
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="assets/js/admin.js"></script>

    <?php
    ob_end_flush(); // Kết thúc output buffering và gửi đầu ra đến trình duyệt
     include "_footer.php";
    ?>
   
</body>

</html>