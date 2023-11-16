<div class="mb10">
    <h3>CẬP NHẬT SẢN PHẨM</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=editsp" method="post" enctype="multipart/form-data">
        <p style="color: red; text-align:center;">
            <?php 
            if (isset($thongba7) && !empty($thongbao7)) {
            echo $thongbao7;
            } ?>
        </p>
        <div>
            <label>Danh mục</label><br><br>
            <select name="iddm">
                <?php foreach ($listdm as $dm) : ?>
                <option value="<?php echo $dm['id']?>" <?php echo ($sanpham['iddm'] == $dm['id']) ? 'selected' : ''; ?> ><?php echo $dm['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div><br>
        <div>
            <label>Hình ảnh</label><br>
            <input type="file" name="img_new">
            <?php $img=$image_path.$sanpham['img']; if(is_file($img)) : ?>
                 <img style="margin-top: 6px;" src="<?php echo $img ?>" alt="" width="70px" height="50px">
            <?php else : ?>
                  <span style="color: red; font-size: 14px;">Không có ảnh!</span>
            <?php endif ?>
        </div><br>
        <div>
            <label>Tên sản phẩm</label><br>
            <input type="text" name="name" value="<?php echo $sanpham['name'] ?>" required>
        </div><br>
        <div>
            <label>Giá</label><br>
            <input type="text" name="price" value="<?php echo $sanpham['price'] ?>" required>
        </div><br>
        <div>
            <label>CPU</label><br>
            <input type="text" name="cpu" value="<?php echo $sanpham['cpu'] ?>" required>
        </div><br>
        <div>
            <label>RAM</label><br>
            <input type="text" name="ram" value="<?php echo $sanpham['ram'] ?>" required>
        </div><br>
        <div>
            <label>Ổ cứng</label><br>
            <input type="text" name="ocung" value="<?php echo $sanpham['ocung'] ?>" required>
        </div><br>
        <div>
            <label>Card đồ họa</label><br>
            <input type="text" name="carddohoa" value="<?php echo $sanpham['card_do_hoa'] ?>" required>
        </div><br>
        <div>
            <label>Màn hình</label><br>
            <input type="text" name="manhinh" value="<?php echo $sanpham['man_hinh'] ?>" required>
        </div><br>
        <div>
            <label>Giảm giá</label><br>
            <input type="text" name="giamgia" value="<?php echo $sanpham['giamgia'] ?>" required>
        </div><br>
        <div>
            <label>Mô tả</label><br>
            <textarea name="mota" cols="30" rows="10" required><?php echo $sanpham['mota'] ?></textarea>
        </div><br>
        <input type="hidden" name="id" value="<?php echo $sanpham['id'] ?>">
        <input name="editsp" type="submit" value="Cập nhật">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a><br>
    </form>
</div>