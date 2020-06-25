<?php


namespace App\Controllers;

use App\Constant\GenericConstant;
use App\Model\UserManager;
use App\Model\PostManager;

class loginController implements GenericConstant
{
    private $userManager;
    private $postManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->postManager = new PostManager();
    }

    public function login()
    {
        require_once getcwd().GenericConstant::LOGIN_VIEW;
    }

    public function logout() {
        session_destroy();
        header(GenericConstant::REDIRECT_TO_INDEX);
    }
    public function addUser($email, $name, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $newUser  = $this->userManager->addUser($email, $name, $hash);
        if (!isset($newUser)) {
            header(GenericConstant::REDIRECT_TO_INDEX.GenericConstant::SIGNUP_ERROR);
        }
        else {
            header(GenericConstant::REDIRECT_TO_INDEX.GenericConstant::SIGNUP_SUCCESS);
        }
    }

    public function getUser($email, $password)
    {
       $user = $this->userManager->loginUser($email);
       if(isset($user)) {
           if(password_verify($password, $user["password"])){
               session_start();
               session_unset();
               $_SESSION["id"]  = $user["id"];
               $_SESSION["email"]  = $user["user_email"];
               $_SESSION["name"]  = $user["name"];
               $_SESSION["admin"]  = $user["admin"];
           } else {
               echo 'mot de passe incorrect';
           }
           header(GenericConstant::REDIRECT_TO_INDEX);
       }
       else {
           echo 'Aucun utilisateur avec cet Email trouvé';
       }

    }

}
