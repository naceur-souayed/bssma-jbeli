<?php
namespace App\models;
use DateTime;
use App\Models\Model;

class Orderline extends Model{
    protected $table='orderlines';


     public function create_orderline()
     {
        $total=0;

        $orderId= $this->db->getPDO()->lastInsertId();
        $statm= $this->db->getPDO()->prepare("INSERT INTO {$this->table} (`order_id`, `post_id`,`quantity`,`reduction`,`price`) VALUES (?,?,?,?,?)");
        foreach($_POST['carts'] as $value){
            $statm->execute([$orderId,$value['id'],$value['quantity'],$value['nom'],$value['prix']]);
            $total+=$value['quantity']*$value['prix'];
        };
        
        $statm= $this->db->getPDO()->prepare(' 
        UPDATE `orders` SET `total`=? WHERE `orders`.id=?');
        $statm->execute([$total,$orderId]);
     }
     public function getTages($user)
    {
        // $result=$this->query("SELECT * FROM orders ORDER BY id DESC LIMIT 1");
        // // var_dump($result[0]->id);die;
        // $order_id=$result[0]->id;
        
        $user=$_SESSION['user_id'];

        
        return $this->query("SELECT `title`,`quantity`,(`posts`.`price`) as price, (SUM(orders.`total`))as total , user_id FROM {$this->table}  
        INNER JOIN `posts` ON `posts`.`id`=`orderlines`.`post_id` 
        INNER JOIN `orders` on `orders`.`id`=`orderlines`.`order_id` WHERE user_id =? AND orders.`created_at`=CAST(NOW() AS DATE) ORDER BY orders.id " , [$user]);
    }
  
}