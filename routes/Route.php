<?php
namespace Router;

use Database\DBConnection;

class Route{
    public $path;
    public $action;
    public $matches;
    public function __construct($path, $action)
    {
        // stocker path qui j'ai' envoyé
            $this->path=trim($path,'/');
        // stocker action qui j'ai' envoyé
        $this->action=$action;
    }
    public function matches(string $url){
        $path =preg_replace('#:([\w]+)#','([^/]+)',$this->path);
       
        $pathToMatch ="#^$path$#";
   


        
        if(preg_match($pathToMatch, $url, $matches)){
            $this->matches=$matches;
            return true;
        }
        else{
            return false;
        }
        
    }
    public function execute(){
     $params=explode('@',$this->action);
     $controller= new $params[0](new DBConnection('127.0.0.1','biotouch', 'root', ''));
     $method= $params[1];
     return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method(); 
 
    }
}