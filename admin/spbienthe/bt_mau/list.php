<div class="mb10">
    <h3>DANH SÁCH MÀU</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=addmau" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã màu</th>
                    <th>Màu</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listmau as $key => $mau) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $mau['id'] ?></td>
                    <td><?php echo $mau['mau_sp'] ?></td>
                    <td>
                        <a href="?act=editmau&idmau=<?php echo $mau['id'] ?>"><input type="button" value="Sửa"></a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="?act=deletemau&idmau=<?php echo $mau['id'] ?>"><input type="button" value="Xóa"></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?act=addmau"><input type="button" value="Thêm mới"></a>
    </form>
</div>