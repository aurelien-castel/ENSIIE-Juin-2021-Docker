<?php
namespace Model;
use Exception;
use Model\Objet\UserAnswer;
use PDO;

class UserAnswerModel
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

    public function getUserAnswers(int $idQuestion): array
    {
        $sql =  $this->connection->prepare('SELECT * FROM "user_answer" WHERE "question_id" = ? ');
        $sql->execute(array($idQuestion));
        return  $sql->fetchAll();
    }

    public function countUserAnswerByValueAndIdQuestion(array $value)
    {
        $sql =  $this->connection->prepare('SELECT COUNT(*) FROM "user_answer" WHERE "user_answer_value" = ? AND "question_id" = ? ');
        $sql->execute($value);
        return  $sql->fetch();
    }

    public function addUserAnswer(UserAnswer $userAnswer)
    {
        $sql =  $this->connection->prepare('INSERT INTO "user_answer" ("question_id" ,"user_answer_value") VALUES (?,?)');

        $sql->bindParam(1, $questionId);
        $sql->bindParam(2, $answerValue);

        $questionId = $userAnswer->getQuestionId();
        $answerValue= $userAnswer->getUserAnswerValue();

        $sql->execute();
    }

    public function deleteUserAnswerByQuestionId($id)
    {
        $sql =  $this->connection->prepare('DELETE FROM "user_answer" WHERE "question_id" = ? ');
        $sql->execute(array($id));
        $sql->execute();
    }

}
