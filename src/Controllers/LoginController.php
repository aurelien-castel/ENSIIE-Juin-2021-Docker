<?php

namespace Controllers;

class LoginController
{

    private UserController $userController;

    public function __construct()
    {
        $this->userController= new UserController();
    }

    public function addUser($data)
    {
        $login = strtolower($_POST["user_name"]);
        $login = str_replace(' ', '', $login);
        $email = $_POST["user_email"];
        $password = $_POST['user_password'];

        $formIsCorrect = true;

        if (strlen($login) < 4 || strlen($login) > 128)
        {
            $formIsCorrect = false;
            array_push($data['messages'], array("text" => "Erreur dans les nom d'utilisateur" , "type" => "danger"));
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $formIsCorrect = false;
            array_push($data['messages'], array("text" => "Erreur dans l'email" , "type" => "danger"));
        }
        else if (strlen($password) < 8 || strlen($password) > 72) {
            $formIsCorrect = false;
            array_push($data['messages'], array("text" => "Erreur dans le mot de passe" , "type" => "danger"));
        }

        if($formIsCorrect)
        {
            $_POST['user_password'] = password_hash($_POST['user_password'], PASSWORD_DEFAULT, ['cost' => 14]);
            if ($this->userController->createUser($_POST))
            {
                array_push($data['messages'], array("text" => "Utilisateur créé", "type" => "success"));
                $data['addUser'] = 1 ;
            } else {
                array_push($data['messages'] ,array("text" => "Erreur dans les données : login deja utilisé", "type" => "danger"));
            }
        }

        return $data;
    }
}