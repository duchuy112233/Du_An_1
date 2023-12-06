<div class="mb10">
    <h3>THỐNG KÊ SẢN PHẨM</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=thongke" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>MÃ DANH MỤC</th>
                        <th>TÊN DANH MỤC</th>
                        <th>SỐ LƯỢNG SẢN PHẨM</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($thongke as $key => $tk) : ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td>DM<?php echo $tk['id'] ?></td>
                            <td><?php echo $tk['name'] ?></td>
                            <td><?php echo $tk['soluong'] ?> sản phẩm</td>
                            <td><?php echo number_format($tk['gia_min'], 0, ",", ".") ?> VND</td>
                            <td><?php echo number_format($tk['gia_max'], 0, ",", ".") ?> VND</td>
                            <td><?php echo number_format($tk['gia_avg'], 0, ",", ".") ?> VND</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
    </form>
</div>

<div class="mb10">
    <h3>THỐNG KÊ DOANH THU THEO THÁNG(4 THÁNG GẦN)</h3>
</div>
<div class="formcontent">
    <form action="index.php?act=thongke" method="post">
        <div class="mb10">
            <table class="mb10 content-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>THÁNG VÀ NĂM</th>
                        <th>TỔNG DOANH THU</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($thongke1 as $key => $tk) : ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo date("m/Y", strtotime($tk['thangvanam'])) ?></td>
                            <td><?php echo number_format($tk['doanhthu'], 0, ",", ".") ?> VND</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?act=bieudo1"><input type="button" value="Xem biểu đồ"></a>
    </form>
</div>