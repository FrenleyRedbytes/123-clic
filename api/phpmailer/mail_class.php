<?php

class mail_send {

    public function mail_func($template, $subject, $from_mail, $from, $to_email) {
        $mail = new JPhpMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.googlemail.com:465';
        $mail->SMTPSecure = "ssl";
        $mail->Username = 'frenleyredbytes@gmail.com';
        $mail->Password = 'frenley@redbytes';
        $mail->FromName = "123-clic";
        $mail->SetFrom($from_mail, "123-clic.fr");
        $mail->Subject = $subject;
        $mail->IsHTML(true);
        $mail->Body = $template;
        $mail->AddAddress($to_email);
        if ($mail->Send()) {
            return true;
        } else {
            return false;
        }
    }

}
