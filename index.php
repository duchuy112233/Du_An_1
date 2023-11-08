<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dự án 01</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="giaodien/css/header.css">
    <link rel="stylesheet" href="giaodien/css/giaodien.css">
    <link rel="stylesheet" href="giaodien/css/footer.css">
</head>
<body>
    <!-- header -->
    <?php include "giaodien/header.php"; ?>
    <!-- end header -->
    <div class="main">
        <?php
        if (isset($_GET['act']) && ($_GET['act']) != "") {
            $act = ($_GET['act']);
            switch ($act) {

                case 'sanphamct':
                    include "sanpham/sanphamct.php";
                    break;

                default:
                    include "giaodien/home.php";
                    break;
            }
        } else {
            include "giaodien/home.php";
        }
        ?>
    </div>

    <?php
    include "giaodien/footer.php";
    ?>

</body>

</html>