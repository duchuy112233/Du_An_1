<?php
session_start();
include "../model/pdo.php";
include "../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
$dsbl = loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bl {
            margin-top: 100px;
        }

        .gui {
            display: flex;
        }

        .mt {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <!-- Search -->
    <!-- Danh mục -->
    <h4 class="bl">BÌNH LUẬN</h4>
    <hr>
    <div class="list-group">
        <table>
            <?php
            
            foreach ($dsbl as $bl) {
                extract($bl);
                echo '<tr><td style="color: green">' . $user . ' <hr></td>';               
                echo '<td>' . $noidung . '<hr></td>';
                echo '<td>' . $ngaybinhluan . '<hr></td></tr>';
            }
            ?>
        </table>
    </div>

    <div class="mt" style="width: 50rem">
        <form class="gui" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="idpro" value="<?= $idpro ?>">
            <input type="text" name="noidung" class="form-control" />
            <input class="btn btn-primary" type="submit" name="guibinhluan" value="Gửi">
        </form>
    </div>
    <?php
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $noidung = $_POST['noidung'];
        $idpro = $_POST['idpro'];
        $iduser = $_SESSION['user']['id'];
        $ngaybinhluan = date('H:i:s A d/m/y');
        insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    ?>
</body>

</html>