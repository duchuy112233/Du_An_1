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
        echo '<div class=" ' . $mr . '">              
        <div class="boxsp">
           <a href="' . $linksp . '"> <img src="' . $hinh . '" class="imagesp" /></a>
               
                <div class="card-body">
                                           
                                            
                        <div class="box-title">
                            <a href="' . $linksp . '">' . $name . '</a>
                        </div>

                        <p class ="money">
                        <del>' .  number_format($price) . ' VNĐ</del>
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