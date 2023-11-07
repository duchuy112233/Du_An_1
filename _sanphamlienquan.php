<div class="col-md-3 offset-md-1">

    <!-- Top 10 -->
    <div class="card mt-5" style="width: 18rem">
        <div class="card-header">Sản phẩm liên quan</div>
        <div style="font-weight: bold;" class="list-group">
            <?php 
            foreach ($sp_cungloai as $sp_cungloai) {
                extract($sp_cungloai);
                $linksp = "index.php?act=sanphamct&idsp=".$id;
                $img = $img_path.$img;
                echo ' <a href="'.$linksp.'" class="list-group-item list-group-item-action list-item-link">
                <img src="'.$img.'"/>
                '.$name.'
            </a>';
            }
            ?>
        </div>
    </div>
</div>  