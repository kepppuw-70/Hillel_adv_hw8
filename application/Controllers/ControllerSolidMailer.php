<?php

namespace Application\Controllers;
use Application\Core\View;

class ControllerSolidMailer
{   
	 
    public function solidmailerAction()
    { 
      $view = new View();
      View::pageCode('../solid/Mailer.php', $arrrez);
    }

}
