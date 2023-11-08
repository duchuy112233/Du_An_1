<?php
if (is_array($taikhoan)) {
    extract($taikhoan);
}



?>
<div class="boxcenter">

    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h2>
    </div> <br>
    <div class="row">

        <div class="row content">
            <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $email ?>" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
                    <input type="text" name="user" class="form-control" value="<?= $user ?>" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input type="text" name="pass" class="form-control" value="<?= $pass ?>" />
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="<?= $address ?>" />
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                    <input type="text" name="tel" class="form-control" value="<?= $tel ?>" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Vai trò</label>
                     <br>
                    <select name="role">
                        <option value="0">KHÁCH</option>
                        <option value="1">ADMIN</option>
                        <option value="2">NHÂN VIÊN</option>
                    </select>
                    <br>
                </div>

                <br>


                <div class="row mb20">
                    <input type="hidden" name="id" value=<?= $id ?>>
                    <input style="color: #fff; background-color: red;" type="submit" name="capnhat" value="Cập nhật">
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