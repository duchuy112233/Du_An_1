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
?>