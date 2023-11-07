<div class="boxcenter">
    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">DANH SÁCH HÀNG HOÁ</h2>
    </div> <br>
    <form action="index.php?act=listsp" method="post">
        <input type="text" name="kyw">
        <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo ' <option value="' . $id . '">' . $name . '</option>';
            }
            ?>
        </select>
        <input style="padding: 0px 15px;" type="submit" name="listok" value="Go">
    </form>
    <br>
    <div class="row">
        <div class="row content">
            <form action="index.php?act=adddm" method="post">
                <div class="row mb20 dslh">
                    <table>
                        <tr>
                            <th></th>
                            <th>MÃ SẢN PHẨM</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>HÌNH ẢNH</th>
                            <th>GIÁ</th>
                            <th>GIẢM GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>LƯỢT XEM</th>
                            <th>SỬA / XOÁ</th>
                        </tr>
                        <?php
                       $i =1;
                        foreach ($listsanpham as $sanpham) {
                            extract($sanpham);
                            $suasp = "index.php?act=suasp&id=" . $id;
                            $xoasp = "index.php?act=xoasp&id=" . $id;
                            $hinhpath = "../upload/" . $img;
                            if (is_file($hinhpath)) {
                                $hinh =  "<img src='" . $hinhpath . "' height='80px'>";
                            } else {
                                $hinh = "Không có hình";
                            }
                            echo ' <tr>
                                        <td><input type="checkbox"></td>
                                        <td>' . $i . '</td>                                      
                                        <td> ' . $name . '</td>
                                        <td> ' . $hinh . '</td>
                                        <td> ' . $price . '</td>
                                        <td> ' . $giamgia . '</td>
                                        <td> ' . $soluongsp . '</td>
                                        <td> ' . $luotxem . '</td>
                                        <td style="text-align: center;"> 
                                            <a href="' . $suasp . '"><input style="color: #fff; background-color: blue;" type="button" value ="Sửa"></a>                                      
                                            <a href="javascript:void(0);" onclick="confirmDelete(' . $id . ')">
                                            <input style="color: #fff; background-color: red;" type="button" value="Xoá"></a>
                                        </td>
                                    </tr>';
                                    $i++;
                        }
                        ?>
                    </table>                  
                </div>
                <div class="row mb20">
                   
                    <a href="index.php?act=addsp"><input style="color: #fff; background-color: green;" type="button" value="Nhập thêm"></a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            var result = confirm("Bạn có chắc chắn muốn xóa danh mục này?");
            if (result) {
                window.location.href = "index.php?act=xoasp&id=" + id;
            }
        }
    </script>

</div>