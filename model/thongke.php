<?php 
function load_thongke(){
$sql="SELECT danh_muc.id, danh_muc.name, count(*) as soluong, min(price) as gia_min, max(price) as gia_max, avg(price) as gia_avg FROM danh_muc join san_pham on danh_muc.id=san_pham.iddm
GROUP BY danh_muc.id, danh_muc.name 
ORDER BY soluong DESC";
return pdo_query($sql);
}

function thongke(){
$sql="SELECT 
DATE_FORMAT(bill.ngaydh, '%Y-%m') AS 'thangvanam',
SUM(cart.soluong * cart.price) AS 'doanhthu'
FROM bill
JOIN cart ON bill.id = cart.idbill
WHERE bill.bill_pttt = 1 and bill.bill_status = 4 or bill.bill_pttt = 2 and bill.bill_status <> 5    -- Chỉ lấy các đơn hàng đã giao thành công
GROUP BY DATE_FORMAT(bill.ngaydh, '%Y-%m')
ORDER BY MAX(bill.ngaydh) DESC  -- Sử dụng hàm tổng hợp MAX để ORDER BY
LIMIT 4";
return pdo_query($sql);
}
?>