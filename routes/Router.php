<?php

namespace Router;

use App\Exceptions\NotFoundException;

 class Router {
     public $url;
     public $routes = [];

     public function __construct($url)
     {
         $this->url = trim($url,'/');
   

     }
    // function method get
    public function get(string $path, string $action){
        // un tableau en la quel en push ma route qui est un instance de la class route qui aura en parametre le path et l'action
        $this->routes['GET'][]= new Route($path,$action);
       
       
    }
    // function method post
    public function post($path, $action){
        // un tableau en la quel en push ma route qui est instance de la class route qui aura en parametre le path et l'action
        $this->routes['POST'][]= new Route($path,$action);
    }
    // function run() pour verifier les different routes (boucler sur nos routes)
    public function run(){
        // $_SERVER["REQUEST_METHOD"] C A D si la route get on cherche ds methode get si post on cherche sur la route post
        foreach ($this->routes[$_SERVER["REQUEST_METHOD"]] as $route)
        {
            
            // foreach($route[$_SERVER["REQUEST_METHOD"]] as $r){
            // function matches
                if($route->matches($this->url)){
                    return $route->execute();
                }
            // }
            // return $route->execute();


            
        } 
        
                // return header('HTTP/1.0 404 Not Found');
                throw new NotFoundException();
            
    }
 }