<?php
namespace App\models;

use DateTime;

class Post extends Model{
    
    protected $table='posts';


    public function getCreatedAt() : string
    {
        return (new DateTime($this->created_at))->format('d/m/y à h:i');
        
    }
    public function getExcerpt(){
        return substr($this->content,0,200) . '...';
    }
    
    public function getTages()
    {
        return $this->query("SELECT * FROM posts INNER JOIN categories ON posts.`Id_category`= categories.id WHERE posts.`id`= ?", [$this->id]);
    }
    public function dernierProduit(){
        return $this->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 3");
    }
    public function create_P(array $data,array $relations){
        
        parent::create_P($data, $relations);
        if(!empty($_POST)){
            $reference=$data['reference'];
            $title=$data['title'];
            $content=$data['content'];
            $target_dir = "img/";
            $image = time().$_FILES["image"]["name"];
            $target_file = $target_dir . $image;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $price=$data['price'];
            // $id= $this->db->getPDO()->lastInsertId();
            foreach($relations as $Idcategory)
            {
                $statm= $this->db->getPDO()->prepare("INSERT INTO {$this->table} (reference, title, content, image, price, Id_category) VALUES (?,?,?,?,?,?)");
                $result= $statm->execute([$reference,$title,$content,$image,$price,$Idcategory]);
            };
        
            if($result){
                return true;
            }
        }
    }

    // relation avec category
    // ?array $relations :mise a jour de la table categories
    public function update(int $id, array $data , ?array $relations=null)
    {
        parent::update($id,$data);

        if(!empty($_POST)){
            $data['id']=$id;
            $reference=$data['reference'];
            $title=$data['title'];
            $content=$data['content'];
            $target_dir = "img/";
            $image = time().$_FILES["image"]["name"];
            $target_file = $target_dir . $image;
            move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
            $price=$data['price'];
            if(empty($_FILES)){
                foreach($relations as $Idcategory)
                {
                    $statm=$this->db->getPDO()->prepare("UPDATE {$this->table} SET reference= ?, title= ?, content= ?, price= ?, Id_category= ? WHERE id= ?");
    
                    $result= $statm->execute([$reference,$title,$content,$price,$Idcategory,$id]);
                    
                }
            }
            
            foreach($relations as $Idcategory)
            {
                $statm=$this->db->getPDO()->prepare("UPDATE {$this->table} SET reference= ?, title= ?, content= ?, image= ?, price= ?, Id_category= ? WHERE id= ?");
                // var_dump($Idcategory);die;

                $result= $statm->execute([$reference,$title,$content,$image,$price,$Idcategory,$id]);
                
            }
            if($result){
                return true;
            }
        }
       
     
            
    }  

   

}