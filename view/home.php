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
    <div class="tieude">
        <h4>SẢN PHẨM NỔI BẬT</h4>
        <hr>
    </div>
    <?php 
    
    include "sanphamnoibat.php";
    ?>

    <div class="tieude">
        <h4>SẢN PHẨM MỚI NHẤT</h4>
        <hr>
    </div>
    <div class="col-md-8">
        <div class="container-fuild">
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
                    echo '<div class="col-md-4 pl-3 pr-3 ' . $mr . '">              
                            <div class="card" style="width: 18rem">
                               <a href="' . $linksp . '"> <img src="' . $hinh . '" class="imagesp" /></a>
                                   
                                    <div class="card-body">
                                                               
                                                                
                                            <div class="tensp">
                                                <a href="' . $linksp . '">' . $name . '</a>
                                            </div>

                                            <p class="card-price">
                                                <span>' . number_format($tt) . ' VNĐ</span>
                                                <del>' . $price . ' VNĐ</del>
                                            </p>
                                        
                                            <form style="margin-top: 20px;" action="index.php?act=addtocart" method="post">
                                                <input type="hidden" name="id" value="' . $id . '">
                                                <input type="hidden" name="name" value="' . $name . '">
                                                <input type="hidden" name="img" value="' . $img . '">
                                                <input type="hidden" name="price" value="' .  $tt = $price  - (($price * $giamgia) / 100) . '">
                                               <input id="them" type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="themgio">
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
    </div>
</div>