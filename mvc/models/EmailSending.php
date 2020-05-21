<?php
    class EmailSending
    {
        private $KeyAuthEmaill = "$!0@aBc-";
        function Send($Email,$Name)
        {
           
            // $message .= '<a href="http://localhost:8080/NhaTro/register/AuthEmail/'.sha1($this->KeyAuthEmaill).'/'.sha1($Email).'">This is headline.</a>';
            require 'Mailer/class.phpmailer.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Port = "587";
            $mail->Username = "hoichepvan@gmail.com";
            $mail->Password = "namdaik275";
            $mail->Subject = "Email Authentication";
            $mail->setFrom('noreply@gmail.com');
            $mail->isHTML(true);
            $mail->AddAddress($Email, $Name);
            $mail->Body = '<a href="http://localhost:8080/NhaTro/register/AuthEmailURl/'.sha1($this->KeyAuthEmaill).'/'.sha1($Email).'">Hi '.$Name. '
             cảm ơn bạn đã là những người đăng kí sử dụng nền tảng của chính tôi, click vào đây để xác thực tài khoản của bạn</a>';  
            $mail->Send();
        }
    }
?>