<div class="container">
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
                <div style="padding: 20px 20px ;" class="text-right">
                    <a href="index.php?act=delcart"><input style="background-color: red;" class="btn btn-success" type="button" name="" value="Xoá giỏ hàng"></a>
                    <a href="index.php?act=bill"><input class="btn btn-success" type="button" name="" value="Đồng ý đặt hàng"></a>
                </div>
            </div>
        </div>
    </div>
</div>