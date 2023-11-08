<?php 
function insert_sanpham($tensp,$giasp,$giamgia,$soluongsp,$hinh,$mota,$iddm){
    $sql = "insert into sanpham(name,price,giamgia,soluongsp,img,mota,iddm) 
    values ('$tensp','$giasp','$giamgia','$soluongsp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id){
    $data = loadone_sanpham($id);
    unlink("../upload/{$data['img']}");
    $sql = "delete from sanpham where id = " .$id;
    pdo_query($sql);
}
function loadall_sanpham($kyw="",$iddm=0){
    $sql = "select * from sanpham where 1";
    if ($kyw!="") {$sql.=" and name like '%".$kyw."%'";}
    if ($iddm>0) {$sql.=" and iddm = '".$iddm."'";}
    $sql.=" order by id desc ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_home(){
    $sql = "select * from sanpham 
    where 1 order by id desc limit 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_top10(){
    $sql = "select * from sanpham 
    where 1 order by luotxem desc limit 0,4";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadone_sanpham($id){
    $sql = "select * from sanpham 
    where id = ".$id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_tendm($iddm){
    if($iddm>0){
 $sql = "select * from danhmuc 
 where id = ".$iddm;
    $dm = pdo_query_one($sql);
    extract ($dm);
    return $name;
    }else {return "";}
}
function load_sanpham_cungloai($id,$iddm){
    $sql = "select * from sanpham 
    where iddm=".$iddm." AND id <> ".$id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function update_sanpham($id,$iddm,$tensp,$giamgia,$soluongsp,$giasp,$mota,$hinh){
    if ($hinh != "") 
    $sql = "update sanpham 
    set iddm='".$iddm."', 
    name='".$tensp."', price='".$giasp."',giamgia='".$giamgia."',
    soluongsp='".$soluongsp."', mota='".$mota."', img='".$hinh."' where id =" . $id;
    else
    $sql = "update sanpham 
    set iddm='".$iddm."', 
    name='".$tensp."', price='".$giasp."',giamgia='".$giamgia."',
    soluongsp='".$soluongsp."', mota='".$mota."' where id =" . $id;
    pdo_execute($sql);
}

function tangluotxem($idsp){
    $sanpham = loadone_sanpham($idsp);
    $luotxem = $sanpham['luotxem'] + 1;
    $sql = "update sanpham set luotxem = $luotxem where id = $idsp";
    pdo_execute($sql);
}
