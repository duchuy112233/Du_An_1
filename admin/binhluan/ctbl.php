<div class="mb10">
    <h3>DANH SÁCH DANH MỤC</h3>
</div>
<div class="formcontent">
    <form action="#" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                <tr>
                    <th>STT</th>
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
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $bl['user'] ?></td>
                    <td><?php echo $bl['name'] ?></td>
                    <td><?php echo $bl['noidung'] ?></td>
                    <td><?php echo date("d/m/Y", strtotime($bl['ngaybl'])) ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="?act=deletebl&idbl=<?php echo $bl['id'] ?>"><input type="button" value="Xóa"></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?act=listbl"><input type="button" value="Danh sách"></a><br>
    </form>
</div>