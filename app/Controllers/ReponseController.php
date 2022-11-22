<?php

namespace App\Controllers;

use App\models\Question;
use App\models\Reponse;


class ReponseController extends Controller
{
    protected $getDB;
    public function __construct($db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->getDB = $db;
    }
    // public function getReponse(){
    //     $reponse = new Reponse($this->getDB);
    //     $reponses=$reponse->all();
    //     return $this->view('blog.reponse', compact('reponses'));
    // }
    public function reponse($id_question)
    {
        // $this->isAdmin();
        $question = (new Question($this->getDB));
        $questions = $question->reponse_question($id_question);
        $reponse = (new Reponse($this->getDB));
        $Idquestion = $_POST['question_id'];
        $result = $reponse->create_R($_POST, $_POST);
        $reponses = $reponse->reponse($id_question, $_POST);
        $user = $_SESSION['user_id'];
        $users = $reponse->user_reponse($user);

        if ($result) {
            return $this->view('blog.reponse', compact('questions', 'reponses', 'users'));

            // return header('Location:/biotouch/question/' . $Idquestion);
        }
    }
}
