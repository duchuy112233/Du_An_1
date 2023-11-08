<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="header">

        <a href="index.php"><img src="image/logoweb.jpg"></a>


        <div class="timkiem-header" >

            <form class="tiemkiem-float" method="post" action="index.php?act=sanpham">
                <input type="text" name="kyw" class="form-control" placeholder="Nhập tên sản phẩm" />
                <input class="form-nut" type="submit" name="timkiem" value="Tìm Kiếm">
            </form>


              <div class="form-menu">
            <div class="dn">
                <a href="#">Đăng nhập</a> / <a href="#">Đăng ký</a>
            </div>
            <div class="giohang-icon">
                <a href="index.php?act=addtocart"> <i class="fa-solid fa-cart-shopping"></i> </a>
            </div>
        </div>

        </div>

      
    </div>
</body>

</html>