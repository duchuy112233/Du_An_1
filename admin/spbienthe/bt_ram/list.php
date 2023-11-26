<div class="mb10">
    <h3>DANH SÁCH RAM</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=addram" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                <tr>
                    <th>Chọn nhanh</th>
                    <th>Mã ram</th>
                    <th>Ram</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listram as $key => $ram) : ?>
                <tr>
                    <td><input type="checkbox" name=""></td>
                    <td><?php echo $ram['id'] ?></td>
                    <td><?php echo $ram['ram_sp'] ?></td>
                    <td>
                        <a href="?act=editram&idram=<?php echo $ram['id'] ?>"><input type="button" value="Sửa"></a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="?act=deleteram&idram=<?php echo $ram['id'] ?>"><input type="button" value="Xóa"></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=addram"><input type="button" value="Thêm mới"></a>
    </form>
</div>