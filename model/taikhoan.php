<?php
function add_taikhoan($email,$user,$pass){
    $sql="INSERT INTO tai_khoan ( email, user, pass) VALUES ( '$email', '$user','$pass')";
    pdo_execute($sql);
}
function dangnhap($email,$pass) {
    $sql="SELECT * FROM tai_khoan WHERE email='$email' and pass='$pass'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
function update_taikhoan($id,$email,$address,$tel){
    $sql="UPDATE taikhoan SET  email='$email', address='$address', tel='$tel' where id= '$id'";
    pdo_execute($sql);
}
function update_matkhau($id,$pass){
    $sql="UPDATE taikhoan SET pass='$pass' where id= '$id'";
    pdo_execute($sql);
}
function loadall_khachhang(){
    $sql = "SELECT * FROM taikhoan order by id desc";
    $result = pdo_query($sql);
    return $result;
}
function delete_taikhoan($idkh){
    $sql = "DELETE FROM `taikhoan` WHERE id = $idkh";
    pdo_execute($sql);
}
function insert_khachhang($user, $pass, $email, $address, $tel, $role){
    $sql = "INSERT INTO taikhoan (`user`, `pass`, `email`, `address`, `tel`, `role`) VALUES ('$user', '$pass', '$email', '$address', '$tel', '$role')";
    pdo_execute($sql);
}
function loadone_khachhang($idkh){
    $sql = "select * from taikhoan where id = $idkh";
    $result = pdo_query_one($sql);
    return $result;
}
function update_khachhang($user, $pass, $email, $address, $tel, $role, $id){
    $sql = "UPDATE `taikhoan` SET `user`='$user',`pass`='$pass',`email`='$email',`address`='$address',`tel`='$tel',`role`='$role' WHERE id = $id";
    pdo_execute($sql);
}
?>