<div class="boxtaikhoan">
    <div class="boxtrai">
        <div class="boxtrai-img">
            <?php $first_letter = strtoupper(substr($_SESSION['user']['email'], 0, 1)) ?>
            <?php if ($_SESSION['user']['img'] != "") : ?>
                <img src="../upload/<?php echo $_SESSION['user']['img'] ?>" alt="Ảnh đại diện">
            <?php else : ?>
                <div class="avatar"><?php echo $first_letter; ?></div>
            <?php endif ?>
            <div>
                <p><?php echo $_SESSION['user']['email'] ?></p>
                <a href="index.php?act=taikhoan"><i class="fa-solid fa-pencil" style="color: #575757;"></i> Sửa Hồ Sơ</a>
            </div>
        </div>
        <div class="boxdm">
            <p><a href="index.php?act=doimk"><i class="fa-solid fa-key" style="color: #575757;"></i> Đổi mật khẩu</a></p>
            <p><a href="index.php?act=quenmk"><i class="fa-solid fa-passport" style="color: #575757;"></i> Quên mật khẩu</a></p>
            <p><a href="index.php?act=mybill"><i class="fa-solid fa-calendar" style="color: #575757;"></i> Đơn hàng của tôi</a></p>
        </div>
    </div>
    <div class="boxphai">
        <div class="boxphai-title">
            <p class="tieude1">Đơn hàng của tôi <i class="fa-solid fa-user-secret" style="color: #000000;"></i></p>
            <p class="tieude2">Quản lý thông tin về trạng thái đơn hàng bạn đã mua</p>
        </div>
            <table class="content-table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt</th>
                    <th>Thanh toán</th>
                    <th>Tình trạng</th>
                    <th>Hành động</th>
                </tr>
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
                            <td><?php echo $countsp ?></td>
                            <td><?php echo number_format($bill['total'], 0, ",", ".") ?> VND</td>
                            <td><?php echo date("d/m/Y", strtotime($bill['ngaydh'])) ?></td>
                            <td><?php echo $pttt ?></td>
                            <td><?php echo $ttdh ?></td>
                            <td style="text-align: left;">
                            <a href="index.php?act=chitietbill&idb=<?php echo $bill['id'] ?>"><input type="button" value="Xem chi tiết"></a>
                            <?php if($bill['bill_status'] == 1 || $bill['bill_status'] == 2 ) : ?>
                                <a onclick="return confirm('Bạn có chắc muốn hủy đơn hàng')" href="index.php?act=updateb&idb=<?php echo $bill['id'] ?>"><input type="button" value="Hủy"></a>
                            <?php endif ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="page">
                <!-- Trang đầu -->
                <?php if($page > 3) : $first_page=1 ?>
                    <a href="?act=mybill&per_page=<?php echo $soluongbill ?>&page=<?php echo $first_page ?>">First</a>
                <?php endif ?>
                <!-- Nút Prev -->
                <?php if($page > 1) : $prev_page= $page - 1 ?>
                    <a href="?act=mybill&per_page=<?php echo $soluongbill ?>&page=<?php echo $prev_page ?>">Prev</a>
                <?php endif ?>
                <!-- Ở giữa -->
                <?php for ($i=1; $i <= $sotrang; $i++) : ?>
                    <?php if($i != $page) : ?>
                        <?php if($i > $page - 3 && $i < $page + 3) : ?>
                    <a href="?act=mybill&per_page=<?php echo $soluongbill ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                        <?php endif ?>
                    <?php else : ?>
                        <span class="active"><?php echo $i ?></span>
                    <?php endif ?>
                <?php endfor ?>
                <!-- Nút Next -->
                <?php if($page < $sotrang - 1) : $next_page= $page +1 ?>
                    <a href="?act=mybill&per_page=<?php echo $soluongbill ?>&page=<?php echo $next_page ?>">Next</a>
                <?php endif ?>
                <!-- Trang cuối -->
                <?php if($page < $sotrang - 3) : $end_page=$sotrang ?>
                    <a href="?act=mybill&per_page=<?php echo $soluongbill ?>&page=<?php echo $end_page ?>">Last</a>
                <?php endif ?>
            </div>
    </div>
</div>