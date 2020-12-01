<?php

namespace Application\Controllers;
use Application\Core\View;

class ControllerSolidReport
{   
	 
    public function solidreportAction()
    { 
      $view = new View();
      View::pageCode('../solid/Report.php', $arrrez);
    }

}
