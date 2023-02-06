<?php

namespace Controllers;

class CreateFormToBdController
{
    private FormController $formController;
    private QuestionController $questionController;
    private PossibleAnswerController $possibleAnswerController;

    public function __construct()
    {
        $this->formController = new FormController();
        $this->questionController = new QuestionController();
        $this->possibleAnswerController = new PossibleAnswerController();
    }

    public function addForm($data)
    {
        $form_name = $_POST['form_name'];
        $form_description= $_POST['form_description'];
        $form_expiration_date = $_POST['form_expiration_date'];
        $_POST['form_password']= date_create('now')->format('YmdHis').$_SESSION['login'];

        $formIsCorrect = true;

        if (strlen($form_name) < 4 || strlen($form_name) > 128) {
            $formIsCorrect = false;
            array_push($data['messages'], array("text" => "Erreur form_name" , "type" => "danger"));
        } else if (strlen($form_description) < 4 || strlen($form_description) > 128) {
            $formIsCorrect = false;
            array_push($data['messages'], array("text" => "Erreur form_description" , "type" => "danger"));
        } else if (strlen($form_expiration_date) != 10) {
            $formIsCorrect = false;
            array_push($data['messages'], array("text" => "Erreur form_expiration_date" , "type" => "danger"));
        }

       /* $i = -1;

        foreach ($_POST as $key => $value) {
            if (substr($key, 0, 11) === "NameElement") {
                $i++;
                $currentQuestionString = $value;
                $questionToPossibleAnswersArray[$i]['question_value'] = $value;
                $questionToPossibleAnswersArray[$i]['form_id'] = $newForm->getFormId();
                $questionToPossibleAnswersArray[$i]['possible_answer_value'] = [];
            }
            if (substr($key, 0, 11) === "TypeElement") {
                $questionToPossibleAnswersArray[$i]['question_type'] = $value;
            }
            if (substr($key, 0, 22) === "PossibleAnswersElement") {

                foreach (explode("\n", $value) as $possibleAnswer) {
                    array_push($questionToPossibleAnswersArray[$i]['possible_answer_value'], $possibleAnswer);
                }
            }
            if (substr($key, 0, 15) === "RequiredElement") {
                $questionToPossibleAnswersArray[$i]['question_is_required'] = true;
            }
        }*/



        if($formIsCorrect)
        {
            $_POST['user_id'] = $_SESSION['id'];

            if($this->formController->addForm($_POST)) {
                $newForm = $this->formController->getFormByPassword($_POST['form_password']);
                $data['form_id'] = $newForm->getFormId();

                array_push($data['messages'], array("text" => "Votre formulaire a bien été ajouté" , "type" => "success"));

                $POST_cleaned = array_slice($_POST, 0, sizeof($_POST) - 4); // tableau nettoyé

                $questionToPossibleAnswersArray = array();

                $i = -1;

                foreach ($_POST as $key => $value) {
                    if (substr($key, 0, 11) === "NameElement") {
                        $i++;
                        $currentQuestionString = $value;
                        $questionToPossibleAnswersArray[$i]['question_value'] = $value;
                        $questionToPossibleAnswersArray[$i]['form_id'] = $newForm->getFormId();
                        $questionToPossibleAnswersArray[$i]['possible_answer_value'] = [];
                    }
                    if (substr($key, 0, 11) === "TypeElement") {
                        $questionToPossibleAnswersArray[$i]['question_type'] = $value;
                    }
                    if (substr($key, 0, 22) === "PossibleAnswersElement") {
                        foreach (explode("\n", $value) as $possibleAnswer)
                        {
                            $possibleAnswer = trim($possibleAnswer);
                            array_push($questionToPossibleAnswersArray[$i]['possible_answer_value'], str_replace(" ", "",$possibleAnswer));
                        }
                    }
                    if (substr($key, 0, 15) === "RequiredElement") {
                        $questionToPossibleAnswersArray[$i]['question_is_required'] = true;
                    }
                }

                foreach ($questionToPossibleAnswersArray as $question) {
                    if (!isset($question['question_is_required'])) {
                        $question['question_is_required'] = false;
                    }
                    $question['question_id'] = $this->questionController->addQuestion($question);

                    if ($question['question_type'] != "Text") {
                        $this->possibleAnswerController->addPossibleAnswers($question);
                    }
                }
            }
            else{
                array_push($data['messages'], array("text" => "Erreur lors de l'ajout du forms" , "type" => "danger"));
            }
        }
        return $data;
    }
}