<div class="mb10">
    <h3>CẬP NHẬT SP BIẾN THỂ</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=editbt" method="post">
        <div>
            <label>Tên sản phẩm cha</label><br>
            <select name="idsp">
                <?php foreach ($listsp as $key => $sp) : ?>
                    <option value="<?php echo $sp['id'] ?>" <?php echo ($onespbt['idsp'] == $sp['id']) ? 'selected' : ''; ?> ><?php echo $sp['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div><br>
        <div>
            <label>Dung lượng ram</label><br>
            <select name="idram">
                <?php foreach ($listram as $key => $ram) : ?>
                    <option value="<?php echo $ram['id'] ?>" <?php echo ($onespbt['idram'] == $ram['id']) ? 'selected' : ''; ?> ><?php echo $ram['ram_sp'] ?></option>
                <?php endforeach ?>
            </select>
        </div><br>
        <div>
            <label>Màu sắc</label><br>
            <select name="idmau">
                <?php foreach ($listmau as $key => $mau) : ?>
                    <option value="<?php echo $mau['id'] ?>" <?php echo ($onespbt['idmau'] == $mau['id']) ? 'selected' : ''; ?> ><?php echo $mau['mau_sp'] ?></option>
                <?php endforeach ?>
            </select>
        </div><br>
        <div>
            <label>Số lượng tồn kho</label><br>
            <input type="text" name="soluong" value="<?php echo $onespbt['soluong'] ?>" required>
        </div><br>
        <input type="hidden" name="idbt" value="<?php echo $onespbt['id'] ?>">
        <input name="editbt" type="submit" value="Cập nhật">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listbt"><input type="button" value="Danh sách"></a><br>
    </form>
</div>