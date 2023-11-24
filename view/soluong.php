<?php 
include "../model/pdo.php";
include "../model/bienthe.php";
$idram=$_POST['id'];
$idsp=$_POST['idsp'];
$idmau=$_POST['idmau'];
$soluong=load_btsl($idram,$idsp,$idmau);
foreach ($soluong as $item) {
    echo "Sản phẩm còn: ".$item['soluong'];
}
?>