<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tb{
            font-weight: bold;
            color: green;
        }
     
        .form-mk .guimk{
            border-radius: 10px;
            background-color: blue;
            width: 50px;
             padding: 10px 10px;
            color: #fff;
           
        }
        .form-mk .guimk:hover
        {
            background-color: aqua;
            color: black;
           
        }
        .form-mk .social-container input{
            width: 500px;
            border-radius: 10px;
            background-color: #fff;
            border: 1px solid black;
        }
     
    </style>
</head>

<body >

        <div class="body">
        <h2>QUÊN MẬT KHẨU</h2><br>
            <div id="container-sign">
                <form class="form-mk" action="index.php?act=quenmk" method="post">
                    <div class="social-container">
                        <label for="exampleInputEmail1" class="form-label">Email</label> <br>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="email" />
                    </div>
                    <div class="">
                        <span>Đã có tài khoản? </span>
                        <a href="index.php">Đăng nhập!</a>
                    </div>
                    <input class = "guimk" type="submit" name="guiemail" value="Gửi"></input>
                </form>
                <br>
                <div class="tb">
                    <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?>
                </div>
            </div>
        </div>
   
</body>

</html>