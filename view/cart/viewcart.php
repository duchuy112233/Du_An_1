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
                <div style="padding: 20px 20px ;">
                    <a href="index.php?act=delcart"><input class="xoa-giohang" type="button" name="" value="Xoá giỏ hàng"></a>
                    <a href="index.php?act=bill"><input class="dong-y-dathang" type="button" name="" value="Đồng ý đặt hàng"></a>
                </div>
            </div>
        </div>
    </div>
</div>