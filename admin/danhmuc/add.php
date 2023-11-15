<div class="mb10">
<<<<<<< HEAD
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
=======
    <h2>THÊM MỚI DANH MỤC</h2>
</div>
<div class="formcontent">
    <form action="index.php?act=adddm" method="post">
        <div>
            <label style="font-weight: bold; color:#009879;">Tên danh mục</label><br><br>
>>>>>>> 8910cf87419942b3a37132e1b1a399d3b86bc890
            <input type="text" name="tendm" placeholder="Nhập tên danh mục">
        </div><br>
        <input name="themdm" type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a><br>
<<<<<<< HEAD
=======
        <p style="color: red;">
        <?php 
            if (isset($thongbao1) && !empty($thongbao1)) {
            echo $thongbao1;
            }?>
        </p>
>>>>>>> 8910cf87419942b3a37132e1b1a399d3b86bc890
    </form>
</div>