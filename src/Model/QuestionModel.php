<?php
namespace Model;
use Exception;
use Model\Objet\Question;
use PDO;

class QuestionModel
{
    private PDO $connection;

    /**
     * UserRepository constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array []
     */
    public function getQuestionsByFormID($formId): array
    {
        $sql = $this->connection->prepare('SELECT * FROM "question" WHERE "form_id" = ?');
        $sql->execute(array($formId));
        return  $sql->fetchAll();
    }

    public function getQuestion($id)
    {
        $sql =  $this->connection->prepare('SELECT * FROM "question" WHERE "question_id" = ? ');
        $sql->execute(array($id));
        return  $sql->fetch();
    }

    public function addQuestion(Question $question): int
    {
        $sql =  $this->connection->prepare('INSERT INTO "question" ("question_type" ,"form_id","question_is_required","question_value") VALUES (?,?,?,?)');

        $sql->bindParam(1, $questionType);
        $sql->bindParam(2, $formId);
        $sql->bindParam(3, $questionIsRequired);
        $sql->bindParam(4, $questionValue);

        $questionType = $question->getQuestionType();
        $formId = $question->getFormId();
        $questionIsRequired = $question->getQuestionIsRequired();
        $questionValue = $question->getQuestionValue();

        $sql->execute();

        return $this->connection->lastInsertId();
    }
}

