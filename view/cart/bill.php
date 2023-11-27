<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .giohang {
            max-height: 473px;
            overflow-y: auto;
        }
        .order-form{
            line-height: 39px;
        }
        .order-form input{
            height: 50px;
        }
        .dy-dathang{
            padding: 10px 10px;
            float: right;
            font-weight: bold;
            color: white;
            background-color: #009B48;
        }
        .dy-dathang:hover{
           
            background-color: red;
        }
    </style>
</head>

<body>
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
                        <input type="text" name="name" value="<?php echo $name ?>" required>
                    </div><br>
                    <div>
                        <label>Địa chỉ:</label>
                        <input type="text" name="address" value="<?php echo $address ?>" required>
                    </div><br>
                    <div>
                        <label>Email:</label>
                        <input type="text" name="email" value="<?php echo $email ?>" required>
                    </div><br>
                    <div>
                        <label>Số điện thoại:</label>
                        <input type="text" name="tel" value="<?php echo $tel ?>" required>
                    </div>
                </div>
                <div class="payment">
                    <p>Phương thức thanh toán</p>
                    <input type="radio" value="1" name="pttt" id="payment1" checked>
                    <label for="payment1" style="margin-right: 30px;">Trả tiền khi nhận hàng</label>
                    <input type="radio" value="2" name="pttt" id="payment2">
                    <label for="payment2">Thanh toán online</label>
                </div><br>
                <a href="index.php?act=billcomfirm"><input class="dy-dathang" type="submit" name="dathang" value="Đồng ý đặt hàng"></a>
            </form>
        </div>

        <div>
            <div class="giohang">
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
                            <?php echo $a ?>
                            <img src="<?php echo $hinh ?>" alt="" width="120px" height="120px" style="border:1px solid #ccc">
                            <div>
                                <div class="content-on">
                                     <strong> <p><?php echo $cart[1] ?></p> </strong>
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
                                    <p>Đơn giá: <?php echo number_format($cart[3]) ?> VND</p>
                                     <p>Số lượng: <strong><?php echo $cart[4] ?></strong></p>
                                    <p>Thành tiền: <?php echo number_format($tongtien) ?> VND</p>
                                </div>
                            
                            </div>

                        </div>
                <?php
                        $displayCount++;
                    }
                }

                ?>

            </div>


            <div class="giohang">
                <!-- Thêm vào đâu đó trong trang HTML để hiển thị số lượng sản phẩm -->
                <p class="total">Tổng số sản phẩm: <?php echo count($allProducts); ?></p>
           

                <div>
                    <p class="total">Tổng đơn hàng: <?php echo number_format($tong)?> VND</p>
                </div>
                
            </div>

        </div>


    </div>



</body>

</html>

<!-- Thêm đoạn mã JavaScript sau cùng trước thẻ </body> -->
<script>
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
</script>