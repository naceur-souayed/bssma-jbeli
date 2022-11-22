<?php

namespace App\Controllers;

use Database\DBConnection;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

// class controller c'est une class qui sera directement instancier ....
abstract class Controller
{
   protected $db;
   // la connection stocker dans la variable db
   public function __construct(DBConnection $db)
   {
      if(session_status() === PHP_SESSION_NONE){
         session_start();
      }
      $this->db=$db;
   }
// view n'utilise que dans les enfants de controller
   protected function view(string $path, array $params = null)
   {
      //ecrire la logique pour afficher content en layout
      // premier etape demmarer le systeme par  ob_start() pour lorsque en fait require il fait recuperer les variable 
      ob_start();
      $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
      //DIRECTORY_SEPARATOR Ca permet tout simplement de pouvoir passer d'une plateforme à une autre facilement.
      //Si par exemple tu développes sous Windows mais que tu déploies sur Unix, tu n'as rien à changer : tes chemins s'adaptent.
      require VIEWS . $path . ".php";
      //require inclut le contenu d'un autre fichier appelé, et provoque une erreur bloquante s'il est indisponible
      // if ($params) {
      //    $params = extract($params);
         // extract() vérifie chaque clé afin de contrôler si elle a un nom de variable valide. Elle vérifie également les collisions avec des variables existantes dans la table des symboles
      // }
      $content=ob_get_clean();
      //stocker vue quelque part
      //ob_get_clean Lit le contenu courant du tampon de sortie puis l'efface
      require VIEWS."layout.php";


   }
  
   
    

   // getDBfunction qui nous permettre de recuperer la connection a la base de donnee . protected pour utilise juste dans les enfants de controller
   protected function getDB(){
      return $this->db;
   }
   protected function isAdmin(){
      if(isset($_SESSION['auth']) && $_SESSION['auth']===1){
         return true;
      }
      
      else{
         return header('Location : biotouch/login');
      }
   }
}
