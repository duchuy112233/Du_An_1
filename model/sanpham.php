<?php
function loadall_sanpham_dm1(){
    $sql="SELECT * FROM san_pham where 1 order by id desc limit 0,4";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_dm2(){
    $sql="SELECT * FROM san_pham where 1 order by luotxem desc limit 0,4";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham($keyw="",$iddm=0){
    $sql="SELECT * from san_pham where 1";
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}

function loadone_sanpham($id){
    $sql = "SELECT * FROM san_pham where id = $id";
    $result = pdo_query_one($sql);
    return $result;
}

function load_sanpham_cungloai($id, $iddm){
    $sql = "SELECT * FROM san_pham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}

function add_sanpham($name,$mota,$price,$cpu,$ram,$ocung,$carddohoa,$manhinh,$img,$giamgia,$iddm){
    $img_with_time = time() . basename($img);
    $sql = "INSERT INTO san_pham (name, mota, price, cpu, ram, ocung, card_do_hoa, man_hinh, img, giamgia, iddm) VALUES ('$name', '$mota', '$price', '$cpu', '$ram', '$ocung', '$carddohoa', '$manhinh', '$img_with_time', '$giamgia', '$iddm')";
    pdo_execute($sql);
}

function update_sanpham($id,$name,$mota,$price,$cpu,$ram,$ocung,$carddohoa,$manhinh,$img,$giamgia,$iddm){
    $sanpham = loadone_sanpham($id);
    if($img != ""){
        if($sanpham['img'] != null && $sanpham['img'] != ""){
            $imglink = "../upload/" . $sanpham['img'];
            unlink($imglink);
        }
        $img_with_time = time() . basename($img);
        $sql = "UPDATE san_pham SET name ='$name', mota ='$mota', price ='$price', cpu ='$cpu', ram ='$ram', ocung ='$ocung', card_do_hoa ='$carddohoa', man_hinh ='$manhinh', img='$img_with_time', giamgia ='$giamgia', iddm ='$iddm' WHERE id = $id";
    }else{
        $sql = "UPDATE san_pham SET name ='$name', mota ='$mota', price ='$price', cpu ='$cpu', ram ='$ram', ocung ='$ocung', card_do_hoa ='$carddohoa', man_hinh ='$manhinh', giamgia ='$giamgia', iddm ='$iddm' WHERE id = $id";
    }
    pdo_execute($sql);
}

function delete_sanpham($id){
    $sanpham = loadone_sanpham($id);
    if($sanpham['img'] != null && $sanpham['img'] != ""){
        $imglink = "../upload/" . $sanpham['img'];
        unlink($imglink);
    }
    $sql = "DELETE FROM san_pham where id = $id";
    pdo_execute($sql);
}

function tangluotxem($idsp){
    $sanpham = loadone_sanpham($idsp);
    $luotxem = $sanpham['luotxem'] + 1;
    $sql = "UPDATE san_pham set luotxem = $luotxem where id = $idsp";
    pdo_execute($sql);
}
?>