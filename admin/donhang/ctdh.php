<div class="mb10">
    <h3>DANH SÁCH SP TRONG ĐƠN HÀNG</h3>
</div>
<div class="formcontent">
    <form action="#" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Ram</th>
                        <th>Màu</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $allmau = loadall_mau();
                    $allram = loadall_ram();
                    foreach ($ctdh as $key => $sp) { $img=$image_path . $sp['img']; ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><img src="<?php echo $img ?>" alt="" width="70px" height="50px"></td>
                            <td><?php echo $sp['name'] ?></td>
                            <td><?php foreach ($allram as $ram) : ?>
                                    <?php if ($ram['id'] == $sp['ram']) : ?>
                                        <span><?php echo $ram['ram_sp'] ?></span>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td><?php foreach ($allmau as $mau) : ?>
                                    <?php if ($mau['id'] == $sp['mau']) : ?>
                                        <span><?php echo $mau['mau_sp'] ?></span>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td><?php echo number_format($sp['price'], 0, ",", ".") ?> VNĐ</td>
                            <td><?php echo $sp['soluong'] ?></td>
                            <td><?php echo number_format($sp['thanhtien'], 0, ",", ".") ?> VNĐ</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?act=listdh"><input type="button" value="Danh sách"></a><br>
    </form>
</div>