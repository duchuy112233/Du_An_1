<div class="mb10">
    <h2>THÊM MỚI DANH MỤC</h2>
</div>
<div class="formcontent">
    <form action="index.php?act=editdm" method="post">
        <div>
            <label style="font-weight: bold; color:#009879;">Tên danh mục</label><br><br>
            <input type="text" name="tendm" value="<?php echo $onedm['name'] ?>" required>
        </div><br>
        <input type="hidden" name="iddm" value="<?php echo $onedm['id'] ?>">
        <input name="editdm" type="submit" value="Cập nhật">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a><br>
    </form>
</div>