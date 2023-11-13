<?php

function loadall_taikhoan()
{
    $sql = "select * from tai_khoan 
    order by id desc ";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function delete_taikhoan($id)
{
    $sql = "delete from 
    tai_khoan  where id = " . $id;
    pdo_query($sql);
}
function insert_taikhoan2($user, $pass, $email, $address, $tel, $role)
{
    $sql = "insert into tai_khoan(user,pass,email,address,tel,role) values ('$user','$pass','$email','$address','$tel','$role')";
    pdo_execute($sql);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function insert_taikhoan($email, $user, $pass)
{
    $sql = "insert into tai_khoan (email,user,pass) 
    values ('$email','$user','$pass')";
    pdo_execute($sql);
}

function check_email($email,$pass) {
    $sql="SELECT * FROM tai_khoan WHERE email='$email' and pass='$pass'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
function check_email_mk($email)
{
    $sql = "select * from 
    tai_khoan where email = '" . $email . "' ";
    $sp = pdo_query_one($sql);
    return $sp;
}


function update_taikhoanAD($id, $user, $pass, $email, $address, $tel, $role)
{
    $sql = "update tai_khoan 
    set user='" . $user . "',pass='" . $pass . "',
    email='" . $email . "',address='" . $address . "',
    tel='" . $tel . "',role='" . $role . "'where id=" . $id;
    pdo_execute($sql);
}
function update_taikhoan($id, $user, $pass, $email, $address, $tel)
{
    $sql = "update tai_khoan set user='" . $user . "',
    pass='" . $pass . "',email='" . $email . "',
    address='" . $address . "',tel='" . $tel . "' where id =" . $id;
    pdo_execute($sql);
}
function loadone_taikhoan($id)
{
    $sql = "select * from tai_khoan where id = " . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

