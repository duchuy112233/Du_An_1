<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh =  "<img src='" . $hinhpath . "' height='80px'>";
} else {
    $hinh = "Không có hình";
}
?>
<div class="boxcenter">

    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">CẬP NHẬT MỚI LOẠI HÀNG HOÁ</h2>
    </div> <br>
    <div class="row">
        <div class="row content">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="row mb20">
                    <select name="iddm">
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            if ($iddm ==  $danhmuc['id']) $s = "selected";
                            else $s = "";
                            echo ' <option value="' .  $danhmuc['id'] . '" ' . $s . '>' .  $danhmuc['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="row mb20">
                    Tên sản phẩm <br>
                    <input type="text" name="tensp" value=<?= $name ?>>
                </div>
                <div class="row mb20">
                    Giá <br>
                    <input type="text" name="giasp" value=<?= $price ?>>
                </div>
                <div class="row mb20">
                    Giảm giá (%)<br>
                    <input type="text" name="giamgia" value=<?= $giamgia ?>>
                </div>
                <div class="row mb20">
                    Số lượng<br>
                    <input type="text" name="soluongsp" value=<?= $soluongsp ?>>
                </div>
                <div class="row mb20">
                    Hình <br>
                    <input type="file" name="hinh">
                    <br>
                    <?= $hinh ?>
                </div>
                <div class="row mb20">
                    Mô tả <br>
                    <textarea name="mota" cols="30" rows="10"> <?= $mota ?> </textarea>
                </div>
                <div class="row mb20">
                    <input type="hidden" name="id" value=<?= $id ?>>
                    <input style="color: #fff; background-color: red;" type="submit" name="capnhat" value="Cập nhật">
                    <input style="color: #fff; background-color: green;" type="reset" value="Nhập lại">
                    <a href="index.php?act=listsp"><input style="color: #fff; background-color: green;" type="button" value="Danh sách"></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>

            </form>
        </div>
    </div>
</div>