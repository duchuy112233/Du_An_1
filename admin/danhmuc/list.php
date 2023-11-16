<div class="mb10">
    <h3>DANH SÁCH DANH MỤC</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=adddm" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                <tr>
                    <th>Chọn nhanh</th>
                    <th>Mã danh mục</th>
                    <th>Tên Danh Mục</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listdm as $key => $dm) : ?>
                <tr>
                    <td><input type="checkbox" name=""></td>
                    <td>DM<?php echo $dm['id'] ?></td>
                    <td><?php echo $dm['name'] ?></td>
                    <td>
                        <a href="?act=editdm&iddm=<?php echo $dm['id'] ?>"><input type="button" value="Sửa"></a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="?act=deletedm&iddm=<?php echo $dm['id'] ?>"><input type="button" value="Xóa"></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=adddm"><input type="button" value="Thêm mới"></a>
    </form>
</div>