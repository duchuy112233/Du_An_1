<div class="mb10">
    <h3>THÊM MỚI SP BIẾN THỂ</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=addbt" method="post">
        <p style="color: red; text-align:center;">
            <?php
            if (isset($thongbao11) && !empty($thongbao11)) {
                echo $thongbao11;
            } ?>
        </p>
        <div>
            <label>Tên sản phẩm cha</label><br>
            <select name="idsp">
                <?php foreach ($listsp as $key => $sp) : ?>
                    <option value="<?php echo $sp['id'] ?>"><?php echo $sp['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div><br>
        <div>
            <label>Dung lượng ram</label><br>
            <select name="idram">
                <?php foreach ($listram as $key => $ram) : ?>
                    <option value="<?php echo $ram['id'] ?>"><?php echo $ram['ram_sp'] ?></option>
                <?php endforeach ?>
            </select>
        </div><br>
        <div>
            <label>Màu sắc</label><br>
            <select name="idmau">
                <?php foreach ($listmau as $key => $mau) : ?>
                    <option value="<?php echo $mau['id'] ?>"><?php echo $mau['mau_sp'] ?></option>
                <?php endforeach ?>
            </select>
        </div><br>
        <div>
            <label>Số lượng tồn kho</label><br>
            <input type="text" name="soluong" placeholder="Nhập số lượng">
        </div><br>
        <input name="thembt" type="submit" value="Thêm mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listbt"><input type="button" value="Danh sách"></a><br>
    </form>
</div>