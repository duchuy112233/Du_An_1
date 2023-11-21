<div class="mb10">
    <h3>THÊM MỚI MÀU</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=addmau" method="post">
        <p style="color: red; text-align:center;">
            <?php 
            if (isset($thongbao10) && !empty($thongbao10)) {
            echo $thongbao10;
            } ?>
        </p>
        <div>
            <label>Màu</label><br>
            <input type="text" name="mausp" placeholder="Nhập màu">
        </div><br>
        <input name="themmau" type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listmau"><input type="button" value="Danh sách"></a><br>
    </form>
</div>