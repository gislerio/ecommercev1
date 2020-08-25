<?php

namespace App\Config;

use PHPMailer;
use Rain\Tpl;

class Mailer {

    private $mail;
    
    public function __construct($toAddress, $toName, $subject, $tplName, $data = array())
    {
        $config = array(
            "tpl_dir" => $_SERVER["DOCUMENT_ROOT"] . "/../App/Views/email/",
            "cache_dir" => $_SERVER["DOCUMENT_ROOT"] . "/../App/Views-cache/",
            "debug" => false
        );
        Tpl::configure($config);

        $tpl = new Tpl;

        foreach ($data as $key => $value) {
            $tpl->assign($key, $value);
        }

        $html = $tpl->draw($tplName, true);

        $this->mail = new PHPMailer();
        $this->mail->isSMTP();

        $this->mail->isHTML();
        $this->mail->setLanguage("br");

        $this->mail->SMTPDebug = 0;
        $this->mail->Debugoutput = 'html';
        $this->mail->Host = MAIL_ENV['host'];
        $this->mail->Port = MAIL_ENV['port'];
        $this->mail->SMTPSecure = 'tls';

        $this->mail->CharSet = "utf-8";

        $this->mail->SMTPAuth = true;
        $this->mail->Username = MAIL_ENV['userName'];
        $this->mail->Password = MAIL_ENV['password'];
        $this->mail->setFrom(MAIL_ENV['userName'], MAIL_ENV['setFrom']);
        $this->mail->addAddress($toAddress, $toName);
        $this->mail->Subject = $subject;
        $this->mail->msgHTML($html);
        $this->mail->AltBody = 'This is a plain-text message body';

        /* if (!$this->mail->send()) {
            echo "Mailer Error: " . $this->mail->ErrorInfo;
        } else {
            echo "Message sent!";
        } */

    }

    public function send()
    {
        return $this->mail->send();
    }
}