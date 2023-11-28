<div class="billcomfirm">
    <i class="fa-solid fa-bag-shopping" style="color: #009B48;font-size: 100px; margin-bottom:15px"></i>
    <h4>Cảm ơn bạn đã mua hàng</h4>
    <p>Chào <?php echo $_SESSION['user']['user'] ?>, đơn hàng của bạn với mã DA1-<?php echo $bill['id'] ?> đã được đặt thành công</p>
    <p>Chúng tôi sẽ liên hệ với bạn qua thông tin bạn cung cấp, dưới đây là thông tin bạn đã đặt hàng</p>
    <div class="content-bill">
    <div>
        <p>Mã đơn hàng: DA1-<?php echo $bill['id'] ?></li></p>
        <p>Ngày đặt hàng: <?php echo date("d/m/Y", strtotime($bill['ngaydh'])) ?></p>
        <p>Tổng đơn hàng: <?php echo number_format($bill['total'], 0, ",", ".") ?> VND</p>
        <?php $pttt=get_pttt($bill['bill_pttt']) ?>
        <p>Phương thức thanh toán: <?php echo $pttt ?></p>
    </div>
    <div>
        <p>Người đặt hàng: <?php echo $bill['bill_name'] ?></p>
        <p>Địa chỉ: <?php echo $bill['bill_address'] ?></p>
        <p>Email: <?php echo $bill['bill_email'] ?></p>
        <p>Số điện thoại: <?php echo $bill['bill_tel'] ?></p>
    </div>
    </div>
    <p>Cảm ơn <?php echo $_SESSION['user']['user'] ?> đã tin dùng sản phẩm của LapTopIa!</p>
    <div class="btn-a">
        <a href="index.php" style="margin-right:30px;">Tiếp tục mua hàng</a>
        <a href="index.php?act=mybill">Theo dõi đơn hàng</a>
    </div>
</div>