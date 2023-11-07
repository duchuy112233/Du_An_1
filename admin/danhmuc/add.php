
<div class="boxcenter">
    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">THÊM MỚI LOẠI HÀNG HOÁ</h2>
    </div> <br>
    <div class="row">

        <div class="row content">
            <form action="index.php?act=adddm" method="post">

                <div class="row mb20">
                    Mã loại <br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="row mb20">
                    Tên loại <br>
                    <input type="text" name="tenloai" >         
                </div>
                <div class="row mb20">
                    <input style="color: #fff; background-color: red;" type="submit" name="themmoi" value="Thêm mới">
                    <input style="color: #fff; background-color: green;" type="reset" value="Nhập lại">
                    <a href="index.php?act=listdm"><input style="color: #fff; background-color: green;" type="button" value="Danh sách"></a>
                </div>
                <?php 
                if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                ?>
               
            </form>
        </div>
    </div>

   
</div>