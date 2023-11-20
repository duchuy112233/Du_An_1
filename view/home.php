<div class="mr-banner">
    <div class="banner">
        <img id="banner" src="../image/anh1.jpg">
        <button class="pre" onclick="pre()">&#10094;</button>
        <button class="next" onclick="next()">&#10095;</button>
    </div>

</div>

<div class="top-home">
    <div class="icon-top">
        <i class="fa-solid fa-truck-fast"></i>
        <p class="nd">Giao Hàng Miễn Phí</p>
        <p>Trên Toàn Quốc</p>
    </div>
    <div class="icon-top icon2">
        <i class="fa-solid fa-medal"></i>
        <p class="nd">Bảo Hành Chính Hãng</p>
        <p>Từ Laptopia Việt Nam</p>
    </div>
    <div class="icon-top icon3">
        <i class="fa-solid fa-calendar-days"></i>
        <p class="nd">100% Bảo Mật</p>
        <p>Thông Tin Luôn An Toàn</p>
    </div>
    <div class="icon-top icon4">
        <i class="fa-regular fa-thumbs-up"></i>
        <p class="nd">Thanh Toán Trực Tuyến</p>
        <p>Credit/Debit/MoMo</p>
    </div>
</div>

<div class="mr-banner">
    <div class="title">
        <h4>SẢN PHẨM NỔI BẬT</h4>
        <hr>
    </div>
    <?php

    include "sanphamnoibat.php";
    ?>

    <div class="title">
        <h4>SẢN PHẨM MỚI NHẤT</h4>
        <hr>
    </div>

    <div class="row">
        <?php
        $i = 0;
        foreach ($spnew as $sp) {
            extract($sp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;

            $hinh = $image_path . $img;
            if (($i == 2) || ($i == 5) || ($i == 8)) {
                $mr = "mr";
            } else {
                $mr = "";
            }
            $tt = $price  - (($price * $giamgia) / 100);
            echo '<div class=" ' . $mr . '">              
                            <div class="boxsp">
                               <a href="' . $linksp . '"> <img src="' . $hinh . '" class="imagesp" /></a>                         
                                    <div class="card-body">                                                                                                                
                                            <div class="box-title">
                                                <a href="' . $linksp . '">' . $name . '</a>
                                            </div>

                                            <p class ="money">
                                                <del>' . $price . ' VNĐ</del>
                                                <span>-' . $giamgia . '%</span>                                                                  
                                            </p>
                                            <p class ="money2">                                                    
                                                <b>' . number_format($tt) . ' VNĐ</b>
                                            </p>

                                            <div class="boxsp-content">
                                            <p>CPU ' . $cpu . '</p>
                                            <p>RAM ' . $ram . '</p>
                                            <p>Ổ cứng ' . $ocung . '</p>
                                            <p>Card ' . $card_do_hoa . '</p>
                                            <p>M.Hình ' . $man_hinh . '</p>
                                        </div>
                                            <form id="them" style="margin-top: 20px;" action="index.php?act=addtocart" method="post">
                                                <input type="hidden" name="id" value="' . $id . '">
                                                <input type="hidden" name="name" value="' . $name . '">
                                                <input type="hidden" name="img" value="' . $img . '">
                                                <input type="hidden" name="price" value="' .  $tt = $price  - (($price * $giamgia) / 100) . '">
                                             <input  type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="themgio">
                                              

                                                <i class="fa-solid fa-cart-shopping"></i>
                                                                
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        ';
        }
        ?>
    </div>
</div>

<!-- onclick="addToCart(event)"

<script> 
    function addToCart(event) {
        // Prevent the form from submitting and refreshing the page
        event.preventDefault();

        // Các dòng mã để thêm sản phẩm vào giỏ hàng ở đây

        // Cập nhật số lượng trên icon giỏ hàng
        updateCartCount();
    }

    function updateCartCount() {
        // Lấy số lượng hiện tại từ phía client (nếu có)
        let currentCount = parseInt(document.getElementById("cart-count").textContent) || 0;

        // Tăng số lượng
        currentCount++;

        // Cập nhật số lượng trên trang
        document.getElementById("cart-count").textContent = currentCount.toString();
    }
</script>  -->