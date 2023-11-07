<?php
if (is_array($dm)) {
    extract($dm);
}

?>
<div class="boxcenter">

    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">CẬP NHẬT MỚI LOẠI HÀNG HOÁ</h2>
    </div> <br>
    <div class="row">

        <div class="row content">
            <form action="index.php?act=updatedm" method="post">

                <div class="row mb20">
                    Mã loại <br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="row mb20">
                    Tên loại <br>
                    <input type="text" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
                </div>
                <div class="row mb20">
                    <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                    <input style="color: #fff; background-color: red;" type="submit" name="capnhat" value="Cập nhật">
                    <input style="color: #fff; background-color: green;" type="reset" value="Nhập lại">
                    <a href="index.php?act=listdm"><input style="color: #fff; background-color: green;" type="button" value="Danh sách"></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>

            </form>
        </div>
    </div>
</div>