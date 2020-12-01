<br><br><h1><b>simple/Mailer.php</b></h1><br><br>

<?php

interface Google
{
    public function setHost($host);
    public function setUser($user);
    public function setPassword($password); 
}

class Mailer 
{

    private $mailer;
    private $mail;

    function setMailer ( Google $mailer ) 
    {
        $this->mailer = $mailer;
    }

    public function compose($to, $from, $body, $subject)
    {
        $this->mail = [
            'to' => $to,
            'from' => $from,
            'body' => $body,
            'subject' => $subject
        ];
    }

    public function send() 
    {
        if (!empty($this->mail)) {
            return sprintf('Mail was sent to %s from %s with subject %s and message %s', $this->mail['to'], $this->mail['from'], $this->mail['body'], $this->mail['subject']);
        } else {
            throw new Exception('Mail was not composed');
        }
    }

}


class GoogleMailer implements Google 
{

    private $settings = [];

    public function __construct($settings = null) 
    {
        if ($settings) {
            $this->settings['host'] = $settings['host'];
            $this->settings['user'] = $settings['user'];
            $this->settings['password'] = $settings['password'];
        }
    }

    public function setHost($host)
    {
        $this->settings['host'] = $host;
    }

    public function setUser($user) 
    {
        $this->settings['user'] = $user;
    }

    public function setPassword($password)
    {
        $this->settings['password'] = $password;
    }
    
}


$googleMailer = new GoogleMailer(['host' => 'smtp.google.com', 'user' => 'test', 'password' => 'testpass']);
$mailer = new Mailer();
$mailer->setMailer($googleMailer);
$mailer->compose('test@mail.com', 'student@mail.com', 'Welcome', 'Welcome message');
echo $mailer->send();



