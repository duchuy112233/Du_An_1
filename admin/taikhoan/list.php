<div class="mb10">
    <h3>DANH SÁCH KHÁCH HÀNG</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=addtk" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã tài khoản</th>
                        <th>Hình ảnh</th>
                        <th>User</th>
                        <th>Pass</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Quyền hạn</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listtk as $key => $tk) : ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td>TK<?php echo $tk['id'] ?></td>
                            <td>
                                <?php $img = $image_path . $tk['img'];
                                if (is_file($img)) : ?>
                                    <!-- Nếu đường dẫn ảnh đúng thì in ra if -->
                                    <img src="<?php echo $img ?>" alt="" width="70px" height="50px">
                                <?php else : ?>
                                    <!-- Còn else là đường dẫn sai -->
                                    <span style="color: red; font-size: 14px;">No file img!</span>
                                <?php endif ?>
                            </td>
                            <td><?php echo $tk['user'] ?></td>
                            <td><?php echo $tk['pass'] ?></td>
                            <td><?php echo $tk['email'] ?></td>
                            <td><?php echo $tk['address'] ?></td>
                            <td><?php echo $tk['tel'] ?></td>
                            <td>
                                <?php if ($tk['role'] == 0) : ?>
                                    Khách hàng
                                <?php else : ?>
                                    Admin
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if ($tk['role'] != 1) : ?>
                                    <a href="?act=edittk&idtk=<?php echo $tk['id'] ?>"><input type="button" value="Sửa"></a>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="?act=deletetk&idtk=<?php echo $tk['id'] ?>"><input type="button" value="Xóa"></a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?act=addtk"><input type="button" value="Thêm mới"></a>
    </form>
</div>