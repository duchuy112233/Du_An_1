<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/bienthe.php";
include "../model/cart.php";
include "../global.php";

$listdm=loadall_danhmuc();
$dm1=loadall_sanpham_dm1();
$dm2=loadall_sanpham_dm2();
if(!isset($_SESSION['mycart'])){
   $_SESSION['mycart']=[];
}

include "header.php";

if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = ($_GET['act']);
    switch ($act) {
        case "danhmucsp":
            if(isset($_POST['keyword']) &&  $_POST['keyword'] != 0 ){
            $kyw = $_POST['keyword'];
            }else{
            $kyw = "";
            }
            if(isset($_GET['iddm']) && $_GET['iddm']>0){
            $iddm=$_GET['iddm'];
            }else{
            $iddm=0;
            }
            $dssp=loadall_sanpham($kyw,$iddm);
            include "danhmuc.php";
            break;
        case 'sanphamct':
            if(isset($_POST['guibinhluan'])){
                if(empty($_POST['noidung'])){
                $thongbao8="Vui lòng nhập nội dung bình luận!";
                }
                else{
                    $iduser=$_SESSION['user']['id'];
                    insert_binhluan($_POST['idsp'], $_POST['noidung'],$iduser);
                }
            }
            if(isset($_GET['idsp']) && $_GET['idsp'] > 0 ){
                tangluotxem($_GET['idsp']);
                $onesp=loadone_sanpham($_GET['idsp']);
                $onebtram=load_btram($_GET['idsp']);
                $sp_cungloai=load_sanpham_cungloai($_GET['idsp'],$onesp['iddm']);
                $binhluan=load_binhluan($_GET['idsp']);
            }
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
            if(isset($_POST['capnhat'])){
                if(empty($_POST['user'])){
                    $thongbao7="Tên đăng nhập không được để trống!";
                }
                else{
                    $user=$_POST['user'];
                    $email=$_POST['email'];
                    $pass=$_POST['pass'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $id=$_POST['id'];
                    $img=$_FILES['img']['name'];
                    $target_file=$image_path.time().basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
                    edit_taikhoan($id,$user,$img,$address,$tel);
                    $_SESSION['user']=dangnhap($email,$pass);
                    // $thongbao7="Cập nhật thành công. Xin hãy đăng nhập lại!";
                }
            }
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
        case 'addtocart':
            if(isset($_POST['addtocart'])){
                $id=$_POST['id'];
                $name=$_POST['name'];
                $hinh=$_POST['hinh'];
                $price=$_POST['price'];
                if(isset($_POST['soluong'])){
                $soluong=$_POST['soluong'];
                }
                else{
                    $soluong=1;
                }
                $fg=0;
                $i=0;
                foreach ($_SESSION['mycart'] as $item) {
                    if($item[1]==$name){
                        $slnew=$soluong+$item[4];
                        $_SESSION['mycart'][$i][4]=$slnew;
                        $fg=1;
                        break;
                    }
                    $i++;
                }
                if($fg==0){
                    $spadd=[$id,$name,$hinh,$price,$soluong];
                    array_push($_SESSION['mycart'],$spadd);
                }
            }
            include "cart/viewcart.php";
            break;
        case 'deletecart':
            if(isset($_GET['idcart'])){
                array_splice($_SESSION['mycart'],$_GET['idcart'],1);
            }
            else{
                $_SESSION['mycart']=[];
            }
                header("location: index.php?act=viewcart");
            break;
        case 'viewcart':
            include "cart/viewcart.php";
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