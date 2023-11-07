<div class="boxcenter">

    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">THÊM MỚI HÀNG HOÁ</h2>
    </div> <br>
    <div class="row">

        <div class="row content">
            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                <div class="row mb20">
                    Danh mục <br>
                    <select name="iddm">
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo ' <option value="' . $id . '">' . $name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="row mb20">
                    Tên sản phẩm <br>
                    <input type="text" name="tensp">
                </div>
                <div class="row mb20">
                    Giá <br>
                    <input type="text" name="giasp">
                </div>
                <div class="row mb20">
                    Giảm giá (%)<br>
                    <input type="text" name="giamgia">
                </div>
                <div class="row mb20">
                    Số lượng<br>
                    <input type="text" name="soluongsp">
                </div>
                <div class="row mb20">
                    Hình <br>
                    <input type="file" name="hinh">
                </div>
                <div class="row mb20">
                    Mô tả <br>
                    <textarea name="mota" cols="30" rows="10"></textarea>
                </div>
                <div class="row mb20">
                    <input style="color: #fff; background-color: red;" type="submit" name="themmoi" value="Thêm mới">
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