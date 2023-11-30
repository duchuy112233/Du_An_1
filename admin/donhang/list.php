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
                            <td><?php echo number_format($bill['total'], 0, ",", ".") ?> VND</td>
                            <td><?php echo date("d/m/Y", strtotime($bill['ngaydh'])) ?></td>
                            <td><?php echo $pttt ?></td>
                            <td><?php echo $ttdh ?></td>
                            <td>
                            <a href="index.php?act=editdh&iddh=<?php echo $bill['id'] ?>"><input type="button" value="Cập nhật"></a>
                            <a href="index.php?act=ctdh&iddh=<?php echo $bill['id'] ?>"><input type="button" value="Xem chi tiết"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
    <div class="page">
                <!-- Trang đầu -->
                <?php if($page > 3) : $first_page=1 ?>
                    <a href="?act=listdh&per_page=<?php echo $soluongbill ?>&page=<?php echo $first_page ?>">First</a>
                <?php endif ?>
                <!-- Nút Prev -->
                <?php if($page > 1) : $prev_page= $page - 1 ?>
                    <a href="?act=listdh&per_page=<?php echo $soluongbill ?>&page=<?php echo $prev_page ?>">Prev</a>
                <?php endif ?>
                <!-- Ở giữa -->
                <?php for ($i=1; $i <= $sotrang; $i++) : ?>
                    <?php if($i != $page) : ?>
                        <?php if($i > $page - 3 && $i < $page + 3) : ?>
                    <a href="?act=listdh&per_page=<?php echo $soluongbill ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                        <?php endif ?>
                    <?php else : ?>
                        <span class="active"><?php echo $i ?></span>
                    <?php endif ?>
                <?php endfor ?>
                <!-- Nút Next -->
                <?php if($page < $sotrang - 1) : $next_page= $page +1 ?>
                    <a href="?act=listdh&per_page=<?php echo $soluongbill ?>&page=<?php echo $next_page ?>">Next</a>
                <?php endif ?>
                <!-- Trang cuối -->
                <?php if($page < $sotrang - 3) : $end_page=$sotrang ?>
                    <a href="?act=listdh&per_page=<?php echo $soluongbill ?>&page=<?php echo $end_page ?>">Last</a>
                <?php endif ?>
            </div>
</div>