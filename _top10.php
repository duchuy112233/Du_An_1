<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            margin-left: 30px;
        }

        .center {
            margin-left: 5%;
        }
    </style>
</head>

<body>
    <div class = "tieude">
        <h4>TOP SẢN PHẨM CÓ LƯỢT VIEW CAO NHẤT</h4>
        <hr>
    </div>
    <div class="center">


        <div class="col-md-8">
            <div class="container-fuild">
                <div class="row">
                    <?php
                    foreach ($dstop10 as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=" . $id;

                        $hinh = $img_path . $img;
                        if (($i == 2) || ($i == 5) || ($i == 8)) {
                            $mr = "mr";
                        } else {
                            $mr = "";
                        }
                        $tt = $price  - (($price * $giamgia) / 100);
                        echo '<div class="col-md-4 pl-3 pr-3 ' . $mr . '">              
                    <div class="card" style="width: 18rem">
                    <a href="' . $linksp . '"> <img src="' . $hinh . '" class="card-img-top" alt="..." /></a>     
                           
                            <div class="card-body">
                            <div class = "heig" ><a class="name" href="' . $linksp . '"><h5 >' . $name . '</h5></a></div>
                                    <p class="card-price">
                                        <span id="gia1">' . number_format($tt) . ' VNĐ</span>
                                        <del id="gia">' . $price . ' VNĐ</del>                           
                                    </p>                     
                                                             
                                    <form style="margin-top: 20px;" action="index.php?act=addtocart" method="post">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="name" value="' . $name . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="price" value="' .  $tt = $price  - (($price * $giamgia) / 100) . '">
                                        <input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="tgh">
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
</body>

</html>