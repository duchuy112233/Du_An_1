<div class="mb10">
    <h3>DANH SÁCH SP BIẾN THỂ</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=addbt" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã Biến Thể</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Màu Sắc</th>
                    <th>Dung Lượng Ram</th>
                    <th>Số Lượng Tồn Kho</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listspbt as $key => $spbt) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td>BT<?php echo $spbt['id'] ?></td>
                    <td><?php echo $spbt['name'] ?></td>
                    <td><?php echo $spbt['mau_sp'] ?></td>
                    <td><?php echo $spbt['ram_sp'] ?></td>
                    <td><?php echo $spbt['soluong'] ?></td>
                    <td>
                        <a href="?act=editbt&idbt=<?php echo $spbt['id'] ?>"><input type="button" value="Sửa"></a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="?act=deletebt&idbt=<?php echo $spbt['id'] ?>"><input type="button" value="Xóa"></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?act=addbt"><input type="button" value="Thêm mới"></a>
    </form>
</div>