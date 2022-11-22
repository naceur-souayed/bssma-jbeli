<?php
namespace App\models;
use DateTime;
use App\Models\Model;

class Order extends Model{
    protected $table='orders';

    public function create_order()
    {
        $statm= $this->db->getPDO()->prepare("INSERT INTO {$this->table}  (user_id, total, created_at) VALUES (?,NULL,now())");
        $statm->execute([$_SESSION['user_id']]);
        

    
    }
}