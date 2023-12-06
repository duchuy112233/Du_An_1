<div class="mb10">
    <h3>CẬP NHẬT TT ĐƠN HÀNG</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=editdh" method="post">
        <div>
            <label>Tình trạng</label>
            <?php if ($onebill['bill_status'] == 1) : ?>
                <select name="bill_status">
                    <option value="1" <?php echo ($onebill['bill_status'] == 1) ? 'selected' : ''; ?>>Đơn hàng mới</option>
                    <option value="2" <?php echo ($onebill['bill_status'] == 2) ? 'selected' : ''; ?>>Đang xử lý</option>
                    <option value="3" <?php echo ($onebill['bill_status'] == 3) ? 'selected' : ''; ?>>Đang giao hàng</option>
                    <option value="4" <?php echo ($onebill['bill_status'] == 4) ? 'selected' : ''; ?>>Đã giao hàng</option>
                    <option value="5" <?php echo ($onebill['bill_status'] == 5) ? 'selected' : ''; ?>>Đơn hàng bị hủy</option>
                </select>
            <?php elseif ($onebill['bill_status'] == 2) : ?>
                <select name="bill_status">
                    <option value="2" <?php echo ($onebill['bill_status'] == 2) ? 'selected' : ''; ?>>Đang xử lý</option>
                    <option value="3" <?php echo ($onebill['bill_status'] == 3) ? 'selected' : ''; ?>>Đang giao hàng</option>
                    <option value="4" <?php echo ($onebill['bill_status'] == 4) ? 'selected' : ''; ?>>Đã giao hàng</option>
                    <option value="5" <?php echo ($onebill['bill_status'] == 5) ? 'selected' : ''; ?>>Đơn hàng bị hủy</option>
                </select>
            <?php elseif ($onebill['bill_status'] == 3) : ?>
                <select name="bill_status">
                    <option value="3" <?php echo ($onebill['bill_status'] == 3) ? 'selected' : ''; ?>>Đang giao hàng</option>
                    <option value="4" <?php echo ($onebill['bill_status'] == 4) ? 'selected' : ''; ?>>Đã giao hàng</option>
                    <option value="5" <?php echo ($onebill['bill_status'] == 5) ? 'selected' : ''; ?>>Đơn hàng bị hủy</option>
                </select>
            <?php else : ?>
                <select name="bill_status">
                    <option value="5" <?php echo ($onebill['bill_status'] == 5) ? 'selected' : ''; ?>>Đơn hàng bị hủy</option>
                </select>
            <?php endif ?>
        </div><br>
        <input type="hidden" name="iddh" value="<?php echo $onebill['id'] ?>">
        <input name="editdh" type="submit" value="Cập nhật">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listdh"><input type="button" value="Danh sách"></a><br>
    </form>
</div>