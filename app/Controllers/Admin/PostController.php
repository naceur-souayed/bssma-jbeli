<?php
namespace App\Controllers\Admin;

use App\models\Post;
use App\Controllers\Controller;
use App\models\Category;

class PostController extends Controller{
    protected $getDB;
    public function __construct($db)
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
         }
        $this->getDB = $db;
    }
    public function index(){
        $this->isAdmin();
           $posts = (new Post($this->getDB))->all(); 
            return $this->view('admin.post.index', compact('posts'));
           
    }
    public function edit(int $id){
        $this->isAdmin();
        $post = (new Post($this->getDB))->findById($id); 
        $categories=(new Category($this->getDB))->all();
            return $this->view('admin.post.edit', compact('post','categories'));
    }
    public function create(){
        $this->isAdmin();
        $categories=(new Category($this->getDB))->all();
        return $this->view('admin.post.create', compact('categories'));
    }
    public function createPost(){
        $this->isAdmin();
        $post = (new Post($this->getDB));
        $category=array_pop($_POST);
        $result=$post->create_P($_POST,$category);
        if($result){
            return header('Location:/biotouch/admin/posts');
        }
    }
    public function update(int $id){
        $this->isAdmin();
        $post = (new Post($this->getDB));
        $category=array_pop($_POST);
        $result=$post->update($id, $_POST, $category);
        if($result){
            return header('Location:/biotouch/admin/posts');
        }
    }
    public function destroy(int $id){
        $this->isAdmin();
        $posts = new Post($this->getDB);
        $result =$posts->destroy($id);
        if($result){
            return header('Location:/biotouch/admin/posts');
        }
    }
}