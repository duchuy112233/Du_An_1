<?php 
function load_thongke(){
$sql="SELECT danh_muc.id, danh_muc.name, count(*) as soluong, min(price) as gia_min, max(price) as gia_max, avg(price) as gia_avg FROM danh_muc join san_pham on danh_muc.id=san_pham.iddm
GROUP BY danh_muc.id, danh_muc.name 
ORDER BY soluong DESC";
return pdo_query($sql);
}
?>