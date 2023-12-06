<?php 
function loadall_danhmuc(){
    $sql="SELECT * FROM danh_muc order by id desc";
    $listdm=pdo_query($sql);
    return $listdm;
}
function add_danhmuc($tendm){
    $sql = "INSERT INTO danh_muc (name) VALUES ('$tendm')";
    pdo_execute($sql);
}
function loadone_danhmuc($iddm){
    $sql = "SELECT * FROM danh_muc where id = $iddm";
    $result = pdo_query_one($sql);
    return $result;
}
function update_danhmuc($iddm, $tendm){
    $sql = "UPDATE danh_muc SET name ='$tendm' WHERE id = $iddm";
    pdo_execute($sql);
}
function delete_danhmuc($iddm){
    $sql = "DELETE FROM danh_muc where id = $iddm";
    pdo_execute($sql);
}
?>