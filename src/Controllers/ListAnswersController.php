<?php

namespace Controllers;

use Controllers\FormController;
use Controllers\UserAnswerController;

class ListAnswersController
{
    private UserAnswerController $userAnswerController;
    private FormController $formController;

    public function __construct()
    {
        $this->userAnswerController = new UserAnswerController();
        $this->formController = new FormController();
    }

    public function getAnswers(int $id): \Model\Objet\Form
    {
        $form = $this->formController->getForm($id);
        return $this->userAnswerController->getAllUserAnswerForAForm($form);
    }

}