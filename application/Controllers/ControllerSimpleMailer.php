<?php

namespace Application\Controllers;
use Application\Core\View;

class ControllerSimpleMailer
{   
	 
    public function simplemailerAction()
    { 
      $view = new View();
      View::pageCode('../simple/Mailer.php', $arrrez);
    }

}
