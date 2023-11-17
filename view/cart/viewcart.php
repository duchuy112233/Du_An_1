<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form-giohang{
            margin-left: 20px;
            margin-right: 20px;
        }
        .table {
            text-align: center;
            width: 100%;
            border-collapse: collapse;
        
        }
        .table th{
            padding: 20px 0px;
              border: 1px solid gainsboro;
        }
        .table td{
            padding: 10px 0px;
              border-bottom: 1px solid gainsboro;
        }
        .xoa-giohang{
            padding: 10px 20px;
            color: white;
            font-weight: bold;
            border: 1px solid white;
            background-color: red;
        }
        .xoa-giohang:hover{
            background-color: rgb(168, 45, 45);
        }
        .dong-y-dathang{
            padding: 10px 20px;
            color: white;
            font-weight: bold;
            border: 1px solid white;
            background-color: #009B48;
        }
        .dong-y-dathang:hover{
            background: #0d8244;
        }
        .thungrac{
            border: 1px solid white;
            background-color: white;
            color: red;
            padding: 10px 10px;
           
        }
        .thungrac:hover{
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <div class="form-giohang">
        <!-- detail product -->
        <div class="">
            <h3><a href="index.php"><i class="fa-solid fa-arrow-left"></i></a></h3>
            <h2 style="padding: 20px 20px ;">Giỏ Hàng</h2>
            <div class="">
                <div class="card mt-5">
                    <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                            <?php
                            viewcart(1);
                            ?>
                        </tbody>
                    </table>
                    <div style="padding: 20px 20px ;" >
                        <a href="index.php?act=delcart"><input class="xoa-giohang" type="button" name="" value="Xoá giỏ hàng"></a>
                        <a href="index.php?act=bill"><input class="dong-y-dathang" type="button" name="" value="Đồng ý đặt hàng"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>