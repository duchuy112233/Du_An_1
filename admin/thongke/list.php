<div >

    <div class="mb10">
        <h3>DANH SÁCH THỐNG KÊ</h3>
    </div> <br>
    <div class="formcontent">

        <div >
            <form action="index.php?act=addtk" method="post">

                <div class="mb10">
                    <table class="mb10 content-table">
                        <thead>
                              <tr>
                            <th></th>
                            <th>MÃ DANH MỤC</th>
                            <th>TÊN DANH MỤC</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ CAO NHẤT</th>
                            <th>GIÁ THẤP NHẤT</th>
                            <th>GIÁ TRUNG BÌNH</th>
                        </tr>
                        </thead>
                      
                        <?php
                        foreach ($listtk as $tk) {
                            extract($tk);
                            echo ' 
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>' . $madm . '</td>                    
                                    <td> ' . $tendm . '</td>
                                    <td> ' . $soluong . '</td>
                                    <td> ' .  number_format($giacao) . ' VNĐ</td>
                                    <td> ' .  number_format($giathap) . ' VNĐ</td>
                                    <td> ' .  number_format($giatb) . ' VNĐ</td>                                  
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