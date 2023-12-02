<?php
session_start();
if (!$_SESSION['user'] || $_SESSION['user']['role'] == 0) { /*Cam vao trang neu ma no ko dang nhap + cai role=0 */
    header("location: ../view/index.php");
}
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/cart.php";
include "../model/bienthe.php";
include "../global.php";

include "header.php";

if (isset($_GET['act']) && !empty($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            //Phần danh mục
            //Danh sách danh mục
        case 'listdm':
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            //Thêm danh mục
        case 'adddm':
            if (isset($_POST['themdm'])) {
                if (empty($_POST['tendm'])) {
                    $thongbao1 = "Không được để trống!";
                } else {
                    $tendm = $_POST['tendm'];
                    add_danhmuc($tendm);
                    $thongbao1 = "Thêm thành công";
                }
            }
            include "danhmuc/add.php";
            break;
            //Sửa danh mục
        case 'editdm':
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $onedm = loadone_danhmuc($_GET['iddm']);
            }
            if (isset($_POST['editdm'])) {
                $iddm = $_POST['iddm'];
                $tendm = $_POST['tendm'];
                update_danhmuc($iddm, $tendm);
                header("location: index.php?act=listdm");
            }
            include "danhmuc/edit.php";
            break;
            //Xóa danh mục
        case 'deletedm':
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                delete_danhmuc($_GET['iddm']);
                header("location: index.php?act=listdm");
            }
            break;
            //Phần tài khoản
            //Danh sách tài khoản
        case 'listtk':
            $listtk = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
            //Thêm tài khoản
        case 'addtk':
            if (isset($_POST['themtk'])) {
                if (empty($_POST['user']) || empty($_POST['email']) || empty($_POST['pass'])) {
                    $thongbao5 = "Vui lòng nhập đủ 3 trường user, pass, email!";
                } else {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $role = $_POST['role'];
                    $img = $_FILES['img']['name'];
                    $target_file = $image_path . time() . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    add_taikhoan_admin($user, $pass, $img, $email, $address, $tel, $role);
                    $thongbao5 = "Thêm thành công";
                }
            }
            include "taikhoan/add.php";
            break;
            //Sửa tài khoản
        case 'edittk':
            if (isset($_GET['idtk']) && $_GET['idtk'] > 0) {
                $onetk = loadone_taikhoan($_GET['idtk']);
            }
            if (isset($_POST['edittk'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                $id = $_POST['id'];
                $img = $_FILES['img']['name'];
                $target_file = $image_path . time() . basename($_FILES['img']['name']);
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                update_taikhoan($id, $user, $pass, $img, $email, $address, $tel, $role);
                header("location: index.php?act=listtk");
            }
            include "taikhoan/edit.php";
            break;
            //Xóa tài khoản
        case 'deletetk':
            if (isset($_GET['idtk']) && $_GET['idtk'] > 0) {
                delete_taikhoan($_GET['idtk']);
                header("location: index.php?act=listtk");
            }
            break;
            //Phần sản phẩm
            //Danh sách sản phẩm
        case 'listsp':
            if (isset($_POST['clickOK'])) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $listdm = loadall_danhmuc();
            $listsp = loadall_sanpham($keyw, $iddm);
            include "sanpham/list.php";
            break;
            //Thêm sản phẩm
        case 'addsp':
            $listdm = loadall_danhmuc();
            if (isset($_POST['themsp'])) {
                $iddm = $_POST['iddm'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $mota = $_POST['mota'];
                $cpu = $_POST['cpu'];
                $ram = $_POST['ram'];
                $carddohoa = $_POST['carddohoa'];
                $ocung = $_POST['ocung'];
                $manhinh = $_POST['manhinh'];
                $giamgia = $_POST['giamgia'];
                $img = $_FILES['img']['name'];
                if (empty($name) || empty($price) || empty($img) || empty($mota) || empty($giamgia) || empty($cpu) || empty($ram) || empty($carddohoa) || empty($manhinh) || empty($ocung)) {
                    $thongbao6 = "Vui lòng nhập đủ!";
                } else {
                    $target_file = $image_path . time() . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    add_sanpham($name, $mota, $price, $cpu, $ram, $ocung, $carddohoa, $manhinh, $img, $giamgia, $iddm);
                    $thongbao6 = "Thêm thành công";
                }
            }
            include "sanpham/add.php";
            break;
            //Sửa sản phẩm
        case 'editsp':
            $listdm = loadall_danhmuc();
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $sanpham = loadone_sanpham($_GET['idsp']);
            }
            if (isset($_POST['editsp'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $mota = $_POST['mota'];
                $cpu = $_POST['cpu'];
                $ram = $_POST['ram'];
                $carddohoa = $_POST['carddohoa'];
                $ocung = $_POST['ocung'];
                $manhinh = $_POST['manhinh'];
                $giamgia = $_POST['giamgia'];
                $img = $_FILES['img_new']['name'];
                $target_file = $image_path . time() . basename($_FILES['img_new']['name']);
                move_uploaded_file($_FILES['img_new']['tmp_name'], $target_file);
                update_sanpham($id, $name, $mota, $price, $cpu, $ram, $ocung, $carddohoa, $manhinh, $img, $giamgia, $iddm);
                header("location: index.php?act=listsp");
            }
            include "sanpham/edit.php";
            break;
            //Xóa sản phẩm
        case 'deletesp':
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                delete_sanpham($_GET['idsp']);
                header("location: index?act=listsp");
            }
            break;
            //Phần bình luận
            //Danh sách bình luận
        case 'listbl':
            $listbl = load_thongke_bl();
            include "binhluan/list.php";
            break;
            //Chi tiết các bl của 1 sản phẩm
        case 'ctbl':
            if (isset($_GET['idctbl']) && $_GET['idctbl'] > 0) {
                $ctbl = loadall_binhluan($_GET['idctbl']);
            }
            include "binhluan/ctbl.php";
            break;
            //Xóa bình luận
        case 'deletebl':
            if (isset($_GET['idbl']) && $_GET['idbl'] > 0) {
                delete_binhluan($_GET['idbl']);
                header("location: index.php?act=listbl");
            }
            break;
        case 'thongke':
            $thongke = load_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listtk = load_thongke();
            include "thongke/char.php";
            break;
            //Ram
        case 'listram':
            $listram = loadall_ram();
            include "spbienthe/bt_ram/list.php";
            break;
        case 'addram':
            if (isset($_POST['themram'])) {
                if (empty($_POST['ramsp'])) {
                    $thongbao9 = "Không được để trống!";
                } else {
                    $ramsp = $_POST['ramsp'];
                    add_ram($ramsp);
                    $thongbao9 = "Thêm thành công";
                }
            }
            include "spbienthe/bt_ram/add.php";
            break;
        case 'editram':
            if (isset($_GET['idram']) && $_GET['idram'] > 0) {
                $oneram = loadone_ram($_GET['idram']);
            }
            if (isset($_POST['editram'])) {
                $idram = $_POST['idram'];
                $ramsp = $_POST['ramsp'];
                update_ram($idram, $ramsp);
                header("location: index.php?act=listram");
            }
            include "spbienthe/bt_ram/edit.php";
            break;
            //Phải xóa hết bên bảng sp_bienthe rồi mới xóa được
        case 'deleteram':
            if (isset($_GET['idram']) && $_GET['idram'] > 0) {
                delete_ram($_GET['idram']);
                header("location: index.php?act=listram");
            }
            break;
            //Màu
        case 'listmau':
            $listmau = loadall_mau();
            include "spbienthe/bt_mau/list.php";
            break;
        case 'addmau':
            if (isset($_POST['themmau'])) {
                if (empty($_POST['mausp'])) {
                    $thongbao10 = "Không được để trống!";
                } else {
                    $mausp = $_POST['mausp'];
                    add_mau($mausp);
                    $thongbao10 = "Thêm thành công";
                }
            }
            include "spbienthe/bt_mau/add.php";
            break;
        case 'editmau':
            if (isset($_GET['idmau']) && $_GET['idmau'] > 0) {
                $onemau = loadone_mau($_GET['idmau']);
            }
            if (isset($_POST['editmau'])) {
                $idmau = $_POST['idmau'];
                $mausp = $_POST['mausp'];
                update_mau($idmau, $mausp);
                header("location: index.php?act=listmau");
            }
            include "spbienthe/bt_mau/edit.php";
            break;
            //Phải xóa hết bên bảng sp_bienthe rồi mới xóa được
        case 'deletemau':
            if (isset($_GET['idmau']) && $_GET['idmau'] > 0) {
                delete_mau($_GET['idmau']);
                header("location: index.php?act=listmau");
            }
            break;
            //Sản phẩm biến thể
        case 'listbt':
            $listspbt = loadall_spbt();
            include "spbienthe/list.php";
            break;
        case 'addbt':
            if (isset($_POST['thembt'])) {
                if (empty($_POST['soluong'])) {
                    $thongbao11 = "Không được để trống!";
                } else {
                    $idsp = $_POST['idsp'];
                    $idram = $_POST['idram'];
                    $idmau = $_POST['idmau'];
                    $soluong = $_POST['soluong'];
                    add_spbt($idsp, $idram, $idmau, $soluong);
                    $thongbao11 = "Thêm thành công";
                }
            }
            $listram = loadall_ram();
            $listmau = loadall_mau();
            $listsp = loadall_sanpham("", 0);
            include "spbienthe/add.php";
            break;
        case 'editbt':
            if (isset($_GET['idbt']) && $_GET['idbt'] > 0) {
                $onespbt = loadone_spbt($_GET['idbt']);
            }
            if (isset($_POST['editbt'])) {
                $idram = $_POST['idram'];
                $idsp = $_POST['idsp'];
                $idbt = $_POST['idbt'];
                $idmau = $_POST['idmau'];
                $soluong = $_POST['soluong'];
                update_spbt($idbt, $idsp, $idram, $idmau, $soluong);
                header("location: index.php?act=listbt");
            }
            $listram = loadall_ram();
            $listmau = loadall_mau();
            $listsp = loadall_sanpham("",0);
            include "spbienthe/edit.php";
            break;
        case 'deletebt':
            if (isset($_GET['idbt']) && $_GET['idbt'] > 0) {
                delete_spbt($_GET['idbt']);
                header("location: index.php?act=listbt");
            }
            break;
            //Đơn hàng
            //Danh sách đơn hàng
        case 'listdh':
            if (isset($_POST['TimKiem'])) {
                $keyw = $_POST['keyw'];
            } else {
                $keyw ="";
            }
            $listbill = loadall_billdh($keyw);
            include "donhang/list.php";
            break;
            //Chi tiết đơn hàng
        case 'ctdh':
            if (isset($_GET['iddh']) && $_GET['iddh'] > 0) {
                $ctdh = loadall_cart($_GET['iddh']);
            }
            include "donhang/ctdh.php";
            break;
            //Cập nhật đơn hàng
        case 'editdh':
            if (isset($_GET['iddh']) & $_GET['iddh'] > 0) {
                $onebill = loadone_bill($_GET['iddh']);
            }
            if (isset($_POST['editdh'])) {
                $bill_status = $_POST['bill_status'];
                $id = $_POST['iddh'];
                update_bill($id, $bill_status);
                header("location: index.php?act=listdh");
            }
            include "donhang/edit.php";
            break;
            //Trường hợp khác
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
