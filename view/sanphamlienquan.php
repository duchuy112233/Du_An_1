<div class="col-md-8">
        <div class="container-fuild">
            <div class="row">
                <?php
                $i = 0;
                foreach ($sp_cungloai as $sp_cungloai) {
                    extract($sp_cungloai);
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