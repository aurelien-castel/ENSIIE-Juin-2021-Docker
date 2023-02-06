<?php

namespace Controllers;


use Model\Objet\Form;
use Model\Objet\PossibleAnswer;

class AnswerFormController
{
    private PossibleAnswerController $possibleAnswerController;
    private FormController $formController;

    public function __construct()
    {
        $this->possibleAnswerController= new PossibleAnswerController();
        $this->formController = new FormController();
    }

    public function getFormByPassword($formPassword): ?Form
    {
        return $this->formController->getFormByPassword($formPassword);
    }

    public function getForm($idForm): Form
    {
        return $this->formController->getForm($idForm);
    }
}