<?php
//ram
function loadall_ram(){
    $sql="SELECT * FROM ramsp order by id desc";
    $list=pdo_query($sql);
    return $list;
}
function add_ram($ramsp){
    $sql = "INSERT INTO ramsp (ram_sp) VALUES ('$ramsp')";
    pdo_execute($sql);
}
function loadone_ram($id){
    $sql = "SELECT * FROM ramsp where id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function update_ram($id, $ramsp){
    $sql = "UPDATE ramsp SET ram_sp ='$ramsp' WHERE id = $id";
    pdo_execute($sql);
}
function delete_ram($id){
    $sql = "DELETE FROM ramsp where id = $id";
    pdo_execute($sql);
}
//màu
function loadall_mau(){
    $sql="SELECT * FROM mausp order by id desc";
    $list=pdo_query($sql);
    return $list;
}
function add_mau($mausp){
    $sql = "INSERT INTO mausp (mau_sp) VALUES ('$mausp')";
    pdo_execute($sql);
}
function loadone_mau($id){
    $sql = "SELECT * FROM mausp where id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function update_mau($id, $mausp){
    $sql = "UPDATE mausp SET mau_sp ='$mausp' WHERE id = $id";
    pdo_execute($sql);
}
function delete_mau($id){
    $sql = "DELETE FROM mausp where id = $id";
    pdo_execute($sql);
}
//sản phẩm
?>