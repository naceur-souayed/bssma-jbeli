<?php
namespace App\Controllers;

use App\models\User;


class UserController extends Controller
{
    private $error= "";
    
    public function register(){
        return $this->view('auth.register');
        session_start();
    }
    
   
   
    public function registerPost(){

        if((isset($_POST["register"])) && (!empty($_POST)))
        {

            $user = (new User($this->getDB()));
            // var_dump($user->checkPassword($_POST["password"]));die;

            // $error= "";
            $nom = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $phone = $_POST["phone"];
            $adress = $_POST["adress"];
           
           
            $verifyemail=$user->checkEmail($email);

            $check_Password=$user->checkPassword($password);


            if (empty($nom&&$email&&$password&&$phone&&$adress)){
                $error = 'tout champs sont obligatoire';
                include VIEWS.'auth/register.php';
                $content=ob_get_clean();
                require VIEWS .'layout.php';
            }
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $error = 'Ce email est invalid';
                include VIEWS.'auth/register.php';
                $content=ob_get_clean();
                require VIEWS .'layout.php';
            }
            else if($verifyemail!==false)
            {
                $error = 'Cet email est deja exist!';
                include VIEWS.'auth/register.php';
                $content=ob_get_clean();
                require VIEWS .'layout.php';
            }
            else if($check_Password == false) {
                $error =  "Le mot de passe doit être de 8 caractères minimum et contenir au moins 1 chiffre";
                include VIEWS.'auth/register.php';
                $content=ob_get_clean();
                require VIEWS .'layout.php';
            }
          
            else if(empty($error))
            {
                $result=$user->registerUser();
                if($result){
                    return header('Location:/biotouch/login');
                }
            
                
            }
        }
        else{
            return header('Location:/biotouch/register');
        }
       
        
    }
    public function login(){
        return $this->view('auth.login');
    }
    public function loginPost()
    {
        
        $user= (new User($this->getDB()));
       // var_dump($user->password);die;
        $user->checkEmail($_POST['email']);
        $password=$_POST['password'];
       $check_Password=true;//$user->checkPassword($password);

        

        
        if(true/*password_verify($_POST['password'], $user->password)*/){

            if($check_Password == false) {
                $error =  "Le mot de passe est incorrecte";                include VIEWS.'auth/login.php';
                $content=ob_get_clean();
                require VIEWS .'layout.php';
            }
            else{
                $_SESSION['user_id']=$user->id; 
                $_SESSION['auth']=(int) $user->admin;
                if($_SESSION['auth']===1){
    
                    return header('Location:/biotouch/admin/posts?success=true');
                }
                else if($_SESSION['auth']===0){
                    return header('Location:/biotouch/');
    
                }
            }
           
        }
        else{
            $error = "L'email ou le mot de passe est incorrecte";
            include VIEWS.'auth/login.php';
            $content=ob_get_clean();
            require VIEWS .'layout.php';
        }
        
       
    }
   
    public function forgetpw(){
        return $this->view('auth.forgetpw');
    } 
    public function updatepw(){
        if(isset($_POST["submit"]))
        {
            $user = (new User($this->getDB()));
            $email = $_POST["email"];

            $verifyemail=$user->checkEmail($email);

            if($verifyemail!==false)
            {

                if(isset($_POST['email']) ){
                    
                    $result=$user->update_pw();
                    if($result){
                        return header('Location:/biotouch/login');
                    }
        
                }
        
                else{
                    exit("Page introuvable");
        
                }
            }
            else{
                $error = "Cet email n'exist pas!";
                include VIEWS.'auth/login.php';
                $content=ob_get_clean();
                require VIEWS .'layout.php';
            }
        }
    
    }
    public function logout(){
        session_destroy();
        return header('Location:/biotouch/login');

    }
    
    
}