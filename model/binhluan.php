<?php
function load_binhluan($idsp,$page,$soluong)
{
    $batdau=($page-1)*$soluong;
    $sql = "SELECT binh_luan.id, binh_luan.noidung, tai_khoan.user, tai_khoan.img, binh_luan.ngaybl FROM binh_luan
    JOIN tai_khoan ON binh_luan.iduser = tai_khoan.id
    JOIN san_pham ON binh_luan.idsp = san_pham.id
    WHERE san_pham.id = $idsp order by binh_luan.id desc limit $batdau,$soluong";
    $result = pdo_query($sql);
    return $result;
}
//Đếm số lượng để phân trang
function count_bl($id){
$sql="SELECT * FROM binh_luan where idsp=$id";
return count(pdo_query($sql));
}

function insert_binhluan($idsp, $noidung, $iduser)
{
    $date = date('Y-m-d');
    $sql = "INSERT INTO binh_luan (noidung, iduser, idsp, ngaybl) 
        VALUES ('$noidung','$iduser','$idsp','$date')";
    pdo_execute($sql);
    header("location:" . $_SERVER['HTTP_REFERER']);
}

function delete_binhluan($id)
{
    $sql = "DELETE FROM binh_luan WHERE id = $id";
    pdo_execute($sql);
}

function load_thongke_bl()
{
    $sql = "SELECT san_pham.id, san_pham.name, san_pham.img, count(*) as sobl
    FROM san_pham join binh_luan on san_pham.id=binh_luan.idsp
    GROUP BY san_pham.id, san_pham.name, san_pham.img
    ORDER BY san_pham.id DESC";
    return pdo_query($sql);
}

function loadall_binhluan($id)
{
    $sql = "SELECT user, name,binh_luan.id, noidung, ngaybl 
    FROM binh_luan join san_pham on binh_luan.idsp=san_pham.id join tai_khoan on binh_luan.iduser=tai_khoan.id 
    where binh_luan.idsp= $id
    order by binh_luan.id desc";
    $result = pdo_query($sql);
    return $result;
}


?>