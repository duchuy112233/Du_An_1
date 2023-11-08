<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .binhluan {
            border: 1px solid gray;
            height: 400px;
            margin-top: 10px;
            margin-bottom: 50px;
        }

        .binhluan-name {
            margin-top: 100px;
        }

        .formbinhluan {
            padding: 20px 50px;
            float: right;

        }

        #nhap {
            height: 40px;
            width: 1300px;
        }

        .formbinhluan .nut-gui {
            background-color: #009B48;
            padding: 10px 10px;
            color: white;
            font-weight: bold;
        }
        .formbinhluan .nut-gui:hover {
            background-color: red;  
        }
    </style>
</head>

<body>

    <h4 class="binhluan-name">BÌNH LUẬN</h4>


    <div class="binhluan">
        <form class="formbinhluan" action="" method="post">
            <input type="text" id="nhap">
            <input class="nut-gui" type="submit" name="guibinhluan" value="Gửi">

        </form>
    </div>

</body>

</html>