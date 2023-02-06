<?php

require_once '../src/Bootstrap.php';

$controller= new \Controllers\Controller();
$userController= new \Controllers\UserController();
$userAnswerController= new \Controllers\UserAnswerController();
$formController= new \Controllers\FormController();
$loginController= new \Controllers\LoginController();
$createFormController = new \Controllers\CreateFormToBdController();
$answerFormController = new \Controllers\AnswerFormController();
$listAnswerController = new \Controllers\ListAnswersController();
$addUserAnswerController = new \Controllers\AddUserAnswerController();
$manageFormController = new \Controllers\ManageFormController();

$data=[];
$data['messages']=[];
session_start();
$view = "Login";

// unauthenticated page
if(isset($_GET['page']))
{
    $action = $_GET['page'];
    switch($action)
    {
        case 'createAccountPage' :
            $view = "CreateAccount";
            break;
        case 'createAccount' :
            $data= $loginController->addUser($data);
            if(!isset($data['addUser'])) { $view = "CreateAccount";}
            break;
        case 'answerForm' :

            $data['form'] = $answerFormController->getFormByPassword($_POST['form_password']);

            if ($data['form']  != null)
            {
                $expDate = new DateTime($data['form']->getFormExpirationDate());

                if($expDate < date_create('now'))
                {
                    array_push($data['messages'], array("text" => "Le formulaire n'est plus accessible" , "type" => "danger"));
                }else{
                    $view = "AnswerForm";
                }
            }
            else{
                array_push($data['messages'], array("text" => "Nous n'avons pas trouvé de formulaire correspondant à cet identifiant" , "type" => "danger"));
            }
            break;
        case 'addAnswer' :
            $addUserAnswerController->addUserAnswer();
            array_push($data['messages'], array("text" => "Votre reponse a bien ete envoyé" , "type" => "success"));
            break;
    }
}

//Page qui demande a etre authentifier
if(isset($_SESSION['auth']))
{
    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
        switch($action) {
            case 'disconnect' :
                $controller->disconnect();
                echo "<meta HTTP-EQUIV=REFRESH CONTENT='0; index.php'/>" . PHP_EOL;
                break;
            case 'createAccountPage' :
                $view = "CreateAccount";
                break;
            case 'createForm' :
                $view = "CreateForm";
                break;
            case 'createFormToDB':
                $data = $createFormController->addForm($data);
                break;
            case 'changeExpDate' :
                $view = "ManageForms";
                $data["forms"] = $manageFormController->changeExpDate($_GET['id']);
                array_push($data['messages'], array("text" => "La date a bien été changé" , "type" => "success"));
                break;
            case 'manageForms' :
                $view = "ManageForms";
                $data["forms"] = $manageFormController->getForms();
                break;
            case 'deleteForm' :
                $view = "ManageForms";
                $data['forms'] = $manageFormController->deleteForm($_GET['id']);
                break;
            case 'listAnswers' :
                $view = "ListAnswers";
                $data['form'] = $listAnswerController->getAnswers($_GET['id']);
                break;
        }
    }
}
//Si on demande a se connecter
else if (isset($_POST['user_name']) && !isset($_POST['user_email']) )
{
    $user = $userController->verifLogin($_POST);

    if ( $user != null)
    {
        $data['user'] =  $user;
    }
    else{
        array_push($data['messages'], array("text" => "Erreur login" , "type" => "danger"));
    }
}


$users = $userController->getUsers();

$data['users'] =  $users;
$controller->rendu($view, $data);

 
