<?php

namespace AppBundle\Lib;

/**
    * File name   : Mailer.php
    * Created by  : Sreejith (sreejith@vinamsolutions.com)
    * Created on  : 26-07-2018
    * Description : It is class for sending mail.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Mailer
{
    private $mail;



    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }



    public function sendMail($mailAddress, $subject, $body, $altBody)
    {
        try {
            // Server settings
            $this->mail->SMTPDebug = 2;
            $this->mail->isSMTP();
            $this->mail->SMTPAuth = true;
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->Port = 587;
            $this->mail->Username = 'vinsreejith@gmail.com';
            $this->mail->Password = 'Admin@123';

            // Recipients
            $this->mail->setFrom('vinsreejith@gmail.com', 'sreejith vin');
            $this->mail->addReplyTo('vinsreejith@gmail.com', 'sreejith vin');
            $this->mail->addAddress($mailAddress);

            // Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->AltBody = $altBody;

            $this->mail->send();
        }
        catch(Exception $ex) {
            //echo $ex->getMessage();
            echo "Mailer Error: " . $this->mail->ErrorInfo;
        }
    }
}
?>
