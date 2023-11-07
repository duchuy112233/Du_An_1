<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tt input {
            font-size: 20px;
        }
        #tt input:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- detail product -->
        <div class="">
            <div class="">
                <h3><a href="index.php?act=billcomfirm"><i class="fa-solid fa-arrow-left"></i></a></h3>
                <h2 style="padding: 20px 20px ;">Thông tin đặt hàng</h2>
                <div>
                    <div class="card-header">Thông tin khách hàng</div>
                    <table style="margin-left: 30px; margin-top: 20px; margin-bottom: 20px;">
                        <?php
                        if (isset($_SESSION['user'])) {
                            $user = $_SESSION['user']['user'];
                            $address = $_SESSION['user']['address'];
                            $email = $_SESSION['user']['email'];
                            $tel = $_SESSION['user']['tel'];
                        } else {
                            $user = "";
                            $address = "";
                            $email = "";
                            $tel = "";
                        }
                        ?>
                        <tr>
                            <td>Tên người đặt hàng </td>
                            <td style="padding-left: 30px;"><input style="width: 600px;" class="form-control" type="text" name="user" value="<?= $user ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td style="padding-left: 30px;"><input class="form-control" type="text" name="address" value="<?= $address ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td style="padding-left: 30px;"><input class="form-control" type="text" name="email" value="<?= $email ?>"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td style="padding-left: 30px;"><input class="form-control" type="text" name="tel" value="<?= $tel ?>"></td>
                        </tr>
                    </table>
                </div>
                <br><br>
                <div>
                    <div class="card-header">Phương thức thanh toán</div>
                    <table style="margin-left: 30px; margin-top: 20px; margin-bottom: 20px; padding: 10px 10px;">
                        <tr>
                            <td style="padding: 0px 15px;"><input type="radio" name="pttt" checked>Trả tiền mặt khi nhập hàng </td>
                            <td style="padding: 0px 15px;"><input type="radio" name="pttt"> Chuyển khoản ngân hàng</td>
                            <td style="padding: 0px 15px;"><input type="radio" name="pttt"> Thanh toán online</td>
                        </tr>
                    </table>
                </div>
                <br><br>
                <div class="card-header">Đơn hàng</div>
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        viewcart(0);
                        ?>
                    </tbody>
                </table>
                <br>
                <div id="tt" style="padding: 20px 20px ; float: right;">
                    <a href="index.php?act=thanhcong"><input class="btn btn-success" type="button" name="dongydathang" value="Xác nhận thanh toán"></a>
                </div>
            </div>
            <!-- SẢN phẩm khác -->

        </div>
    </div>
</body>

</html>