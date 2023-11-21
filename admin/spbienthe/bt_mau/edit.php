<div class="mb10">
    <h3>CẬP NHẬT MÀU</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=editmau" method="post">
        <div>
            <label>Ram</label><br>
            <input type="text" name="mausp" value="<?php echo $onemau['mau_sp'] ?>" required>
        </div><br>
        <input type="hidden" name="idmau" value="<?php echo $onemau['id'] ?>">
        <input name="editmau" type="submit" value="Cập nhật">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listmau"><input type="button" value="Danh sách"></a><br>
    </form>
</div>