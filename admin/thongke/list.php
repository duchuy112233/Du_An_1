<div class="boxcenter">

    <div class="row title">
        <h2 style="color: rgb(31, 31, 124);;">DANH SÁCH THỐNG KÊ</h2>
    </div> <br>
    <div class="row">

        <div class="row content">
            <form action="index.php?act=addtk" method="post">

                <div class="row mb20 dslh">
                    <table>
                        <tr>
                            <th></th>
                            <th>MÃ DANH MỤC</th>
                            <th>TÊN DANH MỤC</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ CAO NHẤT</th>
                            <th>GIÁ THẤP NHẤT</th>
                            <th>GIÁ TRUNG BÌNH</th>
                        </tr>
                        <?php
                        foreach ($listtk as $tk) {
                            extract($tk);
                            echo ' 
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>' . $madm . '</td>                    
                                    <td> ' . $tendm . '</td>
                                    <td> ' . $soluong . '</td>
                                    <td> ' . $giacao . '</td>
                                    <td> ' . $giathap . '</td>
                                    <td> ' . $giatb . '</td>                                  
                                 </tr>
                            ';
                        }
                        ?>
                    </table>
                </div>
                <div class="row mb20">
                    <a href="index.php?act=bieudo"><input style="color: #fff; background-color: green;" type="button" value="Xem biểu đồ"></a>
                </div>
            </form>
        </div>
    </div>
</div>