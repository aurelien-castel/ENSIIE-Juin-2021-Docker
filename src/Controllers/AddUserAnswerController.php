<?php

namespace Controllers;

use Model\Objet\Form;

class AddUserAnswerController
{
    private UserAnswerController $userAnswerController;
    private FormController $formController;
    private PossibleAnswerController $possibleAnswerController;

    public function __construct()
    {
        $this->formController = new FormController();
        $this->userAnswerController = new UserAnswerController();
        $this->possibleAnswerController = new PossibleAnswerController();

    }

    public function addUserAnswer()
    {
        $form = $this->formController->getForm($_GET["form"]);
        $userAnswers = [];
        $questions = $form->getQuestions();

        for($i = 0 ; $i < count($questions) ; $i++ )
        {
            $name = "question".$i;
            if(isset($_POST[$name]))
            {
                if($questions[$i]->getQuestionType() == "text")
                {
                    array_push($userAnswers, ["question_id" => $questions[$i]->getQuestionId() , "user_answer_value" => $_POST[$name] , "question" =>  $questions[$i]->getQuestionValue()]);
                }
                if($questions[$i]->getQuestionType() == "radio")
                {
                    $possibleAnswer = $this->possibleAnswerController->getPossibleAnswer($_POST[$name]);
                    array_push($userAnswers, ["question_id" => $questions[$i]->getQuestionId() , "user_answer_value" => $possibleAnswer->getPossibleAnswerValue(),
                        "question" =>  $questions[$i]->getQuestionValue()]);
                }
                if($questions[$i]->getQuestionType() == "select")
                {
                    foreach($_POST[$name] as $multipleAnswer)
                    {
                        $possibleAnswer = $this->possibleAnswerController->getPossibleAnswer($multipleAnswer);
                        array_push($userAnswers, ["question_id" => $questions[$i]->getQuestionId() , "user_answer_value" => $possibleAnswer->getPossibleAnswerValue(),
                            "question" =>  $questions[$i]->getQuestionValue()]);
                    }
                }
            }
        }

        foreach($userAnswers as $userAnswer)
        {
            $this->userAnswerController->addUserAnswer($userAnswer);
        }
    }
}
