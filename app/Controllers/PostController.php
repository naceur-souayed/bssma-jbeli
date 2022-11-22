<?php
namespace App\Controllers;

use App\models\Post;
use App\models\Category;
use App\models\Quantity;


class PostController extends Controller {
    protected $getDB;
    public function __construct($db)
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
         }
        $this->getDB = $db;
    }
    public function index(){
        $post = new Post($this->getDB);
        $articles=$post->dernierProduit();
        $category = new Category($this->getDB);
        $categories=$category->all();
        return $this->view('blog.index', compact('articles', 'categories'));
    }
    public function product(){
        //   echo 'test';die;
       $post = new Post($this->getDB);
       $articles=$post->all();
       $category = new Category($this->getDB);
        $categories=$category->all();
       
        return $this->view('blog.product', compact('articles','categories'));
        //return view index qu est en dossier blog
    }
    public function detail($id){
      
        // $req=$this->db->getPDO()->query('SELECT * From produit');
        // $produits=$req->fetchAll();
        // foreach($produits as $produit){
        //     echo  $produit->nom_produit;
        // } 
        $post = new Post($this->getDB);
        $article=$post->findById($id);
        return $this->view('blog.show', compact('article'));
        //return view show avec id 

    }
    public function history(){
        return $this->view('blog.history');
    }
    public function panier(){
        return $this->view('blog.panier');
    }
    
}