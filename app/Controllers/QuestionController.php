<?php

namespace App\Controllers;

use App\models\Post;
use App\models\Reponse;
use App\models\Question;


class QuestionController extends Controller
{
    protected $getDB;
    public function __construct($db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->getDB = $db;
    }
    public function getQuestions($id_post)
    {
        $question = new Question($this->getDB);
        $questions = $question->get_questions($id_post);

        $post = new Post($this->getDB);
        $article = $post->findById($id_post);

        return $this->view('blog.question', compact('questions', 'article'));
    }
    public function getSingleQuestion($id_question)
    {
        $reponse = new Reponse($this->getDB);
        $reponses = $reponse->reponse($id_question, $_POST);
        $question = (new Question($this->getDB));
        $questions = $question->reponse_question($id_question);

        $users = $reponse->user_reponse($_POST);

        if ($questions) {

            return $this->view('blog.reponse', compact('questions', 'reponses', 'users'));
        }
    }
    public function create_question(int $id_question)
    {
        $post = new Post($this->getDB);
        $article = $post->findById($id_question);

        return $this->view('blog.create_question', compact('article'));
    }

    public function sendQuestions($id)
    {
        $question = (new Question($this->getDB));
        // $post = array_pop($_POST);
        $result = $question->create_q();

        // $post = new Post($this->getDB);
        // $article = $post->findById($id);
        // $id_article = intval($article->id);
        $questions = $question->get_questions($id);
        $post = new Post($this->getDB);
        $article = $post->findById($id);
        if ($result) {
            return $this->view('blog.question', compact('questions', 'article'));
            // return header('Location:/biotouch/question/' . $id_article);
        } else {
            return header('Location:/biotouch/login');
        }
    }
}
