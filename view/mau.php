<?php
include "../model/pdo.php";
include "../model/bienthe.php";
$idram = $_POST['id'];
$idsp = $_POST['idsp'];
$onebtmau = load_btmau($idram, $idsp);

$chonOptionPrinted = false; // Biến để kiểm tra xem phần tử "<option value="">chọn</option>" đã được in ra hay chưa

foreach ($onebtmau as $mau) {
    if (!$chonOptionPrinted) {
        echo '<option value="">Chọn màu</option>';
        $chonOptionPrinted = true; // Đánh dấu rằng phần tử đã được in ra
    }
?>
    <option value="<?php echo $mau['id'] ?>"><?php echo $mau['mau_sp'] ?></option>
<?php
}
?>