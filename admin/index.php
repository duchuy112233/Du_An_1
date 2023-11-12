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
        case 'listtk':
            break;
        case 'addtk':
            break;
        case 'edittk':
            break;
        case 'deletetk':
            if(isset($_GET['idkh']) && $_GET['idkh'] > 0){
                delete_taikhoan($_GET['idkh']);
                header("location: index.php?act=listtk");
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

include "footer.php";
?>