<div class="mb10">
    <h3>CẬP NHẬT RAM</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=editram" method="post">
        <div>
            <label>Ram</label><br>
            <input type="text" name="ramsp" value="<?php echo $oneram['ram_sp'] ?>" required>
        </div><br>
        <input type="hidden" name="idram" value="<?php echo $oneram['id'] ?>">
        <input name="editram" type="submit" value="Cập nhật">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listram"><input type="button" value="Danh sách"></a><br>
    </form>
</div>