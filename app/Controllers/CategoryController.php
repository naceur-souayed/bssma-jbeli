<?php
namespace App\Controllers;

use App\models\Post;
use App\models\Category;


class CategoryController extends Controller {
    protected $getDB;
    public function __construct($db)
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
         }
        $this->getDB = $db;
    }
    public function index(){
        $category = new Post($this->getDB);
        $categories=$category->all();
        return $this->view('blog.welcome', compact('categories'));
    }
  
}