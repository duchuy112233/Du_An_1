<div class="boxcenter">

    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">DANH SÁCH LOẠI HÀNG</h2>
    </div> <br>
    <div class="row">

        <div class="row content">
            <form action="index.php?act=adddm" method="post">

                <div class="row mb20 dslh">
                    <table>
                        <tr>
                            <th></th>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Sửa/Xoá</th>
                        </tr>
                        <?php
                    $i =1;
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            $suadm = "index.php?act=suadm&id=" . $id;
                            $xoadm = "index.php?act=xoadm&id=" . $id;
                            echo ' <tr>
                                        <td><input type="checkbox"></td>
                                        <td>' . $i . '</td>
                                        
                                        <td> ' . $name . '</td>
                                        <td style="text-align: center;"> 
                                            <a href="' . $suadm . '"><input style="color: #fff; background-color: blue;" type="button" value ="Sửa"></a>
                                            
                                            <a href="javascript:void(0);" onclick="confirmDelete(' . $id . ')">
                                            <input style="color: #fff; background-color: red;" type="button" value="Xoá">
                                        </a>                                  
                                        </td>
                                    </tr>';
                           $i++;
                        }
                        ?>



                    </table>
                    <a href=""></a>
                </div>


                <div class="row mb20">
                    
                    <a href="index.php?act=adddm"><input style="color: #fff; background-color: green;" type="button" value="Nhập thêm"></a>
                </div>

            </form>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            var result = confirm("Bạn có chắc chắn muốn xóa danh mục này?");
            if (result) {
                window.location.href = "index.php?act=xoadm&id=" + id;
            }
        }
    </script>

</div>