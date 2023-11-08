<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "header.php";
//
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            /////////////////// Danh mục
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenloai = $_POST['tenloai'];
                if (!empty($tenloai)) {
                    insert_danhmuc($tenloai);
                    $thongbao = '<strong style="color: green;">Thêm thành công !</strong>';
                } else {
                    $thongbao = '<strong style="color: red;">Vui lòng nhập đầy đủ thông tin !</strong>';
                }
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            ///////// Sản phẩm
        case 'addsp':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $giamgia = $_POST['giamgia'];
                $soluongsp = $_POST['soluongsp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }


                if (!empty($tensp) && !empty($giasp) && !empty($giamgia) && !empty($soluongsp) && !empty($hinh) && !empty($mota) && !empty($iddm)) {
                    insert_sanpham($tensp, $giasp, $giamgia, $soluongsp, $hinh, $mota, $iddm);

                    $thongbao = '<strong style="color: green;">Thêm thành công !</strong>';
                } else {
                    $thongbao = '<strong style="color: red;">Vui lòng nhập đầy đủ thông tin !</strong>';
                }
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && $_POST['listok']) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham('', 0);
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $giamgia = $_POST['giamgia'];
                $soluongsp = $_POST['soluongsp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {} else {}
                update_sanpham($id, $iddm, $tensp, $giamgia, $soluongsp, $giasp, $mota, $hinh);
                $thongbao = '<strong style="color: green;">Cập nhật thành công !</strong>';
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham('', 0);
            include "sanpham/list.php";
            break;
            //////////////// khach hàng
        case 'listtk':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'addtk':
            ///////////////////////////// Tài khoản
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];



                if (!empty($user) && !empty($pass) && !empty($email) && !empty($address) && !empty($tel) && !empty($role)) {
                    insert_taikhoan2($user, $pass, $email, $address, $tel, $role);
                    $thongbao = '<strong style="color: green;">Thêm thành công !</strong>';
                } else {
                    $thongbao = '<strong style="color: red;">Vui lòng nhập đầy đủ thông tin !</strong>';
                }
            }
            include "taikhoan/add.php";
            break;
            /////////////////////////////////////bình luận
        case 'listbl':
            $listbinhluan = danhsach_binhluan();
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $listbinhluan = danhsach_binhluan();
            include "binhluan/list.php";
            break;
            //////////////////////////Tai khoan
        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = loadone_taikhoan($_GET['id']);
            }
            include "taikhoan/update.php";
            break;
        case 'updatetk':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                update_taikhoanAD($id, $user, $pass, $email, $address, $tel, $role);
                $thongbao = "Cập nhật thành công";
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
            ///////////////////////////////// thống kê
        case 'thongke':
            $listtk = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listtk = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
