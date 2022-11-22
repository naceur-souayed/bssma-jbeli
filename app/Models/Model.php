<?php
namespace App\Models;

use PDO;
use Database\DBConnection;

abstract class Model{
    protected $db;
    protected $table;
    // stocker la connection avec la base de donnee
    public function __construct(DBConnection $db)
    {
        $this->db=$db;
    }
    public function all():array
    {
        return $this->query(" SELECT * FROM {$this->table} ORDER BY created_at DESC ");
        // $statm= 
        // $statm->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        // return $statm->fetchAll();
    }
    public function findById(int $id) :Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id= ?", [$id], true);
        // $statm=$this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id= ? "); 
        // $statm->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        // $statm->execute([$id]);
        //  return $statm->fetch();
    }
    public function destroy(int $id) : bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id= ?", [$id]);
    }

    public function create_P(array $data, array $relations){
        $firstinfo=" ";
        $secondinfo=" ";
        $i=1;
        foreach($data as $key=>$value)
        {
            $comma = $i === count($data) ? "" :', ';
            $firstinfo .= "{$key}{$comma}";
            $secondinfo .= ":{$key}{$comma}";
            $i++;
        }
        
    }
//    public function Idquestion($Idquestion){
//     $Idquestion=$_GET['question_id'];
    
//    }
    public function create(array $data){
        $firstinfo=" ";
        $secondinfo=" ";
        $i=1;
        foreach($data as $key=>$value)
        {
            $comma = $i === count($data) ? "" :', ';
            $firstinfo .= "{$key}{$comma}";
            $secondinfo .= ":{$key}{$comma}";
            $i++;
        }
     
        $this->query("INSERT INTO {$this->table} ($firstinfo) VALUES ($secondinfo)", $data);
        // var_dump($data);die;
        // return $this->query(" INSERT INTO {$this->table} (`id`, `title`, `content`, `Id_category`) VALUES (?,?,?,?)",$data);
    }
    public function update(int $id, array $data , ?array $relations=null)
    {
        $sqlRequest=" ";
        $i=1;
       
            foreach($data as $key=>$value){
                $comma = $i === count($data) ? "" :', ' ;
                $sqlRequest .= "{$key}= :{$key}{$comma}";
                $i++;
            }
       
        $data['id']=$id;
        
        return $this->query("UPDATE {$this->table} SET {$sqlRequest} WHERE id= :id", $data);
        

      
    }  
   

    public function query(string $sql, array $param= null, bool $single= null){
        $method= is_null($param) ? 'query' : 'prepare';
        if(
            strpos($sql, 'DELETE')===0
             || strpos($sql, 'INSERT')===0
              || strpos($sql, 'UPDATE')===0
            )
            {
                $statm= $this->db->getPDO()->$method($sql);
                $statm->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
                return $statm->execute($param);
            }
        $fetch= is_null($single) ? 'fetchAll' : 'fetch';
        $statm= $this->db->getPDO()->$method($sql);
        $statm->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        if($method ==='query'){
            return $statm->$fetch();
        }
        else{
            $statm->execute($param);
            return $statm->$fetch();
        }
    }
    

   

    

}   