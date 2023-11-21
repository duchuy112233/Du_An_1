<div class="mb10">
    <h3>THÊM MỚI RAM</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=addram" method="post">
        <p style="color: red; text-align:center;">
            <?php 
            if (isset($thongbao9) && !empty($thongbao9)) {
            echo $thongbao9;
            } ?>
        </p>
        <div>
            <label>Ram</label><br>
            <input type="text" name="ramsp" placeholder="Nhập ram">
        </div><br>
        <input name="themram" type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listram"><input type="button" value="Danh sách"></a><br>
    </form>
</div>