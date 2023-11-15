<div class="mb10">
    <h3>DANH SÁCH DANH MỤC</h3>
</div>
<div class="formcontent">
    <form action="#" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                <tr>
                    <th>Chọn nhanh</th>
                    <th>Tên tài khoản</th>
                    <th>Tên sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ctbl as $key => $bl) : ?>
                <tr>
                    <td><input type="checkbox" name=""></td>
                    <td><?php echo $bl['user'] ?></td>
                    <td><?php echo $bl['name'] ?></td>
                    <td><?php echo $bl['noidung'] ?></td>
                    <td><?php echo $bl['ngaybl'] ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="?act=deletebl&idbl=<?php echo $bl['id'] ?>"><input type="button" value="Xóa"></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
    </form>
</div>