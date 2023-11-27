<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Chatbot in JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="chatbotcss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="script.js" defer></script>
</head>

<body>



    <div class="mlr">
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

    <div class="title">
        <h4>SẢN PHẨM NỔI BẬT</h4>
        <hr>
    </div>
    <div class="row">
        <?php foreach ($dm1 as $key => $sp) : $hinh = $image_path . $sp['img']; ?>
            <div class="boxsp">
                <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><img src="../upload/<?php echo $sp['img'] ?>" alt=""></a>
                <div class="card-body">
                    <div class="box-title">
                        <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><?php echo $sp['name'] ?></a>
                    </div>
                    <div class="boxsp-content">
                        <p>CPU <?php echo $sp['cpu'] ?></p>
                        <p>RAM <?php echo $sp['ram'] ?></p>
                        <p>Ổ cứng <?php echo $sp['ocung'] ?></p>
                        <p>Card <?php echo $sp['card_do_hoa'] ?></p>
                        <p>M.Hình <?php echo $sp['man_hinh'] ?></p>
                    </div>
                    <div class="money">
                        <del><?php echo number_format($sp['price']) ?> VND</del>
                        <span>-<?php echo number_format($sp['giamgia']) ?>%</span>
                        <p><?php echo number_format($sp['price'] - $sp['price'] * ($sp['giamgia'] / 100)) ?> Đ</p>
                    </div>
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="<?php echo $sp['id'] ?>">
                        <input type="hidden" name="name" value="<?php echo $sp['name'] ?>">
                        <input type="hidden" name="hinh" value="<?php echo $hinh ?>">
                        <input type="hidden" name="price" value="<?php echo $sp['price'] - $sp['price'] * ($sp['giamgia'] / 100) ?>">
                        <div class="add">
                            <a href="" class="btn-shop"><input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="btn-shop-text">
                                <i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!-- Danh mục 2 -->
    <div class="title">
        <h4>SẢN PHẨM MỚI</h4>
        <hr>
    </div>
    <div class="row">
        <?php foreach ($dm2 as $key => $sp) : $hinh = $image_path . $sp['img']; ?>
            <div class="boxsp">
                <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><img src="../upload/<?php echo $sp['img'] ?>" alt=""></a>
                <div class="card-body">
                    <div class="box-title">
                        <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><?php echo $sp['name'] ?></a>
                    </div>
                    <div class="boxsp-content">
                        <p>CPU <?php echo $sp['cpu'] ?></p>
                        <p>RAM <?php echo $sp['ram'] ?></p>
                        <p>Ổ cứng <?php echo $sp['ocung'] ?></p>
                        <p>Card <?php echo $sp['card_do_hoa'] ?></p>
                        <p>M.Hình <?php echo $sp['man_hinh'] ?></p>
                    </div>
                    <div class="money">
                        <del><?php echo number_format($sp['price']) ?> VND</del>
                        <span>-<?php echo number_format($sp['giamgia']) ?>%</span>
                        <p><?php echo number_format($sp['price'] - $sp['price'] * ($sp['giamgia'] / 100)) ?> Đ</p>
                    </div>
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="<?php echo $sp['id'] ?>">
                        <input type="hidden" name="name" value="<?php echo $sp['name'] ?>">
                        <input type="hidden" name="hinh" value="<?php echo $hinh ?>">
                        <input type="hidden" name="price" value="<?php echo $sp['price'] - $sp['price'] * ($sp['giamgia'] / 100) ?>">
                        <div class="add">
                            <a href="" class="btn-shop"><input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="btn-shop-text">
                                <i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>


















    <!-- ////////////////////Chatbot//////////////////////// -->










    <button class="chatbot-toggler">
        <span class="material-symbols-rounded">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
        <header>
            <h2>LAPTOPIA_CSKH</h2>
            <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <p>Xin chào👋<br>Hôm nay tôi giúp gì được cho bạn?</p>
            </li>
        </ul>
        <div class="chat-input">
            <textarea placeholder="Nhập tin nhắn..." spellcheck="false" required></textarea>
            <span id="send-btn" class="material-symbols-rounded">send</span>
        </div>
    </div>

</body>

</html>
