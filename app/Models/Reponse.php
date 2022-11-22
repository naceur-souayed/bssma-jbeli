<?php

namespace App\models;

use DateTime;
use App\Models\Model;

class Reponse extends Model
{
    protected $table = 'reponses';


    public function reponse($id, $question_id): array
    {
        $result = $this->query("SELECT * FROM questions  WHERE id=?", [$id], true);
        $question_id = $result->id;
        return $this->query("SELECT * FROM reponses INNER JOIN questions ON reponses.question_id=questions.id   WHERE question_id=?", [$question_id]);
    }
    public function user_reponse($user)
    {
        $user = $_SESSION['user_id'];
        return $this->query("SELECT * FROM reponses INNER JOIN users ON users.id=reponses.user_id WHERE users.id=?", [$user], true);
    }
    public function create_R($Idquestion, array $data)
    {

        if (!empty($_POST) && isset($_POST)) {
            $comment = $_POST['comment'];
            $user_id = $_SESSION['user_id'];
            $id = $this->db->getPDO()->lastInsertId();
            $Idquestion = $_POST['question_id'];
            $statm = $this->db->getPDO()->prepare("INSERT INTO {$this->table} (reponse, question_id, user_id) VALUES (?, ?, ?) ");
            $result = $statm->execute([$comment, $Idquestion, $user_id]);


            if ($result) {
                return true;
            }
        }
    }
}
