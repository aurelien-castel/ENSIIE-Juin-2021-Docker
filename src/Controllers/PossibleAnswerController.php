<?php
namespace Controllers;

use Db\Connection;
use Model\Objet\PossibleAnswer;
use Model\PossibleAnswerModel;
use Model\UserAnswerModel;

class PossibleAnswerController
{
    private PossibleAnswerModel $possibleAnswerModel;
    private UserAnswerModel $userAnswerModel;


    public function __construct()
    {
        $this->possibleAnswerModel= new PossibleAnswerModel(Connection::get());
        $this->userAnswerModel= new UserAnswerModel(Connection::get());
    }

    public function getPossibleAnswer($id): PossibleAnswer
    {
        $possibleAnswer = $this->possibleAnswerModel->getPossibleAnswer($id);
        return $this->createClassPossibleAnswer($possibleAnswer);
    }

    public function getPossibleAnswersByQuestionId($questionId): array
    {
        $possibleAnswers =  $this->possibleAnswerModel->getPossibleAnswersByQuestionId($questionId);
        $result = [];

        foreach ($possibleAnswers as $possibleAnswer)
        {
            array_push($result, $this->createClassPossibleAnswer($possibleAnswer));
        }

        return $result;
    }

    public function addPossibleAnswers(array $question)
    {
        foreach($question['possible_answer_value'] as $value)
        {
            $possibleAnswer = $this->createClassPossibleAnswer(array(
                'possible_answer_value'   => $value,
                'question_id' => $question['question_id'],
            ));

            $this->possibleAnswerModel->addPossibleAnswer($possibleAnswer);
        }
    }

    public function deletePossibleAnswerByQuestionId($id)
    {
        $this->possibleAnswerModel->deletePossibleAnswerByQuestionId($id);
    }

    public function createClassPossibleAnswer($data): PossibleAnswer
    {
        $count = $this->userAnswerModel->countUserAnswerByValueAndIdQuestion([$data['possible_answer_value'],$data['question_id']])[0];

        $possibleAnswer = new PossibleAnswer();
        $possibleAnswer
            ->setQuestionId($data['question_id'])
            ->setPossibleAnswerValue($data['possible_answer_value'])
            ->setUserAnswersCount($count);

        if(isset($data['possible_answer_id']))
        {
            $possibleAnswer->setPossibleAnswerId($data['possible_answer_id']);
        }
        return $possibleAnswer;
    }
}