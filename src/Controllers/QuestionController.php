<?php

namespace Controllers;

use Db\Connection;
use Model\Objet\Question;
use Model\QuestionModel;
use Controllers\PossibleAnswerController;

class QuestionController
{
    private QuestionModel $questionModel;
    private PossibleAnswerController $possibleAnswerController;

    public function __construct()
    {
        $this->questionModel = new QuestionModel(Connection::get());
        $this->possibleAnswerController = new PossibleAnswerController();
    }

    /*
     * recupere tous les questions d'un form ainsi que les reponses possible correspondant au questions
     */
    public function getQuestionsByFormId($formId): array
    {
        $questions = $this->questionModel->getQuestionsByFormId($formId);
        $result = [];

        foreach ($questions as $question)
        {
            $question = $this->createClassQuestion($question);
            $possibleAnswers = $this->possibleAnswerController->getPossibleAnswersByQuestionId($question->getQuestionId());
            $question->setPossibleAnswers($possibleAnswers);

            array_push($result, $question);
        }

        return $result;
    }

    public function addQuestion($data) : int
    {
       return $this->questionModel->addQuestion($this->createClassQuestion($data));
    }

    public function createClassQuestion($data): Question
    {
        $question = new Question();

        $question->setFormId($data['form_id']);
        $question->setQuestionIsRequired($data['question_is_required']);
        $question->setQuestionValue($data['question_value']);
        $question->setQuestionType($data['question_type']);

        if(isset($data['question_id']))
        {
            $question->setQuestionId($data['question_id']);
        }

        return $question;
    }
}