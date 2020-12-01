<?php

namespace Application\Controllers;
use Application\Core\View;

class ControllerSolidProgrammer
{   
	 
    public function solidprogrammerAction()
    { 
      $view = new View();
      View::pageCode('../solid/Programmer.php', $arrrez);
    }

}
