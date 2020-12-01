<?php

echo '<h1><b>Configurator.php</b></h1>';

trait ConnectionTrait
{
    public function setConnection($settings)
    {
        $this->settings = $settings;
    }
}

abstract class Configurator
{
    protected $settings;

    abstract protected function setConnection($settings);
    abstract protected function configure();
}

class MailConfigurator extends Configurator
{
    
    use ConnectionTrait;

    private $configuration;

    public function getSender()
    {
        return 'mail sender';
    }

    public function configure()
    {
        $this->configuration = $this->settings['mailer_options'];
        return $this;
    }
}

class DatabaseConfigurator extends Configurator
{
    
    use ConnectionTrait;
    
    private $configuration;

    public function getDriver()
    {
        return 'get some db driver';
    }

    public function configure()
    {
        $this->configuration['dsn'] = $this->settings['dsn'];
        $this->configuration['user'] = $this->settings['user'];
        $this->configuration['password'] = $this->settings['password'];
        return $this;
    }
}

class CacheConfigurator extends Configurator
{
    
    use ConnectionTrait;

    private $configuration;

    public function getStorage()
    {
        return 'get some cache storage';
    }

    public function configure()
    {
        $this->configuration['host'] = $this->settings['host'];
        $this->configuration['port'] = $this->settings['poer'];
        $this->configuration['user'] = $this->settings['user'];
        $this->configuration['password'] = $this->settings['password'];
        return $this;
    }
}

$mailconfigurator =new MailConfigurator();
$mailconfigurator->setConnection(['mailer_options' => 'qqq@q.qq']);
$mailconfigurator->configure();
var_dump($mailconfigurator);
echo '<br><br>';

$databaseconfigurator =new DatabaseConfigurator();
$mailconfigurator->setConnection(['dsn' => 'mysql:host=localhost;dbname=example', 'user' => 'test', 'password' => 'testpass']);
$mailconfigurator->configure();
var_dump($mailconfigurator);
echo '<br><br>';

$cacheconfigurator =new CacheConfigurator();
$cacheconfigurator->setConnection(['host' => 'http://localhost', 'poer' => 'qqqqqqq', 'user' => 'test', 'password' => 'testpass']);
$cacheconfigurator->configure();
var_dump($cacheconfigurator);
echo '<br><br>';
