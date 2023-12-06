<div class="form-giohang">
    <div class="title-giohang">
        <h3>Giỏ Hàng</h3>
        <a href="index.php">
            <p><i class="fa-solid fa-chevron-left" style="color: #000000;"></i> Tiếp tục mua hàng</p>
        </a>
    </div>
    <table class="content-table" id="order">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $tong = 0;
            $i = 0;
            $allmau = loadall_mau();
            $allram = loadall_ram();
            foreach ($_SESSION['mycart'] as $key => $cart) {
                $hinh = $image_path . $cart[2];
                $tongtien = $cart[3] * $cart[4];
                $tong += $tongtien; ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><img src="<?php echo $hinh ?>" alt="" width="70px" height="50px">
                        <p><?php echo $cart[1] ?></p>
                        <?php foreach ($allram as $ram) : ?>
                            <?php if ($ram['id'] == $cart[5]) : ?>
                                <span><?php echo $ram['ram_sp'] ?></span>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php foreach ($allmau as $mau) : ?>
                            <?php if ($mau['id'] == $cart[6]) : ?>
                                <span><?php echo $mau['mau_sp'] ?></span>
                            <?php endif ?>
                        <?php endforeach ?>
                    </td>
                    <td id="gia"><?php echo number_format($cart[3], 0, ",", ".") ?> VND</td>
                    <td class="quantity"><a onclick="giam(this)">-</a> <span style="margin: 0 5px;"><?php echo $cart[4] ?></span> <a onclick="tang(this)">+</a> <span style="display:none;"><?php echo $i ?></span></td>
                    <td><?php echo number_format($tongtien, 0, ",", ".") ?> VND</td>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="index.php?act=deletecart&idcart=<?php echo $i ?>"><i class="fa-solid fa-trash-can" style="color: #f52424;"></i></a></td>
                </tr>
                <?php $i += 1; ?>
            <?php } ?>
            <tr>
                <td colspan="4">Tổng đơn hàng</td>
                <td colspan="2"><?php echo number_format($tong, 0, ",", ".") ?> VND</td>
            </tr>
        </tbody>
    </table>
    <div>
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="index.php?act=bill"><input type="button" name="dathang" value="Đặt hàng"></a>
        <?php else : ?>
            <p style="color:red;">Vui lòng đăng nhập để đặt hàng! <a class="login" href="index.php?act=dangnhap">Đăng nhập tại đây</a></p><br>
        <?php endif ?>
        <a onclick="return confirm('Bạn có chắc chắn muốn xóa hết')" href="index.php?act=deletecart"><input type="button" value="Xóa giỏ hàng"></a>
    </div>
</div>



<script>
    function tang(x) {
        var cha = x.parentElement;
        var soluongcu = cha.children[1];
        var soluongmoi = parseInt(soluongcu.innerText) + 1;
        soluongcu.innerText = soluongmoi;
        var vitri = cha.children[3].innerText;

        // Gửi yêu cầu AJAX
        $.ajax({
            type: "POST",
            url: "./cart/update_quantity.php", // Đường dẫn đến tập lệnh PHP để xử lý cập nhật
            data: {
                vitri: vitri,
                soluong: soluongmoi
            },
            success: function(response) {
                // Xử lý phản hồi từ tập lệnh PHP (nếu cần)
                console.log("Cập nhật thành công");
                // Sau khi cập nhật thành công
                $.post('tableCartOrder.php', function(data) {
                    $('#order').html(data);
                })
            },
            error: function() {
                // Xử lý lỗi (nếu có)
                console.log("Lỗi khi cập nhật số lượng");
            }
        });
    }

    function giam(x) {
        var cha = x.parentElement;
        var soluongcu = cha.children[1];
        if (parseInt(soluongcu.innerText) > 1) {
            var soluongmoi = parseInt(soluongcu.innerText) - 1;
            soluongcu.innerText = soluongmoi;
            var vitri = cha.children[3].innerText;

            // Gửi yêu cầu AJAX
            $.ajax({
                type: "POST",
                url: "./cart/update_quantity.php", // Đường dẫn đến tập lệnh PHP để xử lý cập nhật
                data: {
                    vitri: vitri,
                    soluong: soluongmoi
                },
                success: function(response) {
                    // Xử lý phản hồi từ tập lệnh PHP (nếu cần)
                    console.log("Cập nhật thành công");
                    // Sau khi cập nhật thành công
                    $.post('tableCartOrder.php', function(data) {
                        $('#order').html(data);
                    })
                },
                error: function() {
                    // Xử lý lỗi (nếu có)
                    console.log("Lỗi khi cập nhật số lượng");
                }
            });
        } else {
            alert("Đặt hàng tối thiểu là 1");
        }
    }
</script>