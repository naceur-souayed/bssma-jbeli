<?php

namespace App\models;

use DateTime;
use App\Models\Model;

class Category extends Model
{
    protected $table = 'categories';


    public function updates(int $id, array $data)
    {
        parent::update($id, $data);
        if (!empty($_POST)) {
            $data['id'] = $id;
            $category = $data['category'];
            $target_dir = "img/";
            $image = time() . $_FILES["image"]["name"];
            $target_file = $target_dir . $image;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            if (empty($_FILES)) {

                $statm = $this->db->getPDO()->prepare("UPDATE {$this->table} SET category= ?  WHERE id= ?");

                $result = $statm->execute([$category, $id]);
            }
            $statm = $this->db->getPDO()->prepare("UPDATE {$this->table} SET category= ? ,image= ? WHERE id= ?");
            $result = $statm->execute([$category, $image, $id]);

            if ($result) {
                return true;
            }
        }
    }
    public function create(array $data)
    {
        // parent::create($data);
        if (!empty($_POST)) {
            $category = $data['category'];
            $target_dir = "img/";
            $image = time() . $_FILES["image"]["name"];
            $target_file = $target_dir . $image;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $statm = $this->db->getPDO()->prepare("INSERT INTO {$this->table} (category,image) VALUES (?,?)");
            $result = $statm->execute([$category, $image]);
            if ($result) {
                return true;
            }
            // return header('Location:/biotouch/admin/categories');
        }
    }
}
