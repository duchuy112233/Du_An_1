<div class="bill">
    <div class="left">
        <form action="index.php?act=billcomfirm" method="post">
            <div class="order-form">
                <p>Thông tin người đặt hàng</p>
                <?php
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['user'];
                    $address = $_SESSION['user']['address'];
                    $email = $_SESSION['user']['email'];
                    $tel = $_SESSION['user']['tel'];
                } else {
                    $name = "";
                    $address = "";
                    $email = "";
                    $tel = "";
                }
                ?>
                <div>
                    <label>Người đặt hàng: </label>
                    <input type="text" name="name" id="name" value="<?php echo $name ?>" placeholder="Tên người nhận">
                </div><br>
                <div>
                    <label>Địa chỉ:</label>
                    <input type="text" name="address" id="address" value="<?php echo $address ?>" placeholder="Địa chỉ">
                </div><br>
                <div>
                    <label>Email:</label>
                    <input type="text" name="email" id="email" value="<?php echo $email ?>" placeholder="Email">
                </div><br>
                <div>
                    <label>Số điện thoại:</label>
                    <input type="text" name="tel" id="tel" value="<?php echo $tel ?>" placeholder="Số điện thoại">
                </div>
            </div>
            <div class="payment">
                <p>Phương thức thanh toán</p>
                <input type="radio" value="1" name="pttt" id="payment1">
                <label for="payment1" style="margin-right: 30px;">Trả tiền khi nhận hàng</label>
                <input type="radio" value="2" name="pttt" id="payment2">
                <label for="payment2">Thanh toán online</label>
            </div><br>
            <a href="index.php?act=billcomfirm"><input type="submit" name="redirect" id="vnpayButton" onclick="return kiemtraform()" value="VNPAY" style="display: none;"></a>
            <a href="index.php?act=billcomfirm"><input type="submit" name="thanhtoan" id="thanhtoanButton" onclick="return kiemtraform()" value="Thanh toán" style="display: none;"></a>
        </form>
    </div>

    <div>
        <div class="giohang2">
            <p class="title-cart">Tóm tắt đơn hàng</p>
        </div>
        <div class="giohang">

            <?php $tong = 0;
            $allmau = loadall_mau();
            $allram = loadall_ram();


            $maxDisplay = 10000;
            $displayCount = 0;
            $allProducts = []; // Mảng để theo dõi tất cả sản phẩm
            $uniqueProducts = []; // Mảng để theo dõi sản phẩm duy nhất
            $a = 0;


            foreach ($_SESSION['mycart'] as $cart) {
                $hinh = $image_path . $cart[2];
                $tongtien = intval($cart[3]) * intval($cart[4]);
                $tong += $tongtien;


                $productKey = $cart[0]; // Sử dụng một trường duy nhất để xác định sản phẩm, có thể là ID sản phẩm hoặc một trường khác

                // Thêm sản phẩm vào danh sách tất cả sản phẩm
                $allProducts[] = $productKey;

                // Nếu sản phẩm chưa xuất hiện trong danh sách sản phẩm duy nhất, thêm nó vào
                if (!in_array($productKey, $uniqueProducts)) {
                    $uniqueProducts[] = $productKey;
                }
                if ($displayCount < $maxDisplay) {
                    $a++
            ?>
                    <div class="order">
                        <img src="<?php echo $hinh ?>" alt="" width="120px" height="120px" style="border:1px solid #009879">
                        <div>
                            <div class="content-on">
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
                            </div>
                            <div class="content-below">
                                <p>Đơn giá: <?php echo number_format($cart[3], 0, ",", ".") ?> VND</p>
                                <p>Số lượng: <?php echo $cart[4] ?></p>
                                <p>Thành tiền: <?php echo number_format($tongtien, 0, ",", ".") ?> VND</p>
                            </div>
                        </div>
                    </div>
            <?php $displayCount++;
                }
            } ?>

        </div>
        <div class="giohang2">
            <div>
                <p class="total">Tổng đơn hàng: <?php echo number_format($tong, 0, ",", ".") ?> VND</p>
            </div>
        </div>
    </div>
</div>

<script>
    //Validate thông báo chưa nhập
    function kiemtraform() {
        var name = document.getElementById("name");
        if (name.value == "") {
            alert("Vui lòng nhập tên!");
            name.focus();
            return false;
        }
        var address = document.getElementById("address");
        if (address.value == "") {
            alert("Vui lòng nhập địa chỉ!");
            address.focus();
            return false;
        }
        var email = document.getElementById("email");
        if (email.value == "") {
            alert("Vui lòng nhập email!");
            email.focus();
            return false;
        }
        var tel = document.getElementById("tel");
        if (tel.value == "") {
            alert("Vui lòng nhập sdt!");
            tel.focus();
            return false;
        }
        var confirmPayment = confirm("Xác nhận thanh toán?");
        if (confirmPayment) {
            return true; // Nếu người dùng chấp nhận, tiếp tục thanh toán
        } else {
            return false; // Nếu người dùng không chấp nhận, không thanh toán
        }
    }

    //Thanh quận xem đơn hàng
    document.addEventListener("DOMContentLoaded", function() {
        const giohang = document.querySelector(".giohang");

        giohang.addEventListener("scroll", function() {
            // Kiểm tra nếu đã cuộn đến cuối, thì tải thêm sản phẩm
            if (giohang.scrollTop + giohang.clientHeight >= giohang.scrollHeight) {
                loadMoreProducts();
            }
        });

        function loadMoreProducts() {
            // Thực hiện logic để tải thêm sản phẩm (ví dụ: tải từ API hoặc hiển thị thêm sản phẩm từ danh sách đã có)
            // Nếu có thêm sản phẩm, thêm chúng vào giohang
            // Ví dụ: giohang.innerHTML += "<div class='order'>...</div>";

            // Cập nhật lại displayCount để không hiển thị sản phẩm trùng lặp
            displayCount = giohang.querySelectorAll(".order").length;
        }
    });

    //Ẩn hiện pttt
    document.querySelectorAll('input[name="pttt"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (this.value === '1') {
                document.getElementById('thanhtoanButton').style.display = 'inline-block';
                document.getElementById('vnpayButton').style.display = 'none';
            } else if (this.value === '2') {
                document.getElementById('vnpayButton').style.display = 'inline-block';
                document.getElementById('thanhtoanButton').style.display = 'none';
            }
        });
    });
</script>