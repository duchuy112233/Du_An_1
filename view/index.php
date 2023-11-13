<?php
session_start(); //Bắt đầu làm việc với (session) trong PHP
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/cart.php";
include "../global.php";


ob_start(); // bắt đầu bộ đệm đầu ra tạm thời

include "header.php";

if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = ($_GET['act']);
    switch ($act) {

            /// Đăng ký đăng nhập
        case 'dn':
            include "taikhoan/dangnhap.php";
            break;
        case 'dk':
            include "taikhoan/dangky.php";
            break;
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
                if(isset($_POST['dangnhap'])){
                    $email=$_POST['email'];
                    $pass=$_POST['pass'];
                    $login=check_email($email,$pass);
                    if(is_array($login)){
                     $_SESSION['user'] = $login ;
                    header("location: index.php");
                    }
                    else if(empty($_POST['email']) || empty($_POST['pass'])){
                        $thongbao = "Tên đăng nhập và mật khẩu không được để trống !";
                    }
                    else{
                        $thongbao = "Tài khoản hoặc mật khẩu sai !";
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
                    $_SESSION['user'] = check_email($email, $pass);

                    $thongbao = "Cập nhật thành công";
                }
                include "taikhoan/edit_taikhoan.php";
                break;
                //
            //
            case 'quenmk':
                if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                    $email = $_POST['email'];
                    $check_email =  check_email_mk($email); 
                    if (is_array($check_email)) {
                        $thongbao = "Mật khẩu của bạn là: " . $check_email['pass'];
                    } else {
                        $thongbao = "Email này không tồn tại!";
                    }
                }
                include "taikhoan/quenmk.php";
                break;
                // GIỞ HÀNG
        case 'thoat':
            session_unset();
            header("LOCATION: index.php");
            break;
            //////
        case 'sanphamct':
            include "sanphamct.php";
            break;
        case 'signinup':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $check_email = $check_email($user, $pass);

                if (!empty($user) && !empty($pass)) {
                    if (is_array($check_email)) {
                        $_SESSION['user'] = $check_email;
                        header("Location: index.php");
                    } else {
                        $thongbao = "Tài khoản này không tồn tại / Vui lòng đăng ký tài khoản mới !";
                    }
                } else {
                    $thongbao = "Tên đăng nhập và mật khẩu không được để trống !";
                }
            }
            include "signinup.php";
            break;
            //
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
