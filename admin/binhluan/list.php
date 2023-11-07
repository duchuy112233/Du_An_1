<div class="boxcenter">
    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">DANH SÁCH BÌNH LUẬN</h2>
    </div> <br>
    <div class="row">
        <div class="row content">
            <form action="index.php?act=listbl" method="post">
                <div class="row mb20 dslh">
                    <table>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>TÊN TÀI KHOẢN</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>NỘI DUNG</th>
                            <th>NGÀY BÌNH LUẬN</th>
                            <th>XOÁ BÌNH LUẬN</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($listbinhluan as $binhluan) {
                            extract($binhluan);
                            $suabl = "index.php?act=suabl&id=" . $id;
                            $xoabl = "index.php?act=xoabl&id=" . $id;
                            echo ' <tr>
                                        <td><input type="checkbox"></td>
                                        <td>' . $i . '</td>                                                                          
                                        <td> ' . $user . '</td>
                                        <td> ' . $name . '</td>
                                        <td> ' . $noidung . '</td>
                                        <td> ' . $ngaybinhluan . '</td> 


                                        <td style="text-align: center;">                                         
                                            <a href="javascript:void(0);" onclick="confirmDelete(' . $id . ')">
                                            <input style="color: #fff; background-color: red;" type="button" value="Xoá">
                                        </a>
                                        
                                            
                                        </td>
                                    </tr>';
                            $i++;
                            //Giờ m bỏ cái confirm xóa đi đã, cho xóa bình thường thôi, ko cần xấc nhận
                        }
                        ?>
                    </table>
                    <a href=""></a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            var result = confirm("Bạn có chắc chắn muốn xóa danh mục này?");
            if (result) {
                window.location.href = "index.php?act=xoabl&id=" + id;
            }
        }
    </script>
    <!-- <a href="' . $suabl . '"><input style="color: #fff; background-color: blue;" type="button" value ="Sửa"></a> -->
</div>