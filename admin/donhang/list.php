<div class="mb10">
    <h3>DANH SÁCH ĐƠN HÀNG</h3>
</div>
<div class="formcontent">
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
                            <td><?php echo number_format($bill['total']) ?> VND</td>
                            <td><?php echo date("d/m/Y", strtotime($bill['ngaydh'])) ?></td>
                            <td><?php echo $pttt ?></td>
                            <td><?php echo $ttdh ?></td>
                            <td><a href="index.php?act=editdh&iddh=<?php echo $bill['id'] ?>"><input type="button" value="Cập nhật"></a>
                            <a href="index.php?act=ctdh&iddh=<?php echo $bill['id'] ?>"><input type="button" value="Xem chi tiết"></a>
                            <a onclick="return confirm('Bạn có chắc muốn hủy đơn hàng')" href="index.php?act=deletedh&iddh=<?php echo $bill['id'] ?>"><input type="button" value="Xóa"></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</div>