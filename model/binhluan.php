<?php
function load_binhluan($idsp)
{
    $sql = "SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
    JOIN taikhoan ON binhluan.iduser = taikhoan.id
    JOIN sanpham ON binhluan.idpro = sanpham.id
    WHERE sanpham.id = $idsp";
    $result = pdo_query($sql);
    return $result;
}

function insert_binhluan($idpro, $noidung, $iduser)
{
    $date = date('Y-m-d');
    $sql = "INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
        VALUES ('$noidung','$iduser','$idpro','$date')";
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
