<div class="boxcenter">
    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">THÊM TÀI KHOẢN </h2>
    </div> <br>
    <div class="row">
        <div class="row content">
            <form action="index.php?act=addtk" method="post">
                <div class="row mb20">
                    Tên đăng nhập <br>
                    <input type="text" name="user">
                </div>
                <div class="row mb20">
                    Mặt khẩu <br>
                    <input type="text" name="pass">
                </div>
                <div class="row mb20">
                    Email <br>
                    <input type="text" name="email">
                </div>
                <div class="row mb20">
                    Địa chỉ <br>
                    <input type="text" name="address">
                </div>
                <div class="row mb20">
                    Điện thoại <br>
                    <input type="text" name="tel">
                </div>
                <div class="row mb20">
                    Vai trò <br>
                    <select name="role">
                        <option value="1">ADMIN</option>
                        <option value="2">NHÂN VIÊN</option>
                    </select>
                </div>
                <div class="row mb20">
                    <input style="color: #fff; background-color: red;" type="submit" name="themmoi" value="Thêm mới">
                    <input style="color: #fff; background-color: green;" type="reset" value="Nhập lại">
                    <a href="index.php?act=listtk"><input style="color: #fff; background-color: green;" type="button" value="Danh sách"></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>

            </form>
        </div>
    </div>
</div>