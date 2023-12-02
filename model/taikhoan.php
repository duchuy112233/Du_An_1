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
//Ramdom mật khẩu ngẫu nhiên
function RandomPassword() {
    $length = 8;
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';//Chuỗi kí tự để ramdom
    $pass = '';
    
    for ($i = 0; $i < $length; $i++) {
        $pass .= $char[rand(0, strlen($char) - 1)];
    }
    
    return $pass;
}
//Kiểm tra thông tin email có trong csdl hay không
function sendMail($email) {
    $sql="SELECT * FROM tai_khoan WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);

    if (empty($email)) {
        return "Bạn chưa nhập email!";
    }
    
    if ($taikhoan != false) {
        $newPass = RandomPassword();

        // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); //cái này tăng bảo mật
        $sql = "UPDATE tai_khoan SET pass='$newPass' WHERE email='$email'";
        pdo_execute($sql);

        sendMailPass($email, $taikhoan['user'], $newPass);
        return "Gửi email thành công";
    }
    else {
        return "Email bạn nhập ko có trong hệ thống!";
    }
}
//PHPMailer - Gửi email kiểu php
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

function loadall_taikhoan(){
    $sql = "SELECT * FROM tai_khoan order by id desc";
    $result = pdo_query($sql);
    return $result;
}

function loadone_taikhoan($idtk){
    $sql = "select * from tai_khoan where id = $idtk";
    $result = pdo_query_one($sql);
    return $result;
}

function update_taikhoan($id,$user,$pass,$img,$email,$address,$tel,$role){
    $taikhoan = loadone_taikhoan($id);
    if($img != ""){
        if($taikhoan['img'] != null && $taikhoan['img'] != ""){
            $imglink = "../upload/" . $taikhoan['img'];
            unlink($imglink);
        }
        $img_with_time = time() . basename($img);
        $sql = "UPDATE tai_khoan SET user ='$user', pass ='$pass', img ='$img_with_time', email ='$email', address ='$address', tel ='$tel', role ='$role' WHERE id = $id";
    }else{
        $sql = "UPDATE tai_khoan SET user ='$user', pass ='$pass', email ='$email', address ='$address', tel ='$tel', role ='$role' WHERE id = $id";
    }
    pdo_execute($sql);
}

function delete_taikhoan($id){
    $taikhoan = loadone_taikhoan($id);
    if($taikhoan['img'] != null && $taikhoan['img'] != ""){
        $imglink = "../upload/" . $taikhoan['img'];
        unlink($imglink);
    }
    $sql = "DELETE FROM tai_khoan where id = $id";
    pdo_execute($sql);
}

function add_taikhoan_admin($user,$pass,$img,$email,$address,$tel,$role){
    $img_with_time = time() . basename($img);
    $sql = "INSERT INTO tai_khoan (user, pass, img, email, address, tel, role) VALUES ('$user', '$pass', '$img_with_time', '$email', '$address', '$tel', '$role')";
    pdo_execute($sql);
}

function edit_taikhoan($id,$user,$img,$address,$tel){
    $taikhoan = loadone_taikhoan($id);
    if($img != ""){
        if($taikhoan['img'] != null && $taikhoan['img'] != ""){
            $imglink = "../upload/" . $taikhoan['img'];
            unlink($imglink);
        }
        $img_with_time = time() . basename($img);
        $sql = "UPDATE tai_khoan SET user ='$user', img ='$img_with_time', address ='$address', tel ='$tel' WHERE id = $id";
    }else{
        $sql = "UPDATE tai_khoan SET user ='$user', address ='$address', tel ='$tel' WHERE id = $id";
    }
    pdo_execute($sql);
    header("location:".$_SERVER['HTTP_REFERER']);
}

?>