<?php
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan)
{
    $sql = "insert into binhluan(noidung,iduser,idpro,ngaybinhluan) 
    values ('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}
function loadall_binhluan($idpro)
{
    $sql = "SELECT * FROM binhluan 
    JOIN sanpham on sanpham.id = binhluan.idpro 
    join taikhoan on taikhoan.id = binhluan.iduser 
    where binhluan.idpro = '" . $idpro . "' 
    order by binhluan.id desc";
    $result = pdo_query($sql);
    return $result;
}
function danhsach_binhluan()
{
    $sql = "SELECT binhluan.id, binhluan.noidung, 
    sanpham.name, taikhoan.user, binhluan.ngaybinhluan 
    FROM binhluan JOIN sanpham on sanpham.id = binhluan.idpro 
    join taikhoan on taikhoan.id = binhluan.iduser";
    $result = pdo_query($sql);
    return $result;
}
function delete_binhluan($id)
{
    $sql = "DELETE FROM binhluan 
    WHERE binhluan.id = " . $id;
    pdo_execute($sql);
}
