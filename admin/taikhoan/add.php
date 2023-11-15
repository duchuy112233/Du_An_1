<div class="mb10">
    <h3>THÊM MỚI TÀI KHOẢN</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=addtk" method="post" enctype="multipart/form-data">
        <p style="color: red; text-align:center;">
            <?php 
            if (isset($thongbao5) && !empty($thongbao5)) {
            echo $thongbao5;
            } ?>
        </p>
        <div>
            <label>Hình ảnh</label><br>
            <input type="file" name="img">
        </div><br>
        <div>
            <label>User</label><br>
            <input type="text" name="user">
        </div><br>
        <div>
            <label>Pass</label><br>
            <input type="text" name="pass">
        </div><br>
        <div>
            <label>Email</label><br>
            <input type="text" name="email">
        </div><br>
        <div>
            <label>Địa chỉ</label><br>
            <input type="text" name="address">
        </div><br>
        <div>
            <label>Số điện thoại</label><br>
            <input type="text" name="tel">
        </div><br>
        <div>
            <label>Quền hạn</label><br>
            <select name="role">
                <option value="0">Khách hàng</option>
                <option value="1">Admin</option>
            </select>
        </div><br>
        <input name="themtk" type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listtk"><input type="button" value="Danh sách"></a><br>
    </form>
</div>