<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/sanpham.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container1">
        <?php include "_banner.php"; ?>
        <div class = "tieude">
            <h4>SẢN PHẨM MỚI NHẤT</h4>
            <hr>
        </div>
        <div class="center">

            <div class="col-md-8">
                <div class="container-fuild">
                    <div class="row">
                        <?php
                        $i = 0;
                        foreach ($spnew as $sp) {
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
                                                <input id="them" type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="tgh">
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
        <?php include "_top10.php"; ?>
</body>

</html>