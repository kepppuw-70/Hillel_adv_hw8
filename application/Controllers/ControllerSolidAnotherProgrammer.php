<?php

namespace Application\Controllers;
use Application\Core\View;

class ControllerSolidAnotherProgrammer
{   
	 
    public function solidanotherprogrammerAction()
    { 
      $view = new View();
      View::pageCode('../solid/AnotherProgrammer.php', $arrrez);
    }

}
