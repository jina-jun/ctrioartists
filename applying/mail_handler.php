<?php
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require G5_PHPMAILER_PATH.'/src/PHPMailer.php';
    require G5_PHPMAILER_PATH.'/src/Exception.php';
    require G5_PHPMAILER_PATH.'/src/SMTP.php';

    $name= isset($_POST['name']) ? clean_xss_tags($_POST['name']) : '';
    $gender= isset($_POST['gender']) ? clean_xss_tags($_POST['gender']) : '';
    $email= isset($_POST['email']) ? clean_xss_tags($_POST['email']) : '';
    $phone= isset($_POST['phone']) ? clean_xss_tags($_POST['phone']) : '';
    $file= isset($_FILES['attachment']) ? clean_xss_tags($_FILES['attachment']) : '';

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = 'ctrioent.co.kr';
    $mail->Port = '587';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';

    $mail->setFrom($email, $name);
    $mail->addAddress('', '');

    $mail->isHTML(true);
    $mail->Subject = "CTRIO ENT. 온라인 지원자를 확인해주세요. . $name, $gender";
    $mail->Body = "이름: $name<br>성별: $gender<br>이메일: $email<br>연락처: $phone";

    if (!empty($file['tmp_name'])) {
        $mail->addAttachment($file['tmp_name'], $file['name']);
    }
    
    if ($mail->send()) {
        echo '메일이 성공적으로 전송되었습니다.';
    } else {
        echo '메일 전송에 실패했습니다. 오류: ' . $mail->ErrorInfo;
    }
    ?>