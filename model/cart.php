<?php
function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $tongtien = $cart[3] * $cart[4];
        $tong += $tongtien;
    }
    return $tong;
}
function add_bill($iduser, $name, $address, $tel, $email, $pttt, $ngaydh, $tongdonhang)
{
    $sql = "INSERT INTO bill(iduser,bill_name,bill_address,bill_tel,bill_email,bill_pttt,ngaydh,total) VALUES ('$iduser','$name','$address','$tel','$email','$pttt','$ngaydh','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
function add_cart($iduser, $idsp, $img, $name, $ram, $mau, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO cart (iduser,idsp,img,name,ram,mau,price,soluong,thanhtien,idbill) VALUES ('$iduser','$idsp','$img','$name','$ram','$mau','$price','$soluong','$thanhtien','$idbill')";
    pdo_execute($sql);
}
function loadone_bill($id)
{
    $sql = "SELECT * FROM bill where id=$id";
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill)
{
    $sql = "SELECT * FROM cart where idbill=$idbill order by name desc";
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill)
{
    $sql = "SELECT * FROM cart where idbill=$idbill";
    $bill = pdo_query($sql);
    return count($bill);
}
function loadall_bill($iduser, $page, $soluong)
{
    $batdau = ($page - 1) * $soluong;
    $sql = "SELECT * FROM bill where iduser=$iduser order by id desc limit $batdau, $soluong";
    $listbill = pdo_query($sql);
    return $listbill;
}
//Đếm số lượng để phân trang
function count_bill($iduser)
{
    $sql = "SELECT * FROM bill where iduser=$iduser";
    return count(pdo_query($sql));
}
function loadall_billdh($keyw = "")
{
    $sql = "SELECT * FROM bill where 1";
    if ($keyw != "") {
        $sql .= " AND id like '%" . $keyw . "%'";
    }
    $sql .= " order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function update_bill($id, $bill_status)
{
    $sql = "UPDATE bill SET `bill_status` ='$bill_status' WHERE id = $id";
    pdo_execute($sql);
}
function get_ttdh($n)
{
    switch ($n) {
        case '1':
            $tt = "Đơn hàng mới";
            break;
        case '2':
            $tt = "Đang xử lý";
            break;
        case '3':
            $tt = "Đang giao hàng";
            break;
        case '4':
            $tt = "Đã giao hàng";
            break;
        case '5':
            $tt = "Đơn hàng bị hủy";
            break;
        case '6':
            $tt = "Đang chờ duyệt";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
function get_pttt($n)
{
    switch ($n) {
        case '1':
            $tt = "Thanh toán trực tiếp";
            break;
        case '2':
            $tt = "Thanh toán online";
            break;
        default:
            $tt = "Chưa nhận phương thức thanh toán";
            break;
    }
    return $tt;
}

function updatebill($id)
{
    $sql = "UPDATE bill SET bill_status = 6 where id=$id";
    pdo_execute($sql);
}

function onpayment($tong)
{
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
