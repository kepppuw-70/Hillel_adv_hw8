<?php

namespace Application\Controllers;
use Application\Core\View;

class ControllerSimpleConfigurator
{   
	 
    public function simpleconfiguratorAction()
    { 
      $view = new View();
      View::pageCode('../simple/Configurator.php', $arrrez);
    }

}
