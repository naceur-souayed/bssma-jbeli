<?php

namespace App\Controllers\Admin;

use App\models\Category;
use App\Controllers\Controller;


class CategoryController extends Controller
{
    protected $getDB;
    public function __construct($db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->getDB = $db;
    }
    public function index()
    {
        $this->isAdmin();
        $categories = (new Category($this->getDB))->all();
        return $this->view('admin.category.index', compact('categories'));
    }
    public function edit(int $id)
    {
        $this->isAdmin();
        $categories = (new Category($this->getDB))->findById($id);
        return $this->view('admin.category.edit', compact('categories'));
    }
    public function update(int $id)
    {
        $this->isAdmin();
        $categories = (new Category($this->getDB));
        $result = $categories->updates($id, $_POST);

        return header('Location:/biotouch/admin/categories');
    }
    public function create()
    {
        $this->isAdmin();

        return $this->view('admin.category.create');
    }
    public function createCategory()
    {
        $this->isAdmin();
        $category = (new Category($this->getDB));
        $result = $category->create($_POST);
        if ($result) {
            return header('Location:/biotouch/admin/categories');
        }
    }


    public function destroy(int $id)
    {
        $this->isAdmin();
        $categories = new Category($this->getDB);
        $result = $categories->destroy($id);
        if ($result) {
            return header('Location:/biotouch/admin/categories');
        }
    }
}
