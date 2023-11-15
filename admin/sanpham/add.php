<div class="mb10">
    <h3>THÊM MỚI SẢN PHẨM</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
        <p style="color: red; text-align:center;">
            <?php 
            if (isset($thongbao6) && !empty($thongbao6)) {
            echo $thongbao6;
            } ?>
        </p>
        <div>
            <label>Danh mục</label>
            <select name="iddm">
                <?php foreach ($listdm as $dm) : ?>
                    <option value="<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></option>
                <?php endforeach ?>
            </select>
         </div><br>
        <div>
            <label>Hình ảnh</label><br>
            <input type="file" name="img">
        </div><br>
        <div>
            <label>Tên sản phẩm</label><br>
            <input type="text" name="name">
        </div><br>
        <div>
            <label>Giá</label><br>
            <input type="text" name="price">
        </div><br>
        <div>
            <label>CPU</label><br>
            <input type="text" name="cpu">
        </div><br>
        <div>
            <label>RAM</label><br>
            <input type="text" name="ram">
        </div><br>
        <div>
            <label>Ổ cứng</label><br>
            <input type="text" name="ocung">
        </div><br>
        <div>
            <label>Card đồ họa</label><br>
            <input type="text" name="carddohoa">
        </div><br>
        <div>
            <label>Màn hình</label><br>
            <input type="text" name="manhinh">
        </div><br>
        <div>
            <label>Giảm giá</label><br>
            <input type="text" name="giamgia">
        </div><br>
        <div>
            <label>Mô tả</label><br>
            <textarea name="mota" cols="30" rows="10"></textarea>
        </div><br>
        <input name="themsp" type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a><br>
    </form>
</div>