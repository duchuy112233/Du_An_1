<div class="mb10">
    <h3>CẬP NHẬT TÀI KHOẢN</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=edittk" method="post" enctype="multipart/form-data">
        <div>
            <label>Hình ảnh</label><br>
            <input type="file" name="img">
            <?php $img=$image_path.$onetk['img']; if(is_file($img)) : ?>
                 <img style="margin-top: 6px;" src="<?php echo $img ?>" alt="" width="70px" height="50px">
            <?php else : ?>
                  <span style="color: red; font-size: 14px;">Không có ảnh!</span>
            <?php endif ?>
        </div><br>
        <div>
            <label>User</label><br>
            <input type="text" name="user" value="<?php echo $onetk['user'] ?>" required>
        </div><br>
        <div>
            <label>Pass</label><br>
            <input type="text" name="pass" value="<?php echo $onetk['pass'] ?>" required>
        </div><br>
        <div>
            <label>Email</label><br>
            <input type="text" name="email" value="<?php echo $onetk['email'] ?>" readonly>
        </div><br>
        <div>
            <label>Địa chỉ</label><br>
            <input type="text" name="address" value="<?php echo $onetk['address'] ?>">
        </div><br>
        <div>
            <label>Số điện thoại</label><br>
            <input type="text" name="tel" value="<?php echo $onetk['tel'] ?>">
        </div><br>
        <div>
            <label>Quền hạn</label><br>
            <select name="role">
                <option value="0" <?php echo ($onetk['role'] == 0) ? 'selected' : ''; ?>>Khách hàng</option>
                <option value="1" <?php echo ($onetk['role'] == 1) ? 'selected' : ''; ?>>Admin</option>
            </select>
        </div><br>
        <input type="hidden" name="id" value="<?php echo $onetk['id'] ?>">
        <input name="edittk" type="submit" value="Cập nhật">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listtk"><input type="button" value="Danh sách"></a><br>
    </form>
</div>