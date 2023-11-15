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

function sendMailPass($email, $username, $pass) {
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '00a2d4229bd65b';                     //SMTP username
    $mail->Password   = '6dd329c899a82a';                               //SMTP password
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('shoplaptopia@example.com', 'Shop Laptopia');
    $mail->addAddress($email, $username);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';                             // Set character encoding to UTF-8
    $mail->Encoding = 'base64';                           // Set the encoding type to base64 (optional, but recommended)
    $mail->Subject = 'Mật khẩu mới';
    $mail->Body    = 'Mật khẩu mới của bạn là: '.$pass;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
//Đổi mật khẩu của người dùng
function update_matkhau($id,$pass){
    $sql="UPDATE tai_khoan SET pass='$pass' where id= '$id'";
    pdo_execute($sql);
}