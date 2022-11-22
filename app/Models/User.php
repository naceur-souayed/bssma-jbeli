<?php

namespace App\models;

use App\Models\Model;
class User extends Model{
    protected $table='users';

    private $error= "";

   
    public function registerUser(){
            $id= $this->db->getPDO()->lastInsertId();
            $statm= $this->db->getPDO()->prepare("INSERT INTO users (`id`, `name`, `email`, `password`,`phone`,`adress`) VALUES (?,?,?,?,?,?)");
            $result=$statm->execute([$id,$_POST['name'],$_POST['email'],password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['phone'],$_POST['adress']]);
 
            if($result){
                return true;
            }
     
       
    }
   
    public function checkPassword($password){
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            return false;
        }
        return true;

    }

    public function checkEmail($email)
    {
        return $this->query(" SELECT * FROM {$this->table} WHERE email=?", [$email], true);
    } 
    public function forget_pw($email){
        return $email=$_GET['email'];
    }
    public function update_pw(){
            
                $email=$_POST['email'];
                $password = $_POST["password"];
              
                $check_Password=$this->checkPassword($password);

                
                if(isset($_POST["password"]) && isset($_POST["confirm_pass1"]))
                {
                    if($check_Password == false) {
                        $error =  "Le mot de passe doit être de 8 caractères minimum et contenir au moins 1 chiffre";
                        include VIEWS.'auth/forgetpw.php';
                        $content=ob_get_clean();
                        require VIEWS .'layout.php';
                    }
                    $confirm_pass1=$_POST["confirm_pass1"];
                    if($password === $confirm_pass1){
                        $pass=password_hash($password, PASSWORD_DEFAULT); 
                    
                        
                        if(!empty($_POST)){
                            $statm= $this->db->getPDO()->prepare("UPDATE users SET `password`=? WHERE `email`=?");
                            return $statm->execute([$pass,$email]);
                        }
                     }
                     else{
                        $error = "Vous n'avez pas tapé deux fois le même mot de passe ";
                        include VIEWS.'auth/forgetpw.php';
                        $content=ob_get_clean();
                        require VIEWS .'layout.php';
                    }
                }
        
    }  

}