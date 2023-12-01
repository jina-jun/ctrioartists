<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

$name= $_POST['name'];
$gender= $_POST['gender'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$cloudLink= $_POST['cloud_link'];
$file1Name = $_FILES['attachment']['name'];
$file1Path = $_FILES['attachment']['tmp_name'];
$passwordFilePath = '../qwer/qwer.txt';
$password = file_get_contents($passwordFilePath);
$maxFileSize = 25 * 1024 * 1024;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if ($_FILES['attachment']['size'] > $maxFileSize) {
    echo "<script>location.href='../audition'; alert('첨부 파일의 크기는 25MB를 초과할 수 없습니다.\\n동영상/사진 링크를 남겨주세요.');</script>";
    // 추가적인 조치나 리다이렉션 등을 수행할 수 있습니다.
} else {
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;          //Enable verbose debug output
        $mail->CharSet = "utf-8";
        $mail->isSMTP();                                //Send using SMTP
        $mail->Host       = 'smtp.naver.com';           //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                       //Enable SMTP authentication
        $mail->Username   = 'ctrioent@naver.com';         //SMTP username
        $mail->Password   = trim($password);             //SMTP password
        $mail->SMTPSecure = 'ssl';                      //Enable implicit TLS encryption
        $mail->Port       = 465;                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('ctrioent@naver.com', 'CTRIO ENT. Audition');
        $mail->addAddress('ctrioent@naver.com', 'CTRIO ENT. Audition');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        if ($_FILES['attachment']['size'] > 0) {
            $mail->addAttachment($file1Path, $file1Name);    //Optional name
        }

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'CTRIO ENT. 온라인 지원자를 확인해주세요.('.$name .'/' .$gender .')';
        $mail->Body    = '<b>이름</b><br>'.$name.'<br><br><b>성별</b><br>'.$gender.'<br><br><b>이메일</b><br>'.$email.'<br><br><b>연락처</b><br>'.$phone.'<br><br><b>동영상/사진 링크</b><br><a href="'.$cloudLink.'" target="blank">'.$cloudLink.'</a>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
        $alertmsg = $name.'님 정상적으로 지원되었습니다.\n감사합니다.\n\nCTRIO ENT.';
        echo "<script>location.href='../audition'; alert('$alertmsg');</script>";
    } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>