<div class="boxcenter">
    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">DANH SÁCH KHÁCH HÀNG</h2>
    </div> <br>
    <div class="row">
        <div class="row content">
            <form action="index.php?act=addtk" method="post">
                <div class="row mb20 dslh">
                    <table>
                        <tr>
                            <th></th>
                            <th>IDUSER</th>
                            <th>TÊN ĐĂNG NHẬP</th>
                            <th>MẬT KHẨU</th>
                            <th>EMAIL</th>
                            <th>ĐỊA CHỈ</th>
                            <th>ĐIỆN THOẠI</th>
                            <th>VAI TRÒ</th>
                            <th>Sửa/Xoá</th>
                        </tr>
                        <?php
                        foreach ($listtaikhoan as $taikhoan) {
                            extract($taikhoan);
                            $suatk = "index.php?act=suatk&id=" . $id;
                            $xoatk = "index.php?act=xoatk&id=" . $id;
                            echo ' 
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>' . $id . '</td>                   
                                    <td> ' . $user . '</td>
                                    <td> ' . $pass . '</td>
                                    <td> ' . $email . '</td>
                                    <td> ' . $address . '</td>
                                    <td> ' . $tel . '</td>
                                    <td> ' . $role . '</td>
                                    <td style="text-align: center;"> 
                                        <a href="' . $suatk . '"><input style="color: #fff; background-color: blue;" type="button" value ="Sửa"></a>                                          
                                        <a href="javascript:void(0);" onclick="confirmDelete(' . $id . ')">
                                        <input style="color: #fff; background-color: red;" type="button" value="Xoá"></a>                                                 
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                    </table>
                </div>
                <div class="row mb20">
                  
                    <a href="index.php?act=addtk"><input style="color: #fff; background-color: green;" type="button" value="Nhập thêm"></a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            var result = confirm("Bạn có chắc chắn muốn xóa danh mục này?");
            if (result) {
                window.location.href = "index.php?act=xoatk&id=" + id;
            }
        }
    </script>

</div>