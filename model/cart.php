<?php
function tongdonhang(){
$tong=0;
foreach($_SESSION['mycart'] as $cart){
$tongtien=$cart[3]*$cart[4];
$tong+=$tongtien;
}
return $tong;
}
function add_bill($iduser,$name,$address,$tel,$email,$pttt,$ngaydh,$tongdonhang){
$sql="INSERT INTO bill(iduser,bill_name,bill_address,bill_tel,bill_email,bill_pttt,ngaydh,total) VALUES ('$iduser','$name','$address','$tel','$email','$pttt','$ngaydh','$tongdonhang')";
return pdo_execute_return_lastInsertId($sql);
}
function add_cart($iduser,$idsp,$img,$name,$ram,$mau,$price,$soluong,$thanhtien,$idbill){
$sql="INSERT INTO cart (iduser,idsp,img,name,ram,mau,price,soluong,thanhtien,idbill) VALUES ('$iduser','$idsp','$img','$name','$ram','$mau','$price','$soluong','$thanhtien','$idbill')";
pdo_execute($sql);
}
function loadone_bill($id){
$sql="SELECT * FROM bill where id=$id";
$bill=pdo_query_one($sql);
return $bill;
}
function loadall_cart($idbill){
$sql="SELECT * FROM cart where idbill=$idbill order by name desc";
$bill=pdo_query($sql);
return $bill;
}
// function loadone_bill($id){
//     $sql="SELECT bill_name,bill_email,bill_address,bill_tel FROM bill where id=$id";
//     $bill=pdo_query_one($sql);
//     return $bill;
// }
function loadall_cart_count($idbill){
    $sql="SELECT * FROM cart where idbill=$idbill";
    $bill=pdo_query($sql);
    return count($bill);
}
function loadall_bill($iduser){
    $sql="SELECT * FROM bill where iduser=$iduser order by id desc";
    $listbill=pdo_query($sql);
    return $listbill;
}
function loadall_billdh(){
    $sql="SELECT * FROM bill order by id desc";
    $listbill=pdo_query($sql);
    return $listbill;
}
function update_bill($id, $bill_status){
    $sql = "UPDATE bill SET `bill_status` ='$bill_status' WHERE id = $id";
    pdo_execute($sql);
}
function get_ttdh($n){
switch ($n){
    case '1':
        $tt="Đơn hàng mới";
        break;
    case '2':
        $tt="Đang xử lý";
        break;
    case '3':
        $tt="Đang giao hàng";
        break;
    case '4':
        $tt="Đã giao hàng";
        break;
    case '5':
        $tt="Đơn hàng bị hủy";
        break;
    default:
        $tt="Đơn hàng mới";
        break;
}
return $tt;
}
function get_pttt($n){
switch ($n){
    case '1':
        $tt="Thanh toán trực tiếp";
        break;
    case '2':
        $tt="Thanh toán online";
        break;
    default:
        $tt="Chưa nhận phương thức thanh toán";
        break;
}
return $tt;
}

function updatebill($id){
    $sql="UPDATE bill SET bill_status = 5 where id=$id";
    pdo_execute($sql);
}
?>