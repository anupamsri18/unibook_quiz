<?php
require_once 'phpmailer.php';
require_once 'User.php';

class Notification
{
    public $user;
    public $db;
    public $message;
    public $profile;


    public function notify($email, $message)
    {
        $this->user = new User();
        $this->message = $message;
        $result = $this->user->getProfileDetails('email', $email);
        if ($result) {
            if (mysqli_num_rows($result)) {
                $this->profile = mysqli_fetch_assoc($result);
            } else {
                return $result;
            }
        } else {
            return $result;
        }
        return $this->sendMail();
    }


    public function sendPasswordChangeRequest($email = '')
    {
        $user = new User();
        $result = $user->getProfileDetails('email', $email);
        if ($result) {
            if (mysqli_num_rows($result)) {
                $this->profile = mysqli_fetch_assoc($result);
            } else {
                return $result;
            }
        } else {
            return $result;
        }
        $this->message = "
        Click on the link to reset password
        http://www.yourwebsitename.com/resetPassword.php?m="
            . $this->profile['email'] . " AND t=" . time() . "v=" . md5($this->profile['name']);
        return $this->sendMail();

    }

    public function sendMail()
    {
        $mail = new PHPMailer;
        $mail->ClearAddresses();
        $mail->AddAddress($this->profile['email'], $this->profile['name']);
        $mail->From = 'admin@websitename.com';
        $mail->FromName = 'admin';
        $mail->Subject = "you have a notification";
        $mail->Body = $this->message;
        if ($mail->Send()) {
            return "Message sent.";
        } else {
            return $mail->ErrorInfo;
        }
    }

}