<div class="mb10">
    <h3>DANH SÁCH DANH MỤC</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=adddm" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã danh mục</th>
                    <th>Tên Danh Mục</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listdm as $key => $dm) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
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
        <a href="index.php?act=adddm"><input type="button" value="Thêm mới"></a>
    </form>
</div>