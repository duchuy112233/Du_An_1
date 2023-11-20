<div class="mb10">
    <h3>DANH SÁCH DANH MỤC</h3>
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
                            <td><?php echo number_format($tk['gia_min']) ?> VND</td>
                            <td><?php echo number_format($tk['gia_max']) ?> VND</td>
                            <td><?php echo number_format($tk['gia_avg']) ?> VND</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
    </form>
</div>