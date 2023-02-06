<?php
namespace Controllers;

use Db\Connection;
use Model\Objet\Form;
use Model\Objet\UserAnswer;
use Model\UserAnswerModel;

class UserAnswerController
{
    private UserAnswerModel $userAnswerModel;

    public function __construct()
    {
        $this->userAnswerModel = new UserAnswerModel(Connection::get());
    }

    public function getAllUserAnswerForAForm(Form $form): Form
    {
        foreach ($form->getQuestions() as $question )
        {
            $userAnswers=[];
            $answers= $this->userAnswerModel->getUserAnswers($question->getQuestionId());

            foreach($answers as $answer)
            {
                array_push($userAnswers, $this->createClassUserAnswer($answer));
            }
            $question->setUserAnswers($userAnswers);
        }

        return $form;
    }

    public function addUserAnswer(array $userAnswer)
    {
        $userAnswer= $this->createClassUserAnswer($userAnswer);
        $this->userAnswerModel->addUserAnswer($userAnswer);
    }

    public function deleteUserAnswerByQuestionId($id)
    {
        $this->userAnswerModel->deleteUserAnswerByQuestionId($id);
    }

    private function createClassUserAnswer($data): UserAnswer
    {
        $userAnswer = new UserAnswer();
        $userAnswer
            ->setQuestionId($data['question_id'])
            ->setUserAnswerValue($data['user_answer_value']);

        if(isset($data['user_answer_id']))
        {
            $userAnswer->setUserAnswerId($data['user_answer_id']);
        }
        return $userAnswer;
    }


}