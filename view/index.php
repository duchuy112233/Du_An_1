<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/cart.php";
include "../global.php";

$listdm=loadall_danhmuc();

include "header.php";

if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = ($_GET['act']);
    switch ($act) {
        case 'sanphamct':
            include "sanphamct.php";
            break;
        case 'dangky':
            if(isset($_POST['dangky'])){
                if(empty($_POST['email']) || empty($_POST['user']) || empty($_POST['pass'])){
                    $thongbao2="Vui lòng nhập đầy đủ!";
                }
                else{
                    $email=$_POST['email'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    add_taikhoan($email,$user,$pass);
                    $thongbao2="Đăng kí thành công";
                }
            }
            include "taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if(isset($_POST['dangnhap'])){
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                $login=dangnhap($email,$pass);
                if(is_array($login)){
                $_SESSION['user']=$login;
                header("location: index.php");
                }
                else if(empty($_POST['email']) || empty($_POST['pass'])){
                $thongbao3="Vui lòng nhập đầy đủ!";
                }
                else{
                $thongbao3= "Tài khoản hoặc mật khẩu sai!";
                }
                }
                include "taikhoan/dangnhap.php";
            break;
        case 'taikhoan':
            include "taikhoan/taikhoan.php";
            break;
        case 'doimk':
            if(isset($_POST['doimk'])){
                $pass_csdl=$_SESSION['user']['pass'];
                if(empty($_POST['pass']) || empty($_POST['newpass']) || empty($_POST['repass'])){
                $thongbao4="Vui lòng nhập đầy đủ!";
                }
                else if($_POST['pass'] != $pass_csdl){
                    $thongbao4="Mật khẩu cũ không chính xác!";
                }
                else if($_POST['repass'] != $_POST['newpass']){
                    $thongbao4="Mật khẩu mới không trùng khớp!";
                }
                else{
                    $newpass=$_POST['newpass'];
                    $idtk=$_POST['idtk'];
                    update_matkhau($idtk,$newpass);
                    $thongbao4="Đổi mật khẩu thành công";
                    //session_unset();
                    // header("location: index.php?act=dangnhap");
                }
                }
            include "taikhoan/doimk.php";
            break;
        case 'quenmk':
            if(isset($_POST['quenmk'])){
                $email=$_POST['email'];
                $sendMail=sendMail($email);
                }
            include "taikhoan/quenmk.php";
            break;
        case 'dangxuat':
            session_unset();
            header("location: index.php");
            break;
        default:
            include "home.php";
            break;
        }
    } 
    else {
        include "home.php";
    }

include "footer.php";
?>