<?php

namespace App\models;

use DateTime;
use App\Models\Model;

class Question extends Model
{
    protected $table = 'questions';

    // public function getExcerpt()
    // {
    //     return substr($this->description, 0, 100) . '...';
    // }

    public function get_questions($id_post)
    {

        return $this->query("SELECT * FROM {$this->table} WHERE id_post= ?", [$id_post]);
    }
    public function reponse($id)
    {
        return $this->query("SELECT `reponse` FROM questions INNER JOIN reponses ON questions.`id`= reponses.question_id WHERE questions.id= ?", [$id], true);
    }
    public function reponse_question($id_question)
    {
        return $this->query("SELECT `id`,`description` FROM questions  WHERE questions.id= ? ", [$id_question], true);
    }


    public function create_q()
    {
        // $k = $this->query("SELECT `id` FROM posts  WHERE posts.id= ?", [$this->id], true);

        if (!empty($_POST)) {
            $description = $_POST['description'];
            $Id_post = $_POST['id'];

            $user_id = $_SESSION['user_id'];
            $id = $this->db->getPDO()->lastInsertId();

            // $id= $this->db->getPDO()->lastInsertId();
            $statm = $this->db->getPDO()->prepare("INSERT INTO {$this->table} (description, id_post,  user_id) VALUES (?,?,?)");
            $result = $statm->execute([$description, $Id_post, $user_id]);

            if ($result) {
                return true;
            }
        } else {
            return header('Location:/biotouch/login');
        }
    }
}
