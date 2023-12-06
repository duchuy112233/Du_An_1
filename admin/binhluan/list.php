<div class="mb10">
    <h3>DANH SÁCH BÌNH LUẬN</h3>
</div>
<div class="formcontent">
    <form action="#" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                <tr>
                    <th>Chọn nhanh</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Tống số comment</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listbl as $key => $bl) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td>SP<?php echo $bl['id'] ?></td>
                    <td><?php echo $bl['name'] ?></td>
                    <td><img src="../upload/<?php echo $bl['img'] ?>" alt="" width="70px" height="50px"></td>
                    <td><?php echo $bl['sobl'] ?> lượt bình luận</td>
                    <td>
                        <a href="?act=ctbl&idctbl=<?php echo $bl['id'] ?>"><input type="button" value="Xem chi tiết"></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </form>
</div>