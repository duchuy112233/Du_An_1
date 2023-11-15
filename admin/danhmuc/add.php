<div class="mb10">
    <h3>THÊM MỚI DANH MỤC</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=adddm" method="post">
        <p style="color: red; text-align:center;">
            <?php 
            if (isset($thongbao1) && !empty($thongbao1)) {
            echo $thongbao1;
            } ?>
        </p>
        <div>
            <label>Tên danh mục</label><br>
            <input type="text" name="tendm" placeholder="Nhập tên danh mục">
        </div><br>
        <input name="themdm" type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a><br>
    </form>
</div>