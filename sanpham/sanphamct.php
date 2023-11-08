<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        .chitiet-tong {
            padding: 50px 300px;
     
            margin-bottom: 50px;

        }

        .chitiet-row {
            display: flex;
            gap: 50px;
        }

        .chitiet-img {
            border: 1px solid gray;
            margin-bottom: 30px;
        }

        .chitiet-img img {
            width: 300px;
            padding: 20px 0px;
        }

        .chitiet-thongso li {
            list-style: none;
            padding: 5px 0px;
        }

        .chitiet-mota {
            width: 700px;
        }

        .chitiet-muahang {
            padding: 15px 20px;
            background-color: #009B48;
            text-align: center;
            margin-top: 110px;
            border-radius: 10px;

        }

        .chitiet-muahang:hover {
            background-color: red;

        }

        .chitiet-muahang a {
            text-decoration: none;
            color: white;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="">
            <div class="chitiet-tong">
                <div class="chitiet-row">
                    <div class="chitiet-img">
                        <img class="img-detail" src="image/sp2.jpg" />
                    </div>
                    <div class="chitiet-thongso">
                        <ul>
                            <h2>IPhone 14 pro max</h2>
                            <br>
                            <li>
                                Đơn giá:
                                <span class="line-through">18.000.000 VNĐ</span>
                                <del class="badge bg-danger">27.000.000 VNĐ</del>
                            </li>
                            <li>Nhà cung cấp: Apple</li>
                            <li>Hàng mới nhập</li>
                            <li>
                                Số lượng còn:
                                <span class="badge bg-warning">5</span> chiếc
                            </li>
                            <li>
                                Giảm giá:
                                <span class="badge bg-danger">5%</span>
                            </li>
                        </ul>
                        <div class="chitiet-muahang">
                            <a href="#"> Mua hàng </a>
                        </div>

                    </div>
                </div>
                <div class="">
                    <div class="chitiet-mota">
                        <h4 class="mota">MÔ TẢ SẢN PHẨM</h4>
                        <hr />
                        <br>
                        <span>
                            iPhone 14 Pro được trang bị viên pin cho thời lượng sử dụng
                            lên tới 29 giờ, tương đương 2 ngày sử dụng bình thường. Thời
                            lượng sử dụng đủ dài để bạn có thể sử dụng thoải mái mà không
                            lo hết pin. Ngoài ra, máy cũng hỗ trợ sạc nhanh 20W, nhờ vậy
                            máy có thể sạc tới 50% trong khoảng 30 phút.
                        </span>
                    </div>
                </div>
            </div>


            <div class="tieude">
                <h4>SẢN PHẨM LIÊN QUAN</h4>
                <hr>
            </div>
            <div class="col-md-8">
                <div class="container-fuild">
                    <div class="row">
                        <!-- SP1 -->
                        <div class="card" style="width: 18rem">
                            <a href="index.php?act=sanphamct"> <img src="image/sp1.jpg" class="imagesp" /></a>

                            <div class="card-body">

                                <div class="tensp">
                                    <a href="index.php?act=sanphamct">iPhone 15 Pro Max 1T Titan iPhone 15 Pro Max 1T Titan iPhone 15 Pro Max 1T Titan </a>
                                </div>

                                <p class="card-price">
                                    <span> 600,000,000 VNĐ</span>
                                    <del>700,000,000 VNĐ</del>
                                </p>

                                <input id="them" type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="themgio">
                                <i class="fa-solid fa-cart-shopping"></i>

                            </div>
                        </div>
                        <!-- SP2 -->
                        <div class="card" style="width: 18rem">
                            <a href="#"> <img src="image/sp1.jpg" class="imagesp" /></a>

                            <div class="card-body">

                                <div class="tensp">
                                    <a href="#">iPhone 15 Pro Max Pro Max 1T Titan </a>
                                </div>

                                <p class="card-price">
                                    <span> 600,000,000 VNĐ</span>
                                    <del>700,000,000 VNĐ</del>
                                </p>

                                <input id="them" type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="themgio">
                                <i class="fa-solid fa-cart-shopping"></i>

                            </div>
                        </div>
                        <!-- SP3 -->
                        <div class="card" style="width: 18rem">
                            <a href="#"> <img src="image/sp1.jpg" class="imagesp" /></a>

                            <div class="card-body">

                                <div class="tensp">
                                    <a href="#">iPhone 15 Pro Max 1T Titan iPhone 15 Pro Max 1T Titan iPhone 15 Pro Max 1T Titan </a>
                                </div>

                                <p class="card-price">
                                    <span> 600,000,000 VNĐ</span>
                                    <del>700,000,000 VNĐ</del>
                                </p>

                                <input id="them" type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="themgio">
                                <i class="fa-solid fa-cart-shopping"></i>

                            </div>
                        </div>
                        <!-- SP4 -->
                        <div class="card" style="width: 18rem">
                            <a href="#"> <img src="image/sp1.jpg" class="imagesp" /></a>

                            <div class="card-body">

                                <div class="tensp">
                                    <a href="#">iPhone 15 Pro Max 1T Titan iPhone 15 Pro Max 1T Titan iPhone 15 Pro Max 1T Titan </a>
                                </div>

                                <p class="card-price">
                                    <span> 600,000,000 VNĐ</span>
                                    <del>700,000,000 VNĐ</del>
                                </p>

                                <input id="them" type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="themgio">
                                <i class="fa-solid fa-cart-shopping"></i>

                            </div>
                        </div>
                        <!-- SP5 -->
                        <div class="card" style="width: 18rem">
                            <a href="#"> <img src="image/sp1.jpg" class="imagesp" /></a>

                            <div class="card-body">

                                <div class="tensp">
                                    <a href="#">iPhone 15 Pro Max 1T Titan iPhone 15 Pro Max 1T Titan iPhone 15 Pro Max 1T Titan </a>
                                </div>

                                <p class="card-price">
                                    <span> 600,000,000 VNĐ</span>
                                    <del>700,000,000 VNĐ</del>
                                </p>

                                <input id="them" type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="themgio">
                                <i class="fa-solid fa-cart-shopping"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

       <?php include 'binhluan/binhluan.php' ?>
        </div>
    </div>



    </div>

     
</body>

</html>