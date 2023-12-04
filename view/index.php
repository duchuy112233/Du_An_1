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

                $tong = tongdonhang();

                // error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                // date_default_timezone_set('Asia/Ho_Chi_Minh');

                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost:3000/view/index.php?act=thanks";
                $vnp_TmnCode = "B5TQ33H0"; //Mã website tại VNPAY 
                $vnp_HashSecret = "SOCOXGNJWQWXMWCLOTPPBFRMWHNOJDES"; //Chuỗi bí mật

                $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = 'Thanh toan hoa don';
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $tong * 100;
                $vnp_Locale = 'vn';
                $vnp_BankCode = 'NCB';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                //Add Params of 2.0.1 Version
                // $vnp_ExpireDate = $_POST['txtexpire'];
                //Billing
                // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                // $vnp_Bill_Email = $_POST['txt_billing_email'];
                // $fullName = trim($_POST['txt_billing_fullname']);
                // if (isset($fullName) && trim($fullName) != '') {
                //     $name = explode(' ', $fullName);
                //     $vnp_Bill_FirstName = array_shift($name);
                //     $vnp_Bill_LastName = array_pop($name);
                // }
                // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
                // $vnp_Bill_City=$_POST['txt_bill_city'];
                // $vnp_Bill_Country=$_POST['txt_bill_country'];
                // $vnp_Bill_State=$_POST['txt_bill_state'];
                // // Invoice
                // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
                // $vnp_Inv_Email=$_POST['txt_inv_email'];
                // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
                // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
                // $vnp_Inv_Company=$_POST['txt_inv_company'];
                // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
                // $vnp_Inv_Type=$_POST['cbo_inv_type'];
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,

                    //"vnp_ExpireDate"=>$vnp_ExpireDate,
                    // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
                    // "vnp_Bill_Email"=>$vnp_Bill_Email,
                    // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
                    // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
                    // "vnp_Bill_Address"=>$vnp_Bill_Address,
                    // "vnp_Bill_City"=>$vnp_Bill_City,
                    // "vnp_Bill_Country"=>$vnp_Bill_Country,
                    // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
                    // "vnp_Inv_Email"=>$vnp_Inv_Email,
                    // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
                    // "vnp_Inv_Address"=>$vnp_Inv_Address,
                    // "vnp_Inv_Company"=>$vnp_Inv_Company,
                    // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
                    // "vnp_Inv_Type"=>$vnp_Inv_Type
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                // }

                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array(
                    'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                );
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
                // vui lòng tham khảo thêm tại code demo
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
