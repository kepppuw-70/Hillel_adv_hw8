<?php

namespace Application\Core;

class Router
{
  
  public function __construct()
    {
       $arr = require '../application/Config/Routes.php';
       $this->arr = $arr;
    /*
      $this->arr = [
        
                  '' => 'ControllerMain@mainAction',
                  'test' => 'ControllerTest@testAction',
              
             ];
    */
    }

    public function match()
    {
      
      $url = trim($_SERVER['REQUEST_URI'], '/');
      $this->url = $url;
      $arr_keys = array_keys($this->arr); 
      $i = 0;
      foreach ($this->arr as $key => $params) {
              if ($arr_keys[$i] == $url) {

       	        $ca = explode('@', $params);
                 $this->controllerName = $ca[0];
                 $this->action = $ca[1];
                 
                 return true;
               }
               $i++;	
      }
       return false;
    }

    public function run()
    {
    	
      if ($this->match()) {

      	$path = 'Application\Controllers\\' . $this->controllerName;
    	   	   if (class_exists($path)) {

             $action = $this->action;
             
             if (method_exists($path, $action)) { 
                
                $controller = new $path();
                $controller->$action();

             } else {
             	
             	$path = 'Application\Controllers\ControllerEror404';
    	         $action = 'eror404Action';
      	      $controller = new $path();
               $controller->$action();

             }
         } else {

         	$path = 'Application\Controllers\ControllerEror404';
    	      $action = 'eror404Action';
      	   $controller = new $path();
            $controller->$action();

         }
      } else {

      	$path = 'Application\Controllers\ControllerEror404';
    	   $action = 'eror404Action';
      	$controller = new $path();
         $controller->$action();

      }

    }

}



?>
