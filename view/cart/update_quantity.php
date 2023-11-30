<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['vitri']) && isset($_POST['soluong'])) {
        $vitri = $_POST['vitri'];
        $soluong = $_POST['soluong'];
        //cập nhật lại số lượng cho mảng
        $_SESSION['mycart'][$vitri][4] = $soluong;
        //cập nhật lại tổng giá của 1 sản phẩm
        $quantity = $_SESSION['mycart'][$vitri][4];
        $price = $_SESSION['mycart'][$vitri][3];
        $total = $quantity * $price;
        $_SESSION['mycart'][$vitri][7] = $total;
        
    }
}
?>
