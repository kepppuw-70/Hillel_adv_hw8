<?php

namespace Application\Controllers;
use Application\Core\View;

class ControllerMain
{
    public function mainAction()
    { 
      $view = new View(); 
      View::pageCode('../application/Views/main/index.php', $arrrez);
    }

}
