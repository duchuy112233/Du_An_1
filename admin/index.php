<?php 
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/cart.php";
include "../global.php";

include "header.php";

if(isset($_GET['act']) && !empty($_GET['act'])){
    $act=$_GET['act'];
    switch ($act) {
        //Phần danh mục
         //Danh sách danh mục
        case 'listdm':
            $listdm=loadall_danhmuc();
            include "danhmuc/list.php";
            break;
         //Thêm danh mục
        case 'adddm':
            if(isset($_POST['themdm'])){
                if(empty($_POST['tendm'])){
                    $thongbao1="Không được để trống!";
                }
                else{
                    $tendm=$_POST['tendm'];
                    add_danhmuc($tendm);
                    $thongbao1="Thêm thành công";
                }
            }
            include "danhmuc/add.php";
            break;
         //Sửa danh mục
        case 'editdm':
            if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
                $onedm = loadone_danhmuc($_GET['iddm']);
            }
            if(isset($_POST['editdm'])){
                $iddm = $_POST['iddm'];
                $tendm = $_POST['tendm'];
                update_danhmuc($iddm, $tendm);
                header("location: index.php?act=listdm");
            }
            include "danhmuc/edit.php";
            break;
         //Xóa danh mục
        case 'deletedm':
            if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
                delete_danhmuc($_GET['iddm']);
                header("location: index.php?act=listdm");
            }
            break;
        //Phần tài khoản
         //Danh sách tài khoản
        case 'listtk':
            $listtk=loadall_taikhoan();
            include "taikhoan/list.php";
            break;
         //Thêm tài khoản
        case 'addtk':
            if(isset($_POST['themtk'])){
                if(empty($_POST['user']) || empty($_POST['email']) || empty($_POST['pass'])){
                    $thongbao5="Vui lòng nhập đủ 3 trường user, pass, email!";
                }
                else{
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $role = $_POST['role'];
                    $img= $_FILES['img']['name'];
                    $target_file=$image_path.basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
                    add_taikhoan_admin($user,$pass,$img,$email,$address,$tel,$role);
                    $thongbao5="Thêm thành công";
                }
            }
            include "taikhoan/add.php";
            break;
         //Sửa tài khoản
        case 'edittk':
            if(isset($_GET['idtk']) && $_GET['idtk'] > 0){
                $onetk = loadone_taikhoan($_GET['idtk']);
            }
            if(isset($_POST['edittk'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                $id = $_POST['id'];
                $img= $_FILES['img']['name'];
                $target_file=$image_path.basename($_FILES['img']['name']);
                move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
                update_taikhoan($id,$user,$pass,$img,$email,$address,$tel,$role);
                header("location: index.php?act=listtk");
            }
            include "taikhoan/edit.php";
            break;
         //Xóa tài khoản
        case 'deletetk':
            if(isset($_GET['idtk']) && $_GET['idtk'] > 0){
                delete_taikhoan($_GET['idtk']);
                header("location: index.php?act=listtk");
            }
            break;
        //Phần bình luận
         //Danh sách bình luận
        case 'listbl':
            $listbl=load_thongke_bl();
            include "binhluan/list.php";
            break;
         //Chi tiết các bl của 1 sản phẩm
        case 'ctbl':
            if(isset($_GET['idctbl']) && $_GET['idctbl']>0){
                $ctbl=loadall_binhluan($_GET['idctbl']);
            }
            include "binhluan/ctbl.php";
            break;
         //Xóa bình luận
        case 'deletebl':
            if(isset($_GET['idbl']) && $_GET['idbl'] > 0){
                delete_binhluan($_GET['idbl']);
                header("location: index.php?act=ctbl");
            }
            break;
        default:
        include "home.php";
            break;
    }
    }
    else{
    include "home.php";
    }
?>