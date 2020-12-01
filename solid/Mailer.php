<?php

echo '<h1>Hint - Dependency Inversion Principle</h1>';

interface Metod
{
    public function setConnection($settings);
}

class Mailer implements Metod 

{
    public function setConnection($settings)
    {
        $this->settings = $settings;
    }
}
class SendWelcomeMessage
{
    private $mailer;
    public function __construct(Metod $mailer)
    {
        $this->mailer = $mailer;
    }
}

$mailer =new Mailer();
$mailer->setConnection(['mailer_options' => 'qqq@q.qq']);
var_dump(new SendWelcomeMessage($mailer));
