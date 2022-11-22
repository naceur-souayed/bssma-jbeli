<?php

namespace Database;

use PDO;

class DBConnection
{   
    private $dbname;
    private $host;
    private $username;
    private $password;
    private $pdo;

    public function __construct( $host , $dbname, $username, $password)
    {
       
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }
  
    public function getPDO():PDO
    {
        if($this->pdo ===null){
            //   var_dump($this->host);die;
          return $this->pdo= new PDO(
                'mysql:host='.$this->host.';dbname='.$this->dbname, 
                $this->username,
                $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET ChARACTER SET UTF8"]);
        }
         else{
                

            return  $this->pdo;

        }

            
    }
}
