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

$listdm = loadall_danhmuc();
$dm1 = loadall_sanpham_dm1();
$dm2 = loadall_sanpham_dm2();
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
if (!isset($_SESSION['onpayment'])) {
    $_SESSION['onpayment'] = [];
}

include "header.php";

if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = ($_GET['act']);
    switch ($act) {
        case "danhmucsp":
            if (isset($_POST['keyword']) &&  $_POST['keyword'] != 0) {
                $kyw = $_POST['keyword'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            include "danhmuc.php";
            break;
        case 'sanphamct':
            if (isset($_POST['guibinhluan'])) {
                if (empty($_POST['noidung'])) {
                    $thongbao8 = "Vui lòng nhập nội dung bình luận!";
                } else {
                    $iduser = $_SESSION['user']['id'];
                    insert_binhluan($_POST['idsp'], $_POST['noidung'], $iduser);
                }
            }
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                tangluotxem($_GET['idsp']);
                $onesp = loadone_sanpham($_GET['idsp']);
                $onebtram = load_btram($_GET['idsp']);
                $sp_cungloai = load_sanpham_cungloai($_GET['idsp'], $onesp['iddm']);

                if (isset($_GET['per_page'])) {
                    $soluongbl = $_GET['per_page'];
                } else {
                    $soluongbl = 5;
                }
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $dsbl = count_bl($_GET['idsp']);
                $sotrang = ceil($dsbl / $soluongbl);
                $binhluan = load_binhluan($_GET['idsp'], $page, $soluongbl);
            }
            include "sanphamct.php";
            break;
        case 'dangky':
            if (isset($_POST['dangky'])) {
                if (empty($_POST['email']) || empty($_POST['user']) || empty($_POST['pass'])) {
                    $thongbao2 = "Vui lòng nhập đầy đủ!";
                } else {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    add_taikhoan($email, $user, $pass);
                    $thongbao2 = "Đăng kí thành công";
                }
            }
            include "taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $login = dangnhap($email, $pass);
                if (is_array($login)) {
                    $_SESSION['user'] = $login;
                    header("location: index.php");
                } else if (empty($_POST['email']) || empty($_POST['pass'])) {
                    $thongbao3 = "Vui lòng nhập đầy đủ!";
                } else {
                    $thongbao3 = "Tài khoản hoặc mật khẩu sai!";
                }
            }
            include "taikhoan/dangnhap.php";
            break;
        case 'taikhoan':
            if (isset($_POST['capnhat'])) {
                if (empty($_POST['user'])) {
                    $thongbao7 = "Tên đăng nhập không được để trống!";
                } else {
                    $user = $_POST['user'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $id = $_POST['id'];
                    $img = $_FILES['img']['name'];
                    $target_file = $image_path . time() . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    edit_taikhoan($id, $user, $img, $address, $tel);
                    $_SESSION['user'] = dangnhap($email, $pass);
                    // $thongbao7="Cập nhật thành công. Xin hãy đăng nhập lại!";
                }
            }
            include "taikhoan/taikhoan.php";
            break;
        case 'doimk':
            if (isset($_POST['doimk'])) {
                $pass_csdl = $_SESSION['user']['pass'];
                if (empty($_POST['pass']) || empty($_POST['newpass']) || empty($_POST['repass'])) {
                    $thongbao4 = "Vui lòng nhập đầy đủ!";
                } else if ($_POST['pass'] != $pass_csdl) {
                    $thongbao4 = "Mật khẩu cũ không chính xác!";
                } else if ($_POST['repass'] != $_POST['newpass']) {
                    $thongbao4 = "Mật khẩu mới không trùng khớp!";
                } else {
                    $newpass = $_POST['newpass'];
                    $idtk = $_POST['idtk'];
                    update_matkhau($idtk, $newpass);
                    $thongbao4 = "Đổi mật khẩu thành công";
                }
            }
            include "taikhoan/doimk.php";
            break;
        case 'quenmk':
            if (isset($_POST['quenmk'])) {
                $email = $_POST['email'];
                $sendMail = sendMail($email);
            }
            include "taikhoan/quenmk.php";
            break;
        case 'dangxuat':
            session_unset();
            header("location: index.php");
            break;
        case 'addtocart':
            if (isset($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $hinh = $_POST['hinh'];
                $price = $_POST['price'];
                if (isset($_POST['soluong'])) {
                    $soluong = $_POST['soluong'];
                } else {
                    $soluong = 1;
                }
                $tongtien = $price * $soluong;
                if (isset($_POST['idram']) && !empty($_POST['idram'])) {
                    $ram = $_POST['idram'];
                } else {
                    $ram = 0;
                }

                if (isset($_POST['idmau']) && !empty($_POST['idmau'])) {
                    $mau = $_POST['idmau'];
                } else {
                    $mau = 0;
                }
                $fg = 0;
                $i = 0;
                foreach ($_SESSION['mycart'] as $item) {
                    if ($item[1] == $name && $item[5] == $ram && $item[6] == $mau) {
                        $slnew = $soluong + $item[4];
                        $_SESSION['mycart'][$i][4] = $slnew;
                        $_SESSION['mycart'][$i][7] = $_SESSION['mycart'][$i][4] * $_SESSION['mycart'][$i][3];
                        $fg = 1;
                        break;
                    }
                    $i++;
                }
                if ($fg == 0) {
                    $spadd = [$id, $name, $hinh, $price, $soluong, $ram, $mau, $tongtien];
                    array_push($_SESSION['mycart'], $spadd);
                }
            }
            include "cart/viewcart.php";
            break;
        case 'deletecart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header("location: index.php?act=viewcart");
            break;
        case 'viewcart':
            include "cart/viewcart.php";
            break;
        case 'bill':
            if (empty($_SESSION['mycart'])) {
                header("location: index.php?act=viewcart");
            }
            include "cart/bill.php";
            break;
        case 'billcomfirm':
            if (isset($_SESSION['user'])) {
                $iduser = $_SESSION['user']['id'];
            }
            //tạo bill
            if (isset($_POST['thanhtoan'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydh = date('Y-m-d');
                $tongdonhang = tongdonhang();
                $idbill = add_bill($iduser, $name, $address, $tel, $email, $pttt, $ngaydh, $tongdonhang);
                //insert into cart: $_SESSION['mycart'] & idbill
                foreach ($_SESSION['mycart'] as $cart) {
                    add_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[5], $cart[6], $cart[3], $cart[4], $cart[7], $idbill);
                    if ($cart[5] != 0 && $cart[6] != 0) {
                        update_soluong($cart[4], $cart[5], $cart[0], $cart[6]);
                    }
                    //xóa $_SESSION['cart']
                    $_SESSION['mycart'] = [];
                }
            } else if (isset($_POST['redirect'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydh = date('Y-m-d');
                $tong = tongdonhang();
                $addcart = [$name, $address, $email, $tel, $pttt, $ngaydh,$tong];
                array_push($_SESSION['onpayment'], $addcart);
                onpayment($tong);
            }
            $bill = loadone_bill($idbill);
            include "cart/billcomfirm.php";
            break;
        case 'mybill':
            if (isset($_GET['per_page'])) {
                $soluongbill = $_GET['per_page'];
            } else {
                $soluongbill = 6;
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $dsb = count_bill($_SESSION['user']['id']);
            $sotrang = ceil($dsb / $soluongbill);
            $listbill = loadall_bill($_SESSION['user']['id'], $page, $soluongbill);
            include "cart/mybill.php";
            break;
        case 'updateb':
            if (isset($_GET['idb']) && $_GET['idb'] > 0) {
                updatebill($_GET['idb']);
                header("location: index.php?act=mybill");
            }
            break;
        case 'chitietbill':
            if (isset($_GET['idb']) && $_GET['idb'] > 0) {
                $bill = loadone_bill($_GET['idb']);
                $ctdh = loadall_cart($_GET['idb']);
            }
            include "cart/chitietbill.php";
            break;
        case 'thanks':
            if (isset($_SESSION['user'])) {
                $iduser = $_SESSION['user']['id'];
            }
            if(isset($_GET['vnp_Amount'])){
                $idbill = add_bill($iduser, $_SESSION['onpayment'][0][0], $_SESSION['onpayment'][0][1], $_SESSION['onpayment'][0][3], $_SESSION['onpayment'][0][2], $_SESSION['onpayment'][0][4], $_SESSION['onpayment'][0][5], $_SESSION['onpayment'][0][6]);
                //insert into cart: $_SESSION['mycart'] & idbill
                foreach ($_SESSION['mycart'] as $cart) {
                    add_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[5], $cart[6], $cart[3], $cart[4], $cart[7], $idbill);
                    if ($cart[5] != 0 && $cart[6] != 0) {
                        update_soluong($cart[4], $cart[5], $cart[0], $cart[6]);
                    }
                    //xóa $_SESSION[]
                    $_SESSION['mycart'] = [];
                    $_SESSION['onpayment']=[];
                }
            }
            // var_dump($_SESSION['onpayment']);
            $bill = loadone_bill($idbill);
            include "cart/thanks.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
