<?php

namespace Controllers;

class ManageFormController
{

    private FormController $formController;
    private UserAnswerController $userAnswerController;
    private PossibleAnswerController $possibleAnswerController;

    public function __construct()
    {
        $this->formController = new FormController();
        $this->userAnswerController = new UserAnswerController();
        $this->possibleAnswerController = new PossibleAnswerController();
    }

    public function getForms()
    {
        return $this->formController->getFormsByUserId($_SESSION["id"]);
    }

    public function changeExpDate($id)
    {
        $data = ["form_expiration_date" => $_POST["form_expiration_date"] ,"form_id" =>  $id];
        $this->formController->changeExpDate($data);
        return $this->formController->getFormsByUserId($_SESSION["id"]);
    }

    public function deleteForm($id)
    {
        $form = $this->formController->getForm($id);
        $form = $this->userAnswerController->getAllUserAnswerForAForm($form);

        foreach($form->getQuestions() as $question)
        {
            $this->possibleAnswerController->deletePossibleAnswerByQuestionId($question->getQuestionId());
            $this->userAnswerController->deleteUserAnswerByQuestionId($question->getQuestionId());

        }
        $this->formController->deleteForm($id);

        return $this->getForms();
    }
}