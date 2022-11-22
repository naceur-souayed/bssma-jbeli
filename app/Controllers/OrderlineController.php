<?php
namespace App\Controllers;

use App\models\Post;
use App\models\Order;
use App\models\Category;
use App\models\Orderline;


class OrderlineController extends Controller {
    protected $getDB;
    public function __construct($db)
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
         }
        $this->getDB = $db;
    }
    public function order(){
        $order = new Order($this->getDB);
        $order->create_order();
        $orderline = new Orderline($this->getDB);
        $orderline->create_orderline();
       

    }
    public function checkout(){
        $commande = new Orderline($this->getDB);
        $commandes=$commande->getTages($_POST);
        // var_dump($commandes);die;

        // foreach($commandes as $s){
        //     var_dump($s);die;

        // }
        // var_dump(array_sum($commandes[0]));die;
         return $this->view('blog.checkout', compact('commandes'));

    }
   
   
   
  
}