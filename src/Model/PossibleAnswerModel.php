<?php
namespace Model;
use Exception;
use Model\Objet\PossibleAnswer;
use PDO;

class PossibleAnswerModel
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
    public function getPossibleAnswersByQuestionId($questionId): array
    {
        $sql = $this->connection->prepare('SELECT * FROM "possible_answer" WHERE "question_id" = ? ');
        $sql->execute(array($questionId));
        return  $sql->fetchAll();
    }

    public function getPossibleAnswer($id)
    {
        $sql =  $this->connection->prepare('SELECT * FROM "possible_answer" WHERE "possible_answer_id" = ? ');
        $sql->execute(array($id));
        return  $sql->fetch();
    }

    public function deletePossibleAnswerByQuestionId($id)
    {
        $sql =  $this->connection->prepare('DELETE FROM "possible_answer" WHERE "question_id" = ? ');
        $sql->execute(array($id));
        $sql->execute();
    }

    public function addPossibleAnswer(PossibleAnswer $possibleAnswer): bool
    {
        $sql =  $this->connection->prepare('INSERT INTO "possible_answer" ("question_id" ,"possible_answer_value") VALUES (?,?)');

        $sql->bindParam(1, $question_id);
        $sql->bindParam(2, $possible_answer_value);

        $question_id = $possibleAnswer->getQuestionId();
        $possible_answer_value = $possibleAnswer->getPossibleAnswerValue();

        return $sql->execute();
    }
}

