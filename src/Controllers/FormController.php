<?php

namespace Controllers;
use Model\Objet\Form;
use Model\FormModel;
use Model\QuestionModel;

class FormController
{
    private FormModel $formModel;
    private QuestionController $questionController;

    public function __construct()
    {
        $this->formModel= new FormModel(\Db\Connection::get());
        $this->questionController= new QuestionController(\Db\Connection::get());
    }

    public function addForm($data) : bool
    {
        return $this->formModel->addForm($this->createClassForm($data));
    }

    public function getFormByPassword($formPassword): ?Form
    {
        $form = $this->formModel->getFormByPassword($formPassword);
        if($form != false)
        {
            $form = $this->createClassForm($form);
            $questions = $this->questionController->getQuestionsByFormID($form->getFormId());

            $form->setQuestions($questions);
            return $form;
        }

        return null;
    }

    public function getForm($formId): Form
    {
        $form = $this->createClassForm($this->formModel->getForm($formId));
        $questions = $this->questionController->getQuestionsByFormID($form->getFormId());
        $form->setQuestions($questions);
        return $form;
    }

    public function getFormsByUserId($id): array
    {
        $forms = $this->formModel->getFormsByUserId($id);
        $resultForms= [];

        foreach($forms as $form)
        {
            array_push($resultForms, $this->createClassForm($form));
        }

        return $resultForms;
    }

    public function changeExpDate(array $date)
    {
        $forms = $this->formModel->changeExpDate($date);
    }

    public function deleteForm($id)
    {
        $forms = $this->formModel->deleteForm($id);
    }



    public function createClassForm($data): Form
    {
        $form = new Form();
        $form
            ->setUserId($data['user_id'])
            ->setFormName($data['form_name'])
            ->setFormPassword($data['form_password'])
            ->setFormDescription($data['form_description'])
            ->setFormExpirationDate($data['form_expiration_date']);

        if(isset($data['form_id']))
        {
            $form->setFormId($data['form_id']);
        }
        return $form;
    }
}
