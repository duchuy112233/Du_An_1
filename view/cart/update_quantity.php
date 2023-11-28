<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['vitri']) && isset($_POST['soluong'])) {
        $vitri = $_POST['vitri'];
        $soluong = $_POST['soluong'];
        $_SESSION['mycart'][$vitri][4] = $soluong;
    }
}
?>
