<div class="mb10">
    <h3>DANH SÁCH ĐƠN HÀNG</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=listdh" method="post">
        <input type="text" name="keyw" placeholder="Nhập mã đơn hàng cần tìm"><br><br>
        <input type="submit" name="TimKiem" value="Tìm kiếm"><br><br>
    </form>
    <form action="#" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Số lượng sp</th>
                        <th>Tổng giá tiền</th>
                        <th>Ngày đặt</th>
                        <th>Thanh toán</th>
                        <th>Tình trạng</th>
                        <th>Chức năng</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($listbill as $key => $bill) {
                        $countsp = loadall_cart_count($bill['id']);
                        $ttdh = get_ttdh($bill['bill_status']);
                        $pttt = get_pttt($bill['bill_pttt']);
                    ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td>DA1-<?php echo $bill['id'] ?></td>
                            <td>
                                <?php echo $bill['bill_name'] ?><br>
                                <?php echo $bill['bill_email'] ?><br>
                                <?php echo $bill['bill_address'] ?><br>
                                <?php echo $bill['bill_tel'] ?>
                            </td>
                            <td><?php echo $countsp ?></td>
                            <td><?php echo number_format($bill['total'], 0, ",", ".") ?> VND</td>
                            <td><?php echo date("d/m/Y", strtotime($bill['ngaydh'])) ?></td>
                            <td><?php echo $pttt ?></td>
                            <td><?php echo $ttdh ?></td>
                            <td>
                                <?php if($bill['bill_status'] != 4 && $bill['bill_status'] != 5) : ?>
                                    <a href="index.php?act=editdh&iddh=<?php echo $bill['id'] ?>"><input type="button" value="Cập nhật"></a>
                                <?php endif ?>
                                <a href="index.php?act=ctdh&iddh=<?php echo $bill['id'] ?>"><input type="button" value="Xem chi tiết"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</div>